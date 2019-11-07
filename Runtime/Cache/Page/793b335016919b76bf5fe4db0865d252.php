<?php if (!defined('THINK_PATH')) exit();?><h3><?php echo ($name); ?>页面</h3>

        <form action="<?php echo U();?>" method="post" id="form" class="m-form ">
        <fieldset>
          <div class="g-main-body">
    <div class="g-main-content m-form-horizontal">
      
        <div class="m-panel ">
            <div class="panel-body">
            
        <div class="formitm">
            <label class="lab">上级栏目</label>
            <div class="ipt">
                <select name="parent_id" class="form-element">
            <option value="0">==顶级栏目==</option>
            <?php if(is_array($categoryList)): foreach($categoryList as $key=>$vo): ?><option value="<?php echo ($vo["class_id"]); ?>"
              
              <?php if($info['parent_id'] == $vo['class_id']): ?>selected="selected"<?php endif; ?>
              ><?php echo ($vo["cname"]); ?>
              
              </option><?php endforeach; endif; ?>
          </select>
                <p class="help-block">当前栏目的上级栏目</p>
            </div>
        </div>
        
        <div class="formitm">
            <label class="lab">页面名称</label>
            <div class="ipt">
                <input name="name" type="text"  class="form-element u-width-large  " id="name" value="<?php echo ($info["name"]); ?>" maxlength="250"  datatype="*" >
                <p class="help-block">当前页面名称</p>
            </div>
        </div>
        
        <div class="formitm">
            <label class="lab">文章内容</label>
            <div class="ipt">
                <textarea name="content" type="text"  class="form-element u-width-large u-editor" id="content" value="" rows="20"   ><?php echo (htmlspecialchars_decode($info["content"])); ?></textarea>
                <p class="help-block"></p>
            </div>
        </div>
        
        
        <div class="formitm">
            <label class="lab">栏目关键词</label>
            <div class="ipt">
                <input name="keywords" type="text"  class="form-element u-width-large  " id="keywords" value="<?php echo ($info["keywords"]); ?>" maxlength="250"   >
                <p class="help-block">当前栏目的关键词</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">栏目描述</label>
            <div class="ipt">
                <textarea name="description" type="text"  class="form-element u-width-large " id="description" value="" rows="5"   ><?php echo ($info["description"]); ?></textarea>
                <p class="help-block">当前栏目的描述信息</p>
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
  	
        <div class="m-panel "><div class="panel-header"> <span class="icon"><i class="u-icon-plus"></i></span> 形象图 </div>
            <div class="panel-body">
            <div class="u-thumbnail">
        <?php if(empty($info['image'])): ?><img id="content_image" src="/Public/admin/images/placeholder.jpg" width="270" alt="">
        <?php else: ?>
        <img id="content_image" src="<?php echo ($info["image"]); ?>" width="270" alt=""><?php endif; ?>
        </div>
        <input name="image" type="text"  class="form-element u-width-medium  " id="image" value="<?php echo ($info["image"]); ?>" maxlength="250"   >
        <a class="u-btn u-btn-primary" data="image" href="javascript:;" id="upload">上传</a>
            </div> </div>
    
        <div class="m-panel "><div class="panel-header"> <span class="icon"><i class="u-icon-plus"></i></span> 其他属性 </div>
            <div class="panel-body">
            
        <div class="formitm">
            <label class="lab">子标题</label>
            <div class="ipt">
                <input name="subname" type="text"  class="form-element u-width-large  " id="subname" value="<?php echo ($info["subname"]); ?>" maxlength="250"   >
                <p class="help-block">扩展标题的副标题信息</p>
            </div>
        </div>
        
        <div class="formitm">
            <label class="lab">栏目URL</label>
            <div class="ipt">
                <input name="urlname" type="text"  class="form-element u-width-large  " id="urlname" value="<?php echo ($info["urlname"]); ?>" maxlength="250"   >
                <p class="help-block">设置URL规则后会生效</p>
            </div>
        </div>
    	
        <div class="formitm">
            <label class="lab">栏目顺序</label>
            <div class="ipt">
                <input name="sequence" type="number"  class="form-element u-width-large  " id="sequence" value="<?php echo ((isset($info["sequence"]) && ($info["sequence"] !== ""))?($info["sequence"]):'1'); ?>" maxlength="10"  datatype="n" >
                <p class="help-block">栏目列表调用时的顺序，数字越小越靠前</p>
            </div>
        </div>
        
        <div class="formitm">
            <label class="lab">页面模板</label>
            <div class="ipt">
                <div class="input-group">
            <input name="class_tpl" type="text"  class="form-element u-width-small  " id="class_tpl" value="<?php echo ($info["class_tpl"]); ?>" maxlength="250"  datatype="*" >
            
        <select class="form-element dux-assign u-width-small" target="#class_tpl" id="" >
            <option value =" ">请选择</option>
            <?php if(is_array($tplList)): foreach($tplList as $key=>$vo): ?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["file"]); ?></option><?php endforeach; endif; ?>
        </select>
          </div>
                <p class="help-block">当前页面模板</p>
            </div>
        </div>
         
        <div class="formitm">
            <label class="lab">栏目状态</label>
            <div class="ipt">
                <label>
                      <input type="radio" name="show" id="show0" value="1"   <?php if(!isset($info['show'])){ $info['show']= "1"; } if(1 == $info['show']){ ?> checked="checked" <?php } ?> > <span>显示</span>
                    </label> <label>
                      <input type="radio" name="show" id="show1" value="0"   <?php if(!isset($info['show'])){ $info['show']= "1"; } if(0 == $info['show']){ ?> checked="checked" <?php } ?> > <span>隐藏</span>
                    </label> 
                <p class="help-block">隐藏后在调用栏目列表时不显示</p>
            </div>
        </div>
            </div> </div>
  </div>
  <input name="class_id" type="hidden"  class="form-element u-width-large  " id="class_id" value="<?php echo ($info["class_id"]); ?>"    >
        </fieldset>
        </form>
</admin:panel>
<script>
    Do.ready('base', function () {
        //表单综合处理
        $('#form').duxFormPage();
        //上传缩略图
        $('#upload').duxFileUpload({
            type: 'jpg,png,gif,bmp',
            complete: function (data) {
                $('#content_image').attr('src', data.url);
            }
        });
    }); 
</script>