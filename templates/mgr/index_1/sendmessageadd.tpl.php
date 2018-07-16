<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$adname?>管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>
</head>
<?php $editor = APP :: N('editorModule');?>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span><?=$adname?>管理<span>&gt;</span><?=isset($info[0]['classid']) && intval($info[0]['classid'])>0?"修改":"发送"?><?=$adname?></p></div>
         <div class="main-cont">
        <h3 class="title"><?=isset($info[0]['classid']) && intval($info['classid'])>0?"修改":"发送"?><?=$adname?></h3>
        <div class="set-area">
        <form  name="form" id="form"  method="post" action="<?php echo URL('mgr/index_1.savesendmessage')?>">
                <div class="form web-info-form">
       
				  
		<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_config.js"></script> 
		<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_all.js"></script> 
		<!--百度编辑器 结束--> 
			
				  
				   <div class="form-row">
                     <label class="form-field">编辑系统消息</label>
                     <div class="form-cont">
                       <textarea id="edit_content" name="edit_content"><?=$info[0]['content']?></textarea>
						<script type="text/javascript"> 
							var editor = new UE.ui.Editor(); 
							editor.render("edit_content"); 
						</script>
                  	</div>
                  </div> 
				  
                    <div class="btn-area">
                      <input type="hidden" name="data[id]" id="data[id]" value="<?=V("g:id")?>" />
               		  <input type="hidden" name="data[pid]" id="data[bid]" value="<?=V("g:pid")?>" />
                      <a class="btn-general highlight" onclick="sub()"><span><?=isset($info[0]['classid']) && intval($info[0]['classid'])>0?"确认修改":"确认发送"?></span></a>
                      
                    
                  </div>
          </div>
                </form>
            </div>
        </div>
       
        </div> 
<script type="text/javascript">
function sub(){
	
	
		$("#edit_content").html(editor.body.innerHTML)
		$('#form').submit()
		
	
	}
var valid = Xwb.use('Validator', {
	form: '#form',
	comForm : true,
	validators : {
					'edit':function(elem, v, data, next)
			 		{
						if($("select[id='data[classid]']").val()=="")
						{
							data.m = '该项为必选';
							this.report(false, data);
						} 
						else
						{ 
							data.m = '验证通过';
							this.report(true, data);
						}
						next();
			 		}
				}
			});
</script>

<script type="text/javascript">
function change_class_select(expression){
	/* 总分类 */
	if(expression==1){
		display_block_all();
	/* 广告图片区 */
	}else if(expression==2 || expression==6 || expression==8 || expression==10 || expression==13){
		display_none_all();
	/* 软硬件区 */
	}else if((parseInt(expression) > 13 && parseInt(expression) < 24)){
		display_block_two('简述','价格');
	/* 精品推荐区 */
	}else if(expression==4){
		display_block_one('价格');	
	/* 猜你喜欢区 */	
	}else if(expression==5){
		display_block_all('折扣价','原价','折扣');	
	/* 招商专区/会展中心 */
	}else if(expression==11 || expression==24 || expression==25){
		display_none_all();
	/**/
	}else{
		display_block_one('备注');	
	}
}
function display_none_all(){
	$("#beizhu1").hide();
	$("#beizhu2").hide();
	$("#beizhu3").hide();
}
function display_block_all(name1,name2,name3){
	if(name1==''){
		name1 = '备注1';
	}
	if(name2==''){
		name2 = '备注2';
	}
	if(name3==''){
		name3 = '备注3';
	}
	$("#beizhu1_name").html(name1);
	$("#beizhu2_name").html(name2);
	$("#beizhu3_name").html(name3);
	$("#beizhu1").show();
	$("#beizhu2").show();
	$("#beizhu3").show();
}
function display_block_one(name){
	$("#beizhu1_name").html(name);
	$("#beizhu1").show();
	$("#beizhu2").hide();
	$("#beizhu3").hide();	
}
function display_block_two(name1,name2){
	$("#beizhu1_name").html(name1);
	$("#beizhu2_name").html(name2);
	$("#beizhu1").show();
	$("#beizhu2").show();
	$("#beizhu3").hide();	
}
</script>  
</body>
</html>
