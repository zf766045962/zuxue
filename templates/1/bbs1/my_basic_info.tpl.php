<!--Header-->
<?= TPL :: display('bbs/head_basicInfo')?>
<body id="nv_home" class="pg_spacecp" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="hd">
	<?php
		//头部导航
    	TPL :: display('bbs/hd');
		$uid = $_SESSION['u_uidss'];
		$re = DS('publics.get_info','','users',"id='".$uid."'");
		$username = $re[0]['username'];//echo $username;//var_dump($re);//var_dump($re1);
		$date = DS('publics._get','','user_info1','uid='.$uid);	
	?>
</div>               
<div id="wp" class="wp">

	<!--右侧导航开始-->
	<div class="back_left bdl ">
        <dl class="a" id="lf_">
            <dt>个人中心</dt> 
            <dd ><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
            <dd ><a href="<?= URL('bbsUser.my_submit')?>" title="帖子">帖子</a></dd>
           <?php /*?> <dd  ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd><?php */?>
            <dd ><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
            <?php /*?><dd  class="bdl_a" ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><?php */?>				
            <dd ></dd><dd ><div style="height:18px; width:100%;"></div></dd>
        </dl>
	</div>
    <!--右侧导航结束-->
    
	<ul class="main_wp settinglist">
		<li class="items_setlist a" style="border:none;"><a class="stitle"><span>个人资料</span><span class="collapsed"></span></a></li>	
		<li>
        	<div>
				<ul class="tb cl">
					<li  class="a"><a href="<?= URL('bbsUser.my_basic_info')?>">基本资料</a></li>
                    <li ><a href="<?= URL('bbsUser.my_profession_info')?>">职业信息</a></li>
                    <li ><a href="<?= URL('bbsUser.my_activity_info')?>">活动信息</a></li>
                    <li ><a href="<?= URL('bbsUser.my_info')?>">个人信息</a></li>
				</ul><iframe id="frame_profile" name="frame_profile" style="display: none"></iframe>
				<!--<form action="<?php //URL('bbsUser.saveUserInfo',"&username=$username&iid=1")?>" method="post" id="frm" enctype="multipart/form-data" onSubmit="return test();">-->
<form  id = "formsubmit"  enctype="multipart/form-data" method="post" action="<?=URL('bbs2.insrtsa')?>">
<input type="hidden" name="formhash" value="87a364a4">
<table cellspacing="0" cellpadding="0" id="profilelist" class="profile_setlist input_w_316">
<tbody><tr>
<th>用户名</th>
<td><?=$username?></td>
<td>&nbsp;</td>
</tr>                    	<tr class="select_w_316" id="tr_gender">
                        <th id="th_gender">性别</th>
<td id="td_gender">
	
<span class="simselect"><strong title="<?=$date[0]['gender']==NULL?'保密':$date[0]['gender']?>"><?=$date[0]['gender']==NULL?'保密':$date[0]['gender']?></strong><em class="arrow_dark"></em>
<select id="gender" name="date[gender]" ischange="true" >
	<option  value="保密">保密</option>
	<option  value="男">男</option>
	<option  value="女">女</option>
</select>
<ul style="width: 67px; display: none;" class="selectbox_simu"><li><a attribute="0">保密</a></li><li><a attribute="1">男</a></li><li style="border:none;"><a attribute="2">女</a></li></ul></span><div id="showerror_gender" class="rq mtn"></div><p class="d"></p></td>
</tr>
                    	<tr class="select_w_102" id="tr_birthday"><th id="th_birthday">生日</th>
						
