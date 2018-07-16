<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php header('Cache-control: private, must-revalidate');?> 
<title>卡密列表</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery-1.7.2.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/select.js"></script>
</head>

<body class="main-body">
<table class="yc">
<tr>	
	<td valign="top" style="overflow:auto; overflow-y:hidden;"><div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>充值卡<span>&gt;</span>卡密列表</p></div>
        <div class="main-cont" style=" line-height:3">
        <h3 class="title">
        <a class="btn-general" href="javascript:exl_export();"><span>导出数据</span></a>
        卡密列表</h3>
        
          <div class="set-area" id="data_list">
            <div class="yang_info" style=" line-height:24px;">

        <span style="display:inline-block; line-height:24px;">类别：</span>
        <!--<select name="card_type" id="card_type" onchange="sosuo()">
            <option value="" selected="selected">--请选择--</option>
            <?php $card_type = explode(',',$setting['card_type']);
                foreach($card_type as $val){
            ?>
            <option value="<?= $val;?>"><?= $val;?></option>
            <?php }?>
      	</select>-->
        
          <select name="classid" id="classid" onchange="sosuo()">
            <option value="0" selected="selected">--请选择--</option>
            <?php $class = DS("mgr/book.getclasslist",'','3 and parentid = 12');
            if(!empty($class)){
                foreach($class as $val){
            ?>
            <option value="<?= $val['classid'];?>"><?= $val['classname'];?></option>
            <?php }}?>
          </select>

        <span style="display:inline-block; line-height:24px;">面值：</span>
        <select name="face_value" id="face_value" onchange="sosuo()">
            <option value="" selected="selected">--请选择--</option>
            <?php $face_value = explode(',',$setting['face_value']);
                foreach($face_value as $val){
            ?>
            <option value="<?= $val;?>"><?= $val;?></option>
            <?php }?>
      	</select>
        <span style="display:inline-block; line-height:24px;">是否使用：</span>
        <select name="is_use" id="is_use" onchange="sosuo()">
            <option value="2" selected="selected">全部</option>
            <option value="1">已使用</option>
            <option value="0">未使用</option>
      	</select>
        
        <!--<a href="javascript:;" class="btn-general" onclick="$('#ssDiv').toggle();$('#Btn1').toggle();$('#Btn2').toggle();" id="Btn1"><span>展开 ↓</span></a>
        <a href="javascript:;" class="btn-general" onclick="$('#ssDiv').toggle();$('#Btn1').toggle();$('#Btn2').toggle();" id="Btn2" style="display:none;"><span>收起 ↑</span></a>
        
        <div id="ssDiv" style="display:;">
        <div style="height:10px; line-height:0; font-size:0;"></div>-->
        
		<span style="display:inline-block; line-height:24px;">名称：</span>
        <input class="input-txt" type="text" id="title" value="<?= V('r:title','');?>" onkeydown="enterSumbit()" style="width:140px;"/>
        
         <span style="display:inline-block; line-height:24px;">卡号：</span>
        <input class="input-txt" type="text" id="number" value="<?= V('r:number','');?>" onkeydown="enterSumbit()" style="width:140px;"/>
        
        <span style="display:inline-block; line-height:24px;">卡密：</span>
        <input class="input-txt" type="text" id="password" value="<?= V('r:password','');?>" onkeydown="enterSumbit()" style="width:140px;"/>
        <a href="javascript:;" class="btn-general" onclick="sosuo();"><span>搜 索</span></a>
        <!--</div>-->
		<script>
			$('#is_use').val(<?= V('g:is_use',2);?>);
        	//$('#card_type').val('<?= V('g:card_type','');?>');
			$('#classid').val(<?= V('g:classid','0');?>);
			$('#face_value').val('<?= V('g:face_value','');?>');
			function sosuo(){
				var title		= $('#title').val();
				var number		= $('#number').val();
				var password	= $('#password').val();
				//var card_type 	= $('#card_type').val();
				var classid 	= $('#classid').val();
				var face_value	= $('#face_value').val();
				var is_use		= $('#is_use').val();
				location.href 	= '<?= URL('mgr/payCard.cardList','pid='.V('g:pid',0));?>' + '&password=' + password + '&classid=' + classid + '&face_value=' + face_value + '&is_use=' + is_use + '&title=' + title + '&number=' + number;
			}
			function enterSumbit(){
				var event = arguments.callee.caller.arguments[0]||window.event;//消除浏览器差异
				if(event.keyCode == 13){
					sosuo();
				}  
			}
			function exl_export(){
				var title		= $('#title').val();
				var number		= $('#number').val();
				var password	= $('#password').val();
				//var card_type 	= $('#card_type').val();
				var classid 	= $('#classid').val();
				var face_value	= $('#face_value').val();
				var is_use		= $('#is_use').val();
				if(confirm('是否导出当前条件的数据？')){
					location.href 	= '<?= URL('mgr/payCard.export','pid='.V('g:pid',0));?>' + '&password=' + password + '&classid=' + classid + '&face_value=' + face_value + '&is_use=' + is_use + '&title=' + title + '&number=' + number;
				}
			}
        </script>

            </div>
            <div style="height:10px; line-height:0; font-size:0;"></div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
                <colgroup>
                    <col class="w40" />
                    <col class="w80" />
                    <col class="w180" />
                    <col class="w140"/>
                    <col class="w140"/>
                    <col class="w60" />
                    <col class="w110" />
                    <col class="w100" />
                    <col class="w120" />
                    <col class="w80" />
                    <col class="w110" />
                    <col class="w80" />
                </colgroup>
                <thead class="tb-tit-bg">
                    <tr>
                        <th><div class="th-gap">&nbsp;&nbsp;</div></th>
                        <th><div class="th-gap">编号</div></th>
                        <th><div class="th-gap">名称</div></th>
                        <th><div class="th-gap">卡号</div></th>
                        <th><div class="th-gap">卡密</div></th>
                        <th><div class="th-gap">面值</div></th>
                        <!--<th><div class="th-gap">卡类别</div></th>	-->
                        <th><div class="th-gap">有效期至</div></th>
                        <th><div class="th-gap">二维码</div></th>
                        <th><div class="th-gap">使用人</div></th>
                        <th><div class="th-gap">是否使用</div></th>
                        <th><div class="th-gap">使用时间</div></th>
                        <th><div class="th-gap">操作</div></th>
                    </tr>
                </thead>
            
                <tbody id="recordList">
                 <?php if(isset($result['info']) && !empty($result['info'])){
                        foreach($result['info'] as $key=>$val){
                 ?>
                    <tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><input type="checkbox" name="id" value="<?= $val['id']?>" /></td>
                    <td><?= $val['id']?></td>
                    <td><div class="td-nowrap"><a title="<?= $val['title'];?>"><?= $val['title'];?></a></div></td>
                    <td><?= $val['number']?></td>
                    <td><div class="td-nowrap"><?= $val['password'];?></div></td>
                    <td><?= $val['face_value'];?></td>
                    <!--<td><?= $val['title'];?></td>-->
                    <td><div class="td-nowrap"><?= /*substr($val['startDate'],0,-3).' 至 '.*/substr($val['endDate'],0,-3);?></div></td>
                    <td><?= $val['QRcode'] == '' ? '-' : '<a href="'.$val['QRcode'].'" target="_blank">查看二维码</a>';?></td>
                    <td><div class="td-nowrap">
					<?php if($val['userid']){$user = DS('publics.get_info','','users','id='.$val['userid'],'','','username');?>
                    <a href="<?= URL('mgr/member2.add_member','id='.$val['userid']);?>" title="<?= $user[0]['username'];?>" target="_blank"><?= $user[0]['username'];?></a>
					<?php }else{echo '-';}?></div></td>
                    <td style="text-align:center;">
                    <a href="javascript:status('is_use',<?= $val['id'];?>);"><img src="img/<?= $val['is_use']?'yes':'no'?>.gif" id="is_use<?= $val['id'];?>"/></a>
                    </td>
                    <td><?= $val['usetime'] ? date('Y-m-d H:i',$val['usetime']) : '-';?></td>
                    
            <script>
                function status(key,val){
                    var img = key + val;
                    var src = $('#'+img).attr('src');
                    if(src == 'img/no.gif'){
                        $.post('<?= URL("mgr/payCard.updAttr");?>',{'id':val,'type':key+1,'table':'xsmart_paycard'},function(e){
                            if(e == 1){
                                $('#'+img).attr('src','img/yes.gif');
                            }else{
                                alert('操作失败');
                            }
                        });
                    }else{
                        $.post('<?= URL("mgr/payCard.updAttr");?>',{'id':val,'type':key+0,'table':'xsmart_paycard'},function(e){
                            if(e == 1){
                                $('#'+img).attr('src','img/no.gif');
                            }else{
                                alert('操作失败');
                            }
                        });
                    }
                }
            
            </script>
           		 <td><a class="icon-del" href="javascript:delConfirm(<?= $val['id'];?>);">删除</a></td>
                 </tr>
            <?php }}?>
                    <tr>
                        <td colspan="12">
                         
                            <?php if(!empty($result['info'])){ ?>
                            <input type="button" name="chkall" id="chkall" onclick="selchk('id')" value="全选/反选" />　
                            <input type="button" id="delall" name="delall" value="批量删除"  onclick="chkallurl('id','<?= URL("mgr/email.delemail");?>','您确定要删除选中的信息吗？')" />
                           
						   <span style="text-align:center;"><?= $result['pagehtml'];?></span>
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
        </div>
	</td>
    <div style="clear:both;"></div>
</tr>
</table>
<script>
	function delConfirm(id){
		if(confirm('您确定删除此信息？')){
			location.href = '<?= URL('mgr/payCard.delCard','id=');?>' + id;
		}
	}
</script>
</body>
</html>
