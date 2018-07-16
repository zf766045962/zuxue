<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息分类管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>

<script>
function openPop(url,title) {

	Xwb.use('MgrDlg',{
		modeUrl:url,
		formMode:false,
			success:function(ret){
				if (ret.errno==0){
					Xwb.ui.MsgBox.alert('修改成功','已经修改成功');
					window.location.reload(); 
				} else {
					Xwb.ui.MsgBox.alert('错误',ret.err);
				}
			},

		valcfg:{
			form:'AUTO',
			trigger:'#pop_ok',
		},
		dlgcfg:{
			cs:'win-topic win-fixed',
			width:600,
			onViewReady:function(View){
				var self=this;
				$(View).find('#pop_cancel').click(function(){
					self.close();
				})
			},
			title:title,
			formSuccess:function(){
			//	Xwb.ui.MsgBox.alert('提示','修改成功！');
				alert('555445');
			},
			destroyOnClose:true,

		}
	})
};
</script>

</head>

        <?php 
		$pid=V('r:id');
		if(empty($pid)){
			$uunique=V('r:type');
			$rs=DR('mgr/infoclass.getInofclassByName','',$uunique);
			if($rs)		$pid=$rs['classId'];
		}
		
		function showDepth($n){
			if($n==0){
			echo '+';
			}else{
				for($i=1;$i<=$n;$i++)
				{
					echo '--';
				}
			}
		}
		function showchild($pid){
		
            $child=	DR('mgr/infoclass.getClassInfo','',$pid);
			if($child){
            foreach($child as $c){
            ?>
        <tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
          <td><?php echo $c['classid'];?></td>
          <td><div class="td-nowrap"><?php showDepth($c['depth']);?><?php echo $c['classname']?></div></td>
          <td><div class="td-nowrap">
          
          <?php 
		  $rss=DS('mgr/infoclass.getContentList','',$c['classid']);
		  if($rss){
		  	foreach ($rss as $rs){
				echo '<a href="#'.$rs['contentid'].'">'.$rs['title'].'</a>  |';
			}
		  
		  }
		  
		  
		  
		  ?>
          
          </div></td>
          <td>查看 </td>
        </tr>
        <?php
            
			$next=$c['child'];
			
			if($next){
				 showchild($c['classid']);
			 }
		   }//end child each
		 }//endif
		}
		
		?>
<body class="main-body">
<div class="path">
  <p>当前位置：后台管理<span>&gt;</span>信息分类管理<span>&gt;</span><?php echo $lmname?></p>
</div>
<div class="main-cont">
  <h3 class="title"><a class="btn-general" onclick="javascript:openPop('<?php echo URL('mgr/infoclass.addclassfylist&pid='.$lmid)?>','添加分类');"><span>添加<?php echo $lmname?></span></a> <a class="btn-general"  href="<?php echo URL('mgr/infoclass.classfylist&id='.$lmid)?>"><span><?php echo $lmname?>列表</span></a> <?php echo $lmname?>列表</h3>
  <div class="set-area">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
      <colgroup>
      <col class="w70" />
      <col class="w120" />
      <col />
      <col class="w140" />
      </colgroup>
      <thead class="tb-tit-bg">
        <tr>
          <th><div class="th-gap">编号</div></th>
          <th><div class="th-gap">名称</div></th>
          <th><div class="th-gap">内容</div></th>
          <th><div class="th-gap">操作</div></th>
        </tr>
      </thead>
      <tbody id="recordList">


            <?php if($pid) {showchild($pid);	}?>

     
      </tbody>
    </table>
  </div>
</div>
</div>
</body>
</html>
