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
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>回复管理<span>&gt;</span>回复</p></div>
        <div class="main-cont">
        <h3 class="title">回复列表</h3>
        <form id="form1" name="form1" method="post" action="<?=URL("mgr/questionReply.replyList")?>">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table" style="margin-bottom:5px;">
            <tr>
              <td>
              <label for="key">关键字：</label>
              <input type="text" name="key" id="key" value="<?=V("r:key")?>" />
              <input type="submit" name="button" id="button" value="搜索" /></td>
            </tr>
          </table>
        </form>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
		<colgroup>
				<col class="w30" />
				<col class="w60"/>
				<col class="w170"/>
                <col class="w150" />
                <col  />
                <col class="w150" />
				<col class="w150" />
				</colgroup>
            <tr>
              <td>&nbsp;</td>
              <td>编号</td>
              <td>回复者用户名</td>
              <td>回复者昵称</td>
              <td>回复内容</td>
              <td>回复时间</td>
              <td>操作</td>
            </tr>
            <?php
				if (isset($reply) && !empty($reply))
				{
					$num = 0;
					foreach($reply as $rs)
					{
						$num = $num + 1;
			?>
            <tr>
              <td><input type="checkbox" name="id" value="<?=$rs["id"]?>" id="id" /></td>
              <td><?= $rs["id"];?> </td>
              <td><?php $uinfo = DS("publics2._get","","users","id=".$rs['requid']); echo $uinfo[0]['username']?></td>
              <td><?=$uinfo[0]["realname"]?></td>
              <td><?=$rs["content"]?></td>
              <td><?=date("Y-m-d H:i",$rs["inputtime"])?></td>
              <td>
                <a class="icon-del" href="javascript:delConfirm('<?=URL("mgr/questionReply.delad1","&id=".$rs["id"]."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要删除此分类信息吗？');">删除</a>
              </td>
            </tr>
            <?php
					}
				}
			?>
            <tr>
              <td colspan="7">
              <?php
              	if (isset($reply) && !empty($reply))
				{
			  ?>
				<input type="button" name="chkall" id="chkall" onclick="selchk('id')" value="全选/反选" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" id="delall" name="delall" value="批量删除"  onclick="chkallurl('id','<?=URL("mgr/questionReply.delad1","&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要删除选中的信息吗？')" />
                <?php echo $pagehtml;?>
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
