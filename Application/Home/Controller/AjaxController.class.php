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
   
    
}