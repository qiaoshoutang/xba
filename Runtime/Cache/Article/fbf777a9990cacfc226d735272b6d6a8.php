<?php if (!defined('THINK_PATH')) exit();?><h3>文章列表</h3>

        <div class="m-panel ">
            <div class="panel-body">
            <div class="m-table-tool f-cb">
            <div class="tool-search f-cb">
                    <form action="<?php echo U();?>" method="post">
                        <input type="text" class="form-element" name="keyword" value="<?php echo ($pageMaps["keyword"]); ?>" />
                        <button class="u-btn u-btn-primary" type="submit">搜索</button>
                    </form></div>
             
            <div class="tool-filter f-cb">
                <form action="<?php echo U();?>" method="post">
                    <select name="status" id="class_id" class="form-element">
      <option value="0">==状态==</option>
      <?php if(is_array($statusArr)): foreach($statusArr as $key=>$vo): ?><option value="<?php echo ($key); ?>"
          <?php if($pageMaps['status'] == $key): ?>selected="selected"<?php endif; ?>
          ><?php echo ($vo); ?>
          </option><?php endforeach; endif; ?>
    </select>
                    <button class="u-btn u-btn-primary" type="submit">筛选</button>
                </form>
            </div></div>

  <div class="m-table-mobile"><table id="table" class="m-table "><thead><tr><th width="30">选择</th><th width="30">编号</th><th width="80">标题</th><th>内容</th><th width="100">状态</th><th width="170">更新时间</th><th width="130">操作</th></tr></thead><tbody><?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
        <td>
        	<input type="checkbox" name="id[]" value="<?php echo ($vo["content_id"]); ?>" />
        </td>
        <td><?php echo ($vo["content_id"]); ?></td>
        <td><?php echo ($vo["title"]); ?></td>
        <td>
            <?php echo ($vo["content"]); ?>
        </td>
        <td>
          <?php if($vo['status']==1): ?><span class="u-badge u-badge-primary">草稿</span><?php endif; ?>

          <?php if($vo['status']==2): ?><span class="u-badge u-badge-success">通过</span><?php endif; ?>
          <?php if($vo['status']==3): ?><span class="u-badge u-badge-danger">不通过</span><?php endif; ?>
        </td>
        <td><?php echo (date("Y-m-d H:i:s",$vo["time"])); ?></td>

        <td>
        <?php if($vo['status']==1): ?><a class="u-btn u-btn-primary  u-btn-small article" href="javascript:;" onclick="article_review(this)" data="<?php echo ($vo["content_id"]); ?>" operation='2'>通过</a>
          <a class="u-btn u-btn-danger  u-btn-small article" href="javascript:;" onclick="article_review(this)" data="<?php echo ($vo["content_id"]); ?>" operation='3'>不通过</a><?php endif; ?>
        <a class="u-btn u-btn-success  u-btn-small" href="<?php echo U('edit',array('content_id'=>$vo['content_id']));?>">修改</a>
        <a class="u-btn u-btn-danger  u-btn-small del" href="javascript:;" data="<?php echo ($vo["content_id"]); ?>">删除</a></td>
      </tr><?php endforeach; endif; ?></tbody></table></div>
  <div class="m-table-bar">
            <div class="bar-action">
            <a class="u-btn u-btn-primary" href="javascript:;" id="selectAll">选择</a>
             <select name="selectAction" id="selectAction" class="form-element"><option value="4">删除</option></select>  
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
<script type="text/javascript" charset="utf-8">
	Do.ready('base',function() {
		//移动操作
		$('#selectAction').change(function() {
			var type = $(this).val();
			if(type == 3){
				$(this).after($('#class_id').clone());
			}else{
				$(this).nextAll('select').hide();
			}
		});
		//表格处理
		$('#table').duxTable({
			actionUrl : "<?php echo U('batchAction');?>",
			deleteUrl: "<?php echo U('del');?>",
			actionParameter : function(){
				return {'class_id' : $('#selectAction').next('#class_id').val()};
			}
		});
	});


  function article_review(par){   //ajax 向后台提交审核

    var obj=$(par); 
    var obj_status=obj.parents('tr').children('td').eq(4);
    var id=obj.attr('data');
    var operation=obj.attr('operation');

    $.ajax({
      type:"post",
      url:"/Article/Content/article_review",
      data:{id:id,operation:operation},
      dataType:'json',
      success:function(data){
        if(data.code==1){ 
          obj.parent().children('.article').remove();

          if(data.operation==2){
              obj_status.html('<span class="u-badge u-badge-success">通过</span>');
          }
          if(data.operation==3){
              obj_status.html('<span class="u-badge u-badge-danger">不通过</span>');
          }
        }else{
          console.log(data);
        }
      }
    });
  }
</script>