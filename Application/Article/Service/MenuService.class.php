<?php
namespace Article\Service;
/**
 * 后台菜单接口
 */
class MenuService{
	/**
	 * 获取菜单结构
	 */
	public function getAdminMenu(){
		return array(
		    'Content' => array(
		        'name' => '内容管理',
		        'icon' => 'home',
		        'order' => 5,
                'menu' => array(
                    array(
                        'name' => '协会新闻',
                        'url' => U('Article/AdminContent/index',array('class_id'=>1)),
                        'order' => 1
                    ),
                    array(
                        'name' => '国际资讯',
                        'url' =>  U('Article/AdminContent/index',array('class_id'=>2)),
                        'order' => 3
                    ),
                    array(
                        'name' => '国内要闻',
                        'url' =>  U('Article/AdminContent/index',array('class_id'=>3)),
                        'order' =>5
                    ),
                    array(
                        'name' => '协会公告',
                        'url' =>  U('Article/AdminContent/index',array('class_id'=>4)),
                        'order' =>7
                    ),
                    array(
                        'name' => '协会快讯',
                        'url' =>  U('Article/Message/index'),
                        'order' => 9
                    )
                )
            ),
		    'activit' => array(
		        'name' => '活动管理',
		        'icon' => 'home',
		        'order' => 6,
		        'menu' => array(
		            array(
		                'name' => '活动预告',
		                'url' => U('Article/Activity/index',array('class_id'=>11)),
		                'order' => 1
		            ),
		            array(
		                'name' => '活动回顾',
		                'url' =>  U('Article/Activity/index',array('class_id'=>12)),
		                'order' => 2
		            ),
		            array(
		                'name' => '国际峰会',
		                'url' =>  U('Article/Activity/index',array('class_id'=>13)),
		                'order' => 3
		            )
		        )
		    ),
		    'member' => array(
		        'name' => '会员动态',
		        'icon' => 'home',
		        'order' => 7,
		        'menu' => array(
		            array(
		                'name' => '会员动态',
		                'url' => U('Article/Member/index',array('class_id'=>21)),
		                'order' => 1
		            )
		        )
		    ),
        );
	}
	


}
