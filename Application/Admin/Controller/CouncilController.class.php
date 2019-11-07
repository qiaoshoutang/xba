<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
/**
 * 运营
 */
class CouncilController extends AdminController
{
	
	
    /**
     * 当前模块参数
     */
    public function _infoModule()
    {
        $data = array(
        	'info' => array(
        		'name' => '理事列表',
                'description' => '蚂蚁联盟理事列表',
            ),
            'menu' => array(
                array(
                    'name' => '理事列表',
                    'url' => U('Admin/Council/index'),
                    'icon' => 'plus',
                ),
                array(
                    'name' => '理事添加',
                    'url' => U('Admin/Council/add'),
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
            $where['_string'] = '(name like "%'.$keyword.'%") OR (contactname like "%'.$keyword.'%")';
            $pageMaps['keyword'] = $keyword;
        }
        
        $status = I('request.status','');
        if(!empty($status)){
            $where['status'] = $status;
            $pageMaps['keyword'] = $status;
        }
        

        $councilMod=D('Admin/Council');
        
        $count = $councilMod->countList($where);
        $limit = $this->getPageLimit($count,20);
        $list = $councilMod->loadList($where,$limit);
        

        $this->assign('statusArr',array(1=>'待处理',2=>'常务理事',3=>'理事',4=>'不通过'));
        $this -> assign('pageMaps',$pageMaps);
        $this->assign('page',$this->getPageShow($pageMaps));
        $this->assign('list',$list);
        
        $this->adminDisplay('list');
    }
    
    /**
     * 编辑
     */
    public function add(){ 
        
        if(!IS_POST){

            $this->assign('name','添加');
            

            $this->adminDisplay('info');
        }else{
            $councilMod=D('Admin/Council');
            $re=$councilMod->saveData('add');
            if($re){
                $this->success('添加成功',true);
            }else{
                $this->error('添加失败');
            } 
        }
    }
    /**
     * 二维码编辑
     */
    public function edit(){
        
        $councilMod=D('Admin/Council');
        
        if(!IS_POST){
            $id=I('request.id','','intval');
            if(!$id){
                return '参数不能未空';
            }
            
            $info=$councilMod->getInfo($id);
            
            $this->assign('name','编辑');
            $this->assign('info',$info);

            $this->adminDisplay('info');
        }else{
            $id=I('post.id','','intval');
            if(!$id){
                return '参数不能未空';
            }
            $re=$councilMod->saveData('edit');
            if($re){
                $this->success('修改成功',true);
            }else{
                $this->error('修改失败');
            }
        } 
    }
    
    /**
     * 二维码删除
     */
    public function del(){
        
        $id=I('post.data',0,'intval');

        if(!$id){
            return '参数不能未空';
        }
        $coinMod=D('Admin/Council');
        $res=$coinMod->delData($id);
        
        if($res){

            $this->success('币配置删除成功！');
        }else{
            $this->error('币配置删除失败！');
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
            $res = M("Council") -> where("id in(".$ids.")") -> delete();
            if($res){
                
                $this->success('批量删除成功！');
            }else{
                $this->error('批量删除失败！');
            }
        }
    }
}

