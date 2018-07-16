<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$adname?>管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>

<script src="<?php echo W_BASE_URL;?>js/select.js"></script>

</head>
<body class="main-body">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span><?=$adname?>管理<span>&gt;</span><?=$adname?></p></div>
        <div class="main-cont">
        <h3 class="title"><a class="btn-general" href="<?php echo URL('mgr/index_1.addclass3','&classid='.V('r:classid'))?>"><span>添加<?=$adname?></span></a>
        <a class="btn-general"  href="<?php echo URL('mgr/ad&bid='.$bid)?>"><span><?=$adname?>列表</span></a>
        <?=$adname?>分类列表</h3>
        <?php /*?><form id="form1" name="form1" method="post" action="">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table" style="margin-bottom:5px;">
            <tr>
              <td>
       
              <label for="key">关键字：</label>
              <input type="text" name="key" id="key" value="<?=V("r:key")?>" /> <input type="submit" name="button" id="button" value="搜索" /></td>
            </tr>
          </table>
        </form><?php */?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
		<colgroup>

				<col class="w60"/>
				<col/>
                
                <col class="w150" />
				<col class="w60" />
				<col class="w120" />
				</colgroup>
            <tr>
              <td>编号</td>
              <td>活动标题</td>
			  <td>修改时间</td>
              <td>排序</td>
              <td>操作</td>
            </tr>
            <?php
				if (isset($adlist) && !empty($adlist))
				{
					$num = 0;
					foreach($adlist as $rs)
					{
						$num = $num + 1;
						
					 $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));	

			 $couunm = DS('publics.get_total','','bbs_postcomment',"rpid = 0 and comment != '' ".' and tid='.$rs['pid'] . ' and '. 'dateline'.'>'. $beginToday);	
			
			 
			 $beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
 			 $endYesterday=mktime(0,0,0,date('m'),date('d'),date('Y'))-1;
			 $couunm1= DS('publics.get_total','','bbs_postcomment',"rpid = 0 and comment != '' ".' and tid='.$rs['pid'] . ' and dateline'.'>'. $beginYesterday.' and dateline'.'<'. $endYesterday);		
						
						
			?>
			<div id="myModal<?=$rs['pid']?>" class="reveal-modal" >	
					<?= $rs["content"];?>
					<a class="close-reveal-modal">&#215;</a>	
			</div>	
            <tr>

              <td> <?= $rs["pid"];?> </td>
              <td><?=$rs["subject"]?>
			  
			  <img src="<?=F("imgurl.geturl",$rs["imgurl"] != NULL?$rs["imgurl"]:'img/1.png')?>" style="max-width:150px; max-height:50px; float:right;" border="0" onerror="this.style.display='none'" /></td>
			 
			  
              <td><?= date('Y-m-d H:i:s',$rs["dateline"])?></td>
              <td><?= $rs["lmorder"];?></td>
              <td>
                <a class="icon-edit" href="<?=URL("mgr/index_1.addclass3","bid=".V("r:bid")."&classid=".V("r:classid")."&pid=".$rs["pid"]."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>">修改</a>
             	<a class="" href="javascript:del(<?=$rs['pid']?>);"><?=$rs["status"]==0?"<em style='color:red'>未审核</em>":'已审核'?></a>
              </td>
            </tr>
            <?php
					}
				}
			?>
            <tr>
              <td colspan="5">
              <?php
              	if (isset($adlist) && !empty($adlist))
				{
					/*
			  ?>
                <input type="button" name="chkall" id="chkall" onclick="selchk('id')" value="全选/反选" />
   				<input type="button" id="auditall" name="auditall" value="批量审核"  onclick="chkallurl('id','<?=URL("mgr/ad.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=audit&flagvalue=1&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要审核选中信息吗？')" />
                <input type="button" id="auditall" name="auditall" value="批量推荐"  onclick="chkallurl('id','<?=URL("mgr/ad.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=recommend&flagvalue=1&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要推荐选中信息吗？')" />
   				<input type="button" id="auditall" name="auditall" value="批量置顶"  onclick="chkallurl('id','<?=URL("mgr/ad.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=top&flagvalue=1&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要置顶选中信息吗？')" />
   				&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" id="delall" name="delall" value="批量删除"  onclick="chkallurl('id','<?=URL("mgr/ad.delad","bid=".V("r:bid")."&classid=".V("r:classid")."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要删除选中的信息吗？')" />
                
                <?php */ echo $pager;?>
              <?php
				}
				else
				{
			  ?>
                <div class='guide_info content_none'>没有查询到与条件相匹配的数据</div>
              <?php
				}
			  ?>
              </td>
            </tr>
          </table>
</div>
</script><script type="text/javascript" src="js6/jquery.reveal.js">
</script><style type="text/css">
.reveal-modal-bg { position: fixed; height: 100%; width: 100%; z-index: 100; display: none; top: 0; left: 0; background:rgba(00, 00, 00, 0.8) }		.reveal-modal { visibility: hidden; top: 150px; left: 45%; margin-left: -300px; width: 700px; position: absolute; z-index: 101; padding: 30px 40px 34px; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; -moz-box-shadow: 0 0 10px rgba(0,0,0,.4); -webkit-box-shadow: 0 0 10px rgba(0,0,0,.4); -box-shadow: 0 0 10px rgba(0,0,0,.4); background-color: #FFF; 		}			.reveal-modal.small 		{ width: 200px; margin-left: -140px;}	.reveal-modal.medium 		{ width: 400px; margin-left: -240px;}	.reveal-modal.large 		{ width: 600px; margin-left: -340px;}	.reveal-modal.xlarge 		{ width: 800px; margin-left: -440px;}		.reveal-modal .close-reveal-modal { font-size: 22px; line-height: 0.5; position: absolute; top: 8px; right: 11px; color: #333; text-shadow: 0 -1px 1px rbga(0,0,0,.6); font-weight: bold; cursor: pointer; 		}

.reveal-modal img{max-width:686px}
</style>
	
        <script type="text/javascript">
		function del(id){
			var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								//document.getElementById('name'+id1).innerHTML = t1
								//document.getElementById("load11").innerHTML=xmlhttp.responseText;
									//var obj1 = eval( "(" + xmlhttp.responseText + ")" );//转换后的JSON对象;
//									if(obj1.status == 202){
//										alert('操作失败')
//										location.href =""	
//										}else{
										location.href =""	
										//}
								}
					}
						xmlhttp.open("GET","<?=URL("mgr/index_1.del",'&id=')?>"+id+'&class=990',true);
						xmlhttp.send();		
			} 
</script>
</body>
</html>
