<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>厦门区块链协会</title>
    <link rel="stylesheet" href="css/association_dynamics.css?12">
    <link rel="stylesheet" href="css/public.css">
</head>
<style>
    .Title_Ass{
    }
</style>
<body>
<div class="box">
    <!--#include file="header.html"-->

    <!--动态banner-->
    <div class="banner_Dt">
        <img src="images/bannerDt.png" alt="">
    </div>
    <!--底下内容-->
    <div class="text-content">
        <!--小的导航栏-->
        <div class="nav_small">

            <img src="images/location.png" alt="" class="locationAA">
            <a href="/">首页</a>><a href="">协会动态</a>><a href="">协会新闻</a>
        </div>
        <!--主要内容-->
        <div class="Ass_content">
            <!--左边导航-->
            <div class="leftAss">
                <div class="Title_Ass">
                    <div class="topTitle">
                        <span class="TitleBlue"></span>
                        协会动态
                    </div>
                    <ul class="Title_Ass_ul">
                        <li><a href='/xbadynamic/1' class="<?php if($navi_num == 1): ?>active<?php endif; ?>">协会新闻</a></li>
                        <li><a href='/xbadynamic/2' class="<?php if($navi_num == 2): ?>active<?php endif; ?>">国际资讯</a></li>
                        <li><a href='/xbadynamic/3' class="<?php if($navi_num == 3): ?>active<?php endif; ?>">国内要闻</a></li>
                        <li><a href='/xbadynamic/4' class="<?php if($navi_num == 4): ?>active<?php endif; ?>">通知公告</a></li>
                    </ul>
                </div>
                <div class="Title_Ass AssGg">
                    <div class="topTitle_Gg">
                        <div class="topTitle_Ggg">
                            <span class="TitleBlue"></span>
                            通知公告
                        </div>
                        <div class="moreAnd" onclick='window.location.href="/xbadynamic/4"'>
                            更多
                        </div>
                    </div>
                    <div class="AssGgUl">
                        <ul>
                            <?php if(is_array($noticeList)): foreach($noticeList as $key=>$vo): ?><li><a href="/xbacontent/<?php echo ($vo["content_id"]); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!--右边内容-->
            <div class="rightCon">
                <ul>
                    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><li onclick='window.location.href="/xbacontent/<?php echo ($vo["content_id"]); ?>"'>
                        <div class="list_Img_L">
                             <img src="<?php echo ((isset($vo['image']) && ($vo['image'] !== ""))?($vo['image']):'/Public/img/pic-none.png'); ?>" alt="">
                        </div>
                        <div class="list_Cont_R">
                            <div class="Cont_R_Title">
                                <?php echo ($vo['title']); ?>
                            </div>
                            <div class="Cont_R_Text">
                                <?php echo ($vo['description']); ?>
                            </div>
                        </div>

                    </li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
        <!--底部黑色-->
        <div style="clear: both"></div>
       <!--#include file="footer.html"-->
    </div>

</div>
</body>
</html>