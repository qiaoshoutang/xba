<?php if (!defined('THINK_PATH')) exit();?><h3><?php echo ($name); ?>文章栏目</h3>

        <div class="m-panel ">
            <div class="panel-body">
            
        <form action="<?php echo U();?>" method="post" id="form" class="m-form ">
        <fieldset>
          <div class="g-grid">
          
        <div class="g-col-5-3  ">
          
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
            <label class="lab">栏目名称</label>
            <div class="ipt">
                <input name="name" type="text"  class="form-element u-width-large  " id="name" value="<?php echo ($info["name"]); ?>" maxlength="250"  datatype="*" >
                <p class="help-block">当前栏目名称</p>
            </div>
        </div>
        
        <div class="formitm">
            <label class="lab">栏目属性</label>
            <div class="ipt">
                <label>
                      <input type="radio" name="type" id="type0" value="0"   <?php if(!isset($info['type'])){ $info['type']= "1"; } if(0 == $info['type']){ ?> checked="checked" <?php } ?> > <span>频道</span>
                    </label> <label>
                      <input type="radio" name="type" id="type1" value="1"   <?php if(!isset($info['type'])){ $info['type']= "1"; } if(1 == $info['type']){ ?> checked="checked" <?php } ?> > <span>列表</span>
                    </label> 
                <p class="help-block">频道页不能发布只能调用下级栏目内容</p>
            </div>
        </div>
        
        <div class="formitm">
            <label class="lab">内容分页数</label>
            <div class="ipt">
                <input name="page" type="number"  class="form-element u-width-small  " id="page" value="<?php echo ((isset($info["page"]) && ($info["page"] !== ""))?($info["page"]):'20'); ?>" maxlength="10"  datatype="n" >
                <p class="help-block">当前栏目的内容列表下文章每页显示数量</p>
            </div>
        </div>
        
        <div class="formitm">
            <label class="lab">栏目顺序</label>
            <div class="ipt">
                <input name="sequence" type="number"  class="form-element u-width-small  " id="sequence" value="<?php echo ((isset($info["sequence"]) && ($info["sequence"] !== ""))?($info["sequence"]):'1'); ?>" maxlength="10"  datatype="n" >
                <p class="help-block">栏目列表调用时的顺序，数字越小越靠前</p>
            </div>
        </div>
        
        <div class="formitm">
            <label class="lab">栏目模板</label>
            <div class="ipt">
                <div class="input-group">
            <input name="class_tpl" type="text"  class="form-element u-width-medium  " id="class_tpl" value="<?php echo ($info["class_tpl"]); ?>" maxlength="250"  datatype="*" >
            
        <select class="form-element dux-assign " target="#class_tpl" id="" >
            <option value =" ">请选择</option>
            <?php if(is_array($tplList)): foreach($tplList as $key=>$vo): ?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["file"]); ?></option><?php endforeach; endif; ?>
        </select>
          </div>
                <p class="help-block">当前栏目列表模板</p>
            </div>
        </div>
        
        <div class="formitm">
            <label class="lab">内容模板</label>
            <div class="ipt">
                <div class="input-group">
            <input name="content_tpl" type="text"  class="form-element u-width-medium  " id="content_tpl" value="<?php echo ($info["content_tpl"]); ?>" maxlength="250"  datatype="*" >
            
        <select class="form-element dux-assign " target="#content_tpl" id="" >
            <option value =" ">请选择</option>
            <?php if(is_array($tplList)): foreach($tplList as $key=>$vo): ?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["file"]); ?></option><?php endforeach; endif; ?>
        </select>
          </div>
                <p class="help-block">当前栏目下内容模板</p>
            </div>
        </div>
        
        <div class="formitm">
            <label class="lab">栏目图片</label>
            <div class="ipt">
                <input name="image" type="text"  class="form-element u-width-medium  " id="image" value="<?php echo ($info["image"]); ?>" maxlength="250"   >
          <a class="u-btn u-btn-primary u-img-upload" data="image" preview="image-preview" href="javascript:;" id="upload">上传</a> 
          <a class="u-btn u-btn-primary"href="javascript:;" id="image-preview">预览</a>
                <p class="help-block"></p>
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
        </div>
      
        <div class="g-col-5-2 g-col-last ">
          
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
        
        <div class="formitm">
            <label class="lab">内容列表排序</label>
            <div class="ipt">
                <select name="content_order" id="content_order" class="form-element">
            <option value="time DESC" 
      
            
            
            <?php if($info['content_order'] == 'time DESC'): ?>selected="selected"<?php endif; ?>
            >发布时间新->旧
      
            
            
            </option>
            <option value="time ASC" 
      
            
            
            <?php if($info['content_order'] == 'time ASC'): ?>selected="selected"<?php endif; ?>
            >发布时间 旧->新
      
            
            
            </option>
            <option value="sequence DESC" 
      
            
            
            <?php if($info['content_order'] == 'sequence DESC'): ?>selected="selected"<?php endif; ?>
            >自定义排序 大->小
      
            
            
            </option>
            <option value="sequence ASC" 
      
            
            
            <?php if($info['content_order'] == 'sequence ASC'): ?>selected="selected"<?php endif; ?>
            >自定义排序 小->大
      
            
            
            </option>
          </select>
                <p class="help-block">栏目的内容列表下文章的顺序</p>
            </div>
        </div>
        
        <div class="formitm">
            <label class="lab">绑定字段集</label>
            <div class="ipt">
                <select name="fieldset_id" id="fieldset_id" class="form-element">
            <option value="0">==不绑定==</option>
            <?php if(is_array($expandList)): foreach($expandList as $key=>$vo): ?><option value="<?php echo ($vo["fieldset_id"]); ?>"
              
              <?php if($info['fieldset_id'] == $vo['fieldset_id']): ?>selected="selected"<?php endif; ?>
              ><?php echo ($vo["name"]); ?>
              
              </option><?php endforeach; endif; ?>
          </select>
                <p class="help-block">绑定后添加内容时可使用扩展字段</p>
            </div>
        </div>
        </div>
          </div>
        
    
        <div class="formitm form-submit">
        <div class="ipt">
            <div class="tip" id="tips"></div>
            <button class="u-btn u-btn-success u-btn-large" type="submit" id="btn-submit">保存</button>
            <button class="u-btn u-btn-large" type="reset">重置</button>
        </div>
        </div>
    <input name="class_id" type="hidden"  class="form-element u-width-large  " id="class_id" value="<?php echo ($info["class_id"]); ?>"    >
        </fieldset>
        </form>
            </div> </div>
<script>
Do.ready('base',function() {
	$('#form').duxFormPage();
});
</script>