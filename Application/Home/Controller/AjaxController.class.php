<?php
namespace Home\Controller;
use Home\Controller\SiteController;
/**
 * 站点首页
 */

class AjaxController extends SiteController {
    
    
    //入会申请提交
    public function applySubmit(){
        
        $data = $_POST;
        if(empty($data['name'])||empty($data['company'])||empty($data['position'])){
            $rdata['code'] = 0;
            $rdata['info'] = '参数不能为空';
            $this->ajaxReturn($rdata);
        }
        $applyMod = D('Admin/Apply');
        
        $info = $applyMod->getWhereInfo(['name'=>$data['name'],'company'=>$data['company'],'position'=>$data['position']]);
        if($info){
            $rdata['code'] = 0;
            $rdata['info'] = '已存在该表单，请勿重复提交';
            $this->ajaxReturn($rdata);
        }
        $res = $applyMod->saveData('add');
        
        if(!$res){
            $rdata['code'] = 0;
            $rdata['info'] = '提交表单失败';
            $this->ajaxReturn($rdata);
        }
        $rdata['code'] = 1;
        $rdata['info'] = '提交成功，工作人员将在一周内给与答复';
        $this->ajaxReturn($rdata);
    }
    
    //投票提交
    public function selectionSubmit(){
        
        $selection_id = I('post.selection_id',0,'intval');
        if(empty($selection_id)){
            $rdata['code'] = 0;
            $rdata['info'] = '参数不能为空';
            $this->ajaxReturn($rdata);
        }

        $login_uinfo = session('home_user');
        if(empty($login_uinfo)){
            $rdata['code'] = 0;
            $rdata['info'] = '用户未登陆';
            $this->ajaxReturn($rdata);
        }
        $uid = $login_uinfo['user_id'];
        $user_info = M('users')->where(['id'=>$uid])->find();
        if(empty($user_info)){
            $rdata['code'] = 0;
            $rdata['info'] = '找不到该用户，请重新进入';
            $this->ajaxReturn($rdata);
        }

        if($user_info['selection_num'] <= 0){
            $rdata['code'] = 0;
            $rdata['info'] = '今日已经没有投票次数';
            $this->ajaxReturn($rdata);
        }
        
        //写入投票记录
        $recordMod = M('SelectionRecord');
        $sdata = array();
        $sdata['user_id'] = $uid;
        $sdata['selection_id'] = $selection_id;
        $sdata['time'] = ['gt',strtotime(date('Y-m-d'))];
        $exist = $recordMod->where($sdata)->count();
        if($exist){
            $rdata['code'] = 0;
            $rdata['info'] = '您今天已经给ta投过票了';
            $this->ajaxReturn($rdata);
        }
        $sdata['time'] = time();
        M()->startTrans();
        $res = $recordMod->add($sdata);
        if(empty($res)){
            M()->rollback();
            $rdata['code'] = 0;
            $rdata['info'] = '投票错误1';
            $this->ajaxReturn($rdata);
        }
        $res = M('users')->where(['id'=>$uid])->setDec('selection_num');
        if(empty($res)){
            M()->rollback();
            $rdata['code'] = 0;
            $rdata['info'] = '投票错误2';
            $this->ajaxReturn($rdata);
        }
        
        $selectionMod = M('selection');
        $res = $selectionMod->where(['id'=>$selection_id])->setInc('votes');

        if(empty($res)){
            M()->rollback();
            $rdata['code'] = 0;
            $rdata['info'] = '投票错误3';
            $this->ajaxReturn($rdata);
        }
        
        $selectionInfo = $selectionMod->where(['id'=>$selection_id])->find();
        M()->commit();
        $rdata['code'] = 1;
        $rdata['info'] = '投票成功';
        $rdata['data'] = $selectionInfo['votes'];
        $this->ajaxReturn($rdata);
    }
   
    //加载更多
    public function selectionMore(){
        $selection_type = I('post.selection_type',0,'intval');
        $page = I('post.page',0,'intval');
        if(empty($selection_type)||empty($page)){
            $rdata['code'] = 0;
            $rdata['info'] = '参数不能为空';
            $this->ajaxReturn($rdata);
        }
        $selectionMod=M('Selection');
        $list = $selectionMod->where(['type'=>$selection_type,'status'=>1])->page($page,10)->select();
        if(empty($list)){
            $rdata['code'] = 2;
            $rdata['info'] = '没有更多了';
            $this->ajaxReturn($rdata);
        }
        
        //用户今天的投票记录
        $login_uinfo = session('home_user');
        
        $recordMod = M('SelectionRecord');
        $todayTime = strtotime(date('Y-m-d')); //今天开始的时间戳
        
        $today_record = $recordMod->where(['user_id'=>$login_uinfo['user_id'],'time'=>['gt',$todayTime]])->select();

        if($today_record){
            $selectionArr = array();
            foreach($today_record as $val){
                $selectionArr[] = $val['selection_id'];
            }
            if($selectionArr){
                foreach($list as $key=>$val){
                    if(in_array($val['id'],$selectionArr)){
                        $list[$key]['already'] = 1;
                    }
                }
            }
        }
        $this->assign('list',$list);
        $data = $this->fetch('selection');
        
        $rdata['code'] = 1;
        $rdata['info'] = '请求成功';
        $rdata['data'] = $data;
        $this->ajaxReturn($rdata);
    }
    
    
    
    
    
}