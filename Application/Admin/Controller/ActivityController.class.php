<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
/**
 * 运营
 */
class ActivityController extends AdminController
{
	
	
    /**
     * 当前模块参数
     */
    public function _infoModule()
    {
        $data = array(
        	'info' => array(
        		'name' => '活动管理',
                'description' => '活动相关数据',
            ),
            'menu' => array(
                array(
                    'name' => '活动列表',
                    'url' => U('Admin/Activity/activityList'),
                    'icon' => 'list',
                ),
                array(
                    'name' => '活动添加',
                    'url' => U('Admin/Activity/activityAdd'),
                    'icon' => 'plus',
                ),
                array(
                    'name' => '相册列表',
                    'url' => U('Admin/Activity/albumList'),
                    'icon' => 'list',
                ),
                array(
                    'name' => '相册添加',
                    'url' => U('Admin/Activity/albumAdd'),
                    'icon' => 'plus',
                ),
            )
        );
        return $data;
    }
    

	
    /**
     * 图片列表
     */
    public function albumList(){
        
        $pageMaps = array();
        $where = array();
        
        $activity_id=I('request.activity_id','','intval');
        $status=I('request.status','','intval');
        if($activity_id){
            $pageMaps['activity_id'] = $activity_id;
            $where['activity_id']  = $activity_id;
        }
        if($status){
            $pageMaps['status'] = $status;
            $where['status']  = $status;
        }
        
        $keyword = I('request.keyword','','trim');
        if(!empty($keyword)){
            $where['_string'] = '(name like "%'.$keyword.'%") OR (id = '.$keyword.')';
            $pageMaps['keyword'] = $keyword;
        }
        
        $imageMod=D('Admin/Image');
        $where['fid'] = 0;
        $count = $imageMod->countList($where);
        $limit = $this->getPageLimit($count,20);
        $list = $imageMod->loadList($where,$limit,'id desc');
        
        $activityMod=D('Admin/Activity');
        $activityInfo = $activityMod->getNameList();
        
        foreach($activityInfo as $key=>$val){
            $activityArr[$val['id']] = $val['name'];
        }

        
        $this->assign('statusArr',array(1=>'显示',2=>'隐藏'));
        $this->assign('activityArr',$activityArr);
        $this -> assign('pageMaps',$pageMaps);
        $this->assign('page',$this->getPageShow($pageMaps));
        $this->assign('list',$list);
        
        $this->adminDisplay('albumList');
    }
    
    /**
     * 新增
     */
    public function albumAdd(){
        
        if(!IS_POST){
            
            $activityMod=D('Admin/Activity');
            $activityInfo = $activityMod->getNameList();
            
            foreach($activityInfo as $key=>$val){
                $activityArr[$val['id']] = $val['name'];
            }
            
            $this->assign('name','添加');
            $this->assign('activityArr',$activityArr);
            $this->adminDisplay('albumInfo');
        }else{
            $data = $_POST;

            $imageMod=D('Admin/Image');
            $re=$imageMod->saveData('add');

            if($re){
                if($data['img_show']){ //有子相册
                    $img_show = $data['img_show'];
                    
                    foreach($img_show['url'] as $key =>$val){  //循环处理 子相册
                        $sdata=array();
                        $sdata['order_id'] = $key;
                        $sdata['activity_id'] = $data['activity_id'];
                        $sdata['fid'] = $re;
                        $sdata['name'] = $img_show['title'][$key];
                        $sdata['img_url'] = $val;
                        $sdata['status'] = 1;
                        $sdata['time'] = time();
                        $record = $imageMod->getWhereInfo(array('img_url'=>$val));

                        if($record){  //已存在
                            $sdata['id'] = $record['id'];
                            $res = $imageMod->saveData('edit',$sdata);
                        }else{  //新增
                            $res = $imageMod->saveData('add',$sdata);
                        }
                    }
                }
                $this->success('添加成功',true);
            }else{
                $this->error('添加失败');
            }
        }
    }
    /**
     * 编辑
     */
    public function albumEdit(){
        
        $imageMod=D('Admin/Image');
        
        if(!IS_POST){
            $id=I('request.id','','intval');
            if(!$id){
                return '参数不能未空';
            }
            
            $activityMod=D('Admin/Activity');
            $activityInfo = $activityMod->getNameList();
            
            foreach($activityInfo as $key=>$val){
                $activityArr[$val['id']] = $val['name'];
            }
            
            $imageInfo=$imageMod->getInfoById($id);
            $map['fid'] = $id;
            $subImageList=$imageMod->getWhereList($map);

            $subImageArr= array();
            foreach($subImageList as $key=>$val){
                $subImageArr[$key]['name'] = $val['name'];
                $subImageArr[$key]['url'] = $val['img_url'];
            }

            $this->assign('name','编辑');
            $this->assign('subImageArr',$subImageArr);
            $this->assign('activityArr',$activityArr);
            $this->assign('info',$imageInfo);
            
            $this->adminDisplay('albumInfo');
        }else{

            $data = $_POST;

            //删除图片
            $subImageList=$imageMod->getWhereList(array('fid'=>$data['id']));
            $image_url_arr = array();
            foreach($subImageList as $key=>$val){
                $image_url_arr[] = $val['img_url'];
                if(!in_array($val['img_url'],$data['img_show']['url'])){
                    $re = $imageMod->delData($val['id']);
                    if(!$re){
                        $this->error('删除图片失败');
                    }
                }
            }

            $re=$imageMod->saveData('edit');

            if($re){
                if($data['img_show']){ //有子相册
                    $img_show = $data['img_show'];
                    
                    $img_show_old = $imageMod->getWhereList();

                    foreach($img_show['url'] as $key =>$val){  //循环处理 子相册
                        $sdata=array();
                        $sdata['order_id'] = $key;
                        $sdata['activity_id'] = $data['activity_id'];
                        $sdata['fid'] = $data['id'];
                        $sdata['name'] = $img_show['title'][$key];
                        $sdata['img_url'] = $val;
                        $sdata['status'] = 1;
                        $sdata['time'] = time();
                        $record = $imageMod->getWhereInfo(array('img_url'=>$val));
                        if($record){  //已存在 
                            $sdata['id'] = $record['id'];
                            $re = $imageMod->saveData('edit',$sdata);
                        }else{
                            $re = $imageMod->saveData('add',$sdata);
                        }
                    } 
                }
                
                $this->success('修改成功',true);
            }else{
                $this->error('修改失败');
            }
        }
    }
    
