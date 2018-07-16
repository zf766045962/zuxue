/**
 * 右侧浮动：vip快速服务、意见反馈、聊天室
 * 
 * @author 钱志伟 2013-10-21
 */
typeof doyoo != 'undefined' || document.write('<script type="text/javascript" src="http://gate.looyu.com/48606/112691.js">\x3C/script>');
var debug = function(data) {
	if (typeof console != 'undefined') {
		console.info(data);
	}
}

try {
	var url = "/index.php?a=career&m=Public&c=rightFloat";
	$.ajax({
		url : url,
		type : 'GET',
		data : {},
		success : function(html) {
			try {
				$('body').append(html);
				if (typeof doyoo == 'undefined') {
					$('.ft-online').hide();
				} else if ($('.ft-online').length) {
					$('.ft-online').click(function() {
						doyoo.monitor.loop = 99999999;
						doyoo.util.openChat();
						doyoo.util.accept();
						return false;
					});
				}
			} catch (e) {
				debug('ajax callback error:[' + e.name + '] ' + e.message);
			}
		}
	});
} catch (e) {
	debug('right Float error');
}