<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $linkname;?>管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>css/admin/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.pop{ margin:inherit; width:inherit;}
</style>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery-1.7.2.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/Validform_Datatype.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/Validform_v5.3.2_ncr_min.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/qiehuan.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo W_BASE_URL;?>js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script>
<?php $editor = APP :: N('editorModule');?>
<?php $getID3 = APP :: N('AudioInfo');?>
<!--百度编辑器 开始-->
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_all.js"></script>
<!--百度编辑器 结束-->
</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>充值管理<span>&gt;</span>管理员充值</p>
    </div>
    <div class="main-cont">
        <h3 class="title">
		</h3>
        <style>.ww1 li a:hover{ text-decoration:none;}</style>
        <div class="conh1">
            <div id="butong_net1">
            <div class="set-area">
                <div class="form web-info-form">
                    <form id="form" method="post" action="<?= URL('mgr/role.make_money')?>">
                        <div class="dis" name="f"> 
                            
							<div class="form-row"><label class="form-field">充值学币</label>
                            <div class="" style="line-height:19px;">
                            <input name="frozen_money" type="text" class="input-txt" id="title" value="" datatype="n" maxlength="150" style="line-height:10px;" errormsg="检查填写信息"/>
                            </div>   
                            </div>
                            
                            <div class="form-row"><label class="form-field">选择机构</label>
                            <div class="">
                            <select name="orid1">
						<?php     
                                foreach($goods_category as $cat){
                        ?>
								<option value="<?php echo $cat['linkageid']?>" ><?php echo $cat['name']?></option>
						<?php		
                                }
                        ?> 
							  </select>
							  <!--<select id="twoCategory" name="orid2" onchange="select_category(this.value,'fourCategory')">
								<option value="0">请选择...</option>
								<?php 
									if(!empty($info['orid'])&&!empty($present_category)){
										foreach($present_category[1] as $cat){
								?>
								<option value="<?php echo $cat['linkageid']?>" <?php echo $cat['flag']?>><?php echo $cat['name']?></option>
								<?php	
										}
									}
								?>
							</select>-->
							<!--<select id="fourCategory" name="orid3" onchange="select_category(this.value,'fiveCategory')">
							<option value="0">请选择...</option>
							<?php 
								if(!empty($goods_info['orid'])&&!empty($present_category)){
									foreach($present_category[2] as $cat){
							?>
							<option value="<?php echo $cat['linkageid']?>" <?php echo $cat['flag']?>><?php echo $cat['name']?></option>
							<?php	
									}
								}
							?>
							</select>-->
                            </div>
                            </div>
							
							<!--<script>
								function select_category(v,id){
									if(v!=''){
										$.post("<?php echo URL('mgr/member2.get_specifies_category')?>",{orid:v},function(json){
											var obj=eval('('+json+')');
											if(obj.category_html!=''){
												$("#"+id).html(obj.category_html);
											}
										});
									}	
								}
							</script>-->
							
                            <div class="form-row"><label class="form-field">充值时间</label>
                            <div class="">
                           <input name="inputtime" type="text" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate span1" value="<?= date('Y-m-d H:i:s',time())?>"  style="width:184px;" class="Wdate span1"  />
                            </div>
                            </div>
							
                            <div class="btn-area" id="btn1">
                                <a class="btn_genera2" id="btn_sub"><span>确认充值</span></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>

        </div>
	</div>
<?= V('r:t','') == 'pic' ? '<script>$("#picLi").click();</script>' : '';?>
<script>
	$("#form").Validform({
		btnSubmit:"#btn_sub",
		tiptype:4,
		ajaxPost:true,
		callback:function(data){
			if(data.status == '1'){
				alert(data.info);
				 location.reload(true);
			}else{
				alert(data.info);	
			}
		}
	});
	
	function change_days(id) {
	var html	=	'';
	if(id==4 || id==6 || id==9 || id==11) {
		for(var i=1;i<=30;i++) {
			html	+=	'<option value="'+i+'">'+i+'</option>';	
		}
	} else if(id==2 && $("#year").val()%4==0) {
		for(var i=1;i<=29;i++) {
			html	+=	'<option value="'+i+'">'+i+'</option>';
		}
	} else if(id==2 && $("#year").val()%4!=0) {
		for(var i=1;i<=28;i++) {
			html	+=	'<option value="'+i+'">'+i+'</option>';
		}
	} else {
		for(var i=1;i<=31;i++) {
			html	+=	'<option value="'+i+'">'+i+'</option>';
		}	
	}	
	$("#days").html(html);
}
</script>
</body>
</html>