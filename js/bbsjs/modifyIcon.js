var uploadUrl = '/uc/webjsp/membericon/upload';
var scropUrl = '/uc/webjsp/membericon/scrop';
$(function () {
    var form = new Form();
    form.init();
});
var Form = function () {
    this.$uploadForm = $("#uploadForm");
    this.$scropForm = $("#scropForm");
    this.$file = $('#file');
    this.$save = $('#save');
    this.allowext = ".jpg,.bmp,.png,.jpeg";
};

$.extend(Form.prototype, {
    init: function () {
        this.dealImg();
        this.initResize(1000);
        this.initFormEvent();
    },
    dealImg: function () {
        _this = this;
        var $img = $('#origImg');
        $img.on('load', function () {
            var w = $(this).width();
            var h = $(this).height();
            $(this).css({
                top: (300 - h) / 2,
                left: (300 - w) / 2
            });
            _this.initImgSelect();
            _this.initImgPreview();
        });
        $img.attr('src', $img.attr('data-src')).removeAttr('data-src');
    },
    initImgSelect: function () {
        $('#origImg').imgAreaSelect({
            aspectRatio: '1:1',
            handles: true,
            fadeSpeed: 10,
            onSelectChange: util.preview,
            x1: 0,
            y1: 0,
            x2: 50,
            y2: 50
        });
    },
    initResize: function (h) {
        global.resizer.setProperty('minH', h);
        $(document.body).css('min-height', h);
    },
    initImgPreview: function () {
        var selection = {"width": 50, "height": 50, "x1": 0, "y1": 0};
        util.preview($('#origImg'), selection);
    },
    handleSuccess: function (result) {
        $('#origImg').attr("src", result);
        $('#bigImg').attr("src", result);
        $('#middleImg').attr("src", result);
        $('#smallImg').attr("src", result);
        $('#origIconUrl').val(result);
        $('#file').val("");
    },
    isValidImgExt: function () {
        var imgExt = this.$file.val().substr(this.$file.val().lastIndexOf(".")).toLowerCase();
        if (this.allowext != 0 && this.allowext.indexOf(imgExt) == -1) {
            nAlert("文件格式不正确", "提示", function () {
                $('#origImg').data('imgAreaSelect').update();
            });
            $('#origImg').data('imgAreaSelect').update();
            return false;
        }
        return true;
    },
    initFormEvent: function () {
        var _this = this;
        $("#chooseImg").click(function () {
            $("#file").click();
        });
        this.$save.click(function () {
            $('#origIconUrl').val($('#origImg').attr('src'));
            _this.$scropForm.ajaxSubmit({
                type: "post",
                url: scropUrl,
                dataType: "json",
                success: function (result) {
                    result = util.getData(result);
                    if (result == null)return;
                    location.href = result;
                },
                error: function (result) {
                    nAlert("网络错误！", "提示", function () {
                        $('#origImg').data('imgAreaSelect').update();
                    });
                    $('#origImg').data('imgAreaSelect').update();
                }
            });
        });
        this.$file.on("change", function () {
            if (!_this.isValidImgExt()) {
                return;
            }
            if (!$('#file').val()) {
                return;
            }
            _this.$uploadForm.ajaxSubmit({
                type: "post",
                url: uploadUrl,
                dataType: "json",
                success: function (result) {
                    result = util.getData(result);
                    if (result == null)return;
                    _this.handleSuccess(result);
                },
                error: function (result) {
                    nAlert("网络错误！", "提示", function () {
                        $('#origImg').data('imgAreaSelect').update();
                    });
                    $('#origImg').data('imgAreaSelect').update();
                }
            });
        });
    }
});
