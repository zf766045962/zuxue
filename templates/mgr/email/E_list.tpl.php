<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php header('Cache-control: private, must-revalidate');?> 
<title>Email列表</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/select.js"></script>
</head>

<body class="main-body">
<table class="yc">
<tr>	
	<td valign="top" style="overflow:auto; overflow-y:hidden;"><div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>EDM营销<span>&gt;</span>邮箱列表</p></div>
        <div class="main-cont" style=" line-height:3">
        <h3 class="title">
        <a class="btn-general" href="<?= URL('mgr/email.addemail')?>"><span>添加单地址</span></a>
        邮箱列表</h3>
        
          <div class="set-area" id="data_list">
            <div class="yang_info" style="height:40px; line-height:24px;">

        <span style="display:inline-block; line-height:24px;">E-mail：</span>
        <input class="input-txt" type="text" id="email" value="<?= V('r:email','');?>"/>
        <span style="display:inline-block; line-height:24px;">类别：</span>
        <select class="select1" id="cid">
            <option value="0">请选择</option>
            <?php if(!empty($class)){
                foreach($class as $key=>$val){
					$class_arr[$val['classid']] = $val['classname'];
			?>
                <option value="<?= $val['classid'];?>"><?= $val['classname'];?></option>
            <?php }}?>
        </select>
        <a href="javascript:;" class="btn-general" onclick="javascript:sosuo();"><span>搜 索</span></a>
		<script>
        	$('#cid').val(<?= V('g:cid',0);?>);
			function sosuo(){
				var cid = $('#cid').val();
				var email = $('#email').val();
				location.href='<?= URL('mgr/email.E_list');?>' + '&cid=' + cid + '&email=' + email;
			}
        </script>

            </div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
                <colgroup>
                    <col class="w40" />
                    <col class="w100" />
                    <col />
                    <col class="w120" />
                    <col class="w80" />
                    <col class="w140" /> 
                    <col class="w180" />
                </colgroup>
                <thead class="tb-tit-bg">
                    <tr>
                        <th><div class="th-gap">&nbsp;&nbsp;</div></th>
                        <th><div class="th-gap">编号</div></th>
                        <th><div class="th-gap">邮箱地址</div></th>
                        <th><div class="th-gap">分类</div></th>	
                        <th><div class="th-gap">有效</div></th>
                        <th><div class="th-gap">添加时间</div></th>
                        <th><div class="th-gap">操作</div></th>
                    </tr>
                </thead>
            
                <tbody id="recordList">
                 <?php if(isset($result['info']) && !empty($result['info'])){
                        foreach($result['info'] as $key=>$val){
                 ?>
                    <tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><input type="checkbox" name="id" value="<?= $val['id']?>" /></td>
                    <td><?= $val['id']?></td>
                    <td><div class="td-nowrap"><a href="<?= URL('mgr/email.addemail','id='.$val['id']);?>" ><?= $val['address'];?></a></div></td>
                    <td><?= $class_arr[$val['cid']];?></td>
                    <td style="text-align:center;">
                    <a href="javascript:status('is_ok',<?= $val['id'];?>);"><img src="img/<?= $val['is_ok']?'yes':'no'?>.gif" id="is_ok<?= $val['id'];?>"/></a>
                    </td>
                    
            <script>
                function status(key,val){
                    var img = key + val;
                    var src = $('#'+img).attr('src');
                    if(src == 'img/no.gif'){
                        $.post('<?= URL("mgr/email.updAttr");?>',{'id':val,'type':key+1,'table':'xsmart_email_address'},function(e){
                            if(e == 1){
                                $('#'+img).attr('src','img/yes.gif');
                            }else{
                                alert('操作失败');
                            }
                        });
                    }else{
                        $.post('<?= URL("mgr/email.updAttr");?>',{'id':val,'type':key+0,'table':'xsmart_email_address'},function(e){
                            if(e == 1){
                                $('#'+img).attr('src','img/no.gif');
                            }else{
                                alert('操作失败');
                            }
                        });
                    }
                }
            
            </script>
        
                    <td><div class="td-nowrap"><?= $val['addtime'];?></div></td>
                    <td>
                    <a class="icon-edit" href="<?= URL('mgr/email.addemail','id='.$val['id']);?>">修改</a>
                    <a class="icon-del" href="javascript:delConfirm(<?= $val['id'];?>);">删除</a>
                    </td>
                    </tr>
            <?php }}?>
                    <tr>
                        <td colspan="7">
                         
                            <?php if(!empty($result['info'])){ ?>
                            <input type="button" name="chkall" id="chkall" onclick="selchk('id')" value="全选/反选" />　
                            <input type="button" id="delall" name="delall" value="批量删除"  onclick="chkallurl('id','<?= URL("mgr/email.delemail");?>','您确定要删除选中的信息吗？')" />
                           
                           <?= $result['pagehtml'];?>
                           <div class="yang_page">
                           <?php  } else {?>	
                           <div class='guide_info content_none'>没有查询到与条件相匹配的数据</div>
                           <?php }?>
                           </div>		
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
	</td>
    <div style="clear:both;"></div>
</tr>
</table>
<script>
	function delConfirm(id){
		if(confirm('您确定删除此信息？')){
			location.href = '<?= URL('mgr/email.delemail','id=');?>' + id;
		}
	}
</script>
</body>
</html>
