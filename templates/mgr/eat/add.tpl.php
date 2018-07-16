<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $linkname;?>管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>css/admin/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.pop{ margin:inherit; width:inherit;}
</style>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery-1.7.2.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/Validform_Datatype.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/Validform_v5.3.2_ncr_min.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/qiehuan.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/map.js"></script>

<?php $editor = APP :: N('editorModule');?>
<!--百度编辑器 开始-->
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_all.js"></script>
<!--百度编辑器 结束-->
</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span><?= $linkname;?>管理<span>&gt;</span><?= isset($info['classid']) && intval($info['classid']) > 0 ? "修改" : "添加";?><?= $linkname;?></p>
    </div>
    <div class="main-cont">
        <h3 class="title">
		<a class="btn-general"  href="<?= URL('mgr/eat','bid='.$bid.'&classid='.V('r:classid'))?>"><span>返回列表</span></a><?= isset($info['classid']) && intval($info['classid']) > 0 ? "修改" : "添加" ;?><?= $linkname;?>
		</h3>
        <style>.ww1 li a:hover{ text-decoration:none;}</style>
        <div class="conh1">
            <ul class="ww1">
                <li class="s" onclick="$('#btn1').show();butong_net(this,'butong_net1');"><a href="javascript:;">通用信息</a></li>
                <li onclick="$('#btn1').show();butong_net(this,'butong_net1');"><a href="javascript:;" id="step2">店面信息</a></li>
                <li onclick="$('#btn1').hide();butong_net(this,'butong_net1');" style="display:<?= isset($info['id']) && intval($info['id']) > 0 ? 'block' : 'none' ;?>;" id="picLi"><a href="javascript:;">相册</a></li>
            </ul>
			<div class="clear"></div>
            
            <div id="butong_net1">
            <div class="set-area">
                <div class="form web-info-form">
                    <form id="form" method="post" action="<?= URL('mgr/eat.savelink')?>">
                        <input type="hidden" name="data[id]" id="id" value="<?= V("g:id")?>" />
                        <input type="hidden" name="data[bid]" id="bid" value="<?= V("g:bid")?>" />
                        <!-- 通用信息 -->
                        <div class="dis" name="f">
                            <div class="form-row"><label class="form-field">＊所属栏目</label>
                            <div class="form-cont">
                            <select name="data[classid]" id="classid" style="background-color:#EEEEEE" datatype="*">
                            <option value="">请选择分类</option>
                            <?php
                            if(isset($classlist) && !empty($classlist)){
                                foreach ($classlist as $rs){
                                    $flag = "";
                                    if($rs["parentid"] == 0){
                                        $flag = "";
                                        if(isset($info["classid"]) && $rs["classid"] == $info["classid"] || V('r:classid') == $rs["classid"])
                                        {
                                            $flag = ' selected="selected"';
                                        }else{
                                            $flag = "";
                                        }
                                        echo '<option value="'.$rs["classid"].'" '.$flag.'>'.$rs["classname"].'</option>';
                                    }
                                    foreach ($classlist as $rss){
                                        if($rss["parentid"]==$rs["classid"]){
                                            $flag = "";
                                            if(isset($info["classid"]) && $rss["classid"]==$info["classid"]){
                                                $flag = ' selected="selected"';
                                            }else{
                                                $flag = "";
                                            }
                                            echo '<option value="'.$rss["classid"].'" '.$flag.'>&nbsp;┣&nbsp;'.$rss["classname"].'</option>';
                                        }
                                    }
                                }
                            }
                            ?>
                            </select>
                            </div>
                            </div>
                            
                            <div class="form-row"><label class="form-field">＊所属菜系</label>
                            <div class="form-cont">
                            <select name="data[classid2]" id="classid2" datatype="*" style="background-color:#EEEEEE">
                            <option value="">请选择菜系</option>
                            <?php 
                            if(isset($classlist2) && !empty($classlist2)){
                                foreach ($classlist2 as $rs){
                                    $flag = "";
                                    if($rs["parentid"] == 0){
                                        $flag = "";
                                        if(isset($info["classid2"]) && $rs["classid"] == $info["classid2"]){
                                            $flag = ' selected="selected"';
                                        }else{
                                            $flag = "";
                                        }
                                        echo '<option value="'.$rs["classid"].'" '.$flag.'>'.$rs["classname"].'</option>';
                                    }
                                    foreach ($classlist2 as $rss){
                                        if($rss["parentid"] == $rs["classid"]){
                                            $flag = "";
                                            if(isset($info["classid2"]) && $rss["classid"] == $info["classid2"]){
                                                $flag = ' selected="selected"';
                                            }else{
                                                $flag = "";
                                            }
                                            echo '<option value="'.$rss["classid"].'" '.$flag.'>&nbsp;┣&nbsp;'.$rss["classname"].'</option>';
                                        }
                                    }
                                }
                            }
                            ?>
                            </select>
                            </div>
                            </div>
            
                            <div class="form-row">
                                <label class="form-field">类别</label>
                                <div class="form-cont">
                                    <label><input type="radio" name="data[category]" value="1" <?= $info["category"] == 1 || !isset($info) ? 'checked="checked"' : '';?>/>中餐</label>
                                    <label><input type="radio" name="data[category]" value="2" <?= $info["category"] == 2 ? 'checked="checked"' : '';?>/>西餐</label>
                                </div>
                            </div>
                            
                            <div class="form-row"><label class="form-field">＊名称</label>
                            <div class="form-cont">
                            <input name="data[title]" type="text" class="input-txt" id="title" value="<?=isset($info["title"]) && !empty($info["title"]) ? $info["title"] : '';?>" maxlength="150" datatype="*"/>
                            </div>
                            </div>
                            
                            <div class="form-row">
                                <label class="form-field">＊人均消费</label>
                                <div class="form-cont">
                                    <select name="data[price_t1]" id="price_t1" datatype="*">
                                        <option value="">选择单位</option>
                                        <?php if(!empty($currency)){
                                            foreach($currency as $key=>$val){?>
                                        <option value="<?= $val['classid'];?>" <?= $val['classid'] == $info["price_t1"] ? 'selected="selected"' : '';?>><?= $val['classname'];?>（<?= $val['uunique'];?>）</option>	
                                        <?php }}?>
                                    </select>
                                    <input name="data[price]" type="text" class="input-txt" id="price"  value="<?= isset($info["price"]) ? isset($info["price"]) : '';?>" datatype="n">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <label class="form-field">服务费</label>
                                <div class="form-cont">
                                    <select name="data[price_t2]" id="price_t2">
                                        <option value="">选择单位</option>
                                        <?php if(!empty($currency)){
                                            foreach($currency as $key=>$val){?>
                                        <option value="<?= $val['classid'];?>" <?= $val['classid'] == $info["price_t2"] ? 'selected="selected"' : '';?>><?= $val['classname'];?>（<?= $val['uunique'];?>）</option>	
                                        <?php }}?>
                                    </select>
                                    <input name="data[s_price]" type="text" class="input-txt" id="s_price"  value="<?= isset($info["s_price"]) ? $info["s_price"] : '';?>">
                                </div>
                            </div>
                            
                            <div class="form-row">
                            <label class="form-field">wifi</label>
                            <div class="form-cont">
                                <label><input type="radio" name="data[wifi]" value="1" <?= $info["wifi"] == 1 ? 'checked="checked"' : '';?>/>是</label>
                                <label><input type="radio" name="data[wifi]" value="0" <?= $info["wifi"] == 0 || !isset($info["wifi"]) ? 'checked="checked"' : '';?>/>否</label>
                            </div>
                            </div>
                            
                            <div class="form-row">
                            <label class="form-field">停车位</label> 
                            <div class="form-cont">
                                <label><input type="radio" name="data[parking]" value="1" <?= $info["parking"] == 1 ? 'checked="checked"' : '';?>/>是</label>
                                <label><input type="radio" name="data[parking]" value="0" <?= $info["parking"] == 0 || !isset($info["parking"]) ? 'checked="checked"' : '';?>/>否</label>
                            </div>
                            </div>
                            
                            <div class="form-row">
                                <label class="form-field">星级</label> 
                                <div class="form-cont">
                                    <label><input type="radio" name="data[level]" value="5" <?= $info["level"] == 5 ? 'checked="checked"' : '';?>/>五星</label>
                                    <label><input type="radio" name="data[level]" value="4" <?= $info["level"] == 4 ? 'checked="checked"' : '';?>/>四星</label>
                                    <label><input type="radio" name="data[level]" value="3" <?= $info["level"] == 3 ? 'checked="checked"' : '';?>/>三星</label>
                                    <label><input type="radio" name="data[level]" value="2" <?= $info["level"] == 2 ? 'checked="checked"' : '';?>/>二星</label>
                                    <label><input type="radio" name="data[level]" value="1" <?= $info["level"] == 1 ? 'checked="checked"' : '';?>/>一星</label>
                                    <label><input type="radio" name="data[level]" value="0" <?= $info["level"] == 0 || !isset($info["level"]) ? 'checked="checked"' : '';?>/>无</label>
                                </div>
                            </div>
                            
                            <div class="form-row">
                              <label class="form-field">推荐理由</label> 
                                <div class="form-cont">
                                <textarea name="data[reason]" id="reason" class="input-area"><?= isset($info) && !empty($info) ? $info["reason"] : "";?></textarea>
                                </div>
                            </div>
                            
                            <div class="form-row">
                              <label class="form-field">预定须知</label> 
                                <div class="form-cont">
                                <textarea id="description" name="data[description]"><?= isset($info) && !empty($info) ? $info["description"] : "";?></textarea>
                                </div>
                                <script type="text/javascript">
                                    var editor = new UE.ui.Editor();
                                    editor.render("description");
                                </script>
                            </div>
                            
                            <div class="form-row">
                             <label class="form-field">排序</label>
                             <div class="form-cont">
                               <input name="data[lmorder]" type="text" class="input-txt" id="lmorder"  value="<?= isset($info["lmorder"]) && !empty($info["lmorder"]) ? $info["lmorder"] : 0;?>" maxlength="50">
                            </div>
                            </div>
                            
                            <div class="form-row">
                            <label class="form-field">属性</label>
                                <div class="form-cont">
                                  <label><input type="checkbox" name="data[recommend]" id="recommend" value="1" <?= isset($info["recommend"]) && $info["recommend"] == 1 ? 'checked="checked"' : '';?> />
                                  推荐</label>
                                  <label><input name="data[audit]" type="checkbox" id="audit" value="1" <?= isset($info["audit"]) && $info["audit"] == 1 ? 'checked="checked"' : '';?>/>
                                  审核</label>
                                  <label><input name="data[top]" type="checkbox" id="top" value="1" <?= isset($info["top"]) && $info["top"] == 1 ? 'checked="checked"' : '';?>/>
                                  置顶</label>
                                </div>
                            </div>
                            
                            <?php if(intval(V("g:id",0)) == 0){?>
                            <div class="btn-area">
                                <a class="btn_genera2" onclick="$('#step2').click();"><span>下一步</span></a>
                            </div>
                            <?php }?>
                        </div>
                        
                        <!-- 店面信息 -->
                        <div class="undis" name="f">
                        	<div class="form-row">
                                <label class="form-field">展示图</label>
                                <div class="form-cont">
                                <?= $editor->image(1,'showPic',isset($info["showPic"]) ? $info["showPic"] : '','上传图片','class="input-txt",style="display:none;"');?>
                                <a class="btn_general" onclick="$('#showPicBtn').click();"><span>上传图片</span></a>
                                </div>
                            </div>
                        	<div class="form-row">
                                <label class="form-field">预览</label>
                                <div class="form-cont">
                              	<img src="<?= isset($info["showPic"]) ? $info["showPic"] : 'n';?>" id="showPicView" height="100" onerror="$(this).hide()"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="form-field">＊联系电话</label>
                                <div class="form-cont">
                                <input name="data[phone]" type="text" class="input-txt" id="phone" value="<?= isset($info["phone"]) && !empty($info["phone"]) ? $info["phone"] : "";?>" datatype="s6-18">
                                </div>
                            </div>
                            <script src="http://api.map.baidu.com/api?key=24ffad3855e675265336a4cfb46d32b4&v=1.1&services=true" type="text/javascript"></script>
                            <div class="form-row" style="padding-bottom:10px;">
                                <label class="form-field">＊地址</label>
                                <div class="form-cont">
                                    <input type="text" class="input-txt" name="data[address]" id="suggestId" data-rule-required="true" value="<?= isset($info['address']) ? $info['address'] : '北京市海淀区信息路28号';?>" datatype="*">
                                    <a id="positioning" class="btn_genera2"><span>搜索</span></a>
                                    <p class="form-tips">注意：这个只是模糊定位，准确位置请地图上标注！</p>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <label class="form-field">＊经纬度</label>
                                <input type="text" name="data[lng]" id="lng" class="input-txt" style="width:115px;" value="<?= isset($info['lng']) ? $info['lng'] : '116.319054';?>" datatype="*">
                                <input type="text" name="data[lat]" id="lat" class="input-txt" style="width:115px;" value="<?= isset($info['lat']) ? $info['lat'] : '40.041183';?>" datatype="*">
                            </div>
                            
                            <div class="form-row">
                                <label class="form-field">&nbsp;</label>
                                <div style="float:left; width:84%;">
                                	<div id="l-map" style="width:600px; height:320px;">地图加载中...</div>
                                </div>
                            </div>
                           
                            <script type="text/javascript">
								$(function () {
									var op = { 
										lng: <?= isset($info['lng']) ? $info['lng'] : '116.319054';?>,
										lat: <?= isset($info['lat']) ? $info['lat'] : '40.041183';?>,
										adr: "<?= isset($info['address']) ? $info['address'] : '北京市海淀区信息路28号';?>"
									}
									baidu_map(op);
								})
							</script>
                            
                            <?php if(intval(V("g:id",0)) == 0){?>
                            <div class="btn-area">
                                <a class="btn_genera2" id="btn_sub"><span>确认保存</span></a>
                            </div>
                            <?php }?>
                        </div>
						
						<?php if(intval(V("g:id",0)) > 0){?>
                        <div class="btn-area" id="btn1">
                            <a class="btn_genera2" id="btn_sub"><span>确认保存</span></a>
                        </div>
                        <?php }?>
                    </form>
                    
                    <!-- 相册 -->
                    <form id="form2" method="post" action="<?= URL('mgr/eat.savepic','bid='.V("g:bid").'&classid='.V("g:classid"));?>">
                    	<input type="hidden" name="pid" id="pid" value="<?= V("g:id",0)?>" />
                        <div class="undis" name="f">
                            <?= $editor->images('images','增加图片','style="display:none;"');?>
                            <a href="javascript:void(0);" onclick="$('#imagesBtn').click();" class="btn_genera2"><span>增加图片</span></a>
                            <span style="width:200px;">建议尺寸：300px × 300px　大小：&lt;2M　格式：gif，jpg，jpeg，png，bmp</span>
                            <div class="clear" style="height:10px;"></div>
                            <table id="imgTable" class="table1">
                                <tr style="background:#F1F7FC;">
                                    <td>预览</td>
                                    <td>图片描述</td>
                                    <td>图片格式</td>
                                    <td>排序</td>
                                    <td>删除</td>
                                </tr>
        						<?php if(!empty($info_pic)){
									foreach($info_pic as $key=>$val){
								?>
                                <tr class="imgTr" id="imgTr">
                                  <td><div class="add_right"><p>
                                  <input type="hidden" name="id[<?= $key;?>]" value="<?= $val['id'];?>" />
                                  <img src="<?= $val['imgurl'];?>" width="50" height="50" onerror="$(this).hide()"/>
                                  <input type="hidden" name="imgurl[<?= $key;?>]" value="<?= $val['imgurl'];?>" />
                                  </p></div>
                                  </td>
                                  
                                  <td><div class="add_right"><p>
                                  <input name="readme[<?= $key;?>]" value="<?= $val['readme'];?>" type="text" class="kuang" datatype="*"/>
                                  </p></div>
                                  </td>
                                  
                                  <td><div class="add_right"><p><?= $val['type'];?><input name="type[<?= $key;?>]" value="<?= $val['type'];?>" type="hidden" /></p></div></td>
                                  
                                  <td><div class="add_right"><p>
                                  <input name="order[<?= $key;?>]" value="<?= $val['order'];?>" type="text" class="kuang MarkOrderList" style="width:60px;" />
                                  </p></div>
                                  </td>
                                  
                                  <td><label><span class="cha deleteImg" style="cursor:pointer" title="删 除"></span></label>
                                  </td>
                                </tr>
                                <?php }}?>
                            </table>
                            <div style="height:30px;"></div>
                            <div class="btn-area">
                                <a class="btn_genera2" id="btn_sub2"><span>确认保存</span></a>
                            </div>
                            <script type="text/javascript">
                                var len = $('.imgTr').length;
                                function imagesfunc(i,data){
                                    var n = parseInt(len+i);
                                    var div = '<tr class="imgTr" id="imgTr'+n+'"><td><div class="add_right"><p><input type="hidden" name="id['+n+']" value="" /><img src="'+data.url+'" width="50" height="50"/><input type="hidden" name="imgurl['+n+']" value="'+data.url+'" /></p></div></td><td><div class="add_right"><p><input name="readme['+n+']" value="'+data.name+'" type="text" class="kuang" /></p></div></td><td><div class="add_right"><p>'+data.ext+'<input name="type['+n+']" value="'+data.ext+'" type="hidden" /></p></div></td><td><div class="add_right"><p><input name="order['+n+']" value="0" type="text" class="kuang MarkOrderList" style="width:60px;" /></p></div></td><td><label><span class="cha deleteImg" style="cursor:pointer" title="删 除" onclick="if(confirm(\'确定删除？\')){$(\'#imgTr'+n+'\').remove();}"></span></label></td></tr>';
                                    $('#imgTable').append(div);
                                }
                            </script>
                        </div>
                    </form>
                </div>
            </div>
            </div>

        </div>
	</div>
<?= V('r:t','') == 'pic' ? '<script>$("#picLi").click();</script>' : '';?>
<script>
	$("#form").Validform({
		btnSubmit:"#btn_sub",
		tiptype:3,
		beforeSubmit:function(curform){
			editor.sync();
		}
	});
	$("#form2").Validform({
		btnSubmit:"#btn_sub2",
		tiptype:3
	});
</script>
</body>
</html>
