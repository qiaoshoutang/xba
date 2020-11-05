<?php
namespace Common\Controller;
/*海报生成*
 * 
 */
class MessagePoster
{
    // 素材路径
    public $fileDir = ROOT_PATH . "/Public/poster";
    
    // 海报保存路径
    public $fileSavePath = ROOT_PATH . "/Uploads/poster";
    


    // 海报内容配置信息
    private $_infoConfig = [];


    // 外部获取海报路径
    private $getImageUrl  = '';

    public function initConfig(array $config)
    {
        foreach ($config AS $name=>$value)
        {
            $this->_infoConfig[$name] = $value;
        }
        unset($name,$value);
        return $this->makePoster();
    }
    
    public function getPosterUrl()
    {

        return str_replace(ROOT_PATH,'',$this->getImageUrl);

    }

    private function makePoster()
    {
        $_dir          = $this->fileDir;
        $_ArticleTitle = isset($this->_infoConfig['title'])?$this->_infoConfig['title']:'暂无标题';
        $_ArticleBody  = isset($this->_infoConfig['content'])?$this->_infoConfig['content']:'暂无内容';
        $time          = isset($this->_infoConfig['time'])?$this->_infoConfig['time']:time(); 

        $_canvasDir = $this->fileSavePath.'/'.date('Y-m-d').'/';
        $_canvasFile = 'message_poster_'.$this->_infoConfig['id'].'.png';
        
        $_weekarray = ['日', '一', '二', '三', '四', '五', '六'];        
        $_ArticleTime  = '星期'.$_weekarray[date('w', $time)].' '.date('Y-m-d',$time).' '.date('H:i',$time);
        unset($_weekarray);
        
        $_fontFile    = $this->fileDir.'/PingFang';
        $_imgBgTop    = $_dir.'/image/top.png';
        $_imgBgBottom = $_dir.'/image/bottom.png';
//         $_imgBgTime   = $_dir.'/image/poster/time_icon.png';

        $_ImgTop = getimagesize($_imgBgTop);
        $_ImgBottom = getimagesize($_imgBgBottom);
        
        if( !is_dir($_canvasDir) ){
            if( !mkdir($_canvasDir, 0755,true) ){logs('[Extended\NewsFlashPoster]目录：'.$_canvasDir.' 创建失败！','ERR');}
        }
        $_canvasDir = $_canvasDir.$_canvasFile;
        unset($_canvasFile);
        
        $_ArticleTitle = $this->autowrap(26,0,$_fontFile.'/PingFang Medium_downcc.otf',trim($_ArticleTitle),$_ImgTop[0]-120);
        $_ArticleBody = $this->autowrap(22,0,$_fontFile.'/PingFang Medium_downcc.otf',trim($_ArticleBody),$_ImgTop[0]-130);
        
        $_canvasHeight = ($_ImgTop[1]+count($_ArticleTitle)*50+120+count($_ArticleBody)*43+300);
        if($_canvasHeight<1100){
            $_canvasHeight = 1100;
        }
//         dd($_ImgTop,$_ImgBottom);
        // 创建画布
        $pngImg = imagecreatetruecolor($_ImgTop[0],$_canvasHeight);
        imagesavealpha($pngImg, true);
        imagefill($pngImg,0,0,imagecolorAllocate($pngImg,1,15,138));
        imagefilledrectangle($pngImg,41,384,$_ImgTop[0]-42,$_canvasHeight-335,imagecolorAllocate($pngImg,255,255,255));

        
        imagepng($pngImg,$_canvasDir);
        imagedestroy($pngImg);
        unset($pngImg);
        $_canvasIm   = imagecreatefrompng($_canvasDir);
        $_canvasInfo = getimagesize($_canvasDir);


        // 合成头部背景图片
        $src_im = imagecreatefrompng($_imgBgTop);
        $src_info = getimagesize($_imgBgTop);
        imagecopymerge($_canvasIm,$src_im,0,0,0,0,$src_info[0],$src_info[1],100);
        unset($src_info);
        imagedestroy($src_im);
        
        // 合成文章发布时间
        imagefttext($_canvasIm,17,0,75,$_ImgTop[1]+12,imagecolorallocate($_canvasIm, 6, 6, 6),$_fontFile.'/PingFang Medium_downcc.otf',$_ArticleTime);
        
        
        $lineHeight   = 46;
        // 合成文章标题
        foreach ($_ArticleTitle as $k => $v) {
            imagefttext($_canvasIm,26,0,75,($_ImgTop[1]+65)+($lineHeight*$k),imagecolorallocate($_canvasIm, 0, 0, 0),$_fontFile.'/PingFang Medium_downcc.otf',$v);
        }
        
        
        // 时间图标
//         $src_im = imagecreatefrompng($_imgBgTime);
//         $src_info = getimagesize($_imgBgTime);
//         imagecopyresampled ($_canvasIm,$src_im,60,$_ImgTop[1]+count($_ArticleTitle)*$lineHeight+40,0,0,22,22,$src_info[0],$src_info[1]);
//         unset($src_info);
//         imagedestroy($src_im);
        
        
        // 合成文章内容
        foreach ($_ArticleBody as $k => $v) {
            imagefttext($_canvasIm,22,0,75,($_ImgTop[1]+(count($_ArticleTitle)*$lineHeight)+85)+($lineHeight*$k),imagecolorallocate($_canvasIm, 80, 80, 80),$_fontFile.'/PingFang Medium_downcc.otf',$v);
        }
        unset($k,$v,$lineHeight);
        
        
        // 合成底部背景图片
        $src_im = imagecreatefrompng($_imgBgBottom);
        $src_info = getimagesize($_imgBgBottom);
        imagecopymerge($_canvasIm,$src_im,$_canvasInfo[0]-$src_info[0],$_canvasInfo[1]-$src_info[1],0,0,$src_info[0],$src_info[1],100);
        unset($src_info);
        imagedestroy($src_im);
        

        imagepng($_canvasIm,$_canvasDir);

        imagedestroy($_canvasIm);
        $this->getImageUrl = $_canvasDir;
        
        return $this->getImageUrl;
    }

    private function autowrap($fontsize, $angle, $fontface, $string, $width)
    {
        // 这几个变量分别是 字体大小, 角度, 字体名称, 字符串, 预设宽度
        $content = "";
        // 将字符串拆分成一个个单字 保存到数组 letter 中
        for ($i = 0; $i < mb_strlen($string); $i++) {
            $letter[] = mb_substr($string, $i, 1);
        }
        $flag = 0;
        foreach ($letter as $k=>$l) {  //把数字合并在一起
//             if(in_array($l,['0','1','2','3','4','5','6','7','8','9','.','a','b','c','d'])){
            if(preg_match('/[0-9a-zA-Z.]/',$l)){  //字母和数字不换行
                if($flag == 0){
                    $flag = $k;
                }else{
                    $letter[$flag] = $letter[$flag].''.$letter[$k];
                    unset($letter[$k]);
                }
            }else{
                $flag = 0;
            }
        }
//         dd($letter);
        foreach ($letter as $l) {
            $teststr = $content . " " . $l;
            $testbox = imagettfbbox($fontsize, $angle, $fontface, $teststr);
            // 判断拼接后的字符串是否超过预设的宽度
            if (($testbox[2] > $width) && ($content !== "")) {
                $content .= "\n";
            }
            $content .= $l;
        }
        $content = explode("\n", $content);
        return $content;
    }
}
