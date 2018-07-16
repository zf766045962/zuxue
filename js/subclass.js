// subclass  js
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

//排行榜
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

//听友圈
function circle(){
	var oMore = document.getElementById('circle_more');	
	var oDiv = getByClass(oMore, 'circle-show')[0];
	var timer = null;
	
	oMore.onmouseover=function(){
		clearInterval(timer);
		oDiv.className = 'circle-show show';
	};
	
	oMore.onmouseout=function(){
		timer=setInterval(function(){
			oDiv.className = 'circle-show hide';	
		},500);
	};
};


//选择类别
function publish(){
	var oMore = document.getElementById('publish_more');	
	var oDiv = getByClass(oMore, 'hide')[0];
	var timer = null;
	
	oMore.onmouseover=function(){
		clearInterval(timer);
		oDiv.className = 'list show';
	};
	
	oMore.onmouseout=function(){
		timer=setInterval(function(){
			oDiv.className = 'list hide';	
		},500);
	};
};

//联系人信息
function recipient(){
	//var oDiv = document.getElementById('recipients');
	oDiv = document.getElementsByClassName('recipients');
	var oList = document.getElementById('site_list');
	var oUl = oList.getElementsByTagName('ul')[0];
	var aLi = oUl.getElementsByTagName('li');
	var aInput = oUl.getElementsByTagName('input');
	var aA = oUl.getElementsByTagName('a');
	
	var oShow = document.getElementById('site_new');
	var oBox = document.getElementById('site_box');
	var oBoxLi = oBox.getElementsByTagName('li');
	
	var count  = 1;
	var oSiteBtn = document.getElementById('site_btn');
	var oName = document.getElementById('name');
	var oNumber = document.getElementById('number');
	var oMail = document.getElementById('mail');
	var oCode = document.getElementById('code');
	var oAddees = document.getElementById('addees');
	

	for(var i=0; i<aLi.length; i++){
		aLi[i].index = i;
		aLi[i].onclick=function(){
			for(var i=0; i<aLi.length; i++){
				aInput[i].checked = false;
			};
			aInput[this.index].checked = true;
			//oBox.style.display = 'none';
		};
		
		aInput[i].onclick=function(){
			oBox.style.display = 'none';	
		};
		
		count++;
	};

	
	for(var j=0; j<aA.length; j++){
		if(j%2){
			//删除
			aA[j].onclick=function(){
				var oParentLi = this.parentNode.parentNode;
				oUl.removeChild(oParentLi);
				
				oName.value = '';
				oNumber.value = '';
				oMail.value = '';
				oCode.value = '';
				oAddees.value = '';
			};
		}else{
			//编辑
			aA[j].onclick=function(){
				oBox.style.display = 'block';
				
				var aName = this.parentNode.parentNode.getElementsByTagName('b')[0];				
				var aNumber = this.parentNode.parentNode.getElementsByTagName('span')[1];				
				var aMail = this.parentNode.parentNode.getElementsByTagName('input')[1];
				var aCode = this.parentNode.parentNode.getElementsByTagName('input')[2];				
				var aAddees = this.parentNode.parentNode.getElementsByTagName('span')[0];
		
				oName.value = aName.innerHTML;
				oNumber.value = aNumber.innerHTML;
				oMail.value = aMail.value;
				oCode.value = aCode.value;
				oAddees.value = aAddees.innerHTML;
			};
		};	
	};	
	
	oSiteBtn.onclick=function(){
		if(oShow.children[0].checked == true){
			add();
		}else{
			for(var g=0; g<aLi.length; g++){
				
				if(aLi[g].children[0].checked == true){
					//alert(aInput[g].id);
					//alert(aLi[g].innerHTML);
					var aName = aLi[g].getElementsByTagName('b')[0];				
					var aNumber = aLi[g].getElementsByTagName('span')[1];				
					var aMail = aLi[g].getElementsByTagName('input')[1];
					var aCode = aLi[g].getElementsByTagName('input')[2];				
					var aAddees = aLi[g].getElementsByTagName('span')[0];
			
					 aName.innerHTML = oName.value;
					 aNumber.innerHTML = oNumber.value;
					 aMail.value = oMail.value;
					 aCode.value = oCode.value;
					 aAddees.innerHTML = oAddees.value;
				}
			};
		};
	};
	
	oShow.onclick=function(){
		this.children[0].checked = true;
		oBox.style.display = 'block';
		
		oName.value = '';
		oNumber.value = '';
		oMail.value = '';
		oCode.value = '';
		oAddees.value = '';
	};

	
	function add(){
		var newLi = document.createElement('li');
		//newLi.innerHTML = '<input id="site_list'+count+'" type="radio" value="" name="site_list">'+'<b>'+oNameIn.value+'</b>'+'<span>'+oAddeesIn.value+'</span>'+'<span>'+oNumberIn.value+'</span>'+'<span><a href="javascript:void(0);">编辑</a><a href="javascript:void(0);">删除</a></span>';
		var newInput = document.createElement('input');
		newInput.id = 'site_list'+count;
		newInput.type = 'radio';
		newInput.name = 'site_list';
		
		var newName = document.createElement('b');
		newName.innerHTML = oName.value;
		
		var newAddees = document.createElement('span');
		newAddees.innerHTML = oAddees.value;
		
		var newNumber = document.createElement('span');
		newNumber.innerHTML = oNumber.value;
		
		
		var newMail = document.createElement('input');
		newMail.type = 'hidden';
		newMail.value = oMail.value;
		
		var newCode = document.createElement('input');
		newCode.type = 'hidden';
		newCode.value = oCode.value;
		
		var lastSpan  = document.createElement('span');
		lastSpan.innerHTML = '<a href="javascript:void(0);">编辑</a><a href="javascript:void(0);">删除</a>';
		
		
		
		newLi.appendChild(newInput);
		newLi.appendChild(newName);
		newLi.appendChild(newAddees);
		newLi.appendChild(newNumber);
		newLi.appendChild(lastSpan);
		
		newLi.appendChild(newMail);
		newLi.appendChild(newCode);
		oUl.appendChild(newLi);
		count++;
	};
};


//购物车
function fnCart(){
	var oCart = document.getElementById('shop_tab');
	var aInput = oCart.getElementsByTagName('input');
	var cout = 0;
	
	
	//头部全选
	aInput[0].onclick=function(){
		allChe();
	};
		
	
	function allChe(){
		if(aInput[0].checked == true){
			for(var i=1; i<aInput.length; i++){
					aInput[i].checked = true;
			};
			
			cout = aInput.length - 1;
		}else{
			for(var i=1; i<aInput.length; i++){
				aInput[i].checked = false;
			};
				
			cout = 0;
		};
		
		for(var i=1; i<aInput.length; i++){
			aInput[i].onclick=function(){
				if(this.checked == true){
					cout++;
				}else{
					cout--;
				};
				
				if(cout == aInput.length-1){
					aInput[0].checked = true;
				}else{
					aInput[0].checked = false;
				};
			};
		};
	};
};