<td id="td_birthday">
<span class="simselect"><strong title="<?=$date[0]['birthyear']==NULL?'年':$date[0]['birthyear']?>"><?=$date[0]['birthyear']==NULL?'年':$date[0]['birthyear']?></strong><em class="arrow_dark"></em><select id="birthyear" name="date[birthyear]" ischange="true" onChange="showbirthday();"><option value="">年</option><option selected="" value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option></select><ul style="width: 71px; height: 240px; overflow-y: auto; display: none;" class="selectbox_simu"><li><a attribute="">年</a></li><li><a attribute="2014">2014</a></li><li><a attribute="2013">2013</a></li><li><a attribute="2012">2012</a></li><li><a attribute="2011">2011</a></li><li><a attribute="2010">2010</a></li><li><a attribute="2009">2009</a></li><li><a attribute="2008">2008</a></li><li><a attribute="2007">2007</a></li><li><a attribute="2006">2006</a></li><li><a attribute="2005">2005</a></li><li><a attribute="2004">2004</a></li><li><a attribute="2003">2003</a></li><li><a attribute="2002">2002</a></li><li><a attribute="2001">2001</a></li><li><a attribute="2000">2000</a></li><li><a attribute="1999">1999</a></li><li><a attribute="1998">1998</a></li><li><a attribute="1997">1997</a></li><li><a attribute="1996">1996</a></li><li><a attribute="1995">1995</a></li><li><a attribute="1994">1994</a></li><li><a attribute="1993">1993</a></li><li><a attribute="1992">1992</a></li><li><a attribute="1991">1991</a></li><li><a attribute="1990">1990</a></li><li><a attribute="1989">1989</a></li><li><a attribute="1988">1988</a></li><li><a attribute="1987">1987</a></li><li><a attribute="1986">1986</a></li><li><a attribute="1985">1985</a></li><li><a attribute="1984">1984</a></li><li><a attribute="1983">1983</a></li><li><a attribute="1982">1982</a></li><li><a attribute="1981">1981</a></li><li><a attribute="1980">1980</a></li><li><a attribute="1979">1979</a></li><li><a attribute="1978">1978</a></li><li><a attribute="1977">1977</a></li><li><a attribute="1976">1976</a></li><li><a attribute="1975">1975</a></li><li><a attribute="1974">1974</a></li><li><a attribute="1973">1973</a></li><li><a attribute="1972">1972</a></li><li><a attribute="1971">1971</a></li><li><a attribute="1970">1970</a></li><li><a attribute="1969">1969</a></li><li><a attribute="1968">1968</a></li><li><a attribute="1967">1967</a></li><li><a attribute="1966">1966</a></li><li><a attribute="1965">1965</a></li><li><a attribute="1964">1964</a></li><li><a attribute="1963">1963</a></li><li><a attribute="1962">1962</a></li><li><a attribute="1961">1961</a></li><li><a attribute="1960">1960</a></li><li><a attribute="1959">1959</a></li><li><a attribute="1958">1958</a></li><li><a attribute="1957">1957</a></li><li><a attribute="1956">1956</a></li><li><a attribute="1955">1955</a></li><li><a attribute="1954">1954</a></li><li><a attribute="1953">1953</a></li><li><a attribute="1952">1952</a></li><li><a attribute="1951">1951</a></li><li><a attribute="1950">1950</a></li><li><a attribute="1949">1949</a></li><li><a attribute="1948">1948</a></li><li><a attribute="1947">1947</a></li><li><a attribute="1946">1946</a></li><li><a attribute="1945">1945</a></li><li><a attribute="1944">1944</a></li><li><a attribute="1943">1943</a></li><li><a attribute="1942">1942</a></li><li><a attribute="1941">1941</a></li><li><a attribute="1940">1940</a></li><li><a attribute="1939">1939</a></li><li><a attribute="1938">1938</a></li><li><a attribute="1937">1937</a></li><li><a attribute="1936">1936</a></li><li><a attribute="1935">1935</a></li><li><a attribute="1934">1934</a></li><li><a attribute="1933">1933</a></li><li><a attribute="1932">1932</a></li><li><a attribute="1931">1931</a></li><li><a attribute="1930">1930</a></li><li><a attribute="1929">1929</a></li><li><a attribute="1928">1928</a></li><li><a attribute="1927">1927</a></li><li><a attribute="1926">1926</a></li><li><a attribute="1925">1925</a></li><li><a attribute="1924">1924</a></li><li><a attribute="1923">1923</a></li><li><a attribute="1922">1922</a></li><li><a attribute="1921">1921</a></li><li><a attribute="1920">1920</a></li><li><a attribute="1919">1919</a></li><li><a attribute="1918">1918</a></li><li><a attribute="1917">1917</a></li><li><a attribute="1916">1916</a></li><li style="border:none;"><a attribute="1915">1915</a></li></ul></span><span class="simselect">
<strong title="<?=$date[0]['birthmonth']==NULL?'月':$date[0]['birthmonth']?>"><?=$date[0]['birthmonth']==NULL?'月':$date[0]['birthmonth']?></strong><em class="arrow_dark"></em><select id="birthmonth" name="date[birthmonth]" ischange="true" onChange="showbirthday();"><option value="">月</option><option selected="" value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select><ul style="width: 55px; height: 240px; overflow-y: auto; display: none;" class="selectbox_simu"><li><a attribute="">月</a></li><li><a attribute="1">1</a></li><li><a attribute="2">2</a></li><li><a attribute="3">3</a></li><li><a attribute="4">4</a></li><li><a attribute="5">5</a></li><li><a attribute="6">6</a></li><li><a attribute="7">7</a></li><li><a attribute="8">8</a></li><li><a attribute="9">9</a></li><li><a attribute="10">10</a></li><li><a attribute="11">11</a></li><li style="border:none;"><a attribute="12">12</a></li></ul></span><span class="simselect"><strong title="<?=$date[0]['birthday']==NULL?'日':$date[0]['birthday']?>"><?=$date[0]['birthday']==NULL?'日':$date[0]['birthday']?></strong><em class="arrow_dark"></em><select id="birthday" name="date[birthday]" ischange="true" onChange="undefined"><option value="">日</option><option selected="" value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><ul style="width: 55px; height: 240px; overflow-y: auto; display: none;" class="selectbox_simu"><li><a attribute="">日</a></li><li><a attribute="1">1</a></li><li><a attribute="2">2</a></li><li><a attribute="3">3</a></li><li><a attribute="4">4</a></li><li><a attribute="5">5</a></li><li><a attribute="6">6</a></li><li><a attribute="7">7</a></li><li><a attribute="8">8</a></li><li><a attribute="9">9</a></li><li><a attribute="10">10</a></li><li><a attribute="11">11</a></li><li><a attribute="12">12</a></li><li><a attribute="13">13</a></li><li><a attribute="14">14</a></li><li><a attribute="15">15</a></li><li><a attribute="16">16</a></li><li><a attribute="17">17</a></li><li><a attribute="18">18</a></li><li><a attribute="19">19</a></li><li><a attribute="20">20</a></li><li><a attribute="21">21</a></li><li><a attribute="22">22</a></li><li><a attribute="23">23</a></li><li><a attribute="24">24</a></li><li><a attribute="25">25</a></li><li><a attribute="26">26</a></li><li><a attribute="27">27</a></li><li><a attribute="28">28</a></li><li><a attribute="29">29</a></li><li><a attribute="30">30</a></li><li style="border:none;"><a attribute="31">31</a></li></ul></span><div id="showerror_birthday" class="rq mtn"></div><p class="d"></p></td>
</tr>
                    	<tr class="select_w_316" id="tr_qq">
                        <th id="th_qq">QQ</th>
