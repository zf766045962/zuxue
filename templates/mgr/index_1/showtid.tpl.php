<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php header('Cache-control: private, must-revalidate');?> 
<title>内容管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script src="<?php echo W_BASE_URL;?>js/album/calendar.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/kind/kindeditor.js"></script>

<script src="<?php echo W_BASE_URL;?>js/article.js" type="text/javascript"></script>
<script src="<?php echo W_BASE_URL;?>js/select.js"></script>
<link href="<?php echo W_BASE_URL;?>js/alert/jquery.alerts.css" rel="StyleSheet">
<script src="<?php echo W_BASE_URL;?>js/alert/jquery.alerts.js" type="text/javascript"></script>

<script>
function checkAll(obj){
	var form_obj=document.getElementById(obj);
	var input_obj=form_obj.getElementsByTagName('input');
	for(i=0;i<input_obj.length;i++){
		if(input_obj[i].type=='checkbox'){
			if(input_obj[i].checked==true){
				input_obj[i].checked='';
			}else{
				input_obj[i].checked='checked';
			}
		}
	}
}

function check(){
	if (document.form1.serch1.value=="aid" && isNaN(document.form1.detail.value))
		{
			alert("内容id必须为数字！");
			document.form1.detail.focus();
			return false;
		}
	return true;
	}
</script>

</head>
<body class="main-body">

<!--得到管理员权限数组的调用函数-->
<?php 	
 function objectToArray($e){
	$e=(array)$e;
	foreach($e as $k=>$v){
	if( gettype($v)=='resource' ) return;
	if( gettype($v)=='object' || gettype($v)=='array' )
	$e[$k]=(array)objectToArray($v);
	}
	return $e;
} 
	//得到管理员表中的信息
	$permissions = DS('publics.get_message','',$_SESSION["XSM_CLIENT_SESSION"]["gid"],'gid','admin_group');
	$db	=	APP::ADP('db'); 
	
	
	//var_dump(json_decode($permissions['permissions']));
    //使用函数得到数组的每个元素值
	
	
	//$per_array = objectToArray(json_decode($permissions['permissions'],true));
	
	$per_array = json_decode($permissions['permissions'],true);
	//var_dump($permissions);
	echo '<div style="display:none">';
	echo count(explode(',',$permissions['permissions'])).'<br />';
	var_dump($per_array);
	echo '</div>';
	//$per_array = DS('publics.objectToArray','',$per_array_o);
?>


<table class="yc">
	<tr>
             <!-- 
             <td width="178" valign="top" style="border-right:1px #DFDFDF solid;">
             <ul class="main_left">
              <?php if(isset($rs)&&!empty($rs)){ 
              $i=0;
                foreach($rs as $r){ 
                    $catid=V('r:catid');
                        if(empty($catid)){
                            $catid=$rs[0]['classid'];
                            }//<?=V('r:classid')==$r['classid']?"class='current'":''>
                              ?>
                        <li <?php if($catid==$r['classid']||(V('r:catid')==$r['classid'])){ echo "class='current'";}?>><a target="mainframe" router="content/0/<?=$i?>" href="/admin.php?m=mgr/arcticlepublish.articlelist&amp;statue=0&amp;modelid=<?=V('r:modelid');?>&amp;catid=<?php echo $r['classid']?>" title="<?php echo $r['classname']?>"><?php echo $r['classname']?></a></li>
              <?php } $i++;}?>
                        
                        
                    </ul></td> -->
	<td valign="top" style="border-left:1px #DFDFDF solid; overflow:auto; overflow-y:hidden;"><div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>内容管理<span>&gt;</span>内容发布</p></div>
        <div class="main-cont" style=" line-height:3">
        <h3 class="title">
       <?php /*?> <a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.articlelist&statue=1&lmid='.$lmid)?>"><span>回收站</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.articlelist&modelid='.V('r:modelid').'&catid='.$catid)?>"><span>内容列表</span></a>
             
        <a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.add&modelid='.V('r:modelid').'&catid='.$catid)?>"><span>内容发布</span></a><?php */?>
        
        内容列表
		</h3>
<? $ssa=$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];?>