    /**
     * 删除
     */
    public function imageDel(){
        
        $id=I('post.data',0,'intval');
        
        if(!$id){
            return '参数不能未空';
        }
        $imageMod=D('Admin/Image');
        $res=$imageMod->delData($id);
        
        if($res){
            
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
        
    }
    
    //批量操作
    public function imageBatchAction(){
        $ids  = I('post.ids',''); //接收所选中的要操作id
        $type = I('post.type');//接收要操作的类型   如删除。。。
        
        if(empty($ids)||empty($type)){
            $this -> error('参数不能为空');
        }
        
        $ids = count($ids) > 1 ? implode(',', $ids) : $ids[0];
        
        //删除
        if($type == 1){
            $res = M("image") -> where("id in(".$ids.")") -> delete();
            if($res){
                
                $this->success('批量删除成功！');
            }else{
                $this->error('批量删除失败！');
            }
        }
    }
    /*****************************************************************************************/
    
    /**
     * 活动列表
     */
    public function activityList(){

        $pageMaps = array();
        //筛选条件
        $where = array();
        
        $status=I('request.status',0,'intval');
        if($status){
            $pageMaps['status'] = $status;
            $where['status']  = $status;
        }
        
        $keyword = I('request.keyword','','trim');
        if(!empty($keyword)){
            $where['_string'] = '(name like "%'.$keyword.'%") OR (id = '.$keyword.')';
            $pageMaps['keyword'] = $keyword;
        }

        $activityMod=D('Admin/Activity');
        
        $count = $activityMod->countList($where);
        $limit = $this->getPageLimit($count,20);
        $list = $activityMod->loadList($where,$limit,'id desc');

        $this->assign('statusArr',array(1=>'显示',2=>'隐藏'));
        $this -> assign('pageMaps',$pageMaps);
        $this->assign('page',$this->getPageShow($pageMaps));
        $this->assign('list',$list);
        
        $this->adminDisplay('activityList');
    }
    
    /**
     * 新增
     */
    public function activityAdd(){ 
        
        if(!IS_POST){

            $this->assign('name','添加');

            $this->adminDisplay('activityInfo');
        }else{
            $activityMod=D('Admin/Activity');
            $re=$activityMod->saveData('add');
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
    public function activityEdit(){
        
        $activityMod=D('Admin/Activity');
        
        if(!IS_POST){
            $id=I('request.id','','intval');
            if(!$id){
                return '参数不能未空';
            }
            
            $activityInfo=$activityMod->getInfoById($id);
            
            $this->assign('name','编辑');
            $this->assign('info',$activityInfo);

            $this->adminDisplay('activityInfo');
        }else{
            $id=I('post.id','','intval');
            if(!$id){
                return '参数不能未空';
            }
            $re=$activityMod->saveData('edit');
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
    public function activityDel(){
        
        $id=I('post.data',0,'intval');

        if(!$id){
            return '参数不能未空';
        }
        $activityMod=D('Admin/Activity');
        $res=$activityMod->delData($id);
        
        if($res){

            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
        
    }
    

}

