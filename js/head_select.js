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
	/*
	$(head_select+" ul li a").click(function(){
		var txt = $(this).text();
		$(head_select+" cite").html(txt);
		var value = $(this).attr("selectid");
		inputselect.val(value);
		$(head_select+" ul").hide();
		
	});
	
	$(document).click(function(){
		$(head_select+" .history-box").hide();
	});*/
};