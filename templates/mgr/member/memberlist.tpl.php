<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>会员管理</title>

<link href="<?=W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />

<link href="<?=W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?=W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?=W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?=W_BASE_URL;?>js/admin-all.js"></script>

<script>

(function($){

$(function() {

	bindSelectAll('#selectAll','#recordList > tr > td > input[type=checkbox]');

});

$(function() {
	$('#start,#end').datepick({
		dateFormat: 'yy-mm-dd',
		showAnim: 'fadeIn'
	});
	<?php if (in_array(V('r:disabled', 'all'), array(1,0,'all')) ) {?>
	$('#disabled').val('<?=V('r:disabled', 'all');?>');
	<?php }?>
	$('a[name="show"]').each(function(){
		$(this).click(function(){
			var tdMar = $(this).parent().prev('div');
			if(tdMar.height() == 60){
				tdMar.css({'height':'','overflow':''});
			} else {
				tdMar.css({'overflow':'hidden','height':'60px'});
			}
			if($(this).html()=="更多&gt;&gt;") $(this).html("收起&gt;&gt");
			else $(this).html("更多&gt;&gt");
		})
	});
});
})(jQuery);
</script>

</head>
      
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>会员列表</p></div>
        <div class="main-cont">
        <h3 class="title">会员列表
        <a class="btn-general" href="<?= URL('mgr/member2.import')?>"><span style="color:black">会员导入</span></a>
        <a href="<?= URL('mgr/member2.add_member','&page='.V('r:page',1).'&type='.V('r:type'))?>" class="btn-general"><span><? if(V('r:type') == 1){ echo "添加教师";}if(V('r:type') == 2){ echo "添加学生";}?></span></a>
        </h3>
        用户名：<input type="text" name="username" id="username" value="<?= $username?>" class="input-txt" style="width:120px" />
		昵称：<input type="text" name="realname" id="realname" value="<?= $realname?>" class="input-txt" style="width:120px" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        邮箱：<input type="text" name="email" id="email" value="<?= $email?>" class="input-txt" style="width:120px" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        手机：<input type="text" name="phone" id="phone" value="<?= $phone?>" class="input-txt" style="width:120px" />
        
        <a href="javascript:;" onclick="sub_form()" class="btn-general"><span>搜索</span></a>
        
        <a href="javascript:;" onclick="up_dem()" class="btn-general"><span>同步邮箱至edm</span></a>
        <script>
			function sub_form() {
				var username	=	$("#username").val();
				var realname	=	$("#realname").val();
				var email		=	$("#email").val();
				var phone		=	$("#phone").val();
				
				location.href="<?= URL('mgr/member2.memberlist','&realname=')?>"+realname+"&email="+email+"&phone="+phone+"&username="+username+"&type=<?= $type?>";
			}
			
			function up_dem() {
				alert('您暂未开启此功能');return;
				if(confirm('本次同步信息时间会较长，请您不要关闭本页面，确认开始?')) {
					$.post('<?= URL('mgr/member2.up_edm')?>',{'is_edm':'1'},function(c) {
						if('string'==typeof(c)) {
							c	=	eval('('+c+')');
						}
						if(c.status==1) {
							alert('同步成功');
						} else {
							alert(c.info);
						}
					});
				}
			}
        </script>
		<div class="set-area">

			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
					<col class="w70" />
                    <col class="w80" />
					<col class="w80" />
                    <col class="w60" />
					<col class="w80" />
					<col class="w100" />
                    <col class="w120" />
					<col class="w80" />
                    <col class="w100" />
					<col class="w240" />
				</colgroup>

				<thead class="tb-tit-bg">
					<tr>
						<th><div class="th-gap">会员ID</div></th>
                        <th><div class="th-gap">用户名</div></th>	
						<th><div class="th-gap">昵称</div></th>			
						<th><div class="th-gap">性别</div></th>
						<th><div class="th-gap">角色</div></th>
						<th><div class="th-gap">手机号</div></th>
                        <th><div class="th-gap">邮箱</div></th>
                        <th><div class="th-gap">学币</div></th>
                        <th><div class="th-gap">注册时间</div></th>
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
				<tbody id="recordList">

				<?php
                	if(isset($userlist) && !empty($userlist)){
						foreach($userlist['info'] as $key=>$rs){
				?>
				<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><?= $rs['id']?></td>
                    <td><div class="td-nowrap"><a href="<?=URL('mgr/member2.add_member','id='.$rs["id"].'&page='.V("g:page",1).'')?>" title="<?= $rs['username']?>"><?= $rs['username']?></a></div></td>
					<td><?= empty($rs['realname']) ? '-' : $rs['realname'];?></td>
                    <td><?= $rs['sex'] == 1 ? '男' : $rs['sex'] == 0 ? '女' : '保密';?></td> 
					<td><? echo $rs['roleid'] ? F('user.role',$rs['roleid']) : '-';?></td>
                    <td><?= empty($rs['phone']) ? '-' : $rs['phone'];?></td>
					<td><?= empty($rs['email']) ? '-' : $rs['email'];?></td>
                    <td><strong><?= $rs['frozen_money'];?></strong></td>
                    <td><?= date('Y-m-d H:i',$rs["addtime"]);?></td>
                    
                    <td>
<?= $rs["audit"] == 1 ?'<a class="icon-edit" href="'.URL("mgr/users.update","bid=".V("r:bid")."&flagtype=audit&flagvalue=0&id=".$rs["id"]."&audit=".V("r:audit")."&page=".V("r:page",1)."").'" style="color:red;">已审核</a>' : '<a class="icon-edit" href="'.URL("mgr/users.update","bid=".V("r:bid")."&flagtype=audit&flagvalue=1&id=".$rs["id"]."&audit=".V("r:audit")."&page=".V("r:page",1)."").'" style="color:#929292;">未审核</a>';?>                    

                    	<a class="icon-edit" href="<?=URL('mgr/member2.add_member','id='.$rs["id"].'&page='.V("g:page",1).'&type='.V('r:type'))?>">修改</a>
                        <?php if($type==2){?>
                        <a class="icon-edit" href="<?=URL('mgr/role.consume_log','&userid='.$rs["id"]."&id=".$rs["id"])?>">学币记录</a>
                        <?php }?>
                        <a class="icon-del" href="javascript:void(0);" onclick="del_member(<?= $rs['id']?>)">删除</a>
                    </td>
                    </tr> 

                    <?php
						}

					}
					?>
                    <tr>
						<td colspan="10" align="right">
                            <?= !empty($userlist['info'])?$userlist['pagehtml']:'没有查询到与条件相匹配的数据'?>
						</td>
					</tr>
				</tbody>
			</table>
            </div>
        </div>
        </div> 
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
		
		function del_member(id){
			if(confirm('确认删除此会员信息?')){
				$.ajax({
					url:'<?= URL('mgr/member2.del_member')?>',
					type:'POST',
					data:{
						id : id	
					},
					success:function(e){
						if(e == 1){
							location = location;	
						}else{
							alert('操作失败!');	
						}
					}	
				});	
			}
		}
    </script>
</body>
</html>