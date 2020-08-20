<?php
namespace Home\Controller;
use Home\Controller\SiteController;
/**
 * 
 */
class ActivityController extends SiteController {
    
    public function __construct() {
        
        parent::__construct ();
        C('TPL_NAME','mobile');
        $this->act_id = 1;
    }
    public function test(){
        
        echo $_SERVER['HTTP_HOST'];
        
    }
    //2020年厦门市区块链企业年终评选首页
    public function selection(){  
        
        $this -> siteDisplay('selection');
    }
    //2020年厦门市区块链企业年终评选规则也
    public function selection_rule(){  

        $this -> siteDisplay('rule');
    }
    
    
    
    //用户登录
    public function selection_login(){
       
        header("Content-Type:text/html; charset=utf-8");
        $act_id = $this->act_id;

        redirect(U('Home/Activity/selection_page',array('act_id'=>$act_id,'uid'=>2,'openid'=>'oLZqUwUi6L4-KKB32Hmo0mrFlzEI')));
        
        $login=A('Home/login');
        $login->dowxlogin($act_id,0);

    }
    
    //落地展示页面
    public function selection_page(){
        header("Content-Type:text/html; charset=utf-8");

        $act_id = I('get.act_id',0,'intval');
        $uid = I('get.uid',0,'intval');
        $openid = I('get.openid',0,'trim');

        if (empty($uid)||empty($openid)) {
            exit('缺少uid');
            $this->error404();
        }
        $userMod=D('Home/Users');

        $uinfo=$userMod->getUserInfo(array('id'=>$uid,'openid'=>$openid));
        
        if(empty($uinfo)) {
            $this->error('找不到用户信息',U('Home/Activity/selection'));
        }else{
            $userMod->setLogin($uid);
        }

        
        $selectionMod=M('Selection');
        
        $pageInfo['num']   = $selectionMod->where(['status'=>1])->count();
        $pageInfo['votes'] = $selectionMod->where(['status'=>1])->sum('votes');
        $pageInfo['num_2'] = $userMod->where(['act_id'=>1])->count();
        
        $pageInfo['list_1'] = $selectionMod->where(['type'=>1,'status'=>1])->page(1,2)->select();
        $pageInfo['list_2'] = $selectionMod->where(['type'=>2,'status'=>1])->page(1,2)->select();
        $pageInfo['list_3'] = $selectionMod->where(['type'=>3,'status'=>1])->page(1,2)->select();
        
        //用户今天的投票记录
        $recordMod = M('SelectionRecord');
        $todayTime = strtotime(date('Y-m-d')); //今天开始的时间戳

        $today_record = $recordMod->where(['user_id'=>$uid,'time'=>['gt',$todayTime]])->select();
        if($today_record){
            $selectionArr = array();
            foreach($today_record as $val){
                $selectionArr[] = $val['selection_id'];
            }
            if($selectionArr){
                foreach($pageInfo['list_1'] as $key=>$val){
                    if(in_array($val['id'],$selectionArr)){
                        $pageInfo['list_1'][$key]['already'] = 1;
                    }
                }
                foreach($pageInfo['list_2'] as $key=>$val){
                    if(in_array($val['id'],$selectionArr)){
                        $pageInfo['list_2'][$key]['already'] = 1;
                    }
                }
                foreach($pageInfo['list_3'] as $key=>$val){
                    if(in_array($val['id'],$selectionArr)){
                        $pageInfo['list_3'][$key]['already'] = 1;
                    }
                }
            }
        }

        $this->assign('uid',$uid);
        $this->assign('pageInfo',$pageInfo);
        $this->assign('userInfo',$uinfo);

        $this -> siteDisplay('selectionPage');
    }
     
    
}