<?php if (!defined('THINK_PATH')) exit();?><h3>币配置列表</h3>

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
                    <select name="exchange"  class="form-element ">
    <option value="0" >==交易所名称==</option>
    <?php if(is_array($exchangeArr)): foreach($exchangeArr as $key=>$vo): ?><option value="<?php echo ($vo); ?>" 
        <?php if($pageMaps['exchange']==$vo): ?>selected<?php endif; ?>
      ><?php echo ($vo); ?></option><?php endforeach; endif; ?>
  </select>
                    <button class="u-btn u-btn-primary" type="submit">筛选</button>
                </form>
            </div></div>

<div class="m-table-mobile"><table id="table" class="m-table "><thead><tr><th>选择</th><th width="80">编号</th><th>币名称</th><th>交易所</th><th>时间</th><th>状态</th><th width="130">操作</th></tr></thead><tbody><?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
  	  <td>
  		  <input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" />
  	  </td>
      <td><?php echo ($vo["id"]); ?></td>
      <td><?php echo ($vo["coin"]); ?></td>
      <td><?php echo ($vo["exchange"]); ?></td>
      <td><?php echo (date("Y-m-d H:i:s", $vo["time"])); ?></td>
      <td><?php echo ($statusArr[$vo['status']]); ?></td> 
      <td>
        <a class="u-btn u-btn-primary u-btn-small" href="<?php echo U('coinEdit',array('id'=>$vo['id']));?>">修改</a> 
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
		actionUrl: "<?php echo U('coinBatchAction');?>",
			deleteUrl: "<?php echo U('coinDel');?>",
			actionParameter: function(){
				return {
					'class_id': $('#selectAction').next('#class_id').val()
				};
			}
	});
});
</script>