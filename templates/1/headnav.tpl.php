<div class="headNav">
        <div class="navCon main">
            <div class="navCon-cate fl navCon_on">
                <div class="navCon-cate-title ff8"><a href="#">听书分类</a></div>
                <div class="cateMenu hide">
                    <ul>
                    	<?php $bookClass = DS('publics.get_info','','goods_class','bid=1 and parentid=1 and is_show=1','lmorder','');
						if(!empty($bookClass)){
							foreach($bookClass as $key=>$val){
								echo $key % 2 == 0 ? '<li>' : '' ;
								$thisNum	=	DS('publics._get','','goods','is_on_sale=1 and classid="'.$val['classid'].'"');
						?>
                        	<span class="ff4 fl">
                            	<p><a href="<?= URL('goods','&classid='.$val['classid'])?>"><?= $val['classname'];?></a></p>
                            	<?php /*
                                <p><em><?= count($thisNum)?></em></p>
                                */ ?>
                            </span>
                        
						<?php echo $key % 2 == 1 ? '</li>' : '';
							}}
						?>
                        
                    </ul>
                </div>
            </div>
            
            <div class="navCon-menu fl ff4">
                <ul>
					<? if($fid == NULL){
						$fid =8;
						}?>
                	<?php // 获取导航数据
					$nav = DS('publics.get_list','',0);
						if(!empty($nav)){
							foreach($nav as $key=>$val){
							if($val['classid'] <= 8){
					?>
                    <li <?= $fid == $val['classid'] ? 'class="cur"' : '';?>><a href="<?= $val['classurl'];?>"><?= $val['classname'];?></a></li>
                    <?php }}}?>
					
                </ul>
            </div>
            
            <div class="nav-cart fr">
            	<dl>
                    <dt class="ff4">
                        <a href="<?=URL("cart.index");?>">购物车</a>
                        <b class="triangle"></b>
                    </dt>
                    <dd id="cart_nav_body">
                    	
                    </dd>
                </dl>
            </div>
        </div>
    </div>
<script type="text/javascript" src="/js/cart.js"></script>