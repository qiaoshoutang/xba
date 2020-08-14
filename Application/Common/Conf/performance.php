<?php
return array(
    /* 性能设置 */
    'TMPL_CACHE_ON'=>false, // 模板缓存
    'HTML_CACHE_ON'=>false, // 静态缓存
    'DB_SQL_BUILD_CACHE'=>false, // SQL查询缓存
    'URL_MODEL'=>2, // URL访问模式
    'URL_ROUTER_ON'=>true, // URL路由
	'URL_ROUTE_RULES'=>array(

	    'xbahome'=>'Home/Index/index',
	    'xbadynamic/:type'=>'Home/Index/dynamic',
	    'xbacontent/:content_id'  =>'Home/Index/newsContent',
	    'xbaabout/1'   =>'Home/Index/description',   //协会简介
	    'xbaabout/2'   =>'Home/Index/constitution',  //协会章程
	    'xbaabout/3'   =>'Home/Index/leader',        //协会领导
	    'xbaabout/4'   =>'Home/Index/framework',     //协会框架
	    'xbaabout/5'   =>'Home/Index/contact',       //联系我们
	    'xbaabout/6'   =>'Home/Index/thinkTank',       //协会智库
	    'xbaactivity/:type'=>'Home/Index/activity',  //协会活动
	    'activityContent/:content_id' =>'Home/Index/activityContent', //活动详情
	    'xbamemberlist'   =>'Home/Index/memberList', //会员动态
	    'xbamemberdy'   =>'Home/Index/memberDynamic', //会员动态
	    'xbamembercontent/:content_id'=>'Home/Index/memberContent', //会员动态详情
	    'xbamanage'    =>'Home/Index/memberManage', //会员管理
	    'xbaservice'   =>'Home/Index/memberService', //会员服务
	    'applydemand'     =>'Home/Index/applyDemand', //入会要求
	    'applyprocedure'  =>'Home/Index/applyProcedure', //入会流程
	    'applyguide'     =>'Home/Index/applyGuide', //入会指南
	    'applytable'     =>'Home/Index/applyTable', //入会申请
	    
	    
	    'wordDnowload'     =>'Home/Other/downTable', //入会表单下载
	    
	    
	    
	    'home_m'          =>  'Home/Mobile/index',
	    'memo_m'          =>  'Home/Mobile/memo',
	    'alliance_act_m'  => 'Home/Mobile/alliance_act',
	    'alliance_act_details_m/:activity_id'=>'Home/Mobile/alliance_act_details',
	    'alliance_album_details_m/:album_id/:p'=>'Home/Mobile/alliance_album_details',
	    'business_m'      =>  'Home/Mobile/business',
	    'team_m'          =>  'Home/Mobile/team',
	    'cooperation_m'   =>  'Home/Mobile/cooperation',
	    'councils_m'      =>  'Home/Mobile/council',
	    'recruit_m'       =>  'Home/Mobile/recruit',
	    
	    //活动
	    'xba_selection'       =>  'Home/Activity/selection',
	    'xba_selection_rule'       =>  'Home/Activity/selection_rule',
	    
	    
	    'test_m'          =>  'Home/Mobile/council_2',

	),
    'URL_HTML_SUFFIX'=>'html', // 伪静态后缀
	'URL_CASE_INSENSITIVE' =>false,
	'DATA_CACHE_TYPE'       =>  'File',
// 	'MEMCACHE_HOST'  => 'm-j6cd698260a0b4c4.memcache.rds.aliyuncs.com',
// 	'MEMCACHE_PORT'  => '11211',
	'DATA_CACHE_TIME' => '986400',
	'DATA_CACHE_SUBDIR'     =>  true,    // 使用子目录缓存 (自动根据缓存标识的哈希创建子目录)
    'DATA_PATH_LEVEL'       =>  2,        
);