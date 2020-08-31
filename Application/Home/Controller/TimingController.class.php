<?php
namespace Home\Controller;
use Home\Controller\SiteController;
/**
 * 定时控制器
 * 
 */

class TimingController extends SiteController {
    
    
    //每天零点刷新用户的剩余可投票数
    public function refreshSelection(){
        header("Content-Type:text/html; charset=utf-8");
        $res  = M('Users')->where(['act_id'=>1])->setField('selection_num',10);
        if($res === false){
            echo '刷新用户剩余投票数失败';
            exit;
        }
        echo '修改了'.$res.'个用户的剩余投票数';
        exit;
    }
      
    
    
}