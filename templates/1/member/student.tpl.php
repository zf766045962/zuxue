<div class="lib_Contentbox lib_tabborder">
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<link rel="stylesheet" media="screen" type="text/css" href="css/new-index.css"/>
	<?php 
    if($tid == 1 || $tid == ''){?>
    <!-- 我的课程-->
    <div id="con_one_1" class="hover">
        <div class="lib_Menubox_son">
            <ul>
               <li <?= ($ctype=='1' || $ctype =='')?'class="hover"':'' ?>><a href="<?= URL('member.xmember','&tid=1&ctype=1')?>">购买的课程</a></li>
               <li <?= $ctype=='2'?'class="hover"':''?>><a href="<?= URL('member.xmember','&tid=1&ctype=2')?>">收藏的课程</a></li>
               <li <?= $ctype=='3'?'class="hover"':''?>><a href="<?= URL('member.xmember','&tid=1&ctype=3')?>">推荐的课程</a></li>
               <!--<li><a href="javascript:;">浏览的课程</a></li>-->
            </ul>                    
        </div>
        <div class="clearfloat"></div>
        <div class="lib_Contentbox_son">
            <div id="con_two_1" class="hover  n-course-box w-content">
                <ul>
                <?php
                if($ctype == 2){  
                    if(!empty($bookInfo)){      
                        foreach($bookInfo as $bk => $bv){
                            $sysInfo = DS("publics2._get","","system","id=".$bv['systemid']);
                ?>
                    <li style="width:280px"><div class="course-pic-txt">
                      <img src="<?= empty($sysInfo[0]['thumb'])?'images/teacher_img_06.png':$sysInfo[0]['thumb']?>" style="width:294px;height:202px"/><div class="n-pic-mask"></div></div>
                        <div class="c-course-info">
                    <div class="c-course-name"><?php if($sysInfo[0]['catid']==2){?><a href="<?= URL('courSystem.courseCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }else if($sysInfo[0]['catid']==4){?><a href="<?= URL('courJob.jobCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }else{?><a href="<?= URL('courAdvance.advanceCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }?><?= $sysInfo[0]['stitle']?></a></div>
                    <div class="course-bot-info">
                        <span class="c-details right"><em><?= count($buy_sys)?></em>人在学习</span>  
                    </div>
                    <div class="course-time">
                        <!--<a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" ></a>-->
                        <span>时长：<em><?=  $sysInfo[0]['sys_hours']?></em></span></div>
                    <div class="course-hover-btn">
                        <span class="study-btn"><?php if($sysInfo[0]['catid']==2){?><a href="<?= URL('courSystem.courseCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }else if($sysInfo[0]['catid']==4){?><a href="<?= URL('courJob.jobCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }else{?><a href="<?= URL('courAdvance.advanceCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }?>开始学习</a></span>
                        <span class="det-btn"><a onclick="delColl(<?= $bv['id']?>)" href="javascript:;" >删除</a></span>
                    </div>
                </div> 
                    </li>
                  <?php }
                  }
                }else if($ctype==3){
                    if(!empty($bookInfo)){      
                        foreach($bookInfo as $bk => $bv){
                            $buy_sys = DS("publics2._get","","integral","type=1 and sourceType=1 and systemid=".$bv['id']);
                            //var_dump($buy_sys);die;
                    ?>
                    <li style="width:280px">
                        <div class="course-pic-txt">
                        <img src="<?= empty($bv['thumb'])?'images/teacher_img_06.png':$bv['thumb']?>" style="width:294px;height:202px"/><div class="n-pic-mask"></div></div>
                        <div class="c-course-info">
                    <div class="c-course-name"><a href="<?= URL('courSystem.courseCon','classid='.$bv['couClass'].'&sid='.$bv['id'].'&catid=2');?>" target="_blank"><?= $bv['stitle']?></a></div>
                    <div class="course-bot-info">
                        <span class="c-details right"><em><?= count($buy_sys)?></em>人在学习</span>  
                    </div>
                    <div class="course-time">
                       <!-- <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" ></a>-->
                        <span>时长：<em><?= $bv['sys_hours']?></em></span></div>
                    <div class="course-hover-btn">
                        <span class="study-btn"><a href="<?= URL('courSystem.courseCon','classid='.$bv['couClass'].'&sid='.$bv['id'].'&catid=2');?>">开始学习</a></span>
                    </div> 
                </div> 
                    </li>
                    <?php }}}else{
                        if(!empty($bookInfo)){      
                        foreach($bookInfo as $bk => $bv){
                            $sysInfo = DS("publics2._get","","system","id=".$bv['systemid']);
                        ?>
                    <li style="width:280px"><div class="course-pic-txt">
                        <img src="<?= empty($sysInfo[0]['thumb'])?'images/teacher_img_06.png':$sysInfo[0]['thumb']?>" style="width:294px;height:202px"/><div class="n-pic-mask"></div></div>
                        <div class="c-course-info">
                    <div class="c-course-name"><?php if($sysInfo[0]['catid']==2){?><a href="<?= URL('courSystem.courseCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }else if($sysInfo[0]['catid']==4){?><a href="<?= URL('courJob.jobCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }else{?><a href="<?= URL('courAdvance.advanceCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }?><?= $sysInfo[0]['stitle'];?></a></div>
                    <div class="course-bot-info">
                        <span class="c-details right"><em><?= count($buy_sys)?></em>人在学习</span>  
                    </div>
                    <div class="course-time">
                        <!--<a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" ></a>-->
                        <span>时长：<em><?= $sysInfo[0]['sys_hours'];?></em></span></div>
                    <div class="course-hover-btn">
                        <span class="study-btn"><?php if($sysInfo[0]['catid']==2){?><a href="<?= URL('courSystem.courseCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }else if($sysInfo[0]['catid']==4){?><a href="<?= URL('courJob.jobCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }else{?><a href="<?= URL('courAdvance.advanceCon','&sid='.$bv['systemid'].'&catid='.$bv['catid'].'&classid='.$sysInfo[0]['couClass'])?>"><?php }?>开始学习</a></span>
                        <!--<span class="det-btn"><a href="javascript:;">自我测评</a></span>-->
                    </div>
                </div> 
                        <!--<p class="right_title"><?php //echo $sv['stitle']?></p>-->
                        <!--<span class="con_lft">
                        <?php // date('Y-m-d',$sv['updatetime'])?>
                        更新</span><span class="con_rgt"><?= count($buy_sys)?>人学习</span> </a>-->
                    </li>
                    <?php }}}?> 
                </ul>
                <div class="clearfloat"></div>     
                <?php if($ctype != 1){
                    ?>
                <div class="fenye">
                    <?php
                    if(!empty($bookInfo)){
                        echo $bpagehtml;
                    }else{
                        echo "暂无课程";	
                    }
                    ?>
                </div>
                <?php
                }else if($ctype == 1 && empty($bookInfo)){
                ?>
                 <div class="fenye">暂无课程</div>
                <?php }?>
            </div>
        </div>
    </div>
    <?php }		if($tid == 2){?>
    <!-- 我的问答-->
    <div id="con_one_2">
        <div class="lib_Menubox_son">
            <ul>
               <li <?= ($qtype=='1' || $qtype =='')?'class="hover"':'' ?>><a href="<?= URL('member.xmember','&tid=2&qtype=1')?>">全部</a></li>
               <li <?= $qtype=='2'?'class="hover"':''?>><a href="<?= URL('member.xmember','&tid=2&qtype=2')?>">已解决</a></li>
               <li <?= $qtype=='3'?'class="hover"':''?>><a href="<?= URL('member.xmember','&tid=2&qtype=3')?>">未解决</a></li>
            </ul>
        </div>
        <div class="clearfloat"></div>
        <div class="lib_Contentbox_son">
            <div id="con_mywd_1" class="hover">
                <div class="right_top">
                    <!--<input type="text" name="" id="" class="" />
                    <a href="" class="top_a sac">我要搜索</a>-->
                    <input class="searTxt ff4" type="text" onfocus="if(this.value=='输入问题进行搜索'){this.value='';this.style.color='#333'}" onblur="if(this.value=='' || this.value=='输入问题进行搜索'){this.value='输入问题进行搜索';this.style.color='#ccc'}" name="pro_name" id="pro_name" value="<?= !empty($pro_name)?$pro_name:'输入问题进行搜索'?>" style="color:#666;">
                    <input class="top_a sac" type="button" value="搜索" onclick="ser_form()" />
                    <input type="button" class="top_a ans" onclick="make_question()" value="去提问" style="background:#FC8131">
                    <script>        
                        function ser_form() {
                            var pro_name	=	$("#pro_name").val();		//alert(pro_name);
                            if(pro_name != '输入问题进行搜索') {
                                location.href="<?= URL('member.xmember','&tid='.$tid.'&pro_name=')?>"+pro_name;					
                            }else{
                                jAlert('请输入您要搜索的问题','温馨提示');	
                            }
                        }
                        
                        function make_question(){
                            window.location.href="<?= URL('reply','&cid=6')?>";	
                        }
                    </script> 
                </div> 
    <?php
        if(!empty($question)){	
            foreach($question as $qk=>$qv){
            
            //得到问题下所有回复	
            $que_reply	=	DS("publics2._get","","question_reply","qid=".$qv['id']);
            
            //判断问题是否解
            $istrue		=	DS("publics2._get","","question_reply","qid=".$qv['id']." and istrue = '1'");
    ?>
                <div class="pl_bottom">
                    <div class="pl_left">
                        <a href="<?= URL('bbsUser.user_broadcast','&id='.$info['id'])?>"><img <?= $info['logo']==''?'src="images/wenda_img_03.png"':'src='.$info['logo']?> class="tx_img"/></a>
                        <span <?= !empty($istrue)?'class="hot"':'class="hot_d"'?>><?=  !empty($istrue)?'已解决':'待解决'?></span>
                        <span class="jb_name"><?= date('Y-m-d',$qv['inputtime'])?></span><span class="jb_name"><img src="images/wenda_img_06.png" /><a href="<?= URL('bbsUser.user_broadcast','&id='.$info['id'])?>" style="color:#A4A4A4;"><?= $info['realname']?></a></span>
                        <div class="clearfloat"></div>
                        <p class="pl_con"><?= $qv['askquiz']?></p>
                    </div>
                    <div class="clearfloat"></div>
                    <div class="btm_advance">
                        <span><!--2015-03-01--></span><span><!--11:30--></span><a href="<?= URL('reply.question_reply','&qid='.$qv['id'])?>">回答（<?= count($que_reply)?>）</a><a href="javascript:;" onclick="del_question(<?= $qv['id']?>)">删除</a>
                    </div>
                    <div class="clearfloat"></div>
     <?php
                if(!empty($que_reply)){
                    foreach($que_reply as $rk=>$rv){			
     ?>					
                    <p class="pl_content"><?= str_replace('</p>','',str_replace('<p>','',$rv['content']))?></p>
     <?php
                    }
                }
     ?>               
                </div>
  <?php 	}
                echo '<div class="fenye">';
                echo $qpagehtml;
                echo '</div>';
     }else{
         echo '<div class="fenye">';
                echo "暂无内容";
                echo '</div>';
    }
?>                 
            </div>							
        </div>
    </div>
    <?php	}	if($tid == 3){?>
    <!-- 随堂笔记-->
    <div id="con_one_3">
        <div class="left_rt_top">
             <link href="/statics/js/calendar/jscal2.css" type="text/css" rel="stylesheet">
             <link href="/statics/js/calendar/border-radius.css" type="text/css" rel="stylesheet">
             <link href="/statics/js/calendar/win2k.css" type="text/css" rel="stylesheet">
             <script src="/statics/js/calendar/calendar.js" type="text/javascript"></script>
             <script src="/statics/js/calendar/lang/en.js" type="text/javascript"></script>
            <input type="text" name="times1" id ="times1" class="date_text" value="<?= empty($times1)?date("Y-m-d H:i:s",time()-7*60*60*24):$times1?>"/>
            <span class="">至</span>
            <input type="text" name="times2" id="times2"class="date_text" value="<?= empty($times2)?date("Y-m-d H:i:s",time()):$times2?>"/>
            <input type="button" name="find_notes" id="find_notes" value="确定" class="date_btn" onclick="find_notes()"/>
            <script>
                function find_notes(){
                    var times1 = $("#times1").val();
                    var times2 = $("#times2").val();
                    //jAlert("温馨提示","温馨提示")
                    window.location.href = "<?= URL('member.xmember','&times1=')?>"+times1+"&times2="+times2+"&tid=3";     
                }          
            </script>
            <script type="text/javascript">
        Calendar.setup({
        weekNumbers: true,
        inputField : "times1",
        trigger    : "times1",
        dateFormat: "%Y-%m-%d %H:%M:%S",
        showTime: true,
        minuteStep: 1,
        onSelect   : function() {this.hide();}
        });
    </script>                        
        <script type="text/javascript">
        Calendar.setup({
        weekNumbers: true,
        inputField : "times2",
        trigger    : "times2",
        dateFormat: "%Y-%m-%d %H:%M:%S",
        showTime: true,
        minuteStep: 1,
        onSelect   : function() {this.hide();}
        });
    </script>
        </div>
        <?php 
        if(!empty($notes)){
            foreach($notes as $nk => $nv){
        ?>
        <div class="stbj_btm">
            <div class="stbj_con_top">
                <p>在<span class="stbj_title">
                <?php 
                $address = ''; 
                if(!empty($nv['sid'])){ 
                    $re = DS("publics2._get","","system","id=".$nv['sid']); 
                    $address .= $re[0]['stitle'];
                }
                if(!empty($nv['pid'])){ 
                    $re1 = DS("publics2._get","","chapter","id=".$nv['pid']); 
                    $address .= '-'.$re1[0]['ctitle'];
                }
                if(!empty($nv['coid'])){ 
                    $re2 = DS("publics2._get","","course","id=".$nv['coid']); 
                    $address .= '-'.$re2[0]['title'];
                }
                
                echo $address;
                ?>
                </span>处记笔记<span class="stbj_top_right"><?= date("Y-m-d",$nv['inputtime'])?>  <?= date("H:i:s",$nv['inputtime'])?></span></p>
            </div>
            <div class="stbj_con_btm">
                <span id="acbiji_<?= $nk?>" style="cursor:pointer;">名称：【<?= $nv['title']?>】</span>
                <p><span>内容：</span><?= $nv['content']?></p>
            </div>
            <style>
                .tanchu_content{position:fixed;top:50%;margin-top:-137px;left:50%;margin-left:-217px;width:435px;height:275px;background:#fff;text-align:center;z-index:1000;box-shadow:0px 0px 1px 2px #ccc;}
                .tanchu_content .tit{height:30px;line-height:30px;text-align:center;}
                .tanchu_content .tit span{float:none;display:inline-block;color:#369998;font-size:16px;font-weight:bold;}
                .tanchu_content .tit img{float:right;margin:10px 15px; cursor:pointer;}
                .tanchu_content p{margin:10px 0;text-align:left;font-size:14px;color:#404040;margin:0 15px;line-height:30px;}
                .tanchu_content p span{float:left;font-weight:bold;text-align:right;font-size:14px;color:#666666;display:block;}
            </style>
        </div>
            <div class="tanchu_content" id="biji_<?= $nk?>" style="display:none;">
                <div class="tit"><img id="guan_<?= $nk?>" src="images/one_img_03.png"><div class="clearfloat"></div></div>
                <p><span>名称：</span>【<?= $nv['title']?>】</p>
                <p><span>内容：</span><?= $nv['content']?></p>
            </div>
        <div id="maskLayer"> </div>
        <?php
            }
            
            }else{
            ?>
            <div class="stbj_btm"><div class="stbj_con_top"></div><div class="stbj_con_btm" style="text-align:center"><span></span>
                <p ><span></span><b>暂无相关笔记，赶快去<a href="<?= URL('courSystem.index','&cid=2')?>">看视频</a>充实一下自己吧！！！</b></p>
            </div></div>
        <?php	
            }
        ?>       
        <div class="fenye">
           <?php 
                if(!empty($notes)){
                    echo $npagehtml;
                }
        ?>
        </div>
       <!-- <script>
                $(function(){
                    for(i = 0;i<=1000;i++){
                        $("#acbiji_"+i).click(function(){
                            $("#biji_"+i).css("display","block");
                            $("#maskLayer").css("display","block");
                        })
                        $("#guan_"+i).click(function(){
                            $("#biji_"+i).css("display","none");
                            $("#maskLayer").css("display","none");
                        })
                    }
                })
            </script>-->
    </div>
    <?php	}	if($tid == 4){?>
    <!-- 我的帖子-->
    <div id="con_one_4">
        <div class="lib_Menubox_son">
            <ul>
               <li id="mytz1" onclick="setTab('mytz',1,3)" class="hover">我的帖子</li>
               <li id="mytz2" onclick="setTab('mytz',2,3)">我回复的帖子</li>
               <li id="mytz3" onclick="setTab('mytz',3,3)">我收藏的帖子</li>
            </ul>
        </div>
        <div class="clearfloat"></div>
        <div class="lib_Contentbox_son">
            <div id="con_mytz_1" class="hover">
                <div class="left_rt_top">
                    <input type="text" name="" class="date_text" />
                    <span class="">至</span>
                    <input type="text" name="" class="date_text" />
                    <input type="button" name="" id="" value="确定" class="date_btn" />
                </div>
                <div class="left_rt_btm">
                    <img src="images/shequ_img_36.png" />
                    <p>这个课程总体来说还是不错的，这是第一个</p>
                    <div class="p_right">
                        <span class="span_top">大大大大大森</span><br>
                        <span class="span_bottom">17分钟前</span>
                    </div>
                    <div class="clearfloat"></div>
                </div>
   
                <div class="fenye">
                    <a href="">首页</a><a href="">上一页</a>
                    <a href="" class="avtive">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a><a href="">6</a><a href="">7</a>
                    <a href="">下一页</a><a href="">尾页</a>
                </div>
            </div>
            <div id="con_mytz_2" style="display:none;">
                <div class="left_rt_top">
                    <input type="text" name="" class="date_text" />
                    <span class="">至</span>
                    <input type="text" name="" class="date_text" />
                    <input type="button" name="" id="" value="确定" class="date_btn" />
                </div>
                <div class="left_rt_btm">
                    <img src="images/shequ_img_36.png" />
                    <p>这个课程总体来说还是不错的，这是第二个</p>
                    <div class="p_right">
                        <span class="span_top">大大大大大森</span><br>
                        <span class="span_bottom">17分钟前</span>
                    </div>
                    <div class="clearfloat"></div>
                </div>
                <div class="fenye">
                    <a href="">首页</a><a href="">上一页</a>
                    <a href="" class="avtive">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a><a href="">6</a><a href="">7</a>
                    <a href="">下一页</a><a href="">尾页</a>
                </div>
            </div>
            <div id="con_mytz_3" style="display:none;">
                <div class="left_rt_top">
                    <input type="text" name="" class="date_text" />
                    <span class="">至</span>
                    <input type="text" name="" class="date_text" />
                    <input type="button" name="" id="" value="确定" class="date_btn" />
                </div>
                <div class="left_rt_btm">
                    <img src="images/shequ_img_36.png" />
                    <p>这个课程总体来说还是不错的，这是第三个</p>
                    <div class="p_right">
                        <span class="span_top">大大大大大森</span><br>
                        <span class="span_bottom">17分钟前</span>
                    </div>
                    <div class="clearfloat"></div>
                </div>
                <div class="fenye">
                    <a href="">首页</a><a href="">上一页</a>
                    <a href="" class="avtive">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a><a href="">6</a><a href="">7</a>
                    <a href="">下一页</a><a href="">尾页</a>
                </div>
            </div>
        </div>
    </div>
    <?php	}	if($tid == 5){?>
    <!-- 我的考核-->   
    <div id="con_one_5" class="hover">
    <link href="/statics/js/calendar/jscal2.css" type="text/css" rel="stylesheet">
             <link href="/statics/js/calendar/border-radius.css" type="text/css" rel="stylesheet">
             <link href="/statics/js/calendar/win2k.css" type="text/css" rel="stylesheet">
             <script src="/statics/js/calendar/calendar.js" type="text/javascript"></script>
             <script src="/statics/js/calendar/lang/en.js" type="text/javascript"></script>
    	<div class="left_rt_top">
            <input type="text" name="times4" id ="times3" class="date_text" value="<?= empty($times3)?date("Y-m-d H:i:s",time()-7*60*60*24):$times3?>"/>
            <span class="">至</span>
            <input type="text" name="times4" id="times4" class="date_text" value="<?= empty($times4)?date("Y-m-d H:i:s",time()):$times4?>"/>
            <input type="button" name="find_notes" id="find_notes" value="确定" class="date_btn" onclick="find_notes1()"/>
            <script>
                function find_notes1(){
                    var times3 = $("#times3").val();
                    var times4 = $("#times4").val();
                    //jAlert("温馨提示","温馨提示")
                    window.location.href = "<?= URL('member.xmember','&times3=')?>"+times3+"&times4="+times4+"&tid=5";     
                }          
            </script>
            <script type="text/javascript">
        Calendar.setup({
        weekNumbers: true,
        inputField : "times3",
        trigger    : "times3",
        dateFormat: "%Y-%m-%d %H:%M:%S",
        showTime: true,
        minuteStep: 1,
        onSelect   : function() {this.hide();}
        });
    </script>                        
        <script type="text/javascript">
        Calendar.setup({
        weekNumbers: true,
        inputField : "times4",
        trigger    : "times4",
        dateFormat: "%Y-%m-%d %H:%M:%S",
        showTime: true,
        minuteStep: 1,
        onSelect   : function() {this.hide();}
        });
    </script>
        </div>
        <table cellpadding="0" cellspacing="0" class="zice_table">
            <tr>
                <th>序号</th>
                <th>课程名称</th>
                <th>分数</th>
                <th>测评日期</th>
                <th>操作</th>
            </tr>
	<?php 
        if(!empty($exam)){
			$num = 0;
        	foreach($exam as $ek => $ev){
				$num += 1;
    ?>
            <tr>
                <td><?= $num?></td>
                <td><a href="<?= URL("member.exam_detail","&coid=".$ev['coid'])?>" style="color:#323232"><?php $courseInfo = DS("publics2._get","","course","id=".$ev['coid']);echo $courseInfo[0]['title']?></a></td>
                <td><?= $ev['score']?></td>
                <td><?=date("Y-m-d",$ev['updatetime'])?></td>
                <td style="border-right:0;"><a href="javascript:;" onclick="del(<?= $ev['id']?>)" style="color:#323232">删除记录</a>  <a href="<?= URL("member.exam_detail","&coid=".$ev['coid'])?>" style="color:#323232">重新测试</a></td> 
            </tr>
  <?php }}?>
        </table>
        <script>
        	function del(eid){
				$.ajax({
					url:'<?= URL('member.del_exam')?>',
					type:'POST',
					data:{
						eid		: 	eid,
					},
					success:function(r){
						e = eval('(' + r + ')');
						if(e.status == 1){
							location.reload(true);
						}else{
							jAlert(e.info,"温馨提示");	
						}
					}
				});	
			}
        </script>
        <div class="fenye">
           <?= !empty($exam)?$epagehtml:' <p ><span></span><b>暂无考核记录，赶快去<a href="index.php?m=courSystem.index&cid=2">看视频</a>考验一下自己吧！！！</b></p>'?>
        </div>
    </div>
    <?php	}	if($tid == 6){?>
    <!-- 账户中心-->
    <div id="con_one_6"> 
        <?php
            //var_dump($_SESSION['xr_id']);var_dump($info);die;   
        ?>
        <div class="lib_Menubox_son">
            <ul>
               <li id="myzh1" onclick="setTab('myzh',1,2)" class="hover">我的学币</li>
               <li id="myzh2" onclick="setTab('myzh',2,2)">充值说明</li>
            </ul>
        </div>
        <div class="clearfloat"></div>
        <div class="lib_Contentbox_son">
            <div id="con_myzh_1" class="hover">
                <div class="czzh_top">
                    <h3>我的学币</h3>
                    <div class="one">
                        <span class="one_top">可用的学币</span>
                        <span class="one_btm"><?= $info['frozen_money']?></span>
                    </div>
                    <div class="one">
                        <span class="one_top">已用的学币</span>
                        <span class="one_btm"><?= !empty($sum)?$sum:'0.00'?></span>
                    </div>
                    <div class="one" style="border:0;">
                        <a href="javascript:void(0);" id="chongzhi" class="cz_btn">我要充值</a>
                    </div>
                     <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#chongzhi").click(function(){
                                $("#chongzhi_all").fadeIn();
								$("#masklayer").fadeIn();
                            });
                        });
                        $(document).ready(function(){
                            $("#guanbi").click(function(){
                                $("#chongzhi_all").fadeOut();
								$("#masklayer").fadeOut();
                            });
                        });
                    </script>
                    <div class="clearfloat"></div>
                </div>
                <!--弹出充值部分-->
                <div id="chongzhi_all">
                    <div class="chongzhi_title">
                        <h2>充值</h2>
                        <i class="close"><img id="guanbi" src="images/chongzhi_guan.png"></i>
                    </div>
                    <div class="chongzhi_con">
                        <div class="con_top">
                            <p>充值账户：<span><?= $info['realname']?></span></p>
                            <p>充值金额：<input type="text" name="price" id="price" />元</p>
                        </div>
                        <div class="con_btm">
                            <div class="con_btm_title">
                                <p><span>支付宝</span>全球领先的独立第三方支付平台</p>
                            </div>
                            <div class="con_btm_con">
                                <ul>
                                    <li><input type="radio" name="" id="" checked /><img src="images/chongzhi_img_48.png" /></li>
                                </ul>
                                <div class="clearfloat"></div>
                            </div>
                        </div>
                        <div class="con_btm">
                            <!--<div class="con_btm_con">
                                <p>开始看见对方可更换时打开个符合公司将开放和德国看电视剧房管局开始干活的骨灰全球领先的独立第三方支付平台</p>
                            </div>-->
                        </div>
                    </div>
                    <div class="chongzhi_btm"><a href="javascript:;" onclick="pay(<?= $info['id']?>)">付款</a><div class="clearfloat"></div></div>			
                <script>
                    function pay(uid){
                        if(uid != ''){
                            var price = $("#price").val();
                            if(price != '' && price > 0){
                                if(!isNaN(price)){
                                    $.ajax({
                                        url:'<?= URL('member.save_bone')?>',
                                        type:'POST',
                                        data:{
                                            uid	:	uid,
                                            price:	price,	
                                        },
                                        success:function(r){
                                            e = eval('(' + r + ')');
                                            if(e.status == '1'){
                                                location.href = "payapi/pagepay/pagepay.php?WIDout_trade_no=" + e.order";
                                            }else{
                                                jAlert('网络繁忙，请稍后重试！','温馨提示');
                                            }	
                                        }
                                    });
                                }else{
                                    jAlert('请输入合法金额','温馨提示');	
                                }
                            }else{
                                jAlert('请输入您要充值的金额','温馨提示');	
                            }
                        }else{
                                jAlert('请先登录','温馨提示');
                        }
                    }    
                </script>	
                </div>
                <div id="masklayer" style="display:none;position:fixed;top:0;left:0;height:100%;width:100%;background:#000;opacity:0.5;filter:alpha(opacity=50);z-index:33;"></div>
                <!--弹出充值部分-->
                <div class="czzh_center"><span>最近交易记录</span></div>
                <div class="czzh_btm">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <th style="text-align:left;">来源</th>
                            <th>支出/收入</th> 
                            <th>订单号</th>
                            <th>日期</th>
                            <th>操作</th> 
                        </tr>     
        <?php	if(!empty($count)){
                    foreach($count as $ok => $ov){	?>
                        <tr> 
                            <td style="text-align:left;">
                                <!--<img src="images/xuebi_img_03.png" />-->
                                <span class="td_top"><?php if($ov['sourceType']==1){echo "购买";}else if($ov['sourceType']==2){echo "充值";}else if($ov['sourceType']==4){echo "签到";}else{echo "分享";}?></span>
                                <!--<span class="td_btm">哈尔滨工业大学</span>-->
                            </td>
                            <td><span class="money"><img src="images/student_img_06.png"><?= number_format($ov['integral'],2)?></span></td>
                            <td><span class="order"><?= $ov['oid']?></span></td>
                            <td><span class="date"><?= date("Y-m-d H:i",$ov['addtime'])?></span></td>
                            <td>
                                <span class="success">
                                <?php 
                                    if($ov['sourceType'] == 2){
                                        if($ov['status'] == 1){
                                            echo "已付款";	
                                        }else{
                                            $order = DS("publics2._get","","balance","oid=".$ov['oid']);
                                        ?>
                                 
                                        <a href="javascript:;" onclick="pay1(<?= $ov['oid']?>,<?= $ov['id']?>)">未付款</a>
                                        
                                        <input type="hidden" name="orderid<?= $ov['id']?>" id="orderid<?= $ov['id']?>" value="<?= $ov['oid']?>">
                                        <input type="hidden" name="order<?= $ov['id']?>" id="order<?= $ov['id']?>" value="<?= $order[0]['price']?>">	
                                <?php			
                                        }	
                                    }else{
                                        echo "已到账";	
                                    }
                                ?>
                                </span>
                                <a href="javascript:;" onclick="del(<?= $ov['id']?>)" class="delete">删除</a></td>
                        </tr> 
            <?php	}}?>     
                    </table>
                </div>
                <script>
                
                function pay1(oid,id){
                    var price = $("#order"+id).val();
                    var oid = $("#orderid"+id).val();
                    location.href = "payapi/pagepay/pagepay.php?WIDout_trade_no=" + oid"
                }
                
                function del(oid){
                    if(confirm("确定删除该记录吗？")){
                        $.ajax({
                            url:'<?= URL('member.delOrder')?>',
                            type:'POST',
                            data:{
                                oid : oid,
                            },
                            success:function(r){
                                e = eval('(' + r + ')');
                                if(e.status == '1'){
                                    jAlert(e.info,'温馨提示');
                                    location.reload(true); 
                                }else{
                                    jAlert(e.info,'温馨提示');
                                }	
                            }
                        });
                    }	
                }
                </script>
                <div class="fenye">
                    <?php if(!empty($count)){
                            echo $cpagehtml;
                     }else{
                        echo "暂无交易";		 
                    }
                     ?>
                </div>
            </div>
            <div id="con_myzh_2" style="display:none;">
                <div class="chongzhi">
                    <h3>学币赚取规则：</h3>
                    <p><span>*</span>1元=10学币</p> 
                    <p><span>*</span>分享一个好友并好友登陆得1学币</p>
                    <p><span>*</span>分享一个好友并好友注册得50学币</p>
                    <p><span>*</span>社区签到得5学币</p>
                </div>
            </div>                            
        </div>
    </div> 
    <?php	}	if($tid == 7){?>
    <!-- 个人资料-->
    <div id="con_one_7">
        <form action="<?=URL("member.save_information")?>" method="post" id="saveform"  enctype="multipart/form-data">
            <div class="person_left">
                <img src="<?= !empty($info['logo'])?$info['logo']:'images/course_conimg_27.png'?>" id="img1View" style="width:290px;height:250px"/>
                    <!--<span>个人头像</span><a href="" class="sctx"><span>上传头像</span></a>-->
                    <style>
                        input#img1{
                            display:none;
                        }
                    </style> 
                <?php						
                    //$upload=APP::N('show_upLoad');
                    $editor = APP :: N('editorModule');
                    echo  $editor->image(1,'img1',!empty($info['logo'])?$info['logo']:'images/course_conimg_27.png','上传头像');
                    //echo $upload->showUpload('pic',1,'logo',$info["logo"],'zh_CN','url','image','class="kuang"');
                ?>  
                <p style="width:170px"><span style="font-size:12px">建议尺寸：宽55px;高55px</span></p>
               <p><input type="button" name="Img1" id="Img1" value="修改头像" class="bc_btn" onclick="addImg()"/></p>
            </div>
            <div class="person_right" style="margin-left:90px">
            <style>
				#img1Btn{display:none}
			</style>
                <p><span>昵称</span><input type="text" name="realname" id="realname" value="<?= $info['realname']?>"/></p>
                <p id="gender"><span>性别</span><a href="javascript:;" id="sex_1" <?= $info['sex'] == 1 ? 'style="background:#369998;color:#fff;"':''?> onclick="setsex(this,1)">男</a><a href="javascript:;" onclick="setsex(this,0)" id="sex_0"  <?= $info['sex'] == 0 ? 'style="background:#369998;color:#fff;"':''?>>女</a><a href="javascript:;" onclick="setsex(this,2)" id="sex_2"  <?= $info['sex'] == 2 ? 'style="background:#369998;color:#fff;"':''?>>保密</a></p>
                <input type="hidden" id="sex" name="sex" value="<?= $info['sex']?>">
                <p><span>年龄</span><input type="text" name="age" id="age"  value="<?= $info['age']?>" style="width:30px"/> 岁</p>
                <p><span>联系电话</span><input type="text" name="phone" id="phone"  value="<?= $info['username']?>"/></p>
                <p><span>邮箱</span><input type="text" name="email" id="email"  value="<?= $info['email']?>"/></p> 
                <p><span>所在地</span><select name="location_p" id="location_p" class="f_select" datatype="*" sucmsg=" " mullmsg="请选择省市区!"></select><select name="location_c" id="location_c" class="f_select" datatype="*" sucmsg=" " mullmsg="请选择省市区!"></select><select name="location_a" id="location_a" class="f_select" datatype="*" sucmsg=" " mullmsg="请选择省市区!"></select>
                    <script src="js/region_select.js"></script>
                    <script type="text/javascript">
                        new PCAS("location_p", "location_c", "location_a", "<?= $info['location_p']?>", "<?= $info['location_c']?>", "<?= $info['location_a']?>");
                    </script>
                </p>
                <p><span>详细地址</span><input type="text" name="address" id="address" style="width:250px;" value="<?= $info['address']?>"/></p>
                <p><span class="person_title">个人简介</span><textarea cols="29" rows="5" name="introduce" id="introduce" class="area_style" style="resize:none"><?= $info['introduce']?></textarea></p>
                <p><span>&nbsp;</span><input type="submit" name="" id="" value="保存资料" class="bc_btn" onclick="return check()"/></p>
                
                <script>
					function addImg(){
						$("#img1Btn").click();	
					}
                    function setsex(id,type){
                        //alert(type);
                        $("#sex").val(type);
                        $("#gender a").css({"background":"#EEEEEE","color":"black"}); 
                        $("#sex_"+type).css({"background":"#369998","color":"#fff"});
                    }
    
                    function check(){
                        var phone = $('#phone').val();
                        var email = $('#email').val()
                        var emlReg = email.match(/^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/);
                        var telReg = phone.match(/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/); 
                        //alert(telReg)    
                        
                        if($('#realname').val()==''){
                            alert('请填写昵称');
                            $('#realname').focus();
                            return false;
                        }
                        
                        if($('#phone').val()==''){
                            alert('请填写联系电话');
                            $('#phone').focus();
                            return false;
                        }
                        
                        if(telReg == null){
                            alert('联系电话不合法');
                            $("#phone").focus();
                             return false;		
                        }
                        
                        if($('#email').val()==''){
                            alert('请填写邮箱');
                            $('#email').focus();
                            return false;
                        }
                        
                        if(emlReg == null){
                            alert('邮箱不合法');
                            $("#phone").focus();
                             return false;		
                        }
                        
                        if($('#address').val()==''){
                            alert('请填写详细地址');
                            $('#address').focus();
                            return false;
                        }
                        $("#saveform").submit();
                                    
                    }		
                </script>
            </div>
        </form>
        <div class="clearfloat"></div>
    </div>
    <?php	}	if($tid == 8){?>
    <!-- 安全中心-->
    <div id="con_one_8">                        
       <div class="safe_top">
            建议您启动全部安全设置，以保障账号及资金安全
        </div>
        <div class="safe_btm">
            <div class="safe_con">
                <h3>登录密码</h3>
                <p>互联网账号存在被盗风险，建议您定期更改密码以保护账号安全。</p>
                <a href="<?= URL('member.pass','&tid=8')?>">修改</a>
                <div class="clearfloat"></div>
            </div>
        </div>
        <div class="safe_btm">
            <div class="safe_con">
                <h3>绑定手机</h3>
                <p>绑定后，可以使用手机找回密码，收到老师的指导信息等。</p>
                <a href="<?= URL('member.phone','&tid=8')?>"><?= empty($info['phone'])?"立即绑定":"已绑定"?></a>
                <div class="clearfloat"></div>
            </div>
        </div>
        <div class="safe_btm">
            <div class="safe_con">
                <h3>绑定QQ</h3>
                <p>绑定后，可以通过QQ登陆我们的网站。</p>
                <a href="<?= URL('member.qq','&tid=8')?>"><?= empty($info['qq'])?"立即绑定":"已绑定"?></a>
                <div class="clearfloat"></div>
            </div>
        </div>
        <div class="safe_btm" style="border-bottom:dashed 1px #dfdfdf;">
            <div class="safe_con">
                <h3>绑定邮箱</h3>
                <p>绑定后，可以使用手机找回密码，收到老师的指导信息等。</p>
                <a href="<?= URL('member.email','&tid=8')?>"><?= empty($info['email'])?"立即绑定":"已绑定"?></a>
                <div class="clearfloat"></div>
            </div>
        </div>
    </div>
    <?php	}?>
</div>
<script>
function del_question(qid){
	$.ajax({  
		url:'<?= URL('member.delquestion')?>',                   
		type:'POST',
		data:{qid:qid},
		success:function(r){
			e = eval('(' + r + ')');
			if(e.status == '1'){
				location.reload(true);
			}else{
				jAlert(e.info,'温馨提示');	
			} 
		}
	});		
}
function delColl(sysid,uid){
	$.ajax({  
		url:'<?= URL('member.delColl')?>',                   
		type:'POST',
		data:{sysid:sysid},
		success:function(r){
			e = eval('(' + r + ')');
			if(e.status == '1'){
				location.reload(true);
			}else{
				jAlert(e.info,'温馨提示');	
			} 
		}
	});	
}
</script>