<?php $info1 = DS("publics2._get","","users","id=".$_SESSION['xr_id']);?>
<?php if($info1[0]['type'] == '1'){?>   
<!--------------------------------------------------------------------------老师-------------------------------------------------------->
<link rel="stylesheet" type="text/css" href="css/teacher_course.css" />
<div class="content_left">
    <!--老师 会员信息-->
    <div class="left_top">
        <img <?= !empty($info1[0]['logo'])?"src='".$info1[0]['logo']."'":"src='images/course_conimg_27.png'" ?> class="left_img"/>
        <div class="left_top_right">
            <span class="name" title="<?= $info1[0]["realname"]?>"><?= F("publics.substrByWidth",$info1[0]["realname"],6);?></span>
            <span class="xb">性别：<?php if($info1[0]["sex"]==0){echo "女";}else if($info1[0]["sex"]==1){echo "男";}else{echo "保密";}?></span>
        </div>
        <div class="clearfloat"></div>
    </div>
    
   	<!-- 左边导航-->
    <div class="lib_Menubox lib_tabborder">
        <ul>
           <?php //var_dump($tid);die;?>
           <!--<li id="one1" <?= ($tid == '1' || $tid == '')?'class="hover"':"" ?>><a href="<?= URL('member.xmember','&tid=1');?>" style="color:black">我的课程</a></li>-->
           <li id="one2" <?= ($tid == '2' || $tid == '')?'class="hover"':"" ?>><a href="<?= URL('member.xmember','&tid=2');?>" style="color:black">提问我的</a></li>
           <li id="one3" <?= ($tid == '3')?'class="hover"':"" ?>><a href="<?= URL('member.xmember','&tid=3');?>" style="color:black">安全中心</a></li>
           <li id="one4" <?= ($tid == '4')?'class="hover"':"" ?>><a href="<?= URL('member.xmember','&tid=4');?>" style="color:black">个人资料</a></li>
        </ul>
    </div>
</div>

<?php }else{?>
<!--------------------------------------------------------------------------学生-------------------------------------------------------->
<link rel="stylesheet" type="text/css" href="css/student_course.css" />
<div class="content_left">  
	<!--学生 会员信息-->
    <div class="left_top">
        <img <?= !empty($info1[0]['logo'])?"src='".$info1[0]['logo']."'":"src='images/course_conimg_27.png'" ?> class="left_img"/>
        <div class="left_top_right">
            <span class="name" style="margin-bottom:5px;" title="<?= $info1[0]["realname"]?>"><?= F("publics.substrByWidth",$info1[0]["realname"],6);?><span style="margin-left:10px;" class="xb"><?= $info1[0]["age"]?>岁</span></span>
            <span class="right_span"><img src="images/student_img_06.png"><?= !empty($info1[0]["frozen_money"])? $info1[0]["frozen_money"]:"0" ?></span>
            <span class="xb">学币</span>
            <span class="xb" onclick="makefull()" style="color:#369998;cursor:pointer;display:block;margin-top:5px;border:solid 1px #369998;width:60px;text-align:center;">去充值</span>
        </div>       
        <div class="clearfloat"></div>  
    </div>
    <script>
    	function makefull(){
			window.location.href="<?= URL('member.xmember','&tid=6')?>"
		}
    </script>
    
    <!-- 左边导航-->
    <div class="lib_Menubox lib_tabborder">   
        <ul class="my_course">           
            <li id="one1" <?= ($tid == '1' || $tid == '')?'class="hover"':"" ?>><a href="<?= URL('member.xmember','&tid=1');?>" style="color:black">我的课程</a></li>
            <li id="one2" <?= ($tid == '2')?'class="hover"':"" ?>><a href="<?= URL('member.xmember','&tid=2');?>" style="color:black">我的问答</a></li>
            <li id="one3" <?= ($tid == '3')?'class="hover"':"" ?>><a href="<?= URL('member.xmember','&tid=3');?>" style="color:black">随堂笔记</a></li>
            <li id="one4" <?= ($tid == '4')?'class="hover"':"" ?>><a href="<?= URL('bbsUser.my_submit','&cid=1');?>" style="color:black">我的帖子</a></li>
            <li id="one4" <?= ($tid == '5')?'class="hover"':"" ?>><a href="<?= URL('member.xmember','&tid=5');?>" style="color:black">我的考核</a></li>
            <li id="one4" <?= ($tid == '6')?'class="hover"':"" ?>><a href="<?= URL('member.xmember','&tid=6');?>" style="color:black">账户中心</a></li>
            <li id="one4" <?= ($tid == '7')?'class="hover"':"" ?>><a href="<?= URL('member.xmember','&tid=7');?>" style="color:black">个人资料</a></li>
            <li id="one4" <?= ($tid == '8')?'class="hover"':"" ?>><a href="<?= URL('member.xmember','&tid=8');?>" style="color:black">安全中心</a></li>
        </ul>
    </div>
</div>
<?php }?>