<td id="td_qq">
<input type="text" tabindex="1" value="<?=$date[0]['qq']?>" class="px" id="qq" name="date[qq]"><div id="showerror_qq" class="rq mtn"></div><p class="d"></p></td>
</tr>
                    	<tr class="select_w_316" id="tr_field1">
                        <th id="th_field1">微博地址</th>
<td id="td_field1">
<input type="text" tabindex="1" value="<?=$date[0]['microblog']?>" class="px" id="field1" name="date[microblog]"><div id="showerror_field1" class="rq mtn"></div><p class="d"></p></td>
</tr>
                    	<tr class="select_w_102" id="tr_residecity"><th id="th_residecity">居住地</th>
<td id="td_residecity"><input type="text" tabindex="1" value="<?=$date[0]['live_abode']?>" class="px" id="field1" name="date[live_abode]"><div id="showerror_field2" class="rq mtn"></div><p class="d"></p> </td>
</tr>
                    	<tr class="select_w_316" id="tr_field3">
                        <th id="th_field3"><!--<span title="必填" class="rq">*</span>-->邮箱</th>
<td id="td_field3">
<input type="text" tabindex="1" value="<?=$date[0]['email']?>" class="px" id="field3" name="date[email]"><div id="showerror_field3" class="rq mtn"></div><p class="d"></p></td>
</tr>

