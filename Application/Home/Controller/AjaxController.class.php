<?php
namespace Home\Controller;
use Home\Controller\SiteController;
/**
 * 站点首页
 */

class AjaxController extends SiteController {
    
    
    //活动详情加载更多图片
    public function get_activity_image(){
        
        $page_num = I('post.pageNum',0,'intval');
        $album_id = I('post.album_id',0,'intval');
        
        
        if(!($album_id&&$page_num)){
            $data['code'] = 0;
            $data['info'] = '参数不能为空';
            $this->ajaxReturn($data);
            exit;
        }
        $imageMod  = D('Admin/Image');
        
        $where['fid'] = $album_id;
        $where['status'] = 1;

        $page_record_num = 6;
        $limit = $page_record_num*$page_num.','.$page_record_num;
        
        $image_list = $imageMod->loadList($where,$limit,'order_id asc');


        $imageArr=array();
        foreach($image_list as $val){
            $imageArr[]['articlePic'] = C('cdnurl').$val['img_url'];
        }

        if($imageArr){
            
            $data['code'] = 1;
            $data['info'] = '获取数据成功';
            $data['list'] = $imageArr;
        }else{
            $data['code'] = 2;
            $data['info'] = '没有数据了';
        }
        $this->ajaxReturn($data);
    }
   
    
}