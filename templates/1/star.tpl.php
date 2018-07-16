<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title><?php $site_name = DS('publics.get_index','','site_name'); echo $site_name[0]['value']?></title>    
<meta name="keywords" content="<?php $site_keyword = DS('publics.get_index','','site_keyword'); echo $site_keyword[0]['value']?>">  
<meta name="description" content="<?php $site_meat = DS('publics.get_index','','site_meat'); echo $site_meat[0]['value']?>">          
<link rel="stylesheet" type="text/css" href="css/head.css" />
<link rel="stylesheet" type="text/css" href="css/foot.css" />
<link rel="stylesheet" type="text/css" href="css/course.css" />
<!-- 纵向导航 -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".sort-list>ul>li").hover(function(){
            $(this).addClass("hover")
        },function(){
            $(this).removeClass("hover")
        });
       
    });
</script>
<script type="text/javascript">
$(document).ready(function(e) {			
t = $('.top').offset().top; //固定块距离窗口顶部位置				
$(window).scroll(function(e){
    s = $(document).scrollTop();	//滚动条距离顶部高度
    if( s > t){
        $('.top').css('position','fixed');
        $('.top').css('top',0+'px');
        $
    }else{
        $('.top').css('position','');
    }
})
});
$(document).ready(function () {
$(document).keyup(function (evnet) {
    if (evnet.keyCode == '13') {
        if($('#message12').css('display') == 'block'){
            $('#registerr').click();	
        }else if($('#alert').css('display') == 'block'){
            $('#log').click();	
        }else if($('#message12').css('display') == 'none' && $('#alert').css('display') == 'none'){
                
                    $('#sosuo').click();
                
        }
    }
});

});

</script>
</head>
<body>
<div class="container">
   	<?= TPL :: display('header1')?>
        <div class="zong">
            <div class="content">
                <div class="sort">
                    <div class="sort-list">
                        <ul>
                             <?
            if($link_list){
                foreach($link_list as $key => $val){
        ?>
                    <li>
                        <a href="javascript:;"><?= $val['name']?><img src="images/index_img_03.png"/></a>
                        <ul>
                    <?
                    $c_list = DS('publics._get','','linkage',' parentid = '.$val['linkageid']);
                        if($c_list){
                            foreach($c_list as $ck => $cv){
                    ?>
                            <li><a href="<?= URL('courSystem.index','&couClass='.$cv['linkageid'])?>"><?=$cv['name']?></a></li>
                        <?
                                }
                            }
                        ?>
                        </ul>
                    </li>
                <?
                        }
                    }
                ?>                          
                        </ul>
                    </div>
                </div>
                <script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script>
                <div class="star_right">
                    <?php if(!empty($star)){?>
                    <ul>
                    <?php 
						foreach($star as $sk=>$sv){
					?>
                        <li>
                            <span>
                                <img src="<?= $sv['thumb']?>" class="star_phone" />
                                <a href="javascript:;" onclick="dialog('<?= URL('star.videos','&stuId='.$sv['id']);?>','感人视频',545,525)"><img src="images/star_img_06.png" class="play" /></a>
                            </span>
                            <p title="<?= $sv['username']?>"><?= $sv['username']?></p>
                        </li>
                    <?php }?>
                    </ul>
                    <?php }?>
                    <div class="clearfloat"></div>
                    <div class="fenye">
                    <?php 
						if(!empty($star)){
							echo $pagehtml;
						}else{
					?>
                    	暂无相关数据
                    <?php }?>    
                    </div>
                    <script>
						function dialog(url,title,width,height){
							$.dialog({
								title:title,
								id: 'dialsg',
								width: width,
								height: height,
								fixed: true,
								lock: true,
								background: '#000',
								opacity: 0.5,
								content: 'url:'+url
							});
						}
					</script>
                </div>
                <div class="clearfloat"></div>
            </div>
        </div>
    </div>
    <!--footer-->            
    <?= TPL :: display('footer1')?>
</body>
</html>
