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
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/kindeditor/kindeditor.js"></script>
<script src="<?php echo W_BASE_URL;?>js/select.js"></script>


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
<table class="yc">
 <tr>
<?php $catid = V('r:catid',V('r:cid'));
	if($catid == ''){
		 $catid = V('r:classfy');
	}
?>
		
<td valign="top" style="border-left:1px #DFDFDF solid; overflow:auto; overflow-y:hidden;"><div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>内容管理<span>&gt;</span>内容发布</p></div>
        <div class="main-cont" style=" line-height:3">
        <h3 class="title">
        <!--<a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.articlelist&statue=1&lmid='.$lmid)?>"><span>回收站</span></a>-->
        <a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.articlelist&modelid='.V('r:modelid').'&catid='.$catid)?>"><span>内容列表</span></a>
        
        <a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.add&modelid='.V('r:modelid').'&catid='.$catid)?>"><span>内容发布</span></a>
        内容列表
		</h3>

		  <div class="set-area" id="data_list">
			<div class="yang_info" style="height:40px; line-height:24px;">
        <form action="<?php echo URL('mgr/arcticlepublish.serch')?>" name="form1" method="post" id="form1" onsubmit="return check()">
        <input type="hidden" name="statue" value="0" />
		<input type="hidden" name="lmid" value="<?php echo $lmid?>" />
        <select name="serch1" class="select1">
			<!-- <option value="0">请选择……</option> -->
			<option value="title" <?php if($data['serch1']=='title') echo "selected"?>>标题</option>
			<!-- <option value="aid" <?php if($data['serch1']=='aid') echo "selected"?>>id</option>-->
			</select>
        <input class="input-txt" type="text" name="detail" value="<?php echo $data['detail']?>"/>  
		
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

        <span style="display:inline-block; line-height:24px;">类别：</span>
		<select class="select1" name="classfy"><?php echo $info?></select>
        <input type="hidden" value="<?=V('r:modelid')?>" name="modelid">
        <input type="hidden" value="<?=V('r:catid')?>" name="catid">
        <input class="submit" type="submit" value="" style="display:none;"/>
		<a href="javascript:$('#form1').submit();" class="btn-general"><span>搜 索</span></a>
        </form>
			</div>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
                	<col class="w40" />
					<col class="w70" />
					<col/>
                    <col class="w50" /><col class="w50" /><col class="w50" />
                    <col class="w80" />
                    <col class="w140" /> 
					<col class="w280" style="width:120px;" />
	
					
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
                    	<th><div class="th-gap">&nbsp;&nbsp;</div></th>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">内容标题</div></th>  	
                        <th><div class="th-gap">审核</div></th>
                        <th><div class="th-gap">推荐</div></th>
                        <th><div class="th-gap">置顶</div></th>
                        <th><div class="th-gap">发布者</div></th>	
                        <th><div class="th-gap">发布时间</div></th>
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
                
                 <?php 
				 //var_dump($rss);
				 if(isset($rss)&&!empty($rss)){ 
				 foreach($rss as $key=>$val){
				 ?>
					<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><input type="checkbox" name="id" value="<?php echo $val['id']?>" /></td>
                    <td><?php echo $val['id']?></td>
                    <td><div class="td-nowrap"><a href="<?php echo URL('mgr/arcticlepublish.add','id='.$val['id']),'&modelid=61','&catid='.$catid;?>"
                   <?php
				   		/*switch(V("r:lmid"))
						{
							case "2":
								echo "target=\"_blank\" href=\"/index.php?m=index.news3&id=".$val['id']."\"";
							break;
							
							case "3":
								echo "target=\"_blank\" href=\"/index.php?m=index.share1&id=".$val['id']."\"";;
							break;
							
							case "33":
								echo "target=\"_blank\" href=\"/index.php?m=index.news3&type=qiye&id=".$val['id']."\"";;
							break;
							
							default:
								echo "href=\"javascript:;"."\"";
							break;
						}*/
                   		
				   ?>
                   title="<?php echo "[".$val['classname']."]".$val['title'];?>" ><?php echo "[".$val['classname']."]".$val['title'];?></a></div>
                   </td>
                  
                  
                   	<!-- 审核 -->
                   	<td style="text-align:center;">
                   	<a href="javascript:status('isreview',<?= $val['id'];?>);"><img src="img/<?= $val['isreview']?'yes':'no'?>.gif" id="isreview<?= $val['id'];?>"/></a>
                    </td>
                    <!-- 推荐 -->
                   	<td style="text-align:center;">
                    <a href="javascript:status('levels',<?= $val['id'];?>);"><img src="img/<?= $val['levels']?'yes':'no'?>.gif" id="levels<?= $val['id'];?>"/></a>
                    </td>
                    <!-- 置顶 -->
                   	<td style="text-align:center;">
					<a href="javascript:status('ontop',<?= $val['id'];?>);"><img src="img/<?= $val['ontop']?'yes':'no'?>.gif" id="ontop<?= $val['id'];?>"/></a>
                    </td>
                    
			<script>
                function status(key,val){
                    var img = key + val;
                    var src = $('#'+img).attr('src');
                    if(src == 'img/no.gif'){
						$.post('<?= URL("mgr/arcticlepublish.updAttr");?>',{'id':val,'type':key+1},function(e){
							if(e == 1){
								$('#'+img).attr('src','img/yes.gif');
							}else{
								alert('操作失败');
							}
						});
                    }else{
						$.post('<?= URL("mgr/arcticlepublish.updAttr");?>',{'id':val,'type':key+0},function(e){
							if(e == 1){
								$('#'+img).attr('src','img/no.gif');
							}else{
								alert('操作失败');
							}
						});
                    }
                }
            
            </script>
                   
                    <td><div class="td-nowrap"><?php echo $val['username'];?></div></td>
                    <td><div class="td-nowrap"><?php echo $val['inputtime'];?></div></td>
                    
                    <?php $canshu="&lmid=".$lmid."&statue=0&serch1=".$data['serch1']."&serch2=".$data['serch2']."&classfy=".$data['classfy']."";
					if($data['detail']!='') $canshu.="&detail=".$data['detail'];
					?>
                    
                    <td>
                    <a class="icon-edit" href="<?php echo URL('mgr/arcticlepublish.add','id='.$val['id']),'&modelid=61','&catid='.$catid;?>">修改</a>
                        
                    <a class="icon-del" href="<?php echo URL('mgr/arcticlepublish.delnews','id='.$val['id']),'&modelid=61','&catid='.$catid;?>">删除</a>
                    </td>
                    
                    </tr>
			<?php } }?>
					<tr>
						<td colspan="9">
                         
                            <?php if(!empty($rss)){ ?>
                            <input type="button" name="chkall" id="chkall" onclick="selchk('id')" value="全选/反选" />
                            <input type="button" id="auditall" name="auditall" value="批量审核"  onclick="chkallurl('id','<?=URL("mgr/arcticlepublish.update","modelid=".V("r:modelid")."&classid=".$catid."&flag=update&flagtype=isreview&flagvalue=1&levels=".V("r:levels")."&isreview=".V("r:isreview")."&ontop=".V("r:ontop")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要审核选中信息吗？')" />

							<input type="button" id="auditall" name="auditall" value="批量去审" onclick="chkallurl('id','<?=URL("mgr/arcticlepublish.update","modelid=".V("r:modelid")."&classid=".$catid."&flag=update&flagtype=isreview&flagvalue=0&levels=".V("r:levels")."&isreview=".V("r:isreview")."&ontop=".V("r:ontop")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要去审选中信息吗？')" />

                            <input type="button" id="auditall" name="auditall" value="批量推荐"  onclick="chkallurl('id','<?=URL("mgr/arcticlepublish.update","modelid=".V("r:modelid")."&classid=".$catid."&flag=update&flagtype=levels&flagvalue=1&levels=".V("r:levels")."&isreview=".V("r:isreview")."&ontop=".V("r:ontop")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要推荐选中信息吗？')" />

							<input type="button" id="auditall" name="auditall" value="批量解推"  onclick="chkallurl('id','<?=URL("mgr/arcticlepublish.update","modelid=".V("r:modelid")."&classid=".$catid."&flag=update&flagtype=levels&flagvalue=0&levels=".V("r:levels")."&isreview=".V("r:isreview")."&ontop=".V("r:ontop")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要解推选中信息吗？')" /> 

                            <input type="button" id="auditall" name="auditall" value="批量置顶"  onclick="chkallurl('id','<?=URL("mgr/arcticlepublish.update","modelid=".V("r:modelid")."&classid=".$catid."&flag=update&flagtype=ontop&flagvalue=1&levels=".V("r:levels")."&isreview=".V("r:isreview")."&ontop=".V("r:ontop")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要置顶选中信息吗？')" />

							<input type="button" id="auditall" name="auditall" value="批量解顶"  onclick="chkallurl('id','<?=URL("mgr/arcticlepublish.update","modelid=".V("r:modelid")."&classid=".$catid."&flag=update&flagtype=ontop&flagvalue=0&levels=".V("r:levels")."&isreview=".V("r:isreview")."&ontop=".V("r:ontop")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要解顶选中信息吗？')" />

                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="button" id="delall" name="delall" value="批量删除"  onclick="chkallurl('id','<?=URL("mgr/arcticlepublish.delnews","modelid=".V("r:modelid")."&catid=".$catid."&isreview=".V("r:isreview")."&isreview=".V("r:isreview")."&ontop=".V("r:ontop")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要删除选中的信息吗？')" /><?=$page;?>
                            
						
                           
                          
                   
   						   
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
          

        </div></td>
		
        
 

    <script type="text/javascript">
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
