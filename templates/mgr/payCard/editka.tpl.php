<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/My97DatePicker/WdatePicker.js"></script>
</head>
<body>

<div class="main-wrap">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>充值卡<span>&gt;</span>编辑听书卡</p></div>
    <div class="main-cont">
        <h3 class="title">编辑听书卡</h3>
        <div class="set-area">
        	<div class="form web-info-form">
            	<form action="<?= URL('mgr/payCard.editka_save');?>" name="form1" method="post" id="this_form">
                	<div class="form-row">
                        <label class="form-field">名称：</label>
                        <div class="form-cont">
                            <input name="title" id="title" value="<?= $info['title'];?>" class="input-txt" type="text" style="width:200px;" />
                            <p class="form-tips">* 请填写名称，如：宝马企业听书卡100元第一批</p>
                        </div>
                    </div>
                   	<div class="form-row">
                        <label class="form-field">所属类型：</label>
                        <div class="form-cont">
                          <select name="classid" id="classid">
                          	<option value="0" selected="selected">--请选择--</option>
                          	<?php $class = DS("mgr/book.getclasslist",'','3 and parentid = 12');
							if(!empty($class)){
								foreach($class as $val){
							?>
                            <option value="<?= $val['classid'];?>" <?= $val['classid'] == $info['classid'] ? 'selected="selected"' : '' ;?>><?= $val['classname'];?></option>
                            <?php }}?>
                          </select>
                        </div>
                    </div>

                  	<!--<div class="form-row">
                        <label class="form-field">类型：</label>
                        <div class="form-cont">
                          <select name="card_type" id="card_type">
                          	<option value="0" selected="selected">--请选择--</option>
                          	<?php $card_type = explode(',',$info['card_type']);
								foreach($card_type as $val){
							?>
                            <option value="<?= $val;?>"><?= $val;?></option>
                            <?php }?>
                          </select>
                        </div>
                    </div>-->

                    <div class="form-row">
                        <label class="form-field">有效期限：</label>
                        <div class="form-cont">
                            <input name="startDate" id="startDate" class="input-txt" type="text" value="<?= $info['startDate'] ? $info['startDate'] : date('Y-m-d H:i:00');?>" style="width:120px;" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:00'})"/>至 
                            <input name="endDate" id="endDate" class="input-txt" type="text" value="<?= $info['endDate'] ? $info['endDate'] : '' ;?>" style="width:120px;" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:00'})"/>
                        </div>
                    </div>
                    
                   <div class="form-row">
                        <label class="form-field">是否有效：</label>
                        <div class="form-cont">
                            <label>是 <input type="radio" name="isValid" value="1" <?= $info['isValid'] ? 'checked="checked"' : '';?> /></label>
                            <label>否 <input type="radio" name="isValid" value="0" <?= $info['isValid'] ? '' : 'checked="checked"';?>/></label>
                        </div>
                    </div>
                    
                    <input type="hidden" name="id" value="<?= $info['id'];?>" />
					<div class="btn-area" style="margin-top:0px;">
                        <a href="javascript:;" onclick="check()" class="btn-general highlight" name="保存">
                        <span>保存</span></a>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
    
    
</div>
<script>
	function check(){
		if($('#title').val() == ''){
			alert('请填写名称');
			return false;
		}
		
		if($('#startDate').val() == '' || $('#endDate').val() == ''){
			alert('请填写有效期限');
			return false;
		}

		$('#this_form').submit();
	}
</script>
</body>
</html>
