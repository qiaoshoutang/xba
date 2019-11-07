<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>厦门区块链协会</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/public.css">


</head>
<style>

</style>
<body>
    <div class="box">
        <!--#include file="header.html"-->
        <!--轮播-->
        <div class="Wheel-Planting">
            <img src="images/banner.png" alt="" width="100%">
        </div>

        <!--底下内容-->
        <div class="text-content">
            <!--协会简介-->
            <div class="Association-Brief">
                <div class="Association-Brief-content">
                    <!--标题-->
                    <div class="Title-Association-Brief">
                        协会简介
                    </div>

                    <div class="Content-introduction">
                        厦门市区块链协会是由在厦门市注册的上百家从事区块链行业的企业联合发起， 由厦门市工商联合会指导
                        以促进区块链行业健康发展为宗旨厦门市区块链协会是由在，厦门市注册的上百家从事区块链行业的企业联合发起
                        由厦门市工商联合会指导以促进，区块链行业健康发展为宗旨
                        厦门市区块链协会是由在厦门市注册的上百家从事区块链行业的企业联合发起， 由厦门市工商联合会指导
                    </div>
                </div>
            </div>
            <!--协会新闻、国际咨询，国内要闻，通知公告-->
            <div  class="association-box">
                <div class="association-box-left">
                    <div class="titile-association">
                        <ul>
                            <li class="addCssList addCssListnew">协会新闻</li>
                            <li>国际咨询</li>
                            <li>国内要闻</li>
                        </ul>
                        <div class="moreAndmore">
                            <a href="">更多</a>
                        </div>
                    </div>

                    <div class="click-switch">
                        <!--上半部份-->
                        <div class="content-association">
                            <div class="content-association-img">
                                <img src="<?php echo ((isset($first1['image']) && ($first1['image'] !== ""))?($first1['image']):'/Public/img/pic-none.png'); ?>" alt="">
                            </div>
                            <div class="content-association-text">
                                <div class="Bt-asspcoation-text">
                                    <?php echo ($first1['title']); ?>
                                </div>
                                <div class="Tt-asspcoation-text">
                                    <?php echo ($first1['description']); ?>
                                </div>

                            </div>

                        </div>

                
                        <!--下半部分-->
                        <div class="content-association-bottom">
                            <div class="content-association-bottom-content">
                             
                                <ul class="association-div">
                                <?php if(is_array($list1)): foreach($list1 as $key=>$vo): ?><li>
                                        <a href=""><?php echo ($vo['title']); ?></a>
                                    </li><?php endforeach; endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="click-switch">
                        <!--上半部份-->
                        <div class="content-association">
                            <div class="content-association-img">
                                <img src="<?php echo ((isset($first2['image']) && ($first2['image'] !== ""))?($first2['image']):'/Public/img/pic-none.png'); ?>" alt="">
                            </div>
                            <div class="content-association-text">
                                <div class="Bt-asspcoation-text">
                                    <?php echo ($first2['title']); ?>
                                </div>
                                <div class="Tt-asspcoation-text">
                                    <?php echo ($first2['description']); ?>
                                </div>

                            </div>

                        </div>
                        <!--下班部分-->
                        <div class="content-association-bottom">
                            <div class="content-association-bottom-content">
                                <ul class="association-div">
                                    <?php if(is_array($list2)): foreach($list2 as $key=>$vo): ?><li>
                                        <a href=""><?php echo ($vo['title']); ?></a>
                                    </li><?php endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="click-switch">
                        <!--上半部份-->
                        <div class="content-association">
                            <div class="content-association-img">
                                 <img src="<?php echo ((isset($first3['image']) && ($first3['image'] !== ""))?($first3['image']):'/Public/img/pic-none.png'); ?>" alt="">
                            </div>
                            <div class="content-association-text">
                                <div class="Bt-asspcoation-text">
                                   <?php echo ($first3['title']); ?>
                                </div>
                                <div class="Tt-asspcoation-text">
                                   <?php echo ($first3['description']); ?>
                                </div>

                            </div>

                        </div>
                        <!--下班部分-->
                        <div class="content-association-bottom">
                            <div class="content-association-bottom-content">
                                <ul class="association-div">
                                   <?php if(is_array($list3)): foreach($list3 as $key=>$vo): ?><li>
                                        <a href=""><?php echo ($vo['title']); ?></a>
                                    </li><?php endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="association-box-right">
                    <div class="box-right-Bt">
                        <div class="Bt-Gz">
                            通知公告
                        </div>
                        <div class="moreAndmore_N">
                            <a href="" style="font-weight: 400">更多</a>
                        </div>
                    </div>
                    <div class="box-right-Text">
                        <ul>
                            <?php if(is_array($list3)): foreach($list3 as $key=>$vo): ?><li><a href=""><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>

            </div>
            <!--协会活动-->
            <div class="Association-activities">
                <div class="Ass-Ac-Title">
                    <div class="Ass-Ac-Hd">协会活动</div>
                    <div class="MoreAndM"><a href="">更多</a></div>
                </div>
                <div class="Ass-Ac-text">
                    <ul>
                        <li>
                            <img src="images/asd%20(2).png" alt="">
                            <p class="Ass-Ac-text-big">厦门区块链企业联谊会暨博饼晚宴</p>
                            <p class="Ass-Ac-text-small">六月，是一个缤纷多彩的季节，告别了温柔的春风，迎来了火热的夏天。 6月13日下午</p>
                        </li>
                        <li>
                            <img src="images/asd%20(1).png" alt="">
                            <p class="Ass-Ac-text-big">厦门区块链企业联谊会暨博饼晚宴</p>
                            <p class="Ass-Ac-text-small">六月，是一个缤纷多彩的季节，告别了温柔的春风，迎来了火热的夏天。 6月13日下午</p>
                        </li>
                        <li>
                            <img src="images/asd%20(4).png" alt="">
                            <p class="Ass-Ac-text-big">厦门区块链企业联谊会暨博饼晚宴</p>
                            <p class="Ass-Ac-text-small">六月，是一个缤纷多彩的季节，告别了温柔的春风，迎来了火热的夏天。 6月13日下午</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!--协会领导-->
            <div class="Association-leadership">
                <div class="Ass-lea-Title">
                    <div class="Ass-lea-Hd">协会领导</div>
                    <div class="MoreAndM"><a href="">更多</a></div>
                </div>
                <div class="Ass-lea-text">
                    <ul id="roll">
                        <li>
                            <div class="Tx-Lea">

                            </div>
                            <p class="Ass-lea-big">代用名1</p>
                            <p class="Ass-lea-small">厦门区块链协会会长</p>
                        </li>
                        <li>
                            <div class="Tx-Lea">

                            </div>
                            <p class="Ass-lea-big">代用名2</p>
                            <p class="Ass-lea-small">厦门区块链协会会长</p>
                        </li>
                        <li>
                            <div class="Tx-Lea">

                            </div>
                            <p class="Ass-lea-big">代用名3</p>
                            <p class="Ass-lea-small">厦门区块链协会会长</p>
                        </li>
                        <li>
                            <div class="Tx-Lea">

                            </div>
                            <p class="Ass-lea-big">代用名4</p>
                            <p class="Ass-lea-small">厦门区块链协会会长</p>
                        </li>
                        <li>
                            <div class="Tx-Lea">

                            </div>
                            <p class="Ass-lea-big">代用名5</p>
                            <p class="Ass-lea-small">厦门区块链协会会长</p>
                        </li>
                        <li>
                            <div class="Tx-Lea">

                            </div>
                            <p class="Ass-lea-big">代用名6</p>
                            <p class="Ass-lea-small">厦门区块链协会会长</p>
                        </li>
                        <li>
                            <div class="Tx-Lea">

                            </div>
                            <p class="Ass-lea-big">代用名7</p>
                            <p class="Ass-lea-small">厦门区块链协会会长</p>
                        </li>
                        <li>
                            <div class="Tx-Lea">

                            </div>
                            <p class="Ass-lea-big">代用名8</p>
                            <p class="Ass-lea-small">厦门区块链协会会长</p>
                        </li>

                        <li>
                            <div class="Tx-Lea">

                            </div>
                            <p class="Ass-lea-big">代用名9</p>
                            <p class="Ass-lea-small">厦门区块链协会会长</p>
                        </li>


                    </ul>
                </div>
            </div>
            <!--会员单位、合作伙伴-->
            <div class="Member-unit">
                <div class="titile-unit">
                    <ul class="titile-unit-ul">
                        <li class="addCssList addCssListnew">合作单位</li>
                        <li class="">合作伙伴</li>
                    </ul>
                </div>
                <div class="Member-unit-content">
                    <ul>
                        <li class="unitList">
                            <img src="images/MVS.png" alt="">
                        </li>
                        <li class="unitList">
                            <img src="images/MVS.png" alt="">
                        </li><li class="unitList">
                        <img src="images/MVS.png" alt="">
                    </li><li class="unitList">
                        <img src="images/MVS.png" alt="">
                    </li><li class="unitList">
                        <img src="images/MVS.png" alt="">
                    </li><li class="unitList">
                        <img src="images/MVS.png" alt="">
                    </li><li class="unitList">
                        <img src="images/MVS.png" alt="">
                    </li><li class="unitList">
                        <img src="images/MVS.png" alt="">
                    </li><li class="unitList">
                        <img src="images/MVS.png" alt="">
                    </li><li class="unitList">
                        <img src="images/MVS.png" alt="">
                    </li><li class="unitList">
                        <img src="images/MVS.png" alt="">
                    </li><li class="unitList">
                        <img src="images/MVS.png" alt="">
                    </li>
                    </ul>

                </div>
                <div class="Member-unit-content">
                    <ul>
                        <li class="unitList">
                            <img src="images/MVS.png" alt="">
                        </li>
                        <li class="unitList">
                            <img src="images/MVS.png" alt="">
                        </li><li class="unitList">
                        <img src="images/MVS.png" alt="">
                    </li>
                    </ul>
            </div>
        </div>
        <!--#include file="footer.html"-->

    </div>

    </div>

