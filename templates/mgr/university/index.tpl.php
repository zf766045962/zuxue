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
	<div class="path"><p>当前位置：后台管理<span>&gt;</span><?php if($bid==21){echo "院校banner";}else if($bid==22){echo "院校简介";}else if($bid==23){echo "院校新闻";}else if($bid==24){echo "院校课程";}?>管理<span>&gt;</span><?php if($bid==21){echo "院校banner";}else if($bid==22){echo "院校简介";}else if($bid==23){echo "院校新闻";}else if($bid==24){echo "院校课程";}?></p></div>
        <div class="main-cont">
        <!--<h3 class="title"><a class="btn-general" href="<?php echo URL('mgr/ad.add&bid='.$bid)?>"><span>添加<?=$adname?></span></a>
        <a class="btn-general"  href="<?php echo URL('mgr/ad&bid='.$bid)?>"><span><?=$adname?>列表</span></a>
        <?=$adname?>分类列表</h3>-->
        <h3 class="title"><!--<a class="btn-general" href="#"></a><a class="btn-general"  href="#"></a>--><?php if($bid==21){echo "院校banner";}else if($bid==22){echo "院校简介";}else if($bid==23){echo "院校新闻";}else if($bid==24){echo "院校课程";}?>列表</h3> 
        <form id="form1" name="form1" method="post" action="<?=URL("mgr/university.adlist","bid=".V("r:bid")."")?>">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table" style="margin-bottom:5px;">
            <tr>    
              <td>      
                <label for="orid1">院校：</label>
                <select name="orid1" id ="orid1">
					<option value="">请选择院校</option>
			<?php 
                    foreach($univer as $cat){
						if($cat['linkageid'] == V('r:orid1')){
            ?>
					<option value="<?php echo $cat['linkageid']?>" selected="selected"><?php echo $cat['name']?></option>
			<?php	
						}else{
			?>
            		<option value="<?php echo $cat['linkageid']?>" ><?php echo $cat['name']?></option>
			<?php				
						}
                    }
            ?>
			  </select>
              <input type="checkbox" name="recommend" id="recommend" value="1" <?=V("r:recommend")==1?'checked="checked" ':''?>/>
              <label for="recommend">推荐</label>
                <input type="checkbox" name="audit" id="audit" value="1"  <?=V("r:audit")==1?'checked="checked" ':''?>/>
              <label for="audit">审核</label>
              <input type="checkbox" name="top" id="top" value="1"  <?=V("r:top")==1?'checked="checked" ':''?>/>
              <label for="top">置顶 </label>
              <label for="key">关键字：</label>
              <input type="text" name="key" id="key" value="<?=V("r:key")?>" /> <input type="submit" name="button" id="button" value="搜索" /></td>
            </tr>
          </table>
        </form>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
		<colgroup>
				<col class="w30" />
				<col class="w60"/>
				<col/>
                <col class="w150" />
                <col class="w170" />
				<col class="w150" />
				</colgroup>
            <tr>
              <td>&nbsp;</td>
              <td>编号</td>
              <td>标题</td>
              <td>发布时间</td>
              <td>属性</td>
              <td>操作</td>
            </tr>
            <?php
				if (isset($adlist) && !empty($adlist))
				{
					$num = 0;
					foreach($adlist as $rs)
					{
						$num = $num + 1;
			?>
            <tr>
              <td><input type="checkbox" name="id" value="<?=$rs["id"]?>" id="id" /></td>
              <td> <?= $rs["id"];?> </td>
              <td><a href="<?=URL("mgr/university.add","bid=".V("r:bid")."&classid=".V("r:classid")."&id=".$rs["id"]."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>"><?=$rs["title"]?></a><a href="<?=$rs["http"]?>" target="_blank"><img src="<?=F("imgurl.geturl",$rs["imgurl"])?>" style="max-width:150px; max-height:150px; float:right;" border="0" onerror="this.style.display='none'" /></a></td>
              <td><?=date("Y-m-d H:i:s",strtotime($rs["times"]))?></td>
              <td>	<?=$rs["recommend"]==1?'<a href="'.URL("mgr/university.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=recommend&flagvalue=0&id=".$rs["id"]."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."").'" style="color:red;">推荐</a>':'<a href="'.URL("mgr/ad.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=recommend&flagvalue=1&id=".$rs["id"]."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."").'" style="color:#929292;">推荐</a>'?>&nbsp;
			  		<?=$rs["audit"]==1?'<a href="'.URL("mgr/university.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=audit&flagvalue=0&id=".$rs["id"]."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."").'" style="color:red;">审核</a>':'<a href="'.URL("mgr/ad.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=audit&flagvalue=1&id=".$rs["id"]."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."").'" style="color:#929292;">审核</a>'?>&nbsp;
			  		<?=$rs["top"]==1?'<a href="'.URL("mgr/university.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=top&flagvalue=0&id=".$rs["id"]."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."").'" style="color:red;">置顶</a>':'<a href="'.URL("mgr/ad.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=top&flagvalue=1&id=".$rs["id"]."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."").'" style="color:#929292;">置顶</a>'?></td>
              <td>
                <a class="icon-edit" href="<?=URL("mgr/university.add","bid=".V("r:bid")."&classid=".V("r:classid")."&id=".$rs["id"]."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>">修改</a>
                <a class="icon-del" href="javascript:delConfirm('<?=URL("mgr/university.delad","bid=".V("r:bid")."&classid=".V("r:classid")."&id=".$rs["id"]."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要删除此分类信息吗？');">删除</a>
              </td>
            </tr>
            <?php
					}
				}
			?>
            <tr>
              <td colspan="6">
              <?php
              	if (isset($adlist) && !empty($adlist))
				{
			  ?>
				<input type="button" name="chkall" id="chkall" onclick="selchk('id')" value="全选/反选" />
   				<input type="button" id="auditall" name="auditall" value="批量审核"  onclick="chkallurl('id','<?=URL("mgr/university.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=audit&flagvalue=1&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要审核选中信息吗？')" />
                <input type="button" id="auditall" name="auditall" value="批量推荐"  onclick="chkallurl('id','<?=URL("mgr/university.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=recommend&flagvalue=1&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要推荐选中信息吗？')" />
   				<input type="button" id="auditall" name="auditall" value="批量置顶"  onclick="chkallurl('id','<?=URL("mgr/university.update","bid=".V("r:bid")."&classid=".V("r:classid")."&flag=update&flagtype=top&flagvalue=1&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要置顶选中信息吗？')" />
   				&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" id="delall" name="delall" value="批量删除"  onclick="chkallurl('id','<?=URL("mgr/university.delad","bid=".V("r:bid")."&classid=".V("r:classid")."&recommend=".V("r:recommend")."&audit=".V("r:audit")."&top=".V("r:top")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要删除选中的信息吗？')" />
                <?php echo $pager;?>
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
        

</body>
</html>
