<?php if (!defined('THINK_PATH')) exit();?><h3>理事单位列表</h3>

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
                    <select name="status" id="status"  class="form-element "><option value="0" <?php if(0 == $pageMaps['status']){ ?> selected="selected"  <?php } ?> >==状态==</option><option value="1" <?php if(1 == $pageMaps['status']){ ?> selected="selected"  <?php } ?> >待处理</option><option value="2" <?php if(2 == $pageMaps['status']){ ?> selected="selected"  <?php } ?> >常务理事</option><option value="3" <?php if(3 == $pageMaps['status']){ ?> selected="selected"  <?php } ?> >理事</option><option value="4" <?php if(4 == $pageMaps['status']){ ?> selected="selected"  <?php } ?> >不通过</option></select>
                    <button class="u-btn u-btn-primary" type="submit">筛选</button>
                </form>
            </div></div>

<div class="m-table-mobile"><table id="table" class="m-table "><thead><tr><th>选择</th><th width="80">编号</th><th>权重</th><th>联系人姓名</th><th>单位名称</th><th>职务</th><th>所在地区</th><th>单位简介</th><th>联系方式</th><th>时间</th><th>状态</th><th width="130">操作</th></tr></thead><tbody><?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
  	  <td>
  		  <input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" />
  	  </td>
      <td><?php echo ($vo["id"]); ?></td>
      <td><?php echo ($vo["order_id"]); ?></td>
      <td><?php echo ($vo["contactname"]); ?></td>
      <td><?php echo ($vo["name"]); ?></td>
      <td><?php echo ($vo["position"]); ?></td>
      <td><?php echo ($vo["location"]); ?></td>
      <td><?php echo ($vo["introduction"]); ?></td>
      <td><?php echo ($vo["contact"]); ?></td>
      <td><?php echo (date("Y-m-d H:i:s", $vo["time"])); ?></td>
      <td><?php echo ($statusArr[$vo['status']]); ?></td> 
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