<?php if (!defined('THINK_PATH')) exit();?><h3><?php echo ($name); ?>理事单位</h3>

        <div class="m-panel ">
            <div class="panel-body">
            
        <form action="<?php echo U();?>" method="post" id="form" class="m-form m-form-horizontal">
        <fieldset>
          
        <div class="formitm">
            <label class="lab">权重</label>
            <div class="ipt">
                <input name="order_id" type="text"  class="form-element u-width-large  " id="order_id" value="<?php echo ($info["order_id"]); ?>" maxlength="100"   >
                <p class="help-block">数值越大越靠前</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">联系人姓名</label>
            <div class="ipt">
                <input name="contactname" type="text"  class="form-element u-width-large  " id="contactname" value="<?php echo ($info["contactname"]); ?>" maxlength="100"   >
                <p class="help-block">理事单位的联系人姓名</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">单位名称</label>
            <div class="ipt">
                <input name="name" type="text"  class="form-element u-width-large  " id="name" value="<?php echo ($info["name"]); ?>" maxlength="100"   >
                <p class="help-block">理事单位的名称</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">职务</label>
            <div class="ipt">
                <input name="position" type="text"  class="form-element u-width-large  " id="position" value="<?php echo ($info["position"]); ?>" maxlength="100"   >
                <p class="help-block">担任职务</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">所在地区</label>
            <div class="ipt">
                <input name="location" type="text"  class="form-element u-width-large  " id="location" value="<?php echo ($info["location"]); ?>" maxlength="150"   >
                <p class="help-block">理事单位所在地区</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">单位简介</label>
            <div class="ipt">
                <textarea name="introduction" type="text"  class="form-element u-width-large " id="introduction" value="" rows="10"   ><?php echo ($info["introduction"]); ?></textarea>
                <p class="help-block">理事单位的简介</p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">联系方式</label>
            <div class="ipt">
                <input name="contact" type="text"  class="form-element u-width-large  " id="contact" value="<?php echo ($info["contact"]); ?>" maxlength="100"   >
                <p class="help-block">理事单位的联系方式</p>
            </div>
        </div>

	  
        <div class="formitm">
            <label class="lab">状态</label>
            <div class="ipt">
                <label>
                      <input type="radio" name="status" id="status0" value="1"   <?php if(!isset($info['status'])){ $info['status']= "3"; } if(1 == $info['status']){ ?> checked="checked" <?php } ?> > <span>待处理</span>
                    </label> <label>
                      <input type="radio" name="status" id="status1" value="2"   <?php if(!isset($info['status'])){ $info['status']= "3"; } if(2 == $info['status']){ ?> checked="checked" <?php } ?> > <span>常务理事</span>
                    </label> <label>
                      <input type="radio" name="status" id="status2" value="3"   <?php if(!isset($info['status'])){ $info['status']= "3"; } if(3 == $info['status']){ ?> checked="checked" <?php } ?> > <span>理事</span>
                    </label> <label>
                      <input type="radio" name="status" id="status3" value="4"   <?php if(!isset($info['status'])){ $info['status']= "3"; } if(4 == $info['status']){ ?> checked="checked" <?php } ?> > <span>不通过</span>
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
  option.returnUrl="<?php echo U('Admin/Council/index');?>";
  $('#form').duxFormPage(option);

});

</script>