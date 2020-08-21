<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
/**
 * 运营
 */
class SelectionController extends AdminController
{
	
	
    /**
     * 当前模块参数
     */
    public function _infoModule()
    {
        $data = array(
        	'info' => array(
        		'name' => '评选列表',
                'description' => '年终评选活动的相关信息',
            ),
            'menu' => array(
                array(
                    'name' => '评选列表',
                    'url' => U('Admin/Selection/index'),
                    'icon' => 'list',
                ),
                array(
                    'name' => '参评添加',
                    'url' => U('Admin/Selection/add'),
                    'icon' => 'plus',
                ),
            )
        );
        return $data;
    }
	
    /**
     * 币配置列表
     */
    public function index(){

        $pageMaps = array();
        //筛选条件
        $where = array();
        
        $keyword = I('request.keyword','');
        if(!empty($keyword)){
            $where['_string'] = 'name like "%'.$keyword.'%"';
            $pageMaps['keyword'] = $keyword;
        }
        
        $status = I('request.status','');
        if(!empty($status)){
            $where['status'] = $status;
            $pageMaps['status'] = $status;
        }
        $type = I('request.type','');
        if(!empty($type)){
            $where['type'] = $type;
            $pageMaps['type'] = $type;
        }
        

        $selectionMod=D('Admin/Selection');
        
        $count = $selectionMod->countList($where);
        $limit = $this->getPageLimit($count,20);
        $list = $selectionMod->loadList($where,$limit);
        

        $this->assign('statusArr',array(1=>'显示',2=>'隐藏'));
        $this->assign('typeArr',array(1=>'企业',2=>'项目',3=>'个人'));
        $this -> assign('pageMaps',$pageMaps);
        $this->assign('page',$this->getPageShow($pageMaps));
        $this->assign('list',$list);
        
        $this->adminDisplay('list');
    }
    
    /**
     * 新增
     */
    public function add(){ 
        
        if(!IS_POST){

            $this->assign('name','添加');
            $this->adminDisplay('info');
        }else{
            $selectionMod=D('Admin/Selection');
            $re=$selectionMod->saveData('add');
            if($re){
                $this->success('添加成功',true);
            }else{
                $this->error('添加失败');
            } 
        }
    }
    /**
     * 编辑
     */
    public function edit(){
        
        $selectionMod=D('Admin/Selection');
        
        if(!IS_POST){
            $id=I('request.id','','intval');
            if(!$id){
                return '参数不能未空';
            }
            
            $info=$selectionMod->getInfo($id);
            
            $this->assign('name','编辑');
            $this->assign('info',$info);

            $this->adminDisplay('info');
        }else{
            $id=I('post.id','','intval');
            if(!$id){
                return '参数不能未空';
            }
            $re=$selectionMod->saveData('edit');
            if($re){
                $this->success('修改成功',true);
            }else{
                $this->error('修改失败');
            }
        } 
    }
    
    /**
     * 删除
     */
    public function del(){
        
        $id=I('post.data',0,'intval');

        if(!$id){
            return '参数不能未空';
        }
        $selectionMod=D('Admin/Selection');
        $res=$selectionMod->delData($id);
        
        if($res){

            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
        
    }
    
    //批量操作
    public function batchAction(){
        $ids  = I('post.ids',''); //接收所选中的要操作id
        $type = I('post.type');//接收要操作的类型   如删除。。。
        
        if(empty($ids)||empty($type)){
            $this -> error('参数不能为空');
        }
        
        $ids = count($ids) > 1 ? implode(',', $ids) : $ids[0];
        
        //删除
        if($type == 1){
            $res = M("Selection") -> where("id in(".$ids.")") -> delete();
            if($res){
                
                $this->success('批量删除成功！');
            }else{
                $this->error('批量删除失败！');
            }
        }
    }
}

