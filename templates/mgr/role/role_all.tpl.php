<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>价格设定</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>css/admin/css.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.pop{ margin:inherit; width:inherit;}
</style>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery-1.7.2.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/Validform_Datatype.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/Validform_v5.3.2_ncr_min.js"></script>
<script language="javascript" type="text/javascript" src="<?= W_BASE_URL;?>js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/qiehuan.js"></script>
<script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script>
<link href="/js/lhgdialogsc/skins/discuz.css" rel="stylesheet" type="text/css" />
<?php $editor = APP :: N('editorModule');?>
<!--百度编辑器 开始-->
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_all.js"></script>
<!--百度编辑器 结束-->
</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>角色列表<span>&gt;</span>价格设定</p>
    </div>
    <div class="main-cont">
        <h3 class="title">
		<a class="btn-general"  href="<?= URL('mgr/role.index')?>"><span>返回列表</span></a>价格设定
		</h3>
        <style>.ww1 li a:hover{ text-decoration:none;}</style>
        <div class="conh1">
			<ul class="ww1">
                          <li onclick="butong_net_second2(0);" id="menuli22_0" class="s"><a href="javascript:;">课程价格设定</a></li>
                          <li onclick="butong_net_second2(2);" id="menuli22_2"><a href="javascript:;">章节价格设定</a></li>
						  <li onclick="butong_net_second2(3);" id="menuli22_3"><a href="javascript:;">体系价格设定</a></li>
				<script>
					function butong_net_second2(id) {
						$(".conh1 .ww1 li").each(function() {
							$(this).attr("class","");
						});
						
						$("#butong_net2 .ww1 table").each(function() {
							$(this).attr("class","undisplay");
						});
						
						$("#menuli22_"+id).attr("class","s");
						
						for(var i=0;i<5;i++) {
							if(i!=id) {
								$("#menuli2_"+i).attr("class","undis ");
							} else {
								$("#menuli2_"+i).attr("class","dis ");
							}
						}
					}
				</script>
            </ul>
			<div class="clear"></div>
		
			<div id="butong_net1">
				<div class="set-area">
					<div class="form web-info-form">
						<!-- 课程价格设定 -->
						<div class="dis" name="f" id="menuli2_0">
							<div class="pad_10">
								<form name="myform" id="myform" action="" method="post" >
									<div class="table-list">
										<table width="100%">
											<thead>
												<tr>
												<th width="25">课程ID</th>
												<th width="120">课程名称</th>
												<th width="100">学币</th>
												<th width="120">是否可查看</th>
												
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($info_c)){
													foreach($info_c as $key=>$val){
													$res = DS('mgr/role.sql1','',"select * from xsmart_role_course where rid = ".V('r:id') .' and cid = '.$val['id']);
												?>
													
												<tr>
													<td align="center"><?= $val['id'];?></td>
													<td align="center"><?= $val['title']?></td>
													<td align="center">
													<input type="text" class="input-text" name="cprice" id="cprice_<?=$val['id']?>" value="<?= $res[0]['cprice']?>" /></td>
													<td align='center'>
													<input type="radio" name="ctype_<?= $val['id'];?>" id="ctype_<?=$val['id'];?>" value="1" <?= $res[0]['ctype'] == 1 ? 'checked="checked"' : ''?> <? if(empty($res)){echo 'checked="checked"';}?>/>可查看视频 &nbsp;&nbsp;&nbsp;
													<input type="radio" name="ctype_<?= $val['id'];?>"<?= $res[0]['ctype'] == 2 ?'checked="checked"':''?> id="ctype_<?=$val['id'];?>" value="2" />不可查看视频 </td>
													<input type="hidden" value="<?= $val['id'];?>" name="cid" id="<?= $val['id'];?>" />
													<input type="hidden" value="<?= V('r:id');?>" name="rid" id="rid_<?= $val['id'];?>" />
												</tr>
												<?php }}?>
											</tbody>
										</table>
									</div>
								</form>
							</div>
							<div class="btn-area">
								<span style=" margin-left:200px"><a class="btn_genera2" id="btn_ssub" onclick="butong_net_second2(2);"><span>下一步</span></a></span>
							</div>
						</div>
					   	<!-- 课程价格设定 -->
						
						<!-- 章节价格设定 -->
						<div class="undis" name="f" id="menuli2_2">
							<div class="pad_10">
							<form name="myform" id="myform" action="" method="post" >
								<div class="table-list">
									<table width="100%">
										<thead>
											<tr>
											<th width="25">章节ID</th>
											<th width="120">体系名称</th>
											<th width="120">章节名称</th>
											<th width="100">学币设定</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($info_p)){
												foreach($info_p as $key=>$val){
												$res = DS('mgr/role.sql1','',"select * from xsmart_role_chapter where rid = ".V('r:id') .' and pid = '.$val['id']);		
											?>
											<tr>
												<td align="center"><?= $val['id'];?></td>
												<td align="center"><?= $val['stitle']?></td>
												<td align="center"><?= $val['ctitle']?></td>
												<td align="center">
												<input type="text" class="input-text" name="pprice" id="pprice_<?=$val['id']?>" value="<?= $res[0]['pprice']?>" /></td>
												<input type="hidden" value="<?= $val['id'];?>" name="pid" id="<?= $val['id'];?>" />
												<input type="hidden" value="<?= V('r:id');?>" name="rid" id="rid_<?= $val['id'];?>" />
											</tr>
											<?php }}?>
										</tbody>
									</table>
								</div>
							</form>
						</div>	
							<div class="btn-area">
								<span style=" margin-left:200px">
								<a class="btn_genera2" id="btn_ssub" onclick="butong_net_second2(0);"><span>上一步</span></a>
									<a class="btn_genera2" id="btn_ssub" onclick="butong_net_second2(3);"><span>下一步</span></a>
									</span>
							</div>
					  	</div>
						<!-- 章节价格设定 -->
						
						<!-- 体系价格设定 -->
						<div class="undis" name="f" id="menuli2_3">
							<div class="pad_10">
								<form name="myform" id="myform" action="" method="post" >
									<div class="table-list">
										<table width="100%">
											<thead>
												<tr>
												<th width="25">ID</th>
												<th width="120">名称</th>
												<th width="100">学币设定</th>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($info_s)){
													foreach($info_s as $key=>$val){
														$res = DS('mgr/role.sql1','',"select * from xsmart_role_system where rid = ".V('r:id') .' and sid = '.$val['id']);	
												?>
												
												<tr>
													<td align="center"><?= $val['id'];?></td>
													<td align="center"><?= $val['stitle']?></td>
													<td align="center">
													<input type="text" class="input-text" name="sprice" id="sprice_<?=$val['id']?>" value="<?= $res[0]['sprice']?>" /></td>
													<input type="hidden" value="<?= $val['id'];?>" name="sid" id="<?= $val['id'];?>" />
													<input type="hidden" value="<?= V('r:id');?>" name="rid" id="rid_<?= $val['id'];?>" />
												</tr>
												<?php }}?>
											</tbody>
										</table>
									</div>
								</form>
							</div>
							<div class="btn-area">
								<span style=" margin-left:200px">
								<a class="btn_genera2" id="btn_ssub" onclick="butong_net_second2(2);"><span>上一步</span></a>
								<a class="btn_genera2" onclick="ck_all()"><span>确认保存</span></a></span>
							</div>
						</div>
						<!-- 体系价格设定 -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		function ck_all(){
			var ccount = 0;
			var pcount = 0;
			var scount = 0;
			$("[name='cid']").each(function(index, element) {
				
				if($("#cprice_"+$(element).attr('id')).val() == ""){
					ccount++;
				}
			});
			if(ccount > 0){
				alert("课程价格不能为空！");
				return false;
			}
			
			$("[name='pid']").each(function(index, element) {
				
				if($("#pprice_"+$(element).attr('id')).val() == ""){
					pcount++;
				}
			});
			if(pcount > 0){
				alert("章节价格不能为空！");
				return false;
			}
			
			$("[name='sid']").each(function(index, element) {
				
				if($("#sprice_"+$(element).attr('id')).val() == ""){
					scount++;
				}
			});
			if(scount > 0){
				alert("课程体系不能为空！");
				return false;
			}
		
			$url = "<?= URL('mgr/role.role_all_con')?>&info=";
			
			$("[name='cid']").each(function(index, element) {
				
				$url += ','+$(element).val()+'-'+$('#rid_'+$(element).attr('id')).val()+'-'+$('#cprice_'+$(element).attr('id')).val()+'-'+$("input[name='ctype_"+$(element).attr('id')+"']:checked").val()
			});
			$url += '|';
			$("[name='pid']").each(function(index, element) {
			
				$url += ','+$(element).val()+'-'+$('#rid_'+$(element).attr('id')).val()+'-'+$('#pprice_'+$(element).attr('id')).val()
			});
			$url += '|';
			$("[name='sid']").each(function(index, element) {
			
				$url += ','+$(element).val()+'-'+$('#rid_'+$(element).attr('id')).val()+'-'+$('#sprice_'+$(element).attr('id')).val()
			});
			//alert($url)
			$.post($url,function(data){
				location = "<?= URL('mgr/role.index');?>";
			});
		}
		
	</script>	
</body>
</html>
