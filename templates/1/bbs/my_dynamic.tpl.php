<!--Header-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>个人中心 - 学啊</title>
   
    <link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
    <link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_home_follow.css" />
    
    
   <script src="js/bbsjs/jquery-1.7.1.min.js" type="text/javascript"></script>
   <script src="js/bbsjs/jquery.elements.js" type="text/javascript"></script>  
   <script src="js/bbsjs/public.js" type="text/javascript"></script>
   <script src="js/bbsjs/home.js" type="text/javascript"></script>
   
	<script src="js/bbsjs/common.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css" />
<link href="css/nav.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/head_select.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/subclass.js"></script>

   
    

  
    
<script>
window.onload=function(){
	TOP('list');
	TOP('list2');
	TOP('list3');
	TOP('list4');
};
</script>
<style>
body{
	font-family:"微软雅黑","Microsoft Yahei","宋体",Tahoma,"Simsun",Arial,Helvetica,sans-serif;
	font-size:14px;
	
	}
	a{text-decoration:none;}
.foot{
	font-size:12px;
	}
#cnzz_stat_icon_1253224175{
	padding:14px 0 0;
	}
.mark span{
	
    background: inherit;
    display:initial;
    float: inherit;
    height: inherit;
    margin: inherit;
    position: inherit;
    width: inherit;

   
	}	
.preview-pic{
	 height:inherit;
	 }	

.mark em {
    font-style: inherit;
    height: inherit;
    left: inherit;
    line-height: inherit;
    position: inherit;
    top: 0;
}	 
	 	.wp a{
	text-decoration:none; !important
	}	
</style>
</head>


<body id="nv_home" class="pg_follow" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="hd">
	<?php
		//头部导航  
		TPL :: display('header');
	
		 
	?>
	 
	<? 
		TPL :: display("bbs/hd");
	?>
	<script>
	var uids2 =  '<?=$_SESSION['u_uidss']?>';
		if(uids2 == ''){
			location.href = "<?=URL('study','&cid=1')?>"
		}
		
	
		
	</script>
</div>              
<div id="wp" class="wp">
	<style id="diy_style" type="text/css"></style>
		<div class="wp"><div id="diy1" class="area"></div></div>
        <div id="ct" class="ct2_a wp cl">
        
        <!--右侧导航开始-->
            <div class="back_left bdl">
                <dl class="a" id="lf_">
                    <dt>个人中心</dt>
                    <dd class="bdl_a"><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
                    <dd ><a href="<?= URL('bbsUser.my_submit',"&cid=1")?>" title="帖子">帖子</a></dd>
                    <dd ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd>
                    <dd ><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
                    <?php /*?><dd ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><dd></dd><?php */?>
                    <dd ><div style="height:18px; width:100%;"></div></dd> 
                </dl>                
    		</div>
		<!--右侧导航结束-->
        
			<div class="mn ct1_feed float_l" style=" background-color: #F2F2F2;">
            	<div id="diycontenttop" class="area"></div>
				<?php
					//var_dump($re);
                    //资料栏//发帖栏 
                    TPL :: display('bbs/mydynamic_top');
					//显示栏
					if(V('r:bottom') == 1 || V('r:bottom') == NULL){
                    	TPL :: display('bbs/mydynamic_bottom');
					}else if(V('r:bottom') == 2){
						TPL :: display('bbs/mydynamic_bottom2');
					}
                ?>   			
			</div>
		</div>
<div class="wp mtn"><div id="diy3" class="area"></div></div></div>

<div style="margin-top:50px">
<?php TPL :: display('footer');?>
</div>
<script>
function copy_html(id1,id2){
	try{
		var html 	= document.getElementById(id1).innerHTML;
		document.getElementById(id2).innerHTML	= html;
		}catch(e){}
	}
	// 首页js 初使化
	index_js.init();
	// 签到
	signinFunc(".signin_expand",".tips_signin");
	// 头像浮动
	adrift 	= new avatar_drift();
	adrift.init();
	// 删除底部线条
	delete_bottom_line();
</script>
<script type="text/javascript">


	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<!--统计代码-->
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="/js/index.js"></script>
<script type="text/javascript" src="/js/jquery.alerts.js"></script>
<script type="text/javascript" src="/js/jquery.ui.draggable.js"></script>
<script type="text/javascript">
// head-select
$(function(){
	$.head_select("#head_select","#inputselect");
});

//关注
atten();
recommend();
boutique('main_boutique');
//putaway();
ranking('ranOne');
ranking('ranTwo');
ranking('ranThree');


//团购
jQuery(".group-tab").slide({trigger:"click",effect:"left"});

// banner
jQuery(".slide_Box").slide({mainCell:".bd ul",autoPlay:true,trigger:"click"});

//重磅推荐jQuery(".main-recommend").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:4,trigger:"click"});
jQuery(".main-recommend").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});

//精品推荐jQuery(".main-boutique").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});
jQuery(".main-boutique").slide({trigger:"click"});

//新书上架
jQuery(".main-putaway").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});

//合作伙伴
jQuery(".slideBox").slide({ mainCell:"ul",vis:6,prevCell:".sPrev",nextCell:".sNext",effect:"leftMarquee",interTime:50,autoPlay:true,trigger:"click"});

//友情链接
jQuery(".multipleColumn").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"leftLoop",autoPlay:true,vis:6});

//总排行
jQuery(".ranking-box").slide({autoPlay:false,trigger:"click"});

//听书产品 jQuery(".main-product").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:1,trigger:"click"});
jQuery(".main-product").slide({trigger:"click"});

//广告
jQuery(".main-ad").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:1,trigger:"click"});
</script>
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>