$(function () {
    var cateMenu = function () {
        var cateLiNum = $(".cateMenu li").length;
        $(".cateMenu li").each(function (index, element) {
            if (index < cateLiNum - 1) {
                $(this).mouseenter(function () {
                    var ty = $(this).offset().top - 158;
                    var obj = $(this).find(".list-item");
                    var sh = document.documentElement.scrollTop || document.body.scrollTop;
                    var oy = ty + (obj.height() + 30) + 158 - sh;
                    var dest = oy - $(window).height()
                    if (oy > $(window).height()) {
                        ty = ty - dest - 10;
                    }
                    if (ty < 0) ty = 0;
                    $(this).addClass("on");
                    obj.show();
                    $(".cateMenu li").find(".list-item").stop().animate({ "top": ty });
                    obj.stop().animate({ "top": ty });
                })
                $(this).mouseleave(function () {
                    $(this).removeClass("on");
                    $(this).find(".list-item").hide();
                })
            }
        });

        $(".navCon_on").hover(function(){
            $(".cateMenu").show();
			$(".navCon-cate-title").addClass("hover");
        },
		function () {
		    $(".cateMenu").hide();
			$(".navCon-cate-title").removeClass("hover");
		})

    }();
	
	$('.nav-cart').mouseover(function(){
		$(this).find('dd').css('display', 'block');
	});
	
	$('.nav-cart').mouseout(function(){
		$(this).find('dd').css('display', 'none');
	});
});

function getStyle(obj, attr) {
	if(obj.currentStyle) {
		return obj.currentStyle[attr];
	} else {
		return getComputedStyle(obj, false)[attr];
	}
};

function findSame(arr,n){
	for(var i=0; i<arr.length; i++){
		if(arr[i]==n)return true;
	}
	return false;	
};
function getByClass(oParent,sClass){
	if(oParent.getElementsByClassName){
		return oParent.getElementsByClassName(sClass);
	}else{
		var aEle=oParent.getElementsByTagName('*');
	
		var arr=[];
		for(var i=0; i<aEle.length; i++){
			var tmp=aEle[i].className.split(' ');
			if(findSame(tmp,sClass)){
				arr.push(aEle[i]);	
			}
		}
		return arr;
	}
};

//关注
function atten(){
	var oAtten = document.getElementById('head_atten');
	var name = 'head-atten';
	var oAttenBox = getByClass(oAtten, 'atten-box')[0];
	
	oAtten.onmouseover = function(){
		this.className = name+' atten-show';
		oAttenBox.style.display = 'block';	
	};
	
	oAtten.onmouseout = function(){
		this.className = name;
		oAttenBox.style.display = 'none';
	};
};