<?php if (!defined('THINK_PATH')) exit();?><h3><?php echo ($name); ?>活动相册</h3>

        <div class="m-panel ">
            <div class="panel-body">
            
        <form action="<?php echo U();?>" method="post" id="form" class="m-form m-form-horizontal">
        <fieldset>
          <div class="formitm">
      <label class="lab">所属活动</label>
      <div class="ipt">
          <select name="activity_id" class="form-element ">
            <option value="0" >==选择活动==</option>
            <?php if(is_array($activityArr)): foreach($activityArr as $key=>$vo): ?><option value="<?php echo ($key); ?>" 
                <?php if($info['activity_id']==$key): ?>selected<?php endif; ?>
              ><?php echo ($vo); ?></option><?php endforeach; endif; ?>
          </select>
          <p class="help-block">请选择图片所属的活动</p>
      </div>
    </div>
    
        <div class="formitm">
            <label class="lab">相册名称</label>
            <div class="ipt">
                <input name="name" type="text"  class="form-element u-width-large  " id="name" value="<?php echo ($info["name"]); ?>" maxlength="100"   >
                <p class="help-block">图片名称</p>
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
            <label class="lab">相册封面</label>
            <div class="ipt">
                <input name="img_url" type="text"  class="form-element u-width-medium  " id="img_url" value="<?php echo ($info["img_url"]); ?>" maxlength="250"   >
      <a class="u-btn u-btn-primary" data="img_url" href="javascript:;" id="upload_cover">上传</a>
                <p class="help-block">封面图片</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">封面预览</label>
            <div class="ipt">
                <img src='<?php echo ($info["img_url"]); ?>'  width='300px' id='img_cover'>
                <p class="help-block"></p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">多图上传</label>
            <div class="ipt">
                <a class="u-btn u-btn-primary webuploader-container" data="img_show" href="javascript:;" id="upload_images">
        <div class="webuploader-pick">上传</div>
      </a>
      <div class = 'm-multi-image f-cb' id='img_show'>
        <?php if(is_array($subImageArr)): foreach($subImageArr as $key=>$vo): ?><li draggable="true">
            <a class="close" href="javascript:;">×</a>
            <div class="img">
              <span class="pic">
                <img src="<?php echo ($vo["url"]); ?>" width="80" height="80">
              </span>
            </div>
            <div class="title">
              <input name="img_show[url][]" type="hidden" value="<?php echo ($vo["url"]); ?>"> 
              <input name="img_show[title][]" type="text" value="<?php echo ($vo["name"]); ?>"> 
            </div>
          </li><?php endforeach; endif; ?>
      </div>
                <p class="help-block">子相册图片</p>
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
  option.returnUrl="<?php echo U('Admin/Activity/albumList');?>";
  $('#form').duxFormPage(option);

    $('#upload_cover').duxFileUpload({
      
      complete: function (data) {
          $('#img_cover').attr('src', data.url);
      }
  });

    $('#upload_images').duxMultiUpload();

});

</script>