</body>
<script src="js/index.js"></script>
<script src="js/jquery.js"></script>
<script src="js/super_slider.js"></script>
<script>
    $(".click-switch").eq(0).show();
   $(".titile-association ul li").click(function () {
       var $this = $(this);
       $this.addClass("addCssList");
       $this.siblings("li").removeClass("addCssList");
       // console.log($this.index());
       if($this.index()==0){
           $this.addClass("addCssListnew")
       }
       var index = $(this).index();
           $(".click-switch").hide().eq(index).show();
   })
    $(".Member-unit-content").eq(0).show();
    $(".titile-unit ul li").click(function () {
        var $this = $(this);
        $this.addClass("addCssList");
        $this.siblings("li").removeClass("addCssList");
        if($this.index()==0){
            $this.addClass("addCssListnew")
        }
        var index = $(this).index();
        $(".Member-unit-content").hide().eq(index).show();
    })
</script>

<script>
    $(".Ass-lea-text").superSlider({
        // prevBtn: 	 ".prev",//左按钮
        // nextBtn: 	 ".next",//右按钮
        listCont:    "#roll",//滚动列表外层
        scrollWhere: "next",//自动滚动方向next
        delayTime: 	 2000,//自动轮播时间间隔
        speed: 		 300,//滚动速度
        amount: 	 1,//单次滚动数量
        showNum: 	 6,//显示数量
        autoPlay: 	 true//自动播放
    });
</script>
</html>