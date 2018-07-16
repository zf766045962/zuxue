<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>博客管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<link href="/xsmart1/css/calendar.css" rel="stylesheet" type="text/css" />

<script src="/xsmart1/css/calendar.js"></script>
<script src="/xsmart1/css/calendar-zh.js"></script>
<script src="/xsmart1/css/calendar-setup.js"></script>

<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>css/admin/1.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>



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
	$('#disabled').val('<?php echo V('r:disabled', 'all');?>');
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
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>扩展接口设置</p></div>
    <div class="main-cont">
    
<h3 class="title">扩展接口设置</h3>
    


    <div class="set-area">
			<table  cellspacing=0 cellpadding=0 widtd="800px"  border=0 class="table">
            <colgroup>
            	<col class="w150" />
                <col />
            </colgroup>
            <?php if($type=="sms"){?>
				<tbody id="recordList">
					<tr>
                    	<td><div>短信接口账号</div></td>
						<td><INPUT name="uuid" class="input-txt" type='text' value="" /></td>
					</tr>
                    <tr><td><div>短信接口密码</div></td>
                    	<td><INPUT name="blog_title" class="input-txt" type='text' /></td>
                     </tr>
                    <tr><td><div>查询单价</div></td>
                    	<td>1短信/0.1元</td>
                  </tr>
                    
                     <tr><td><div>查询余额</div></td>
                    	<td>12元</td>
                     </tr>
                     <tr><td>序列号充值</td>
                     <td><p>账号
                     <INPUT class="input-txt" name='hits1' type='text'  /> 
                     </p>
                       <p> 密码
  <INPUT class="input-txt" type='text' name='hits2' value='' />
                       </p></td>
                     
                     </tr>
				</tbody>
               <?php }?>
               <?php if($type=="transaction"){?>
                <tbody id="recordList">
                	<tr>
                    	<td colspan="2"><div>易宝支付</div></td>
					</tr>
					<tr>
                    	<td><div>收款易宝支付商户编号</div></td>
						<td><INPUT name="uuid" class="input-txt" type='text' value="" /></td>
					</tr>
                    <tr><td><div>收款易宝支付商户密钥</div></td>
                    	<td><INPUT name="blog_title" class="input-txt" type='text' /></td>
                     </tr>
                     
                     <tr>
                    	<td colspan="2"><div>财付通支付</div></td>
					</tr>
                    <tr><td><div>收款财付通商户编号</div></td>
                    	<td><INPUT name="blog_title" class="input-txt" type='text' /></td>
                  </tr>
                    
                  <tr><td><div>收款财付通商户密钥</div></td>
                    	<td><INPUT name="blog_title" class="input-txt" type='text' /></td>
                  </tr>
                     
                    <tr>
                    	<td colspan="2"><div>支付宝支付</div></td>
					</tr>
                     
                  <tr><td><div>收款支付宝帐号</div></td>
                    	<td><INPUT name="blog_title" class="input-txt" type='text' /></td>
                  </tr>
                   <tr><td><div>交易安全校验码（key）</div></td>
                    	<td><INPUT name="blog_title" class="input-txt" type='text' /></td>
                  </tr>
                   <tr><td><div>合作者身份（partnerID）</div></td>
                    	<td><INPUT name="blog_title" class="input-txt" type='text' /></td>
                  </tr>
                   <tr><td><div>接口类型（partnerID）</div></td>
                    	<td><select name="">
                <option value="create_partner_trade_by_buyer">纯担保交易</option>
                <option value="trade_create_by_buyer">标准实物</option>
                <option value="create_direct_pay_by_user">即时到账</option>
              </select></td>
                  </tr>
                   <tr><td><div>提交方式</div></td>
                    	<td><select name="alipay_transport">
                <option value="https">https</option>
                <option value="http">http</option>
              </select></td>
                  </tr>
				</tbody>
               <?php }?>
               <?php if($type=="email"){?>
                <tbody id="recordList">
					<tr>
                    	<td><div>SMTP 服务器 </div></td>
						<td><INPUT name="uuid" class="input-txt" type='text' value="" /></td>
					</tr>
                    <tr><td><div>SMTP 端口</div></td>
                    	<td><INPUT name="blog_title" class="input-txt" type='text' /></td>
                     </tr>
                    <tr><td><div>邮箱帐号</div></td>
                    	<td><INPUT name="blog_title" class="input-txt" type='text' /></td>
                  </tr>
                    
                     <tr><td><div>邮箱密码</div></td>
                    	<td><INPUT name="blog_title" class="input-txt" type='text' /></td>
                     </tr>
             
				</tbody>
                               <?php }?>
			</table>
            
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
    </script>
</body>
</html>