<? $ssa = str_replace('&','>',$ssa)?>
		  <div class="set-area" id="data_list">
			<div class="yang_info" style="height:40px; line-height:24px;">
        <form action="<?php echo URL('mgr/index_1.showtid','&classid='.V('r:classid'))?>" name="form1" method="post" id="form1" onsubmit="return check()">
        <input type="hidden" name="statue" value="0" />
		<input type="hidden" name="lmid" value="<?php echo $lmid?>" />
        关键字：
        <input class="input-txt" type="text" name="key" value=""/>  
		
        <!--<span style="display:inline-block; line-height:24px;">属性：</span>
		 <select name="serch2" class="select1">

			<option value="0">请选择……</option>
			<option value="isreview0" <?php if($data['serch2']=='isreview0') echo "selected"?>>未审核</option> 
			<option value="isreview1" <?php if($data['serch2']=='isreview1') echo "selected"?>>已审核</option> 

			<option value="levels0" <?php if($data['serch2']=='levels0') echo "selected"?>>未推荐</option> 
			<option value="levels1" <?php if($data['serch2']=='levels1') echo "selected"?>>已推荐</option> 

			<option value="ontop0" <?php if($data['serch2']=='ontop0') echo "selected"?>>未置顶</option>
			<option value="ontop1" <?php if($data['serch2']=='ontop1') echo "selected"?>>已置顶</option>

			<option value="laydown0" <?php if($data['serch2']=='laydown0') echo "selected"?>>未搁置</option>
			<option value="laydown1" <?php if($data['serch2']=='laydown1') echo "selected"?>>已搁置</option> 

        </select> -->

        <span style="display:inline-block; line-height:24px;">排序：</span>
		
		<select name="select">
					 <option value= "" >选择类型</option> 	
					 <option value= "dateline"  >发帖时间</option> 
					 <option value= "looknum"  >阅读数量</option> 
					 <option value= "alltip"  >热度</option> 		
				    
		</select>	
		
        <input type="hidden" value="<?=V('r:modelid')?>" name="modelid">
        <input type="hidden" value="<?=V('r:catid')?>" name="catid">
        <input class="submit" type="submit" value="搜 索" />
		<!--<a href="#" class="btn-general"><span>搜 索</span></a>-->
        </form>
			</div>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>

					<col class="w70" />
					<col/>
                  
                    <col class="w80" />
                    <col class="w160" />
                    <col class="w100" /> 
                    <col class="w100" /> 
					<col class="w100"  />
                    <col class="w100" /> 
					<col class="w70"  />
					<col class="w150"  />
	
					
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">帖子标题(点击标题查看内容)</div></th>  	
                        <th><div class="th-gap">发布者</div></th>	
                        <th><div class="th-gap">发贴时间</div></th>	
						<th><div class="th-gap">今日回复数量</div></th> 
						<th><div class="th-gap">昨日回复数量</div></th> 
						
						<th><div class="th-gap">全部回复数量</div></th> 
						<th><div class="th-gap">全部访问数量</div></th>
                        <th><div class="th-gap">排序</div></th>
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
	<!--页面标题行开始-->	
				<tbody id="recordList">                
                 <?php 
				 //var_dump($rss);
				 if(isset($rss)&&!empty($rss)){ 
				 foreach($rss as $key=>$val){
					 
				 $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));	

			 $couunm = DS('publics.get_total','','bbs_postcomment',"rpid = 0 and comment != '' ".' and tid='.$val['pid'] . ' and '. 'dateline'.'>'. $beginToday);	
			
			 
			 $beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
 			 $endYesterday=mktime(0,0,0,date('m'),date('d'),date('Y'))-1;
			 $couunm1= DS('publics.get_total','','bbs_postcomment',"rpid = 0 and comment != '' ".' and tid='.$val['pid'] . ' and dateline'.'>'. $beginYesterday.' and dateline'.'<'. $endYesterday);
		    	 
					 
				 ?>
				<div id="myModal<?=$val['pid']?>" class="reveal-modal">	
					<?= $val["content"];?>
					<a class="close-reveal-modal">&#215;</a>	
				</div>
					<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">

                            <td><?php echo $val['pid']?></td>
							<td><a href="javascript:;" data-reveal-id="myModal<?=$val['pid']?>"><dd style="color:<?=$val['sizecolor']?>"><?=htmlspecialchars($val["subject"])?></dd></a></td>
							<td><?=$val["author"]?></td>
							<td><?=date('Y-m-d H:i:s',$val["dateline"])?></td>
							
							
							<td><?=$couunm?></td>
							<td><?=$couunm1?></td>
							<td><?=$val["alltip"]?></td>
							<td><?=$val["looknum"]?></td>
							
							
							<td><a href="javascript:lmorder(<?=$val['pid']?>);" id="lmor<?=$val['pid']?>" ><?=$val["lmorder"]?></a>
								<em style="display:none" id="text<?=$val['pid']?>"><input type="text" id="con<?=$val['pid']?>" size='5' onblur="chan(<?=$val['pid']?>)" onkeyup="value=value.replace(/[^1234567890-]+/g,'')"></em>
							</td>
							<td>
							<a class="" href="javascript:is_show(<?=$val['pid']?>);"><?=$val["is_show"]==0?"取消显示":"<em style='color:red'>恢复显示</em>"?></a>&nbsp;
							<a class="" href="javascript:;" 
								<? if($val["showindex"] == 0){?>
									onclick="alerts(<?=$val['pid']?>)" data-reveal-id="myModalshow"
								<? }else{?>
									onclick="alert22(<?=$val['pid']?>)"
								<? }?>
							><?=$val["showindex"]==0?"设置热":"<em style='color:red'>取消热</em>"?></a>	
							
							<?php /*?><a class="" href="<?=URL('mgr/index_1.addclass1','&pid='.$val['pid'])?>"><?=$val["is_showindex"]==0?"首页显示":"<em style='color:red'>取消显示</em>"?></a><?php */?>
							</td>
							
             
			<?php } }?>
				</tr>
			<tr>
				<td colspan="10">
					<div class="pages" align="center">
						<?= !empty($page['info'])?$page['pagehtml']:''?>
					</div>
				</td>	
						
             </tr>    
	
			</tbody>
			</table>
            </div>
          

        </div></td>
	
		<input type="hidden" id="id" value=""> 
