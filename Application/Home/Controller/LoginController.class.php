<?php
namespace Home\Controller;
use Common\Controller\BaseController;
/**
 * 登录页面
 */
class LoginController extends BaseController {
    
    /**
     * 登录页面
     */
    public function index(){
        if(!iswx()){
            exit('请在微信内访问');
        }
        
        if(I('get.type',0,'intval')==2)
            $this -> dowxlogin('snsapi_userinfo');
            else
                $this -> dowxlogin('snsapi_base');
                
                
                // $this->display();
    }
    
    
	
	
	
    
    //微信登录
    public function dowxlogin($act_id='0',$pid='0',$scope='snsapi_base'){
        
        if(!$act_id){
            return '无活动ID';
        }
        if (iswx()) {
            
            $APPID = 'wxdebea819f65bfb54';
            $SCRETID = '88bbe0107b3e5d769f156a839d515485';
            
            if (!isset($_GET['code'])) {
                
                $backurl = get_url();
                $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $APPID . "&redirect_uri=" . urlencode($backurl) . "&response_type=code&scope=".$scope."&state=123#wechat_redirect";
                Header("Location: $url");
                exit ;
            } else {
                $code = $_GET['code'];
                $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $APPID . "&secret=" . $SCRETID . "&code=" . $code . "&grant_type=authorization_code";
                $re = A('Home/Site') -> curl_get_contents($url);

                $rearr = json_decode($re, true);

                $openid = $rearr['openid'];
                $asstoken = $rearr['access_token'];

                if (!$openid) {
                    echo '获取openid失败，<a href="' . U("Activity/login") . '">点击请返回重试</a>';
                    exit ;
                }

                $w2['openid'] = $openid;

                $usermod = D("Users");
                $udb = $usermod -> where($w2) -> find();
                if (!is_array($udb)){//无记录，则跳转到绑定注册页                

                    $rearr2['act_id']=$act_id;
                    $res= $usermod->wxregopenid($openid,$rearr2);
  					
                    if($res){

                        $gourl = U('Home/Activity/selection_page',array('act_id'=>$act_id,'uid'=>$res,'openid'=>$openid));
                        redirect($gourl);
                    }
                    
                } else {//登录 更新最新的活动ID

                    if($udb['act_id']==$act_id){//参加过该活动   直接跳转至用户信息页面

                        //参加过该活动  直接跳转至用户信息页面
                        $gourl = U('Home/Activity/selection_page',array('act_id'=>$act_id,'uid'=>$udb['id'],'openid'=>$udb['openid']));
                        
                    }else{  //未参加过该活动
                        
                        $usermod->where(array('id'=>$udb['id']))->setField('act_id',$act_id);//更新活动ID
                        $gourl = U('Home/Activity/selection_page',array('act_id'=>$act_id,'uid'=>$udb['id'],'openid'=>$udb['openid'])); 
                    }

                    redirect($gourl);
                }
            }
        }else{
            exit('请在微信内打开');
        }
        
    }
    
    /**
     * 退出登录
     */
    public function logout(){
        D('Users')->logout();
        session('[destroy]');
        //         $this->success('退出系统成功！', U('index'));
        exit('退出成功');
    }
    
}




