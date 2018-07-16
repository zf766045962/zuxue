window.onload=function(){
  document.getElementById("aa").style.display = 'none';
  $(".img2 img").fadeIn("slow");
  $("#jsNav").fadeIn("slow");
  $(function(){
	(function(){
		var curr = 0;
		var o = 0;
		var cnum = $("#qh .img2").length;
		$("#jsNav .trigger").each(function(z){
			$(this).click(function(){
				curr = z;
				o++;
				$("#qh .img2").eq(z).fadeIn("slow").siblings(".img2").fadeOut("slow");
				$("#qh .img2").eq(z).css("z-index",o+1);
				$(this).siblings(".trigger").removeClass("imgSelected").end().addClass("imgSelected");
				$("#jsNav").css("z-index",o+20);
				$(".banner_bg").css("z-index",o+19);
				return false;
			});
		});
		$("#qh .img2").eq(0).css("display","block");
		
		var pg = function(flag){
			//flag:true表示前翻， false表示后翻
			if (flag) {
				if (curr == 0) {
					todo = (cnum - 1);
				} else {
					todo = (curr - 1);
				}
			} else {
				if (curr == [cnum-1]) {
					todo = 0;} 
			    else{
				    todo = (curr + 1);}
			}
			$("#jsNav .trigger").eq(todo).click();
		};
		
		//自动翻
		var timer = setInterval(function(){
			pg(false);
		},3000);
		
		//鼠标悬停在触发器上时停止自动翻
		$("#qh").hover(function(){
				clearInterval(timer);
			},
			function(){
				timer = setInterval(function(){
				 pg(false);
				},3000);			
			}
		);
	})();
});
}
