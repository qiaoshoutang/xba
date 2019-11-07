<?php if (!defined('THINK_PATH')) exit();?><h3>公告列表</h3>

        <div class="m-panel ">
            <div class="panel-body">
            <div class="m-table-tool f-cb">
            <div class="tool-search f-cb">
                    <form action="<?php echo U();?>" method="post">
                        <input type="text" class="form-element" name="keyword" value="<?php echo ($pageMaps['keyword']); ?>" />
                        <button class="u-btn u-btn-primary" type="submit">搜索</button>
                    </form></div>
             
            <div class="tool-filter f-cb">
                <form action="<?php echo U();?>" method="post">
                    <select name="state" id="state"  class="form-element "><option value="0" <?php if(0 == $pageMaps['state']){ ?> selected="selected"  <?php } ?> >==状态==</option><option value="1" <?php if(1 == $pageMaps['state']){ ?> selected="selected"  <?php } ?> >显示</option><option value="2" <?php if(2 == $pageMaps['state']){ ?> selected="selected"  <?php } ?> >不显示</option></select>
                    <button class="u-btn u-btn-primary" type="submit">筛选</button>
                </form>
            </div></div>

<div class="m-table-mobile"><table id="table" class="m-table "><thead><tr><th>选择</th><th width="50">编号</th><th>标题</th><th>内容</th><th>状态</th><th>添加时间</th><th width="130">操作</th></tr></thead><tbody><?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
  	  <td>
  		  <input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" />
  	  </td>
      <td><?php echo ($vo["id"]); ?></td>
      <td><?php echo ($vo["title"]); ?></td>
      <td><?php echo ($vo["content"]); ?></td>
      <td><?php echo ($stateArr[$vo['state']]); ?></td>
      <td><?php echo (date("Y-m-d H:i:s", $vo["time"])); ?></td>
      <td>
        <a class="u-btn u-btn-primary u-btn-small" href="<?php echo U('edit',array('id'=>$vo['id']));?>">修改</a> 
      	<a class="u-btn u-btn-danger u-btn-small del" href="javascript:;" data="<?php echo ($vo["id"]); ?>">删除</a>
      </td>
    </tr><?php endforeach; endif; ?></tbody></table></div>
<div class="m-table-bar">
            <div class="bar-action">
            <a class="u-btn u-btn-primary" href="javascript:;" id="selectAll">选择</a>
             <select name="selectAction" id="selectAction" class="form-element"><option value="1">删除</option></select>  
            <a class="u-btn u-btn-success" href="javascript:;" id="selectSubmit">执行</a>
            </div>
            <div class="bar-pages">
              <div class="m-page">
                <?php echo ($page); ?>
              </div>
            </div>
            <div class="f-cb"></div>
        </div>
            </div> </div>


<script>

Do.ready('base',function(){

	$('#table').duxTable({
		actionUrl: "<?php echo U('batchAction');?>",
			deleteUrl: "<?php echo U('del');?>",
			actionParameter: function(){
				return {
					'class_id': $('#selectAction').next('#class_id').val()
				};
			}
	});
});
</script>