<div id="myModalshow" class="reveal-modal" align="center"> 				

  <div class="form-item"><label for="color">请选择标题颜色:</label><input type="text" id="color" name="color" value="#123456" /></div><div id="picker"></div>
<input type="button" value="确定" id="qd">

<a class="close-reveal-modal">&#215;</a>
</div> 

 
 <script type="text/javascript" src="js1/js5/farbtastic.js"></script>
 <link rel="stylesheet" href="js1/js5/farbtastic.css" type="text/css" />
 <script type="text/javascript" charset="utf-8">
  function alert22(id){
	   var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
										//alert(xmlhttp.responseText)
										location.href =""
								}
					}
						xmlhttp.open("GET","<?=URL("mgr/index_1.showindex",'&id=')?>"+id,true);
						xmlhttp.send();		
	  } 
  function alerts(id){
		$("#id").val(id)
	  } 	
  $(document).ready(function() {
    $('#demo').hide();
    $('#picker').farbtastic('#color');
  });
  $("#qd").click(function(){
	  
	 var id 	= $("#id").val()
	 
	str=$("#color").val();
	color=str.replace("#","");

	
	 var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
										//alert(xmlhttp.responseText)
										location.href =""
								}
					}
						xmlhttp.open("GET","<?=URL("mgr/index_1.showindex",'&id=')?>"+id+'&col='+color,true);
						xmlhttp.send();		
	  
	  })	
 </script>




		
</script><script type="text/javascript" src="js6/jquery.reveal.js">
</script><style type="text/css">
.reveal-modal-bg { position: fixed; height: 100%; width: 100%; z-index: 100; display: none; top: 0; left: 0; background:rgba(00, 00, 00, 0.8) }		.reveal-modal { visibility: hidden; top: 150px; left: 50%; margin-left: -300px; width: 700px; position: absolute; z-index: 101; padding: 30px 40px 34px; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; -moz-box-shadow: 0 0 10px rgba(0,0,0,.4); -webkit-box-shadow: 0 0 10px rgba(0,0,0,.4); -box-shadow: 0 0 10px rgba(0,0,0,.4); background-color: #FFF; 		}			.reveal-modal.small 		{ width: 200px; margin-left: -140px;}	.reveal-modal.medium 		{ width: 400px; margin-left: -240px;}	.reveal-modal.large 		{ width: 600px; margin-left: -340px;}	.reveal-modal.xlarge 		{ width: 800px; margin-left: -440px;}		.reveal-modal .close-reveal-modal { font-size: 22px; line-height: 0.5; position: absolute; top: 8px; right: 11px; color: #333; text-shadow: 0 -1px 1px rbga(0,0,0,.6); font-weight: bold; cursor: pointer; 		}
.reveal-modal img{max-width:686px}
</style>
		
        




    <script type="text/javascript">
		function is_show(id){
			var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
										location.href =""
								}
					}
						xmlhttp.open("GET","<?=URL("mgr/index_1.is_showtip",'&id=')?>"+id,true);
						xmlhttp.send();		
			} 
				
				
		function lmorder(id){
			document.getElementById('lmor'+id).style.display="none";
			document.getElementById('text'+id).style.display="";
			
			document.getElementById('con'+id).value  = document.getElementById('lmor'+id).innerHTML
			$('#con'+id).focus()	
		} 		
		function chan(id){
			var xmlhttp;
					var lom = document.getElementById('con'+id).value
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
									document.getElementById('lmor'+id).style.display="";
									document.getElementById('text'+id).style.display="none";
									document.getElementById('lmor'+id).innerHTML  = document.getElementById('con'+id).value
								}
					}
						xmlhttp.open("GET","<?=URL("mgr/index_1.update_lmorder",'&id=')?>"+id+'&lmorder='+lom,true);
						xmlhttp.send();		
			}
			function showindex(id){
				alert(id)
				}
	
    	$('.td-hover').each(function(){
			var obj = $(this);
			var del = obj.children('.fold-cotrol').find('a'),tdMar = obj.find('.td-mar');
			if(tdMar.height() > 60) {
				tdMar.css({'overflow':'hidden','height':'60px'});
				obj.hover(function(){
					del.removeClass('hidden');
				},function(){
					del.addClass('hidden');
				});
			}
		});
    </script>
	     
		 <div style="clear:both;"></div>
		 </tr>
</table>
</body>
</html>