<!--<tr class="select_w_316" id="tr_privacy">
<th id="th_privacy">隐私保护</th>
<td id="td_privacy">
<span class="simselect"><strong title="<?=$date[0]['show1']==NULL?'公开':$date[0]['show1']?>">
<? 
	if($date[0]['show1'] == 0){
		echo '公开';
	}else if($date[0]['show1'] == 3){
		echo '保密';
	}else if($date[0]['show1'] == 1){
		echo '好友可见';
		} 
?>

</strong><em class="arrow_dark"></em><select id="" name="date[show1]">
<option selected="selected" value="0">公开</option>
<?php /*?><option value="1">好友可见</option><?php */?>
<option value="3">保密</option>
</select><ul style="width: 95px; display: none;" class="selectbox_simu">
<li><a attribute="0">公开</a></li>
<?php /*?><li><a attribute="1">好友可见</a></li><?php */?>
<li style="border:none;"><a attribute="3">保密</a></li></ul></span>
</td>
</tr>-->

<tr>
<td class="btnbar_setlist" colspan="3">
<input type="hidden" value="true" name="profilesubmit">
<button class="normalbtn bluebtn" value="true" id="profilesubmitbtn" name="profilesubmitbtn" type="botton" onClick="sub1()"><strong>保存</strong></button>
<span class="rq" id="submit_result"></span>
</td>
</tr>
</tbody></table>
</form>
				<!--</form>-->
<script>
	function sub1(){
		
		document.getElementById('formsubmit').submit()
		
		}
</script>				
				
<script>  
    function infoSubmit(){
		document.getElementById('profilesubmitbtn').style.display="none";
		document.getElementById('profilesubmitbtn1').style.display="";
		var gender = document.getElementById('gender').value;//alert(gender);
		var birthyear = document.getElementById('birthyear').value;//alert(birthyear);
		var birthmonth = document.getElementById('birthmonth').value;//alert(birthmonth);
		var birthday = document.getElementById('birthday').value;//alert(privacy3);
		var qq = document.getElementById('qq').value;//alert(qq);
		var field1 = document.getElementById('field1').value;//alert(field1);
		var resideprovince = document.getElementById('resideprovince').value;//alert(resideprovince);
		var field3 = document.getElementById('field3').value;//alert(field3);
		var privacy1 = document.getElementById('privacy1').value;//alert(privacy1);
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();	
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 	
		}
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				if(xmlhttp.responseText == "1" || xmlhttp.responseText == "2"){
					window.location.href = "<?= URL('bbsUser.my_basic_info')?>";			
				}else{
					alert(xmlhttp.responseText);
					document.getElementById('profilesubmitbtn1').style.display="none";
					document.getElementById('profilesubmitbtn').style.display="";
				}
			}	
		}
		xmlhttp.open("GET","<?= URL('bbsUser.saveUserInfo',"&username=$username&gender=")?>"+gender+"&iid=1&birthyear="+birthyear+"&birthmonth="+birthmonth+"&privacy1="+privacy1+"&birthday="+birthday+"&qq="+qq+"&field1="+field1+"&resideprovince="+resideprovince+"&field3="+field3,true);
		xmlhttp.send();					
	}
</script>

