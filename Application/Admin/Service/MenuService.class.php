<?php
namespace Admin\Service;
/**
 * 后台菜单接口
 */
class MenuService{
	/**
	 * 获取菜单结构
	 */
	public function getAdminMenu(){
		return array(
            'index' => array(
                'name' => '首页',
                'icon' => 'home',
                'order' => 0,
                'menu' => array(
                    array(
                        'name' => '管理首页',
                        'url' => U('Admin/Index/index'),
                        'order' => 0
                    )
                )
            ),

	    
		    'Activity' => array(
		        'name' => '活动',
		        'order' => 4,
		        'menu' => array(
		            array(
		                'name' => '活动列表',
		                'url' => U('Admin/Activity/activityList'),
		                'order' => 1
		            ),
		            array(
		                'name' => '活动添加',
		                'url' => U('Admin/Activity/activityAdd'),
		                'order' => 2
		            ),
		            array(
		                'name' => '相册列表',
		                'url' => U('Admin/Activity/albumList'),
		                'order' => 3
		            ),
		            array(
		                'name' => '相册添加',
		                'url' => U('Admin/Activity/albumAdd'),
		                'order' => 4
		            ),
		        )
		    ),

		    'Notice' => array(
		        'name' => '公告',
		        'order' => 8,
		        'menu' => array(
		            array(
		                'name' => '公告列表',
		                'url' => U('Admin/Notice/index'),
		                'order' => 1
		            ),
		            array(
		                'name' => '公告添加',
		                'url' => U('Admin/Notice/add'),
		                'order' => 2
		            ),
		        )
		    ),
		    'Council' => array(
		        'name' => '协会会员',
		        'order' => 10,
		        'menu' => array(
		            array(
		                'name' => '会员列表',
		                'url' => U('Admin/Council/index'),
		                'order' => 1
		            ),
		            array(
		                'name' => '会员添加',
		                'url' => U('Admin/Council/add'),
		                'order' => 2
		            ),
		        )
		     ),

            'system' => array(
                'name' => '系统',
                'icon' => 'bars',
                'order' => 14,
                'menu' => array(
                    array(
                        'name' => '系统设置',
                        'url' => U('Admin/Setting/site'),
                        'order' => 0,
                        'divider' => true,
                    ),
                    array(
                        'name' => '用户管理',
                        'url' => U('Admin/AdminUser/index'),
                        'order' => 7,
                        'divider' => true,
                    ),
                    array(
                        'name' => '用户组管理',
                        'url' => U('Admin/AdminUserGroup/index'),
                        'order' => 8,
                    )
                )
            ),
        );
	}
	


}
