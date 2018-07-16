<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>邮件模板</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
</head>
<body>

<div class="main-wrap">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>EDM营销<span>&gt;</span>邮件模板</p></div>
    <div class="main-cont">
        <h3 class="title">选择邮件模板
        <a class="btn-general" href="<?= URL('mgr/email.addtpl')?>"><span>添加模板</span></a>
        </h3>
        <div class="set-area">
        	<div class="form web-info-form">
            <style type="text/css">
			.yjmb{ padding:20px 0 0 40px;}
			.yjmb li{ float:left; width:200px; margin-right:20px; text-align:center; font-size:12px; line-height:24px; font-weight:bold; color:#333; margin-bottom:10px; position:relative; overflow:hidden;}
			.yjmb li div{width:90px; height:18px; padding:6px 10px 6px 100px; line-height:18px; position:absolute; left:0px; top:169px; background:url(/images/s_bj.png);}
			.yjmb li div a.fl{ float:left;}
			.yjmb li div a.fr{ float:right; margin:0;}
			.yjmb li div a{ color:#ccc; text-decoration:none;}
			.yjmb li div a:hover{ color:#F30; text-decoration:none;}
			</style>
            	<ul class="yjmb" id="list">
                  <?php if(!empty($info)){
					  foreach($info as $key=>$val){?>
                  <li>
                  	<label>
                  	<img src="<?= empty($val['tpl_pic']) ? 'no' : $val['tpl_pic'];?>" width="200" height="200" onmouseover="document.getElementById('tpl_<?= $key;?>').style.display='block'" onmouseout="document.getElementById('tpl_<?= $key;?>').style.display='none'" onerror="this.src='/images/nopicture.gif'">
                    <div id="tpl_<?= $key;?>" style=" display:none;" onmouseover="this.style.display='block'" onmouseout="this.style.display='none'">
                    	 <a href="<?= URL('mgr/email.addtpl','id='.$val['id']);?>" class="icon-edit fl">修改</a>
                         <a href="javascript:delConfirm(<?= $val['id'];?>);" class="icon-del fl fr" style="*+width:30px;">删除</a>
                    </div>
                    <input type="radio" name="tpl" value="<?= $val['id'];?>" title="<?= $val['tplname'];?>" <?= $tplid == $val['id'] ? 'checked' : '';?>/> <?= $val['tplname'];?>
                    </label>
                  </li>
                  <?php }}?>
                </ul>
                <div style="clear:both;"></div>
            </div>
        </div>

    </div>
    <script>
    	function delConfirm(id){
			if(confirm('您确定删除此模板吗？')){
				location.href = '<?= URL('mgr/email.deltpl','id=');?>' + id;
			}
		}
		$(function(){
			$(":radio[name='tpl']").click(function (){
				if(this.checked){
					var tit = this.title;
					$.ajax({
						url:'<?= URL('mgr/email.ajaxCheckedTpl');?>',
						type:'post',
						data:{'tplid':this.value},
						success:function (e){
							if(e)
							alert('您已选定 '+ tit);
						}
					});
				}
			});
		});
    </script>
    
</div>

</body>
</html>
