		<div class="pop-cont clear">
        <ul class="adobe-content">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
					<col class="w70" />
                    <col class="w70" />
					<col />
					<col class="w140" />
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
                        <th>&nbsp;</th>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">名称</div></th>	
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
                	<?php 
					if(!empty($list)){  foreach($list as $key=>$value){?>
					<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    
                    <td width="10"><input type="checkbox" class="checkbox" name="id[]" value="<?php echo $value['contentid']?>" /></td>
                    <td><?php echo $value['contentid']?></td>
                   <td><div class="td-nowrap">[<?php echo $value['classname']?>]<?php echo $value['title']?></div>
                   </td>
                   
                    <td>
                        <a href="<?php echo URL('mgr/infoclass.modifyclassfylist&lmid='.$lmid.'&classid='.$value['classid'].'&contentid='.$value['contentid'])?>">修改</a> 
                        <a class="icon-del" href="javascript:delConfirm('<?php echo URL('mgr/infoclass.del_content', 'id='.$value['contentid'], 'admin.php');?>','确认要删除该信息吗');">删除</a>
                    </td>
                    </tr>
                 	<?php } }?>
                     <tr>
						<td colspan="4">
                        <?php if(!empty($list)){?>
                    <input id="all" name="all" type="checkbox" value="" onclick="checkAll('#all')" />全选
                        <input type="button" id="RemoveAll" name="RemoveAll" value="批量删除" />
						<?php echo $pager; } else {?>	
						 <div class='guide_info content_none'>没有查询到与条件相匹配的数据</div>
                        <?php }?>	
						</td>
					</tr>
                   		
				</tbody>
			</table>
            </ul>

        </div>
