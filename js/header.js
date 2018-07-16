/**
 * 公共头部js
 * @author 钱志伟 2014-06-27
 */
//首页
$('[data-pull]').hover(function() {
    $(this).addClass('active');
    $(this).find('.' + $(this).attr('data-pull')).show();
}, function() {
    $(this).removeClass('active');
    $(this).find('.' + $(this).attr('data-pull')).hide();
});

//说好的移动端 二维码　＠ｑｉｈｏｎｇｗｅｉ
$('#appHide span').find('a').mouseover(function(){
   var newIndex = $(this).index();
   
   if(newIndex=='0'){
       var url = "http://www.wyzc.com/app.php?device=iphone";
   }
   if(newIndex=='1'){
       var url = "http://www.wyzc.com/app.php?device=android";
   }
   if(newIndex=='2'){
       var url = "http://www.wyzc.com/app.php?device=ipad";
   }
   if(newIndex=='3'){
       var url = "http://www.wyzc.com/app.php?device=androidpad";
   }
   $('.app-ewm').find('a').attr('href',url);
    $('.app-ewm').show();
});

$('#appHide').mouseleave(function(){
     $('.app-ewm').hide();
});



$('.daohang .aquick').hover(function(){
	 try{
		_czc.push(['_trackEvent', '导航', '滑过', '鼠标滑过导航','5','head_nav_daohang']);
	 }catch(e){
		return true;
	 }
},function(){
});
$('.hezuo .aquick').hover(function(){
	 try{
		_czc.push(['_trackEvent', '合作', '滑过', '鼠标滑过合作加盟','5','head_nav_daohang']);
	 }catch(e){
		return true;
	 }
},function(){
});
if ($('.y-ico-news').html() == '0') {
    $('.fore').find('i').remove(".y-ico-news");
}
$('#tree_name').on({
    focus:function(){
        $(".n-select").show();
    }
});
$('.n-searchbox').hover(function(){},function(){
    $(".n-select").hide();
    $('#tree_name').blur();
});


//搜索
function searchClass() {
    var keyword = $('#tree_name').val();
    if (keyword == '搜索感兴趣的课程' || $.trim(keyword) == '') {
        $('#tree_name').focus();
        return false;
    }
   // $.post(U('course/Index/seachLog'), {keyword: keyword}, function(data) {
         window.location.href = U('search/Index/search', ['title=' + keyword]);
    //}, 'json');
	//$.post(U('course/Index/seachLog'), {keyword: keyword}, function(data) {
   //      window.location.href = U('course/Index/center', ['keyword=' + keyword]);
   // }, 'json');
    
   
}
$('#tree_name').on({
    keydown:function(event){
        //按回车
        if(event.keyCode == 13){ 
            searchClass();
        }else if(event.keyCode == 27){//按esc退出
            $('#tree_name').blur();
        }
    }
});
/*头部屏幕适应*/
$(window).resize(function() {
    var ww = parseInt($(window).width());
    if (ww <= 1000) {
        $('.navbox').addClass('w-content');
    } else if ($('.header').hasClass('n-all-header')) {
        $('.navbox').removeClass('w-content');
    }
});
$('.n-select').load(U('course/Index/courseKeyWord'));

