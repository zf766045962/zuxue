<?php
/**************************************************
*  Created:  2010-06-08
*
*  文件说明
*
*  @Xsmart (C)2006-2099Inc.
*  @Author xionghui <xionghui1@staff.sina.com.cn>
*
***************************************************/

	//栏目ID 下拉框 ID下属所有分类 表xsmart_model_field 1. fielid  字段id 2.value 当前值 3.array 当前字段 所有信息
	function filed_catid($field, $value, $fieldinfo)
	{
		
		$fieldinfo['maxlength']=3;
		$fieldinfo['minlength']=0;
		$fieldinfo['errortips']='请选择……';
		$maxlength=$fieldinfo['maxlength'];
		$minlength=$fieldinfo['minlength'];
		$n="&nbsp;|&nbsp;";
	    $s="&nbsp;|-";
        $data['html']='<div class="form-row"><label class="form-field"><span class="hx">*</span>'.$fieldinfo['name'].'&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div class="form-cont"><input type="hidden" name="data['.$field.']" value="'.$value.'" />';
			 if($flag=='1'){
				 $data['html'].='<input type="hidden"  name="data['.$field.']" value="'.$value.'" /> ';
			 }
             
			
		$data['html'].="<select id=".$field." name=data[".$field."]><option value=0>".$fieldinfo['errortips']."</option>";
		if($value){
				$rss=DR('mgr/arcticlepublish.select_list2','',$fieldinfo['modelid']);
		}else{
				$rss=DR('mgr/arcticlepublish.select_list2','',$fieldinfo['modelid']);
		}
		
		foreach($rss as $row){
		
			if(count(explode(',',$row ['abspath']))>$maxlength){
				 $space = str_repeat ($s, count ( explode(',',$row ['abspath'])) - $maxlength );
				}else $space="";
				
				if($row['parentid']==0)
					$row['classname']="&nbsp;". $row ['classname'];
				else
					$row['classname']=  $space .$s."&nbsp;". $row ['classname'];
			 
			
			 if($row ['classid']==($value))
			 	 $data["html"] .= '<option value="' . $row ['classid'] . '" selected>' . $space . $row ['classname'] . '</option>';
			else 
			    $data["html"] .= '<option value="' . $row ['classid'] . '">' . $space . $row ['classname'] . '</option>';
			
		}
		 $data["html"] .= "</select></div></div>";
		
		
			
		$data["js"]='
		
		var tt=$("#'.$field.'").val();
		if(tt=="0"){
			
			alert("请选择分类！");
			$("#tt").focus();
				return false;	
		}
		';
		
			return $data;
			
			
	}
	
	//标题 文本框
	function filed_title($field, $value, $fieldinfo)
	{
		
		$data["html"]="<div class='form-row'>
							<label class='form-field'><span class='hx'>*</span><strong>".$fieldinfo['name']."</strong></label>
								<div class='form-cont' style='line-height:24px;'>
									<input type='text' class='measure-input input-txt' value='".$value."' id='".$field."' name='data[".$field."]' style='width:300px;'></div></div>";

		$data["js"]='
		var tt=$("#'.$field.'").val();
		if(tt==""){
			alert("请输入标题！");
			$("#tt").focus();
				return false;	
		}
		if(tt.length>='.$fieldinfo['maxlength'].'){
		alert("标题过长！");
		$("#tt").focus();
		return false;	
		}
		';
		return $data;
		
	}
	
	
	
	//关键词 文本框
	function filed_keyword($field, $value, $fieldinfo)
	{
		
		$data["html"].="<div class='form-row' style='line-height:24px;'><label class='form-field'><strong>".$fieldinfo['name']."</strong></label>";
		$data["html"].="<div class='form-cont'><input name='data[".$field."]' class='input-txt' id='".$field."' type='text' size='100' value='".$value."' ><span style='color:#F00'>多关键词之间用,号隔开</span></div></div>";
		
		/*$data["js"]='
		var tt=$("#'.$field.'").val();
		if(tt==""){
			
			alert("请输入关键词！");
			$("#'.$field.'").focus();
				return false;	
		}
		if(tt.length>=255){
			
			alert("关键词过长！");
			$("#'.$field.'").focus();
				return false;	
		}
		';*/
		return $data;
	}
	
	
	//来源  文本框
	//function filed_copyfrom()
	function filed_copyfrom($field, $value, $fieldinfo)
	{
		$data['html'].='<br><br><br><br><br><br><br><br>1';
		$data['html'].='<div class="form-row"><label class="form-field"><strong>来源</strong></label>
                        <div class="form-cont">';
		$data['html'].="<input name='data[".$field."]' class='input-txt'  type='text' size='100' value=".$value."/>";
		$data['html'].='</div></div>';
		return $data;
	}
	
	//  大文本框
	function filed_description($field, $value, $fieldinfo)
	
	{
		
		$data["html"].="<textarea class='input-area; name='data[".$field."]' cols='50' rows='10'  id=".$field." onkeyup='strlen_verify(this, 'description_len', 255)' style='margin-right:0;'>'".$value."'</textarea>";
		
		return $data;
	}
	//摘要
	function filed_textarea($field, $value, $fieldinfo)
	{
		$data['html'].=' <div class="form-row"><label class="form-field"><strong>'.$fieldinfo['name'].'</strong></label>
                        <div class="form-cont">
						<textarea class="input-area" name=data['.$field.'] cols="30" rows="10"  id='.$field.'  style="margin-right:0;">'.$value.'</textarea></div></div>';
		/*$data["js"]='
		
		var tt=$("#'.$field.'").val();
		
		if(tt.length<='.$fieldinfo['minlength'].'){
			
			alert("请输入摘要！");
			$("#'.$field.'").focus();
				return false;	
		}
		if(tt.length>='.$fieldinfo['maxlength'].'){
			
		alert("摘要过长！");
		$("#'.$field.'").focus();
		return false;		
		}
		';*/
		
		return $data;
	}
	//分页方式  多选 是否截取内容字符至内容摘要  多选 是否获取内容第张图片作为标题图片  
	function filed_pages($field, $value, $fieldinfo)
	{
		/*$data['html'].='<div class="form-row" style="line-height:24px;margin-top:20px;"><label class="form-field"><strong>分页方式</strong></label>
            <div class="form-cont">';
		$data["html"].="<input name='data[".$field."]' class='input-txt' id='".$field."' type='text' size='100' value='".$value."' /><span style='color:#F00'>多关键词之间用空格或者','隔开</span></div></div>";
		$data["js"]='
		var tt=$("#'.$field.'").val();
		if(tt==""){
			
			alert("请输入分页方式！");
			$("#'.$field.'").focus();
				return false;	
		}
		';
		return $data;*/
		return "";
	}
	
	//内容
	function filed_editor($field, $value, $fieldinfo)
	{
		$data['html'].='<div class="form-row"><label class="form-field"><span class="hx">*</span><strong>'.$fieldinfo['name'].'</strong></label>
                        <div class="form-cont">';
		$data["html"].='<textarea name="data['.$field.']" style="width:100%; height:auto" id="content">'.$value.'</textarea>';
		//echo '</div></div>';
		//echo ' <style type="text/css">#edui1{ width:100%;}</style>';
		$data["js"]='
		var c=editor.getContent();
			if(c==""){
			alert("请输入内容！");
			$("#c").focus();
			return false;	
		}
		';
		return $data;
	}
	
	//图片上传
	function filed_picture($field, $value, $fieldinfo)
	{
		$upload = APP :: N('show_upLoad');
		$a = $upload->showUpload('pic',1,'data['.$field.']',$value,'zh_CN',$field,'image3','class="input-txt"');
		$data['html']="<div class='form-row'><label class='form-field'><strong>".$fieldinfo['name']."</strong></label><div class='form-cont'>".$a."</div></div>";
		return $data;
	}
	
	
	//  编辑器
	function filed_content($field, $value, $fieldinfo)
	{
		
		
	}
	
	//添加投票  文本框  暂时不错
	function filed_voteid($field, $value, $fieldinfo)
	{
		
	}
	
	
	
	
	//推荐位  文本框  不做 
	function filed_posids($field, $value, $fieldinfo)
	{
		
		
	}
	
	
	
	
	//排序  文本框 
	function filed_listorder($field, $value, $fieldinfo)
	{
		$data['html'].=' <div class="form-row"><label class="form-field"><strong>推荐位</strong></label>
            <div class="form-cont" style="line-height:24px;">
			<label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1"/>首页头条推荐</label>
            <label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1" />首页焦点图推荐</label>
            <label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1" />网站顶部推荐</label>
             <label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1" />栏目首页推荐</label>
			 <label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1" />首页图片推荐</label>
			 </div></div>';
		return $data;
	}
	
	//审核  文本框 
	function filed_status($field, $value, $fieldinfo)
	{
		$data['html'].='<div class="form-row"><label class="form-field"><strong>阅读权限</strong></label>
            <div class="form-cont" style="line-height:24px;">
			<label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1"/>游客</label>
            <label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1" />新手上路</label>
            <label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1" />注册会员</label>
             <label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1" />中级会员</label>
			 <label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1" />高级会员</label>
			 <label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1" />禁止访问</label>
			 <label class="xgsz"><input class="icon-check" type="checkbox" name="data['.$field.']" value="1" />邮件认证</label>
			 </div></div>';
		return $data;
	}
	
	//阅读权限  文本框 //暂时不做
	function filed_groupids_view($field, $value, $fieldinfo)
	{
		
	}
	
	//阅读收费  文本框  //暂时不做
	function filed_readpoint($field, $value, $fieldinfo)
	{
		
	}
	//相关文章  文本框  //暂时不做
	function filed_relation()
	{
		
	}
	//允许评论  文本框  //暂时不做
	function filed_allow_comment()
	{
		
	}
	//缩略图 上传图片image
	//function filed_thumb($field, $value, $fieldinfo)
	function filed_image($field, $value, $fieldinfo)
	{
		/*$data['html'].='<h6>缩略图</h6>
						 <div class="upload-pic img-wrap" style="height:auto;">
						 <div class="yl">
							 <div class="yulan">
								 <input type="button" value="图片浏览" class="button" style="width: 66px;">
								 <input type="file" name="data['.$field.']" id="doc" onchange="javascript:setImagePreview();">
								 </div>
								 <input type="button" value="上传图片" class="button uploadimg" style="width: 66px;">
								 <div style="clear:both;"></div>
							  </div>
                		 <table class="tupianyulan">
							<tr>
								<td id="localImag"><img id="preview" style="diplay:none" src="/css/admin/bgimg/moren.gif"/></td>
							</tr>
                		 </table>';
		$data["html"].='<h6> '.$fieldinfo['name'].'</h6><div class="upload-pic img-wrap" style="height:auto;">
		
		<iframe src="/admin.php?m=mgr/upload.iframe&field=pictureurl&types=0&value='.$value.'&folders=pic&nametype=0")" width="600" height="200" name="UpPicture" id="UpPicture" frameborder="0" scrolling="no"></iframe><br>
		<input name="pictureurl" id="pictureurl" class="input-txt" type="text" size="50" value='.$value.' ></div>
		'; 
		return $data;*/
	}
	//发布时间  文本框 
	function filed_datetime($field, $value, $fieldinfo)
	{
		
		if($value){
			$datetime=$value;
		}else{
			$datetime=date('Y-m-d H:i:s');
			
		}
		$data['html'].='<h6> '.$fieldinfo['name'].'</h6>
		<input name="data['.$field.']" id="'.$field.'" class="date input-txt"  type="text" size="30" onmousemove="this.className="date_on input-txt"" onmouseout="this.className="date input-txt"" value="'.$datetime.'" style="width:168px; margin-right:0;" /><br><br>';
		$data['time']='<script type="text/javascript">
			Calendar.setup({
			weekNumbers: true,
		    inputField : "'.$field.'",
		    trigger    : "'.$field.'",
		    dateFormat: "%Y-%m-%d %H:%M:%S",
		    showTime: true,
			minuteStep: 1,
		    onSelect   : function() {this.hide();}
			});
        </script>';
		return $data;
	}
	//url  文本框 
	function filed_url($field, $value, $fieldinfo)
	{
		$data['html']='<h6> '.$fieldinfo['name'].'</h6>
		<input type="hidden" value="0" name="data['.$field.']">
		<input type="text" class="input-txt" disabled="" maxlength="255" size="25" value="" id="'.$field.'" name="data['.$field.']" style="width:168px; margin-right:0;"> 
		<input type="checkbox" onclick="ruselinkurl();" value="1" id="'.$field.'" name="data['.$field.']" style="vertical-align:middle;">
		 <font color="red">'.$fieldinfo['name'].'</font> ';
		return $data;
	}

	
	//更新时间  点击可以出时间
	function filed_updatetime($field, $value, $fieldinfo)
	{
		
	}
	function filed_islink($field, $value, $fieldinfo)
	{
		
	}
	function filed_text($field, $value, $fieldinfo)
	{
		
	}
	function filed_box($field, $value, $fieldinfo)
	{
		
	}
	function filed_template($field, $value, $fieldinfo)
	{
		
	}
	function filed_number($field, $value, $fieldinfo)
	{
		
	}
	function filed_groupid($field, $value, $fieldinfo)
	{
		
	}
	function filed_posid($field, $value, $fieldinfo)
	{
		
	}
	function filed_omnipotent($field, $value, $fieldinfo)
	{
		
	}
	
	
	
	function filed_typeid($field, $value, $fieldinfo)
	{
		  
	}
	
	
	
