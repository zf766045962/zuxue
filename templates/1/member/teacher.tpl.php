<div class="lib_Contentbox lib_tabborder" id = "safe">
        <?php /*if($tid == 1){*/?>
        <!--我的课程-->
        <!--<div id="con_one_1" class="hover">
            <ul>
                <li><a href="">
                    <img src="images/teacher_img_06.png" />
                    <h4>PDO对象认识与应用1</h4>
                    <img src="images/xuea_img_21.png" class="list_img1"/>
                    <span>3课时&nbsp;36分钟</span>
                    <img src="images/xuea_img_24.png" class="list_img2"/>
                </a></li>
            </ul>
            <div class="clearfloat"></div>
            <div class="fenye">
                <a href="">首页</a><a href="">上一页</a>
                <a href="" class="avtive">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a><a href="">6</a><a href="">7</a>
                <a href="">下一页</a><a href="">尾页</a>
            </div>
        </div>-->
        <?php	/*}*/	if($tid == 2 || $tid == ''){?>
        <!--提问我的-->
        <div id="con_one_2">
            <div class="right_top">
                <!--<input type="text" name="" id="" class="" />
                <a href="" class="top_a sac">我要搜索</a>-->
                <input class="searTxt ff4" type="text" onfocus="if(this.value=='输入问题进行搜索'){this.value='';this.style.color='#333'}" onblur="if(this.value==''){this.value='输入问题进行搜索';this.style.color='#ccc'}" name="pro_name" id="pro_name" value="<?= !empty($pro_name)?$pro_name:'输入问题进行搜索'?>" style="color:#666;">
            <input class="top_a sac" type="button" value="搜索" onclick="ser_form()" />
            <script>
                function ser_form() {
                    var pro_name	=	$("#pro_name").val();
                    alert('请输入要查询的问题')
                    //location.href="<?= URL('product_list','&classid='.$classid.'&classid2='.$classid2.'&price='.$price.'&pro_name=')?>"+pro_name;					
                }
            </script>
            </div>
<?php
	if(!empty($cou_question)){
		foreach($cou_question as $couk=>$couv){
			//提问者信息
			$qInfo = Ds("publics2._get","","users","id=".$couv['uid']);
			
			//问题回复
			$reply = DS("publics2._get","","question_reply","qid=".$couv['id'])
?>
            <div class="pl_bottom">
                <div class="pl_left">
                    <img <?= $qInfo[0]['logo']==''?'src="images/wenda_img_03.png"':'src='.$qInfo[0]['logo']?> class="tx_img"/>
                    <span <?= $couv['isdeal'] == '1'?'class="hot"':'class="hot_d"'?>><?=  $couv['isdeal'] == '1'?'已解决':'待解决'?></span>
                    <span class="jb_name"><?= date('Y-m-d',$couv['innputtime'])?></span><span class="jb_name"><img src="images/wenda_img_06.png" /><?= $qInfo[0]['realname']?></span>
                    <div class="clearfloat"></div>
                    <p class="pl_con"><?= $couv['askquiz']?></p>
                </div>
                <div class="clearfloat"></div>
                <div class="btm_advance">
                    <span>2015-03-01</span><span>11:30</span><a href="<?= URL('reply.question_reply','&qid='.$couv['id'])?>">回答（<?= count($reply)?>）</a>
                </div>
                <div class="clearfloat"></div>
          <?php
          		if(!empty($reply)){
					foreach($reply as $rk=>$rv){
		  ?>
                <p class="pl_content"><?= str_replace('</p>','',str_replace('<p>','',$rv['content']))?></p>
          <?php
					}
				}
		  ?>
            </div>
<?php
		}
		echo "<div class='fenye'>".$coupagehtml."</div>";
	}else{
		echo "<div class='fenye'>暂无内容</div>";	
	}
?>
        </div>
         <?php	}	if($tid == 3){?>
        <!--安全中心-->
        <div id="con_one_3">                        
            <div class="safe_top">
                建议您启动全部安全设置，以保障账号及资金安全
            </div>
            <div class="safe_btm">
                <div class="safe_con">
                    <h3>登录密码</h3>
                    <p>互联网账号存在被盗风险，建议您定期更改密码以保护账号安全。</p>
                    <a href="<?= URL('member.pass','&tid=3')?>">修改</a>
                    <div class="clearfloat"></div>
                </div>
            </div>
            <div class="safe_btm">
                <div class="safe_con">
                    <h3>绑定手机</h3>
                    <p>绑定后，可以使用手机找回密码，收到老师的指导信息等。</p>
                    <a href="<?= URL('member.phone','&tid=3')?>"><?= empty($info['phone'])?"立即绑定":"已绑定"?></a>
                    <div class="clearfloat"></div>
                </div>
            </div>
            <div class="safe_btm">
                <div class="safe_con">
                    <h3>绑定QQ</h3>
                    <p>绑定后，可以通过QQ登陆我们的网站。</p>
                    <a href="<?= URL('member.qq','&tid=3')?>"><?= empty($info['qq'])?"立即绑定":"已绑定"?></a>
                    <div class="clearfloat"></div>
                </div>
            </div>
            <div class="safe_btm" style="border-bottom:dashed 1px #dfdfdf;">
                <div class="safe_con">
                    <h3>绑定邮箱</h3>
                    <p>绑定后，可以使用手机找回密码，收到老师的指导信息等。</p>
                    <a href="<?= URL('member.email','&tid=3')?>"><?= empty($info['email'])?"立即绑定":"已绑定"?></a>
                    <div class="clearfloat"></div>
                </div>
            </div>
        </div>
        <?php	}	if($tid == 4){?>
        <!--个人资料-->
        <div id="con_one_4">
            <form action="<?=URL("member.save_information")?>" method="post" id="saveform"  enctype="multipart/form-data">
            <div class="person_left">
                 <img src="<?= !empty($info['logo'])?$info['logo']:'images/course_conimg_27.png'?>" id="img1View" style="width:290px;height:250px"/>
                    <!--<span>个人头像</span><a href="" class="sctx"><span>上传头像</span></a>-->
                    <style>
						input#img1{
							display:none;
						}
				#img1Btn{display:none}
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
                <p><span>昵称</span><input type="text" name="realname" id="realname" value="<?= $info['realname']?>"/></p>
                <p id="gender"><span>性别</span><a href="javascript:;" id="sex_1" <?= $info['sex'] == 1 ? 'style="background:#369998;color:#fff;"':''?> onclick="setsex(this,1)">男</a><a href="javascript:;" onclick="setsex(this,0)" id="sex_0"  <?= $info['sex'] == 0 ? 'style="background:#369998;color:#fff;"':''?>>女</a><a href="javascript:;" onclick="setsex(this,2)" id="sex_2"  <?= $info['sex'] == 2 ? 'style="background:#369998;color:#fff;"':''?>>保密</a></p>
                <input type="hidden" id="sex" name="sex" value="<?= $info['sex']?>">
                 <p><span>年龄</span><input type="text" name="age" id="age"  value="<?= $info['age']?>" style="width:30px"/> 岁</p>
                <p><span>联系电话</span><input type="text" name="phone" id="phone"  value="<?= $info['phone']?>"/></p>
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
            </form>
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
            <div class="clearfloat"></div>
        </div>
         <?php	}?>
    </div>