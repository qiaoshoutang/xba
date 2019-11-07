<?php if (!defined('THINK_PATH')) exit();?><h3>活动列表</h3>

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
                    <select name="status"  class="form-element ">
    <option value="0" >==状态==</option>
    <?php if(is_array($statusArr)): foreach($statusArr as $key=>$vo): ?><option value="<?php echo ($key); ?>" 
        <?php if($pageMaps['status']==$key): ?>selected<?php endif; ?>
      ><?php echo ($vo); ?></option><?php endforeach; endif; ?>
  </select>
                    <button class="u-btn u-btn-primary" type="submit">筛选</button>
                </form>
            </div></div>

<div class="m-table-mobile"><table id="table" class="m-table "><thead><tr><th width="80">编号</th><th>排序</th><th>名称</th><th>封面图</th><th>时间</th><th>状态</th><th width="130">操作</th></tr></thead><tbody><?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
      <td><?php echo ($vo["id"]); ?></td>
      <td><?php echo ($vo["order_id"]); ?></td>
      <td><?php echo ($vo["name"]); ?></td>
      <td><img src="<?php echo ($vo["cover_url"]); ?>" width='300'></td>
      <td><?php echo (date("Y-m-d H:i:s", $vo["time"])); ?></td>
      <td><?php echo ($statusArr[$vo['status']]); ?></td> 
      <td>
        <a class="u-btn u-btn-primary u-btn-small" href="<?php echo U('activityEdit',array('id'=>$vo['id']));?>">修改</a> 
      	<a class="u-btn u-btn-danger u-btn-small del" href="javascript:;" data="<?php echo ($vo["id"]); ?>">删除</a>
      </td>
    </tr><?php endforeach; endif; ?></tbody></table></div>
            </div> </div>


<script>

Do.ready('base',function(){

	$('#table').duxTable({
			deleteUrl: "<?php echo U('activityDel');?>",
			actionParameter: function(){
			}
	});
});
</script>