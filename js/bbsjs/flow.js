
function MeizuLogger() {

};
MeizuLogger.prototype = {
    getTime: null,
    defaults: {
        objPool: [],//objXMLHttp
        time: 4
    },
	getHref:function(){//ajax请求的url
		var href=location.href;
		var url=('https:' == document.location.protocol ? 'https://' : 'http://') + 'tongji.meizu.com/flow/mc?';
		return url;
	},
    get: function (action) {//发起请求
        var image = new Image();
        var url = this.getHref() + this.getData(action);
        image.id = "tongji";
        image.src = url;
        image.onload = function (e) {

        };
    },
    render: function () {//入口
        var self = this;
        var url = this.getHref();
        this.topGlobalClick();
        this.get();
    },
    topGlobalClick: function () {//全局点击事件
        var self = this;
        var time = self.defaults.time;

        document.body.onclick = function (event) {
            if (self.getTime) { clearInterval(self.getTime) };
            var bhKey;
            var num = self.defaults.time;
            event = event ? event : window.event;
            var element = event.target || event.srcElement;

            while (element) {
                try {
                    if (element.getAttribute) {
                        bhKey = element.getAttribute("data-bh");
                    }
                } catch (e) {
                    if (element.attributes) {
                        bhKey = element.attributes["data-bh"];
                    }
                };
                if (bhKey) {
                    break;
                } else {
                    element = element.parentNode;
                }
            };

            num = num - 1;
            self.getTime = setInterval(function () {
                num--;
                self.defaults.time = num;
            }, 1000);

            if (bhKey) {
                if (num < 0) {
                    num = time - 1;
                    self.defaults.time = num;
                }
                if (num == time - 1) {
                    self.get(bhKey);
                }
            };
        };
    },
    newGuid: function () {//生成guid
        var guid = "";
        for (var i = 1; i <= 32; i++) {
            var n = Math.floor(Math.random() * 16.0).toString(16);
            guid += n;
        }
        return guid;
    },
    getData: function (action) {//要传的数据
        action = action ? ("&action=" + action) : "";
        var requesturl = location.href;
        var referer = document.referrer;
		var random=parseInt(Math.random()*10000);
        var refcode = this.queryString("refcode");
        if (refcode == null || refcode == "") {
           refcode = this.queryString("refecord");
        }
        var data = "version=1.0&referer=" + referer +  "&random=" + random +"&refcode=" + refcode + "&requesturl=" + requesturl + action;
        return data;
    },
    queryString: function (key, url) {//从地址栏里获取参数
        url = url || location.search;
        url = url.split(/&|\?/);
        var result = "";
        key = String(key).toLowerCase();
        for (var i = 0; i < url.length; i++) {
            var keyValue = url[i];
            var part = keyValue.split("=");
            if (part[0].toLowerCase() == key) {
                result = part[1];
                break;
            }
        }
        return result;
    }
};
var meizuLogger = new MeizuLogger();
meizuLogger.render();
MeizuBH=function(action){
	return meizuLogger.get(action);
}
