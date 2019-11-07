<?php if (!defined('THINK_PATH')) exit();?><h3><?php echo ($name); ?>活动</h3>

        <form action="<?php echo U();?>" method="post" id="form" class="m-form ">
        <fieldset>
          <div class="g-main-body">
    <div class="g-main-content m-form-horizontal">
      
        <div class="m-panel ">
            <div class="panel-body">
            
        <div class="formitm">
            <label class="lab">栏目</label>
            <div class="ipt">
                <select name="class_id" class="form-element" id="class_id">
            <option value="0">==请选择栏目==</option>
            <?php if(is_array($categoryList)): foreach($categoryList as $key=>$vo): ?><option value="<?php echo ($vo["class_id"]); ?>" 
                <?php if($info['class_id'] == $vo['class_id']): ?>selected="selected"<?php endif; ?>
              >
              <?php echo ($vo["name"]); ?>
              </option><?php endforeach; endif; ?>
          </select>
                <p class="help-block">当前活动的所属栏目</p>
            </div>
        </div>

        
        <div class="formitm">
            <label class="lab">文章标题</label>
            <div class="ipt">
                <input name="title" type="text"  class="form-element u-width-full  " id="title" value="<?php echo ($info["title"]); ?>" maxlength="350"   >
                <p class="help-block">文章标题,请不要填写特殊字符</p>
            </div>
        </div>

        
        <div class="formitm">
            <label class="lab">文章内容</label>
            <div class="ipt">
                <textarea name="content" type="text"  class="form-element u-width-full u-editor" id="content" value="" rows="10"   ><?php echo ($info["content"]); ?></textarea>
                <p class="help-block">文章的内容</p>
            </div>
        </div>
        
        
        <div class="formitm">
            <label class="lab">缩略图</label>
            <div class="ipt">
                <input name="image" type="text"  class="form-element u-width-medium  " id="image" value="<?php echo ($info["image"]); ?>" maxlength="250"   >
          <a class="u-btn u-btn-primary u-img-upload" data="image" preview="image-preview" href="javascript:;" >上传</a> 
          <a class="u-btn u-btn-primary" href="javascript:;" id="image-preview">预览</a>
                <p class="help-block"></p>
            </div>
        </div>

      
        <div class="formitm">
            <label class="lab">添加时间</label>
            <div class="ipt">
                <?php if(empty($info['time'])): ?><input name="time" type="text"  class="form-element u-width-large u-time " id="time" value="<?php echo (date('Y/m/d H:i',$time)); ?>" maxlength="250"   >
        <?php else: ?>
            <input name="time" type="text"  class="form-element u-width-large u-time " id="time" value="<?php echo (date('Y/m/d H:i',$info["time"])); ?>" maxlength="250"   ><?php endif; ?>
                <p class="help-block">请按照格式填写发布时间</p>
            </div>
        </div>

        
        <div class="formitm">
            <label class="lab">文章状态</label>
            <div class="ipt">
                <label>
                      <input type="radio" name="status" id="status0" value="1"   <?php if(!isset($info['status'])){ $info['status']= "1"; } if(1 == $info['status']){ ?> checked="checked" <?php } ?> > <span>草稿</span>
                    </label> <label>
                      <input type="radio" name="status" id="status1" value="2"   <?php if(!isset($info['status'])){ $info['status']= "1"; } if(2 == $info['status']){ ?> checked="checked" <?php } ?> > <span>通过</span>
                    </label> <label>
                      <input type="radio" name="status" id="status2" value="3"   <?php if(!isset($info['status'])){ $info['status']= "1"; } if(3 == $info['status']){ ?> checked="checked" <?php } ?> > <span>不通过</span>
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
            </div> </div>
    </div>
  </div>
  <div class="g-main-sidebar">

  </div>
  </admin:row>
  <input name="content_id" type="hidden"  class="form-element u-width-large  " id="content_id" value="<?php echo ($info["content_id"]); ?>"    >
        </fieldset>
        </form>
<script>

    Do.ready('base', function () {
        var option={};
        // option.returnUrl="<?php echo U('Article/AdminContent/index');?>";
        //表单综合处理
        $('#form').duxFormPage(option);
        //上传缩略图
        $('#upload').duxFileUpload({
            type: 'jpg,png,gif,bmp',
            complete: function (data) {
                $('#content_image').attr('src', data.url);
            }
        });
    });
    

</script>