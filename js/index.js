// index  js
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


//重磅推荐 
function recommend(){
	var oRecomm = document.getElementById('main_recommend');
	//var oUl = oBd.getElementsByTagName('ul')[0];
	var oUl = getByClass(oRecomm, 'ulWrap')[0];
	var aLi = oUl.getElementsByTagName('li');

	for(var i=0; i<aLi.length; i++){
		aLi[i].index = i;
		aLi[i].onmouseover=function(){
			for(var i=0; i<aLi.length; i++){
				aLi[i].className = '';
			};
			
			this.className = 'cur';
			var oOperate = getByClass(this, 'operate')[0];
			var oShow = getByClass(this, 'info')[0];
			oOperate.className = 'operate show';
			oShow.className = 'info show';
		};
		
		aLi[i].onmouseout=function(){
			aLi[this.index].className = '';
			var oOperate = getByClass(this, 'operate')[0];
			var oShow = getByClass(this, 'info')[0];
			oOperate.className = 'operate hide';
			oShow.className = 'info hide';
		};
	};
};

//精品推荐
function boutique(Id){
	var oBout =  document.getElementById(Id);
	var oUl = getByClass(oBout, 'bd')[0];
	//var oOperate = getByClass(oBout, 'operate');
	//var oShow = getByClass(oBout, 'show-info');
	var aLi = oUl.getElementsByTagName('li');
	
	for(var i=0; i<aLi.length; i++){
		aLi[i].index = i;
		aLi[i].onmouseover=function(){
			for(var i=0; i<aLi.length; i++){
				aLi[i].className = '';
			};
			
			this.className = 'cur';
			var oOperate = this.getElementsByTagName('div')[0];
			var oShow = this.getElementsByTagName('div')[1];
			oOperate.className = 'operate show';
			oShow.className = 'show-info show';
		};
		
		aLi[i].onmouseout=function(){
			aLi[this.index].className = '';
			var oOperate = this.getElementsByTagName('div')[0];
			var oShow = this.getElementsByTagName('div')[1];
			oOperate.className = 'operate hide';
			oShow.className = 'show-info hide';
		};
	};
};

/*新书推荐
function putaway(){
	var oBout =  document.getElementById('main_putaway');
	var oUl = getByClass(oBout, 'bd')[0];
	var aLi = oUl.getElementsByTagName('li');
	var aImg = oUl.getElementsByTagName('img');
	
	for(var i=0; i<aLi.length; i++){
		aLi[i].index = i;
		aLi[i].onmouseover=function(){
			for(var i=0; i<aLi.length; i++){
				aLi[i].className = '';
			};
			
			this.className = 'cur';
			var oOperate = this.getElementsByTagName('div')[0];
			var oShow = this.getElementsByTagName('div')[1];
			oOperate.className = 'operate show';
			oShow.className = 'show-info show';
		};
		
		aLi[i].onmouseout=function(){
			aLi[this.index].className = '';
			var oOperate = this.getElementsByTagName('div')[0];
			var oShow = this.getElementsByTagName('div')[1];
			oOperate.className = 'operate hide';
			oShow.className = 'show-info hide';
		};
	};
};*/

//总排行
function ranking(Id){
	var Id= document.getElementById(Id);
	var oUl = Id.getElementsByTagName('ul')[0];
	var aLi = oUl.getElementsByTagName('li');
	
	for(var i=0; i<aLi.length; i++){
		aLi[i].index = i;
		aLi[i].onmouseover=function(){
			for(var i=0; i<aLi.length; i++){
				aLi[i].className = '';
				var oDetail = aLi[i].getElementsByTagName('div')[0];
				var oHead = aLi[i].getElementsByTagName('div')[1];
				oDetail.className = 'details hide';
				oHead.className = 'headline show ff4';
			};
			
			this.className = 'cur';
			var oDetail = this.getElementsByTagName('div')[0];
			var oHead = this.getElementsByTagName('div')[1];
			oDetail.className = 'details show';
			oHead.className = 'headline hide ff4';
		};
		
		/*aLi[i].onmouseout=function(){
			var oDetail = this.getElementsByTagName('div')[0];
			var oHead = this.getElementsByTagName('div')[1];
			oDetail.className = 'details hide';
			oHead.className = 'headline show ff4';
		};*/
	};
};

function TOP(Id){
	var Id= document.getElementById(Id);
	var oUl = Id.getElementsByTagName('ul')[0];
	var aLi = oUl.getElementsByTagName('li');
	
	//alert(aLi.length);
	for(var i=0; i<aLi.length; i++){
		aLi[i].index = i;
		aLi[i].onmouseover=function(){
			for(var i=0; i<aLi.length; i++){
				aLi[i].className = '';
				var oDetail = aLi[i].getElementsByTagName('div')[0];
				var oHead = aLi[i].getElementsByTagName('div')[1];
				oDetail.className = 'details hide';
				oHead.className = 'headline show ff4';
			};
			
			this.className = 'cur';
			var oDetail = this.getElementsByTagName('div')[0];
			var oHead = this.getElementsByTagName('div')[1];
			oDetail.className = 'details show';
			oHead.className = 'headline hide ff4';
		};
		
		/*aLi[i].onmouseout=function(){
			var oDetail = this.getElementsByTagName('div')[0];
			var oHead = this.getElementsByTagName('div')[1];
			oDetail.className = 'details hide';
			oHead.className = 'headline show ff4';
		};*/
	};
};

jQuery.head_select = function(head_select,inputselectid) {
	var inputselect = $(inputselectid);
	$(head_select+" cite").click(function(){
		var box = $(head_select+" .history-box");
		if(box.css("display")=="none"){
			box.slideDown("fast");
			$(head_select).addClass('select-show');
		}else{
			box.slideUp("fast");
			$(head_select).removeClass('select-show');
		}
	});
};

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