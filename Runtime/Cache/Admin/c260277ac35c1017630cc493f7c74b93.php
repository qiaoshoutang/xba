<?php if (!defined('THINK_PATH')) exit();?><h3><?php echo ($name); ?>活动</h3>

        <div class="m-panel ">
            <div class="panel-body">
            
        <form action="<?php echo U();?>" method="post" id="form" class="m-form m-form-horizontal">
        <fieldset>
          
        <div class="formitm">
            <label class="lab">名称</label>
            <div class="ipt">
                <input name="name" type="text"  class="form-element u-width-large  " id="name" value="<?php echo ($info["name"]); ?>" maxlength="100"   >
                <p class="help-block">活动的名称</p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">权重</label>
            <div class="ipt">
                <input name="order_id" type="text"  class="form-element u-width-large  " id="order_id" value="<?php echo ($info["order_id"]); ?>" maxlength="100"   >
                <p class="help-block">越小越靠前</p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">活动封面</label>
            <div class="ipt">
                <input name="cover_url" type="text"  class="form-element u-width-medium  " id="cover_url" value="<?php echo ($info["cover_url"]); ?>" maxlength="250"   >
      <a class="u-btn u-btn-primary" data="cover_url" href="javascript:;" id="upload_cover">上传</a>
                <p class="help-block">活动的封面图</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">封面预览</label>
            <div class="ipt">
                <img src='<?php echo ($info["cover_url"]); ?>'  width='400px' id='img_cover'>
                <p class="help-block"></p>
            </div>
        </div>


	  
        <div class="formitm">
            <label class="lab">状态</label>
            <div class="ipt">
                <label>
                      <input type="radio" name="status" id="status0" value="1"   <?php if(!isset($info['status'])){ $info['status']= "1"; } if(1 == $info['status']){ ?> checked="checked" <?php } ?> > <span>显示</span>
                    </label> <label>
                      <input type="radio" name="status" id="status1" value="2"   <?php if(!isset($info['status'])){ $info['status']= "1"; } if(2 == $info['status']){ ?> checked="checked" <?php } ?> > <span>隐藏</span>
                    </label> 
                <p class="help-block"></p>
            </div>
        </div>     

    
        <div class="formitm form-submit">
        <div class="ipt">
            <div class="tip" id="tips"></div>
            <button class="u-btn u-btn-success u-btn-large" type="submit" id="btn-submit">保存</button>
            <button class="u-btn u-btn-large" type="reset">重置</button>
        </div>
        </div>
    <input name="id" type="hidden"  class="form-element u-width-large  " id="id" value="<?php echo ($info["id"]); ?>"    >
        </fieldset>
        </form>
            </div> </div>
<script>
Do.ready('base',function(){

  var option={};
  option.returnUrl="<?php echo U('Admin/Activity/activityList');?>";
  $('#form').duxFormPage(option);

    $('#upload_cover').duxFileUpload({
      
      complete: function (data) {
          $('#img_cover').attr('src', data.url);
      }
  });

});

</script>