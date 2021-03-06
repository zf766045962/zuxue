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
	  <p>当前位置：后台管理<span>&gt;</span><?=$adname?>管理<span>&gt;</span><?=isset($info[0]['classid']) && intval($info[0]['classid'])>0?"修改":"添加"?><?=$adname?></p></div>
         <div class="main-cont">
        <h3 class="title"><?=isset($info[0]['classid']) && intval($info['classid'])>0?"修改":"添加"?><?=$adname?></h3>
        <div class="set-area">
        <form  name="form" id="form"  method="post" action="<?php echo URL('mgr/index_1.savesubhome')?>">
                <div class="form web-info-form">
                    <div class="form-row"><label class="form-field">所属栏目</label>
                        <div class="form-cont">
                         <select disabled="disabled" name="data[classid]" onchange="change_class_select(this.value)" id="data[classid]" style="background-color:#EEEEEE" 
                            vrel="_f|ft|edit" 
                            warntip="#classidTip" 
                            style-wrong="input-error"  
                            style-focus="input-focus"  
                            oktip="#classidOkTip"                        
                         >
                          <option value="">请选择分类</option>
						  <? echo '<option '.(($rs["classid"]==$info["classid"])?'selected="selected"':'').' value="'.$rs["classid"].'">'.主题管理.'</option>';?>
						  
						  
                           <?php
                          	if(isset($classlist) && !empty($classlist)){
								foreach ($classlist as $rs){
									echo '<option '.(($rs["classid"]==$info["classid"])?'selected="selected"':'').' value="'.$rs["classid"].'">'.$rs["classname"].'</option>';
									$classlist_two= DS("mgr/ad.getclasslist",'',$rs['classid']);
									if(!empty($classlist_two) && is_array($classlist_two)){
										foreach($classlist_two as $rss){
											echo '<option '.(($rss["classid"]==$info["classid"])?'selected="selected"':'').' value="'.$rss["classid"].'">┋┣&nbsp;'.$rss["classname"].'</option>';
											$classlist_three= DS("mgr/ad.getclasslist",'',$rss['classid']);
											if(!empty($classlist_three) && is_array($classlist_three)){
												foreach($classlist_three as $rsrs){
													echo '<option '.(($rsrs["classid"]==$info["classid"])?'selected="selected"':'').' value="'.$rsrs["classid"].'">┋┣┋┣&nbsp;'.$rsrs["classname"].'</option>';
													
												}
											}
										}
									}
								}
							}
						  ?>
                         </select>
                            <span  id="classidTip" class="tips-error hidden">请选择相关信息分类</span>
                            <span id="classidOkTip" class="tips-right hidden">已选择</span>
                         </div>
                         </div>
					<div class="form-row">
							 <label class="form-field">选择板块</label>
							 <div class="form-cont">
							<select name="data[fid]">
								<option value="">请选择板块</option>
								<? $date = DS('publics._get','','bbs_forum','status = 1');?>
								<? foreach($date as $k=>$v){?>
								<option <?= $v['fid']==$info[0]["fid"]?'selected="true"':''?>  value="<?=$v['fid']?>"><?=$v['name']?></option>
	    						<? }?>
							</select>
							</div>
					 </div>		 
					<div class="form-row">
                     <label class="form-field">作者</label>
                     <div class="form-cont">
						<? if( V('r:pid') != NULL){?>
						 <input disabled="disabled" style="background-color:#EEEEEE"  name="data[author]" type="text" class="input-txt" id="descr" value="<?=isset($info[0]["author"])&&!empty($info[0]["author"])?$info[0]["author"]:""?>" size="50" maxlength="150" />   
					   <? }else{?>
					    <input disabled="disabled" style="background-color:#EEEEEE"  name="data[author]" type="text" class="input-txt" id="descr" value="<?=isset($_SESSION['XSM_CLIENT_SESSION']['screen_name'])&&!empty($_SESSION['XSM_CLIENT_SESSION']['screen_name'])?$_SESSION['XSM_CLIENT_SESSION']['screen_name']:""?>" size="50" maxlength="150" /> 
					   <? }?>
                  	</div>
                  </div>	 
						 
						 
                     <div class="form-row"><label class="form-field">标题</label>
                     <div class="form-cont">
                     <input name="data[subject]" type="text" class="input-txt" id="title" 
                     	value="<?=isset($info[0]["subject"])&&!empty($info[0]["subject"])?$info[0]["subject"]:""?>" size="50" maxlength="150"
                       />
                      
                      </div>
                  </div> 
				  
				   <div class="form-row">
                     <label class="form-field">活动类型</label>
                     <div class="form-cont">
                     <input name="data[descr]" type="text" class="input-txt" id="descr" 
                     	value="<?=isset($info[0]["descr"])&&!empty($info[0]["descr"])?$info[0]["descr"]:""?>" size="50" maxlength="150"
                       />
                  	</div>
                  </div>


				 <div class="form-row">
                     <label class="form-field">简述</label>
                     <div class="form-cont">
                     <textarea name="data[sketch]" rows="6" class="input-txt" id="description"><?=$info[0]["sketch"]?></textarea>
                  	</div>
                  </div>


                  <div class="form-row">
                     <label class="form-field">图片</label>
                     <div class="form-cont">
                     	 <?= $editor->image(1,'imgurl',isset($info[0]["imgurl"]) ? $info[0]["imgurl"] : '','上传图片','class="input-txt",style="display:none;"');?>
                        <a class="btn-general highlight" onclick="$('#imgurlBtn').click();"><span>上传图片</span></a>
                  	</div>
                  </div>
                  
                  
                  <div class="form-row">
                     <label class="form-field">排序</label>
                     <div class="form-cont">
                       <input name="data[lmorder]" type="text" class="input-txt" id="data[lmorder]"  value="<?=isset($info[0]["lmorder"])&&!empty($info[0]["lmorder"])?$info[0]["lmorder"]:"0"?>" maxlength="50">
                  	</div>
                  </div> 
				  
		<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_config.js"></script> 
		<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_all.js"></script> 
		<!--百度编辑器 结束--> 
			
				  
				   <div class="form-row">
                     <label class="form-field">内容</label>
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
                      <a class="btn-general highlight" onclick="sub()"><span><?=isset($info[0]['classid']) && intval($info[0]['classid'])>0?"确认修改":"确认添加"?></span></a>
                      
                    
                  </div>
          </div>
                </form>
            </div>
        </div>
       
        </div> 
<script type="text/javascript">
function sub(){
	if($('#title').val().length != 0){
	if($('#description').val().length != 0){	
	if($('#imgurl').val().length != 0 ){
		$("#edit_content").html(editor.body.innerHTML)
		$('#form').submit()
		}else{
			alert('请先上传主题图片')
			$('#imgurl').focus()
			}
			
		}else{
			alert('请输入简述')
			$('#description').focus()
			}
		}else{
			alert('请输入标题')
			$('#title').focus()
			}
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
