<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php header('Cache-control: private, must-revalidate');?> 
<title>卡密列表</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/select.js"></script>
<?php $editor = APP :: N('editorModule');?>
</head>

<body class="main-body">
<table class="yc">
<tr>	
	<td valign="top" style="overflow:auto; overflow-y:hidden;"><div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>充值卡<span>&gt;</span>操作管理</p></div>
        <div class="main-cont" style=" line-height:3">
        <h3 class="title">
        <a class="btn-general" href="<?= URL('mgr/payCard.cardList');?>"><span>查询全部列表</span></a>
        操作管理</h3>
          <div class="set-area" id="data_list">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
                <colgroup>
                	<col class="w60" />
                    <col class="w240" />
                    <col class="w60" />
                    <col class="w60" />
                    <col class="w140"/>
                    <col class="w240" />
                    <col class="w60" />
                    <col class="w60" />
                    <col class="w60" />
                    <col class="w60" />
                    <col class="w140" />
                    <col />
                </colgroup>
                <thead class="tb-tit-bg">
                    <tr>
                    	<th><div class="th-gap">编号</div></th>
                        <th><div class="th-gap">名称</div></th>
                        <th><div class="th-gap">卡前缀</div></th>
                        <th><div class="th-gap">面值</div></th>
                        <th><div class="th-gap">卡类别</div></th>	
                        <th><div class="th-gap">有效期</div></th>
                        <th><div class="th-gap">总数量</div></th>
                        <th><div class="th-gap">已使用</div></th>
                        <th><div class="th-gap">未使用</div></th>
                        <th><div class="th-gap">状态</div></th>
                        <th><div class="th-gap">生成时间</div></th>
                        <th><div class="th-gap">操作</div></th>
                    </tr>
                </thead>
            
                <tbody id="recordList">
                 <?php if(isset($info) && !empty($info)){
                        foreach($info as $key=>$val){
							$useNum = DS('mgr/payCard.total','','is_use = 1 and pid='.$val['id']);
							if(intval($val['classid']) > 0){
								$class = DS("mgr/book.getclasslist",'','3 and classid = '.$val['classid']);
							}else{
								$class = array();
							}
                 ?>
                    <tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><?= $val['id'];?></td>
                    <td><div class="td-nowrap"><a href="<?= URL('mgr/payCard.editka','id='.$val['id']);?>" title="<?= $val['title'];?>"><?= $val['title'];?></a></div></td>
                    <td><?= $val['prefix'];?></td>
                    <td><?= $val['face_value'];?></td>
                    <!--<td><?= $val['card_type'];?></td>-->
                    <td><?= empty($class) ? '' : $class[0]['classname'];?></td>
                    <td><?= substr($val['startDate'],0,-3).' 至 '.substr($val['endDate'],0,-3);?></td>
                    <td><strong><?= $val['num'];?></strong></td>
                    <td><font color="#009900"><strong><?= $useNum;?></strong></font></td>
                    <td><font color="#FF0000"><strong><?= $val['num'] - $useNum;?></strong></font></td>
                    <td><?php if(strtotime($val['endDate']) < time()){
							echo '<font color="#FF0000">已过期</font>';
						}else if($val['isValid'] == 0){
							echo '<font color="#FF0000">停止</font>';
						}else{
							echo '<font color="#009900">有效</font>';
						}?></td>
                    <td><?= $val['addtime'];?></td>
                    <td><a href="<?= URL('mgr/payCard.cardList','pid='.$val['id']);?>">查看列表</a> | <a href="javascript:;" onclick="$('#Alert<?= $val['id'];?>Btn').click();">数据导出</a> | <a href="javascript:;" onclick="delConfirm(<?= $val['id'];?>);">删除</a>
                    
					<?= $editor->dialog('Alert'.$val['id'], '', array('title'=>$val['title'],'content'=>'<a href="javascript:exl_export(\\\''.$val['title'].'\\\','.$val['id'].',2);" class="btn-general"><span>导出全部</span></a><a href="javascript:exl_export(\\\''.$val['title'].'\\\','.$val['id'].',1);" class="btn-general"><span>导出已使用</span></a><a href="javascript:exl_export(\\\''.$val['title'].'\\\','.$val['id'].',0);" class="btn-general"><span>导出未使用</span></a>'), 'style="display:none;"');
					?>

                    <!--<a href="javascript:exl_export('<?= $val['title'];?>',<?= $val['id'];?>,2);">导出全部</a> | <a href="javascript:exl_export('<?= $val['title'];?>',<?= $val['id'];?>,1);">导出已使用</a> | <a href="javascript:exl_export('<?= $val['title'];?>',<?= $val['id'];?>,0);">导出未使用</a>-->
                    
                    </td>
                    </tr>
            <?php }}?>
            		<tr><td colspan="12" align="center"><?= $pagehtml;?></td></tr>
                </tbody>
            </table>
            </div>
        </div>
	</td>
    <div style="clear:both;"></div>
</tr>
</table>

<script>
	function exl_export(title,pid, is_use){
		if(confirm('是否导出数据？')){
			location.href 	= '<?= URL('mgr/payCard.export');?>' + '&pid=' + pid + '&is_use=' + is_use + '&title=' + title;
		}
	}
</script>
<script>
                function status(key,val){
                    var img = key + val;
                    var src = $('#'+img).attr('src');
                    if(src == 'img/no.gif'){
                        $.post('<?= URL("mgr/payCard.updAttr");?>',{'id':val,'type':key+1,'table':'xsmart_paycard'},function(e){
                            if(e == 1){
                                $('#'+img).attr('src','img/yes.gif');
                            }else{
                                alert('操作失败');
                            }
                        });
                    }else{
                        $.post('<?= URL("mgr/payCard.updAttr");?>',{'id':val,'type':key+0,'table':'xsmart_paycard'},function(e){
                            if(e == 1){
                                $('#'+img).attr('src','img/no.gif');
                            }else{
                                alert('操作失败');
                            }
                        });
                    }
                }
            
            </script>
<script>
	function delConfirm(id){
		if(confirm('确认删除本批卡？删除后不可恢复！')){
			location.href = '<?= URL('mgr/payCard.delCardLog','id=');?>' + id;
		}
	}
</script>
</body>
</html>
