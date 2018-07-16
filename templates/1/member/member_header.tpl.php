<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title>学啊教育</title>
<link href="css/style.css" rel="stylesheet" />
<link href="css/jquery.alerts.css" rel="stylesheet" />                 
<link rel="stylesheet" type="text/css" href="css/head.css" />
<link rel="stylesheet" type="text/css" href="css/foot.css" />
<link href="css/validform.css" rel="stylesheet" />
<!-- 纵向导航 --> 
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script src="/js/jquery.alerts.js" type="text/javascript"></script>

<script type="text/javascript" src="js/Validform_Datatype.js"></script>
<script type="text/javascript" src="js/Validform_v5.3.2_ncr_min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".sort-list>ul>li").hover(function(){
            $(this).addClass("hover")
        },function(){
            $(this).removeClass("hover")
        });   
       
    });
</script>
<!-- 选项卡 -->
<script>
    function setTab(name,cursel,n){
     for(i=1;i<=n;i++){
      var menu=document.getElementById(name+i);
      var con=document.getElementById("con_"+name+"_"+i);
      menu.className=i==cursel?"hover":"";
      con.style.display=i==cursel?"block":"none";
     }
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#zhuce").click(function(){
            popWin("zhuce_all");
        });
        $("#denglu").click(function(){
            popWin("denglu_all");
        });
    });
</script>  
</head>
<body> 
<div class="container">
    <div class="top">
        <div class="top_con">
            <div class="logo">
                <img src="images/xuea_img_06.png"/>
            </div>
            <div class="nav">
                <ul>
                    <?
                        $article_list = DS('publics._get','','article_class',' parentid = 0 limit 6');
                        if($article_list){
                            foreach($article_list as $key => $val){
                    ?>
                        <li><a href="<?= $val['classurl'].'&cid='.$val['classid']?>"><?= $val['classname']?></a></li>
                    <?
                            }
                        }
                    ?>
                </ul>
                <div class="clearfloat"></div>
            </div>
            <div class="search">
                <input type="text" placeholder="搜索您感兴趣的课程" class="search_text"/>
                <a href=""><img src="images/search.png" class="search_btn"/></a>
                <input type="button" value="注册" class="zc_btn zc"/>
                <input type="button" value="登录" class="zc_btn dl"/>
            </div>
            <div class="clearfloat"></div>
        </div>
    </div>