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

	    
// 		    'Council' => array(
// 		        'name' => '协会会员',
// 		        'order' => 10,
// 		        'menu' => array(
// 		            array(
// 		                'name' => '会员列表',
// 		                'url' => U('Admin/Council/index'),
// 		                'order' => 1
// 		            ),
// 		            array(
// 		                'name' => '会员添加',
// 		                'url' => U('Admin/Council/add'),
// 		                'order' => 2
// 		            ),
// 		        )
// 		     ),

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
