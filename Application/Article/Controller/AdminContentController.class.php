<?php
namespace Article\Controller;
use Admin\Controller\AdminController;
/**
 * 文章列表
 */

class AdminContentController extends AdminController {
    /**
     * 当前模块参数
     */
    protected function _infoModule(){
        return array(
            'info'  => array(
                'name' => '内容管理',
                'description' => '管理网站所有内容',
                ),
            'menu' => array(
                    array(
                        'name' => '协会新闻',
                        'url' => U('index',array('class_id'=>1)),
                        'icon' => 'list',
                    ),
                    array(
                        'name' => '国际新闻',
                        'url' => U('index',array('class_id'=>2)),
                        'icon' => 'list',
                    ),
                    array(
                        'name' => '国内新闻',
                        'url' => U('index',array('class_id'=>3)),
                        'icon' => 'list',
                    ),
                    
                    array(
                        'name' => '添加新闻',
                        'url' => U('add'),
                        'icon' => 'plus',
                    ),
                )
            );
    }
	/**
     * 列表
     */
    public function index(){
        //筛选条件
        $where = array();
        $keyword = I('request.keyword','');
        $status = I('request.status',0,'intval');
        if(!empty($keyword)){
            $where['A.title'] = array('like','%'.$keyword.'%');
        }


        if(!empty($status)){
            $where['A.status'] = $status;
        }
        //URL参数
        $pageMaps = array();
        $pageMaps['keyword'] = $keyword;
        $pageMaps['status'] = $status;


        //查询数据
        $contentMod=D('ContentArticle');
        $count = $contentMod->countList($where);
        $limit = $this->getPageLimit($count,20);
        $list = $contentMod->loadList($where,$limit);

        //位置导航
        $breadCrumb = array('文章列表'=>U());
        //模板传值
        $this->assign('breadCrumb',$breadCrumb);
        $this->assign('list',$list);
        $this->assign('page',$this->getPageShow($pageMaps));
        $this->assign('statusArr',array(1=>'草稿',2=>'通过',3=>'不通过'));
        $this->assign('pageMaps',$pageMaps);

        $this->adminDisplay();
    }

    /**
     * 增加
     */
    public function add(){
        if(!IS_POST){
            $breadCrumb = array('新闻添加'=>U());
            $time=time();
            $this->assign('time',$time);
            $this->assign('breadCrumb',$breadCrumb);
            $this->assign('name','添加');
            $this->assign('categoryList',D('CategoryArticle')->loadList());
            $this->adminDisplay('info');
        }else{

			$adminuid = $_SESSION['admin_user']['user_id'];
			$_POST['user_id']=$adminuid;
			$content_id=D('ContentArticle')->saveData('add');

			if($content_id){
                
                $this->success('内容添加成功！');

            }else{
                $msg = D('ContentArticle')->getError();
                if(empty($msg)){
                    $this->error('内容添加失败');
                }else{
                    $this->error($msg);
                }
            }
        }
    }
    

    /**
     * 修改
     */
    public function edit(){
        if(!IS_POST){
            $contentId = I('get.content_id','','intval');
            if(empty($contentId)){
                $this->error('参数不能为空！');
            }
			$adminuid = $_SESSION['admin_user']['user_id'];
		
            //获取记录
            $model = D('ContentArticle');
            $info = $model->getInfo($contentId);
		
            if(!$info){
                $this->error($model->getError());
            }
            $breadCrumb = array('文章列表'=>U('index'),'文章修改'=>U('',array('content_id'=>$contentId)));
            $this->assign('breadCrumb',$breadCrumb);
            $this->assign('name','修改');
            $this->assign('info',$info);
            $this->assign('categoryList',D('CategoryArticle')->loadList());
            $this->adminDisplay('info');
        }else{
            
            if(D('ContentArticle')->saveData('edit')){
                
               
                $this->success('文章修改成功！',true);
                
            }else{
                $msg = D('ContentArticle')->getError();
                if(empty($msg)){
                    $this->error('文章修改失败');
                }else{
                    $this->error($msg);
                }
            }
        }
    }
    

    /**
     * 删除
     */
    public function del(){
		$adminuid = $_SESSION['admin_user']['user_id'];
		if( $adminuid!=1)
			$this->error('您没有权限编辑其他人的文章');
		
        $contentId = I('post.data',0,'intval');
        if(empty($contentId)){
            $this->error('参数不能为空！');
        }
        if(D('ContentArticle')->delData($contentId)){
            $this->success('文章删除成功！');
        }else{
            $this->error('文章删除失败！');
        }
    }

    /**
     * 批量操作
     */
    public function batchAction(){
        	$adminuid = $_SESSION['admin_user']['user_id'];
		if( $adminuid!=1)
			$this->error('您没有权限编辑其他人的文章');
        $type = I('post.type',0,'intval');
        $ids = I('post.ids');
        $classId = I('post.class_id',0,'intval');
        if(empty($type)){
            $this->error('请选择操作！');
        }
        if(empty($ids)){
            $this->error('请先选择操作项目！');
        }
        if($type == 3){
            if(empty($classId)){
                $this->error('请选择操作栏目！');
            }
        }
        foreach ($ids as $id) {
            $data = array();
            $data['content_id'] = $id;
            switch ($type) {
                case 1:
                    //发布
                    $data['status'] = 1;
                    D('DuxCms/Content')->editData($data);
                    break;
                case 2:
                    //草稿
                    $data['status'] = 0;
                    D('DuxCms/Content')->editData($data);
                    break;
                case 3:
                    $data['class_id'] = $classId;
                    D('DuxCms/Content')->editData($data);
                    break;
                case 4:
                    //删除
                    D('ContentArticle')->delData($id);
                    break;
            }
        }
        $this->success('批量操作执行完毕！');

    }

    public function cjwx(){
    	$url = I("post.url");
    	$re = A("Home/Weixin")->autowxcj($url);
    	if(is_array($re)){
    		$this->success($re);
    	}else{
    		$this->error($re);
    	}
    }
    
    
    

}

