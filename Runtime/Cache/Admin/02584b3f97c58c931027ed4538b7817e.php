<?php if (!defined('THINK_PATH')) exit();?><h3><?php echo ($name); ?>公告</h3>

        <div class="m-panel ">
            <div class="panel-body">
            
        <form action="<?php echo U();?>" method="post" id="form" class="m-form m-form-horizontal">
        <fieldset>
          
        <div class="formitm">
            <label class="lab">标题</label>
            <div class="ipt">
                <input name="title" type="text"  class="form-element u-width-large  " id="title" value="<?php echo ($info["title"]); ?>" maxlength="100"   >
                <p class="help-block">公告的标题</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">内容</label>
            <div class="ipt">
                <textarea name="content" type="text"  class="form-element u-width-xlarge " id="content" value="" rows="8"   ><?php echo ($info["content"]); ?></textarea>
                <p class="help-block">公告的内容</p>
            </div>
        </div>
	  
        <div class="formitm">
            <label class="lab">状态</label>
            <div class="ipt">
                <label>
                      <input type="radio" name="state" id="state0" value="1"   <?php if(!isset($info['state'])){ $info['state']= "1"; } if(1 == $info['state']){ ?> checked="checked" <?php } ?> > <span>显示</span>
                    </label> <label>
                      <input type="radio" name="state" id="state1" value="2"   <?php if(!isset($info['state'])){ $info['state']= "1"; } if(2 == $info['state']){ ?> checked="checked" <?php } ?> > <span>不显示</span>
                    </label> 
                <p class="help-block"></p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">添加时间</label>
            <div class="ipt">
                <input name="time" type="text"  class="form-element u-width-large u-time " id="time" value="<?php echo ($info["time"]); ?>" maxlength="100"   >
                <p class="help-block">公告的添加时间</p>
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
  option.returnUrl="<?php echo U('Admin/Notice/index');?>";
  $('#form').duxFormPage(option);

});

</script>