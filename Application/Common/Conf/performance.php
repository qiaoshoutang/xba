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
	    
    	'to/:t'=>'Go/Index/ad2',
	    'spshow/:content_id/:back'=>'Article/Content/index',
	    'gocontent/:gzh_num'=>'Home/Short/message',
	    
	    'memo'=>'Home/Index/memo',
	    'alliance_act'=>'Home/Index/alliance_act',
	    'alliance_act_details/:activity_id/:p'=>'Home/Index/alliance_act_details',
	    'alliance_album_details/:album_id/:p'=>'Home/Index/alliance_album_details',
	    'business'=>'Home/Index/business',
	    'team'=>'Home/Index/team',
	    'cooperation'=>'Home/Index/cooperation',
	    'councils'=>'Home/Index/council',
	    'recruit'=>'Home/Index/recruit',
	    'aboutUs'=>'Home/Index/aboutUs',
	    
	    
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