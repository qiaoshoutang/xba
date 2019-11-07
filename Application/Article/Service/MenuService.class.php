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
                'menu' => array(
                    array(
                        'name' => '协会新闻',
                        'url' => U('Article/AdminContent/index',array('class_id'=>1)),
                        'order' => 1
                    ),
                    array(
                        'name' => '国际资讯',
                        'url' =>  U('Article/AdminContent/index',array('class_id'=>2)),
                        'order' => 2
                    ),
                    array(
                        'name' => '国内要闻',
                        'url' =>  U('Article/AdminContent/index',array('class_id'=>3)),
                        'order' => 2
                    )
                )
            ),
        );
	}
	


}