<script>
	function test(){
		var frm = document.getElementById('frm');
		var field3 = document.getElementById('field3');
		//alert(field3.value);
		if(field3.value == ''){
			alert('邮箱为必填项');
			field3.focus();
			return false;
		}else{
			frm.submit();
		}
	}
</script>
<script type="text/javascript">
	function change() 
	{
		document.getElementById("td_residecity").innerHTML = "<p id='residedistrictbox'><select name='resideprovince' id='resideprovince' class='ps' onChange='showdistrict('residedistrictbox', ['resideprovince', 'residecity', 'residedist', 'residecommunity'], 1, 1, 'reside')' tabindex='1' ischange='true' ><option value='' selected>省份</option><option did='1' value='北京市'>北京市</option><option did='2' value='天津市'>天津市</option><option did='3' value='河北省'>河北省</option><option did='4' value='山西省'>山西省</option><option did='5' value='内蒙古自治区'>内蒙古自治区</option><option did='6' value='辽宁省'>辽宁省</option><option did='7' value='吉林省'>吉林省</option><option did='8' value='黑龙江省'>黑龙江省</option><option did='9' value='上海市'>上海市</option><option did='10' value='江苏省'>江苏省</option><option did='11' value='浙江省'>浙江省</option><option did='12' value='安徽省'>安徽省</option><option did='13' value='福建省'>福建省</option><option did='14' value='江西省'>江西省</option><option did='15' value='山东省'>山东省</option><option did='16' value='河南省'>河南省</option><option did='17' value='湖北省'>湖北省</option><option did='18' value='湖南省'>湖南省</option><option did='19' value='广东省'>广东省</option><option did='20' value='广西壮族自治区'>广西壮族自治区</option><option did='21' value='海南省'>海南省</option><option did='22' value='重庆市'>重庆市</option><option did='23' value='四川省'>四川省</option><option did='24' value='贵州省'>贵州省</option><option did='25' value='云南省'>云南省</option><option did='26' value='西藏自治区'>西藏自治区</option><option did='27' value='陕西省'>陕西省</option><option did='28' value='甘肃省'>甘肃省</option><option did='29' value='青海省'>青海省</option><option did='30' value='宁夏回族自治区'>宁夏回族自治区</option><option did='31' value='新疆维吾尔自治区'>新疆维吾尔自治区</option><option did='32' value='台湾省'>台湾省</option><option did='33' value='香港特别行政区'>香港特别行政区</option><option did='34' value='澳门特别行政区'>澳门特别行政区</option><option did='35' value='海外'>海外</option><option did='36' value='其他'>其他</option></select></p><div class='rq mtn' id='showerror_residecity'></div><p class='d'></p>";	
	}
</script>
<script type="text/javascript">
	simSelectFun(".profile_setlist select");
	function show_error(fieldid, extrainfo) {
		var elem = $('th_'+fieldid);
		if(elem) {
			elem.className = "rq";
			fieldname = elem.innerHTML;
			extrainfo = (typeof extrainfo == "string") ? extrainfo : "";
			$('showerror_'+fieldid).innerHTML = "请检查该资料项 " + extrainfo;
			$(fieldid).focus();
		}
	}
	function show_success(message) {
		message = message == '' ? '资料更新成功' : message;
		showDialog(message, 'right', '提示信息', function(){
		top.window.location.href = top.window.location.href;
		}, 0, null, '', '', '', '', 3);
	}
	function clearErrorInfo() {
		var spanObj = $('profilelist').getElementsByTagName("div");
		for(var i in spanObj) {
			if(typeof spanObj[i].id != "undefined" && spanObj[i].id.indexOf("_")) {
				var ids = explode('_', spanObj[i].id);
				if(ids[0] == "showerror") {
					spanObj[i].innerHTML = '';
					$('th_'+ids[1]).className = '';
				}
			}
		}
	}
</script>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<?= TPL :: display('bbs/footer')?>
	<div class="tip_horn"></div>
</div>
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>