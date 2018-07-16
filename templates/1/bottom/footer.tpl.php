<!--footer-->

            <div class="footer">
            	<div class="foot_con">
                	<div class="foot_nav">
                    	<ul class="foot_nav_top">
                        	<?
								$footer_list = DS('publics._get','','article_class',' parentid = 7');
								//var_dump($footer_list);
								if(!empty($footer_list)){
									foreach($footer_list as $key => $val){
							?>		
								<li><a href=""><?= $val['classname']?></a></li>
							<?
									}
								}
							?>
                        </ul>
                        <div class="clearfloat"></div>
                        <?
							$class_list = DS('publics._get','','article_class',' parentid = 7 limit 4');
							if(!empty($class_list)){
								foreach($class_list as $klist => $vlist){
						?>
								<ul class="foot_nav_btm">
						<?
									$list = DS('publics._get','','article_class',' parentid = '.$vlist['classid']);
									
									if(!empty($list)){
										foreach($list as $_key => $_val){
						?>
									<li><a href="<?= $_val['classurl']?>" title="<?= $_val['classname']?>"><?= $_val['classname']?></a></li>
							
						<?
										}
									}
						?>
								</ul>
						<?
								}
							}
						?>
                        <ul class="foot_nav_btm" style="margin-right:0;">
                        	<li><a href=""><img src="images/xuea_img_86.png" />官方微博：http://xuer.com</a></li>
                            <li><a href=""><img src="images/xuea_img_90.png" />网站建设咨询邮箱：saleszfangwei.cn</a></li>
                            <li><a href=""><img src="images/xuea_img_93.png" />网站建设咨询电话咨询热线：0755-8268&nbsp;9595</a></li>
                            <li><a href=""><img src="images/xuea_img_96.png" />学啊建设微信：学啊建设</a></li>
                        </ul>
                    </div>
                    <div class="foot_right">
                    	<img src="images/xuea_img_83.png" />
                        <span>扫一扫二维码&nbsp;加为微信好友</span>
                    </div>
                    <div class="clearfloat"></div>
                    <div class="bottom"><p>公告京ICP备09096283&nbsp;&nbsp;Copyright©2014学啊版权所有<span>技术支持：北方互动</span></p></div>
                </div>
            </div>
            <!--footer--end-->
        </div>
    </body>
</html>
