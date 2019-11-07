<?php if (!defined('THINK_PATH')) exit();?><h3>站点信息</h3>

        <div class="m-panel ">
            <div class="panel-body">
            
        <form action="<?php echo U('site');?>" method="post" id="form" class="m-form m-form-horizontal">
        <fieldset>
          
        <div class="formitm">
            <label class="lab">站点标题</label>
            <div class="ipt">
                <input name="site_title" type="text"  class="form-element u-width-large  " id="site_title" value="<?php echo ($info["site_title"]); ?>" maxlength="250"  datatype="*" >
                <p class="help-block">网站标题栏处显示</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">站点副标题</label>
            <div class="ipt">
                <input name="site_subtitle" type="text"  class="form-element u-width-large  " id="site_subtitle" value="<?php echo ($info["site_subtitle"]); ?>" maxlength="250"   >
                <p class="help-block">站点标题后面显示的副标题</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">页脚邮箱</label>
            <div class="ipt">
                <input name="site_email" type="text"  class="form-element u-width-large  " id="site_email" value="<?php echo ($info["site_email"]); ?>" maxlength="250"   >
                <p class="help-block">页面底部显示的邮箱地址</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">站点描述</label>
            <div class="ipt">
                <textarea name="site_description" type="text"  class="form-element u-width-large " id="site_description" value="" rows="5"   ><?php echo ($info["site_description"]); ?></textarea>
                <p class="help-block">当前网站的描述信息</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">站点网址</label>
            <div class="ipt">
                <input name="site_url" type="text"  class="form-element u-width-large  " id="site_url" value="<?php echo ($info["site_url"]); ?>" maxlength="250"   >
                <p class="help-block">当前网站的域名，开启手机版后做PC跳转</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">CDN网址</label>
            <div class="ipt">
                <input name="cdnurl" type="text"  class="form-element u-width-large  " id="cdnurl" value="<?php echo ($info["cdnurl"]); ?>" maxlength="250"   >
                <p class="help-block">cdnurl</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">站点版权</label>
            <div class="ipt">
                <input name="site_copyright" type="text"  class="form-element u-width-large  " id="site_copyright" value="<?php echo ($info["site_copyright"]); ?>" maxlength="250"   >
                <p class="help-block">版权信息或备案号</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">站点统计</label>
            <div class="ipt">
                <textarea name="site_statistics" type="text"  class="form-element u-width-large " id="site_statistics" value="" rows="5"   ><?php echo ($info["site_statistics"]); ?></textarea>
                <p class="help-block">用于统计代码调用</p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">交易所</label>
            <div class="ipt">
                <input name="exchange" type="text"  class="form-element u-width-large  " id="exchange" value="<?php echo ($info["exchange"]); ?>" maxlength="250"   >
                <p class="help-block">已对接交易所的行情API(名称全部小写,名称之间用小写逗号隔开)</p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">公众号二维码</label>
            <div class="ipt">
                <input name="qr_code_a" type="text"  class="form-element u-width-medium  " id="qr_code_a" value="<?php echo ($info["qr_code_a"]); ?>" maxlength="250"   >
      <a class="u-btn u-btn-primary u-img-upload" data="qr_code_a" preview="qr-preview_a" href="javascript:;" >上传</a> 
      <a class="u-btn u-btn-primary"href="javascript:;" id="qr-preview_a">预览</a>
                <p class="help-block">区块链头条快讯页脚默认的二维码</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">公众号二维码</label>
            <div class="ipt">
                <input name="qr_code_b" type="text"  class="form-element u-width-medium  " id="qr_code_b" value="<?php echo ($info["qr_code_b"]); ?>" maxlength="250"   >
      <a class="u-btn u-btn-primary u-img-upload" data="qr_code_b" preview="qr-preview_b" href="javascript:;" >上传</a> 
      <a class="u-btn u-btn-primary"href="javascript:;" id="qr-preview_b">预览</a>
                <p class="help-block">福建区块链俱乐部快讯页脚默认的二维码</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">公众号二维码</label>
            <div class="ipt">
                <input name="qr_code_c" type="text"  class="form-element u-width-medium  " id="qr_code_c" value="<?php echo ($info["qr_code_c"]); ?>" maxlength="250"   >
      <a class="u-btn u-btn-primary u-img-upload" data="qr_code_c" preview="qr-preview_c" href="javascript:;" >上传</a> 
      <a class="u-btn u-btn-primary"href="javascript:;" id="qr-preview_c">预览</a>
                <p class="help-block">蚂蚁区块链快讯页脚默认的二维码</p>
            </div>
        </div>

    
        <div class="formitm form-submit">
        <div class="ipt">
            <div class="tip" id="tips"></div>
            <button class="u-btn u-btn-success u-btn-large" type="submit" id="btn-submit">保存</button>
            <button class="u-btn u-btn-large" type="reset">重置</button>
        </div>
        </div>
        </fieldset>
        </form>
            </div> </div>
<script>
Do.ready('base', function() {
	$('#form').duxFormPage();
});
</script>