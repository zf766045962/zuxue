<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加管理员组 - 角色管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />

</head>
<body class="main-body">
	<div class="path"><p>当前位置：系统设置<span>&gt;</span>添加管理员组（角色）</p></div>
    <div class="main-cont">
		<div class="set-area">
        	<p class="tips-desc">请输入昵称搜索用户，然后选择相应的添加操作。</p>
        	<div class="search-area">
                <form action="<?php echo URL('mgr/admin.search',array('ajax'=>1));?>" method="post" name="SearchFrom" id="SearchFrom">
                    <div class="item">
                        <label><strong>搜索包含以下昵称的用户</strong></label>
                        <input id="keyword" name="keyword" class="ipt-txt w200" type="text" />
                        <a id="pop_ok" class="btn-general" ><span>搜索</span></a>
                     </div>
                </form>
            </div>
        
        
        
        
            <?php if($this->_isPost() && !V('r:keyword', false)):?>
                <div class="search-results-no">请输入昵称</div>
            <?php elseif(!V('r:keyword', false)):?>

            <?php elseif(isset($list)):?>
              <ul class="search-results">
                <?php $i=1;foreach($list as $value):?>
                <?php if($i==1):$i++;?><li class="first"><?php else:?><li class="result-line"><?php endif;?>
                    <div class="results-l">
                        <p class="results-name"><?php echo htmlspecialchars($value['nickname']);?></p>
                        <p><span>用户名:<?php echo $value['username'];?></span><span>是否锁定：<?php echo ($value['islock']==0)?'否':'是';?></span></p>
                    </div>
                    <div class="results-r">
                        <a href="javascript:add('<?php echo $value['cc_uid'];?>','<?php echo htmlspecialchars($value['nickname']);?>')" >添加管理员</a>
                    </div>
                </li>
                <?php endforeach;?>
              </ul>
            <?php else:?>
                 <div class="search-results-no">该用户不存在</div>
            <?php endif;?>
            
    	</div>
    </div>

</body>
</html>
