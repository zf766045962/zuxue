<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>详细(修改)</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>
<script>
	window.onload = function() {
		$('#preview_loading').hide();
	}

	function preview(o) {
		$('#preview_loading').show();
		$('#logo_form').submit();
	}
	
	function uploadFinished(state, url) {
		$('#logo_form').get(0).reset();

		$('#preview_loading').hide();
		if (state != '200') {
			alert(state);
			return;
		}
		$('#logo_preview').attr('src', url);
		$('#logo').val(url);

	}
</script>
</head>
<body>
<?php
	//数据初始化
	$sex = array(0=>'<font color="#999">未填</font>',1=>'先生',2=>'女士');
	$type_rs = array(0=>'活动留言',1=>'我要买车',2=>'我要卖车',3=>'我要换车',4=>'车源询价',5=>'贷款留言');
	$act = array(0=>'官网日常预约',1=>'全新君越置换活动官网预约');
	$port = array(1=>'诚新',5=>'51AUTO',6=>'淘车');
?>
<div class="main-wrap">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span><?= $navName;?></p></div>
    <div class="main-cont">
        <h3 class="title">查看<?= $navName;?></h3>
        <div class="set-area">
        	<div class="form web-info-form">
            	<?php //var_dump($info);?>
            	<form action="<?= URL('mgr/arcticlepublish.updpro');?>" name="form1" method="post" id="this_form">
                    <div class="form-row">
                    	<label class="form-field">留言类型：</label>
                       	<strong><?= $type_rs[$info["type"]];?></strong>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">贷款套餐：</label>
                        <?= $info['combo'] == '' ? '<font color="#999">未填</font>' : $info['combo'] ;?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">来自：</label>
                        <?= '<font color="#FF0000">'.$port[$info["portCode"]].'</font> - '.$act[$info["act"]];?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">姓名：</label>
                        <?= $info['username'] == '' ? '<font color="#999">未填</font>' : $info['username'] ;?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">性别：</label>
                        <?= $sex[$info["sex"]];?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">城市：</label>
                       	<?php 
							$db  = APP :: ADP('db');
							$city_sql = "select Name from xsmart_place where Id = ".$info["city"];
							$city = $db->query($city_sql, $fetch_mode = MYSQL_ASSOC);
							echo $city[0]['Name'];
						?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">电话：</label>
                        <?= $info['phone'] == '' ? '<font color="#999">未填</font>' : $info['phone'] ;?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">邮箱：</label>
                        <?= $info['email'] == '' ? '<font color="#999">未填</font>' : $info['email'] ;?>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">内容：</label>
                        <div class="form-cont" style="width:55%;">
                        <?php if($info['content'] != ''){?>
                        <textarea name="answer" class="input-area area-s4 code-area" cols="10" rows="10"><?= $info['content'];?></textarea>
                        <?php }else{echo '<font color="#999">未填</font>';}?>
                        <!--<p class="form-tips">（字数不能超过50个汉字）</p>-->
                        </div>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">询价（贷款）车辆：</label>
                        <?php 
							if($info['carid'] != ''){
							$car_sql = "select brand,series,companyCode from xsmart_all where vhclId = ".$info["carid"];
							$car = $db->query($car_sql, $fetch_mode = MYSQL_ASSOC);
								echo $car[0]["brand"].' '.$car[0]["series"].' <a href="http://chengxin.shanghaigm.com/index.php?m=default.buy_cars_detail&carid='.$info['carid'].'&dealid='.$car[0]["companyCode"].'&admin=1" target="_blank">查看详细车源</a>';
							}else{
								echo '<font color="#999">未填</font>';
							}
						?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">（现有）购买车辆：</label>
                        <?php 
							if($info["type"] == 0){
								echo $info['model'];
							}else{
								if($info['model'] != ''){
									$model_sql = "select Brand,Series,Model from xsmart_redbook where redbookCode = '".$info["model"]."'";
									$model = $db->query($model_sql, $fetch_mode = MYSQL_ASSOC);
									echo $model[0]["Brand"]." ".$model[0]["Series"]."（".$model[0]["Model"]."）";
								}else{
									echo '<font color="#999">未填</font>';
								}
							}
						?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">欲换车辆：</label>
                        <?php 
							if($info["type"] == 0){
								echo $info['model2'];
							}else{
								if($info['model2'] != ''){
									$arr = explode(',',$info["model2"]);
									foreach($arr as $v){$rs .= ",'".$v."'";}
									$rs = substr($rs,1);
									$model_sql2 = "select Brand,Series,Model from xsmart_redbook where redbookCode in (".$rs.")";
									$model2 = $db->query($model_sql2, $fetch_mode = MYSQL_ASSOC);
									echo $model2[0]["Brand"]." ".$model2[0]["Series"]."（".$model2[0]["Model"]."）";
									if(!empty($model2[1]))
									echo "<br />".$model2[1]["Brand"]." ".$model2[1]["Series"]."（".$model2[1]["Model"]."）";
								}else{
									echo '<font color="#999">未填</font>';
								}
							}
						?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">（卖车）上牌日期：</label>
                        <?= $info['date'] == '' ? '<font color="#999">未填</font>' : $info['date'] ;?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">所选经销商：</label>
                        <?php
						if($info['dealer'] != ''){
                        	$_arr = explode(',',$info["dealer"]);
							foreach($_arr as $v){$_str .= ",'".$v."'";}
							$_str = substr($_str,1);
							$dealer_sql = "select VendorCode,VendorFullName from xsmart_dealer where VendorCode in (".$_str.");";
							$dealer = $db->query($dealer_sql, $fetch_mode = MYSQL_ASSOC);
							foreach($dealer as $key=>$val){
								$_dealer .= '，<a target="_blank" href="http://chengxin.shanghaigm.com/index.php?m=default.dealer_detail&id='.$val["VendorCode"].'">'.$val["VendorFullName"]."</a>";
							}
							echo substr($_dealer,3);
						}else{
							echo '<font color="#999">未填</font>';
						}
						?>
                    </div>
                    
                    
                    <div class="form-row">
                    	<label class="form-field">（最小）金额：</label>
                        <?= $info['minPrice'] == '' ? '<font color="#999">未填</font>' : $info['minPrice']." 元";?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">最大金额：</label>
                        <?= $info['maxPrice'] == '' ? '<font color="#999">未填</font>' : $info['maxPrice']." 元";?>
                    </div>
                    
                    <div class="form-row">
                    	<label class="form-field">时间：</label>
						<?= $info["addtime"];?>
                    </div>

					<div class="btn-area" style="margin-top:0px;">
                        <a href="javascript:history.go(-1);" class="btn-general highlight" name="返回">
                        <span>返回</span></a>
                    </div>
                    <!--	提交按钮
                    <input type="hidden" name="id" value="<?= V('r:id');?>"  />
                    	  
                    <div class="btn-area"><a href="javascript:subm();" class="btn-general highlight" name="保存修改"><span>提交</span></a>
                    <input type="submit" style="display:none;" />
                    </div>
                    
                    -->
                    
                </form>
            </div>
        </div>

    </div>
    
    
</div>
<script>
	function subm(){
		 $('#this_form').submit();
	}
</script>
</body>
</html>