<!--</head>
<body>
<div id="maincontent">
	<div class="wrap">
    <div class="crumbs">当前位置 &gt;&gt; <a href="javascript:void(0);">应用管理</a> &gt;&gt; <a href="javascript:void(0);">博客管理</a></div>
    <hr/>
    <div class="infobox">
      <h3>筛选条件</h3>
      <div class="content">
		<form action="blog_list.php?action=search_blog" method="post" onSubmit="return check_form()">
				<TABLE class="form-table">
				<tr>
				<th width=12%>作者UUID</th>
				<TD width=30%><INPUT name="uuid" class="small-text" type='text' value="" /></TD>
				<TR>
				<th>标题<font color=red>*</font></th>
				<TD><INPUT name="blog_title" class="small-text" type='text' /></TD>
				<th>内容<font color='red'>*</font></th>
				<TD><INPUT name="blog_content" class="small-text" type='text'  /></TD></TR>
				<TR>
				<th>发布时间</th>
				<TD>
				<INPUT class="small-text" type='text' AUTOCOMPLETE=off onclick='calendar(this);' name='add_time1' id='add_time1'  /> ~ <INPUT type='text' class="small-text" name='add_time2' AUTOCOMPLETE=off onclick='calendar(this);' id='add_time2'  /> (YYYY-MM-DD) </TD>	
				</TR>
				<TR>
				<th>指定博文ID</th>
				<TD colSpan=3><INPUT name='blog_id' class="small-text" type='text'  /> </TD>
                </TR>
				<TR>
				<th>浏览次数</th>
				<TD colSpan=3>
				<INPUT class="small-text" name='hits1' type='text'  /> ~ <INPUT class="small-text" type='text' name='hits2' value='' /> </TD></TR>
				<TR>
				<th>评论次数</th>
				<TD colSpan=3>
				<INPUT class="small-text" type='text' name='comments1' value='' /> ~ <INPUT class="small-text" type='text' name='comments2' value='' /> </TD></TR>
				<TR>
				<th>结果排序</th>
				<TD colSpan=3>
                    <SELECT name='order_by'> 
                        <OPTION value="log_id" selected>默认排序</OPTION>
                        <OPTION value='add_time' >发布时间</OPTION> 
                        <OPTION value='hits' >查看数</OPTION> 
                        <OPTION value='comments' >回复数</OPTION>
                    </SELECT>
                      <SELECT name=order_sc>
                            <OPTION value=asc >升序</OPTION>
                            <OPTION value=desc selected>降序</OPTION>
                      </SELECT>
                      				
                      <SELECT name=perpage>
                            <option value=20 selected>每页显示20</option>
                            <option value=50 >每页显示50</option>
                            <option value=100 >每页显示100</option>
                      </SELECT>				</TD>
				</TR>
				<tr><td colspan=2>           
                   带 ' <font color=red>*</font> ' 的表示支持模糊查询  
           		   <input type="submit" class="btn-area" value=" 搜 索 " />
         
				  </td></tr>

				</TABLE>
		</form>
			</div>
		</div>

<div class="infobox">

	<h3>博文列表</h3>
	<div class="content">
		<table width="100%" class='list_table '>
<thead><tr>
					<th width="24">&nbsp;</th>
			  <th width='236'> 标题 </th>
			  <th width="74" style="text-align:center"> 作者 </th>
			  <th width="118" style="text-align:center"> 发布时间 </th>
			  <th width="78" style="text-align:center"> 评论次数 </th>
			  <th width="82" style="text-align:center"> 浏览次数 </th>
			  <th width="196" style="text-align:center"> 审核状态 </th><th width='210' style="text-align:center"> 操作 </th>
			</tr></thead>
				 <?php  if (!empty($blogs_arrs)){ 
				 	
				 ?>
                 	<?php
					 foreach($blogs_arrs as $key =>$item){ 
					 ?>
                <tr>
        <td><input type="checkbox" class="checkbox" name="bid" value="<?php echo $item['bid'];?>" /></td>
				<td>
					<a href='#' target='_blank'>
						<?php  echo $item['title']?>					</a>
				</td>
				<td style="text-align:center"><?php echo $item['uuid']?></td>
				<td style="text-align:center"><?php  echo $item['addtime']?></td>
				<td style="text-align:center"><?php  echo $item['commentnum']?></td>
				<td style="text-align:center"><?php  echo $item['viewnum']?></td>
				<td style="text-align:center"><span id="state_1">
                <?php if ($item['status']==0){?>
                未审核
                <?php }?>
                 <?php if ($item['status']==1){?>
                已审核
                <?php }?>
                 <?php if ($item['status']==2){?>
                审核失败
                <?php }?>
                </span></td>
				<td style="text-align:center">
					<div id="operate_1">
						<a class="icon-show" href='' target='_blank'>详细</a>
						<a class="icon-del" href="javascript:delConfirm('<?php echo URL('blog.del', 'id=' . $item['bid'], 'blog.php');?>','确认要删除该信息吗');">删除</a>
                        
                        <!--<a href='javascript:void(0)' onclick="LinkAjaxSubmit('/manager/blog/blog_list.php?action=del_blog&bid=<?php $item['bid'] ?>',<?php $item['bid']?>,'Del')"><img src='/resource/images/del.gif' /></a>-->
                <?php  if ($item['status']==0) ?>
				<span id="lock_button_1" style=""><a  class="icon-unrecommend" href="blog_list.php?action=check_blog&bid=<?php $item['bid']?>&status=0" ><img title="未审核" alt="未审核" src="/resource/images/lock.gif" /></a></span>
				<?php }?>	
                
                 <?php
				   if ($item['status']==1){ ?>
				<span id="unlock_button_1" style=""><a  class="icon-recommend" href="blog_list.php?action=check_blog&bid=<?php $item['bid']?>&status=1" ><img title="已审" alt="已审" src="/resource/images/unlock.gif" /></a></span>
				<?php }?>	
					</div>
				</td>
			</tr>
                            <?php }?>

	      <tr><td colspan="8"><input class="regular-button" type="button" name="chkAll" id="chkAll" value="全选/反选" />
      			<input class="regular-button" type="button" id="DelSeletedBtn" name="DelSeletedBtn" value="批量删除" /></td></tr>
		</table>

	<div class="pages_bar">
							<?php if (isset($blogs_arrs) && is_array($blogs_arrs) && !empty($blogs_arrs)) { ?>
							<?php echo $pager;?>
							<?php }else{?>
	 <div class='guide_info content_none'>没有查询到与条件相匹配的数据</div>
							<?php }?>
     </div>
    <div class="clear"></div>
</div>
</div>
</div>
</div>
</body>
</html>-->