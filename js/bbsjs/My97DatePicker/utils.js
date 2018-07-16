var util = {
    tkscsrf: $('#mz_csrf_tks').val(),
    isIe: !!window.ActiveXObject || "ActiveXObject" in window,
    isPlaceholder: "placeholder" in document.createElement("input"),
    isMobile: function(){
        var mobile = /mobile|phone/i;
        var mzDesk = /x11\;/i;
        var ua = navigator.userAgent;
        return mobile.test(ua) || mzDesk.test(ua);
    }(),
    validate: {
        errorClass: "error",
        validClass: "checked",
        errorElement: "span",
        focusInvalid: false,
        onkeyup: function() {},
        errorPlacement: function(error, element) {
            if (!element.hasClass('normalInput')) {
                element = element.parent('.normalInput');
            }
            element.next('.normalTip').remove();
            element.addClass("error");
            error.insertAfter(element);
            element.css('margin-bottom', 10);
        },
        hideError: function (element) {
            if (!element.hasClass('normalInput')) {
                element.removeClass('checked');
                element = element.parent('.normalInput');
            }
            element.removeClass("error");
            element.next("span.error").remove();
            element.css('margin-bottom', 20);
            element.addClass("checked");
        }
    },
    simpleValidate: {
        errorClass: "error",
        validClass: "checked",
        errorElement: "span",
        focusInvalid: false,
        onkeyup: function() {},
        errorPlacement: function(error, element) {
            if (!element.hasClass('normalInput')) {
                element = element.parent('.normalInput');
            }
            element.next('.normalTip').remove();
            element.next('span.error').remove();
            element.addClass("error");
            error.insertAfter(element);
        },
        hideError: function(element) {
            if (!element.hasClass('normalInput')) {
                element.removeClass('checked');
                element = element.parent('.normalInput');
            }
            element.removeClass("error");
            element.next("span.error").remove();
            element.addClass("checked");
        }
    },
    rule: {
        account: {
            required: true,
            rangelength: [4, 32],
            userName: true
        },
        password: {
            required: true,
            accountChar: true,
            rangelength: [8, 16],
            accountTowType: true,
            accountNoEq: true
        },
        resetPassword: {
            required: true,
            accountChar: true,
            rangelength: [8, 16],
            accountTowType: true,
            accountNoEq: true
        },
        repeatPassword: {
            required: true,
            rangelength: [8, 16],
            equalTo: ''
        },
        kapkey: {
            required: true,
            rangelength: [6, 6]
        },
        vcode: {
            required: true,
            rangelength: [6, 6]
        },
        nickname: {
            required: true,
            nicknameLen: [2, 32],
            noEmpty: true,
            nickname: true,
            remote: ''
        },
        email: {
            pRequired: true,
            maxlength: 32,
            pEmail: true
        },
        phone: {
            pRequired: true,
            ppDigits11: true,
            zdiyRemote: ''
        },
        localPhone: {
            pRequired: true,
            pDigits11: true
        },
        mobile: {
            required: true,
            pDigits11: true
        },
        money: {
            required: true,
            number: true,
            money: true,
            range: [0.01, 100]
        },
        accountOrPhone: {
            required: true,
            nameOrD11: true
        },
        questionOne: {
            required: true,
            nickname: true,
            answerLen: [1, 32]
        },
        questionTwo: {
            required: true,
            nickname: true,
            answerLen: [1, 32]
        },
        answer1: {
            required: true,
            nickname: true,
            answerLen: [1, 32]
        },
        answer2: {
            required: true,
            nickname: true,
            answerLen: [1, 32]
        },
        questionOneId: {
            min: 1
        },
        questionTwoId: {
            min: 1
        },
        cardId: {
            required: true,
            rangelength: [17, 17]
        },
        cardPwd: {
            required: true,
            rangelength: [18, 18]
        }
    },
    message: {
        account: {
            required: "请填写账户名",
            rangelength: "账户名长度不对，需输入4-32位",
            userName: '账户名格式不正确',
            remote: function(value, result){
                        var msg = result.message;
                        if(msg == ""){
                            msg = '此账户名已被抢注';
                        }
                        return msg;
                    }
        },
        password: {
            required: "密码不能为空",
            accountChar: '密码仅支持数字、字母和符号',
            rangelength: "密码应为8-16个字符，区分大小写",
            accountTowType: '需至少包含数字、字母和符号中的两种类型',
            accountNoEq: '密码不能与账户名相同'
        },
        resetPassword: {
            required: "密码不能为空",
            accountChar: '密码仅支持数字、字母和符号',
            rangelength: "密码应为8-16个字符，区分大小写",
            accountTowType: '需至少包含数字、字母和符号中的两种类型',
            accountNoEq: '密码不能与账户名相同'
        },
        repeatPassword: {
            required: "密码不能为空",
            rangelength: "密码长度为8-16字符",
            equalTo: '两次输入密码不一致'
        },
        kapkey: {
            required: "请填写验证码",
            rangelength: "验证码长度错误"
        },
        vcode: {
            required: "请填写验证码",
            rangelength: "验证码错误"
        },
        nickname: {
            required: "昵称不能为空",
            nicknameLen: "昵称长度为2-32字符",
            noEmpty: '昵称不能包含空格',
            nickname: '仅支持汉字、英文、数字、"_"、"."',
            remote: '该社区昵称不存在或已有flyme账号'
        },
        email: {
            pRequired: "邮箱不能为空",
            maxlength: "邮箱长度不能超过32",
            pEmail: "邮箱格式不正确"//,
            //todo 远程验证待添加url和自测
    /*        remote: function(value, result){
                var msg = result.message;
                if(msg == ""){
                    msg = '此邮箱已经存在';
                }
                return msg;
            }*/
        },
        phone: {
            pRequired: "请输入手机号码",
            ppDigits11: "手机号码格式错误",
            zdiyRemote: '此手机号码已注册'/*,
            remote: function(value, result){
                var msg = result.message;
                if(msg == ""){
                    msg = '手机号已经存在';
                }
                return msg;
            }*/
        },
        localPhone: {
            pRequired: "手机号码不能为空",
            pDigits11: "手机号码应为11位数字"
        },
        mobile: {
            required: "手机号码不能为空",
            pDigits11: "手机号码格式错误"
        },
        money: {
            required: "金额不能为空",
            number: "金额应为数字",
            money:"格式不正确",
            range: "金额区间0.01-100"
        },
        accountOrPhone: {
            required: '账号不能为空',
            nameOrD11: '格式不正确'
        },
        questionOne: {
            required: '请填写密保答案',
            nickname: '仅支持汉字、英文、数字、"_"',
            answerLen: '答案应为1-32个字符'
        },
        questionTwo: {
            required: '请填写密保答案',
            nickname: '仅支持汉字、英文、数字、"_"',
            answerLen: '答案应为1-32个字符'
        },
        answer1: {
            required: '请填写密保答案',
            nickname: '仅支持汉字、英文、数字、"_"',
            answerLen: '答案应为1-32个字符'
        },
        answer2: {
            required: '请填写密保答案',
            nickname: '仅支持汉字、英文、数字、"_"',
            answerLen: '答案应为1-32个字符'
        },
        questionOneId: {
            min: '请选择密保问题'
        },
        questionTwoId: {
            min: '请选择密保问题'
        },
        cardId: {
            required: '卡号不能为空',
            rangelength: '移动充值卡号长度应为17位'
        },
        cardPwd: {
            required: '密码不能为空',
            rangelength: '移动充值卡密码长度应为18位'
        }
    },
    createItem: function(src, des) {
        var r = {};
        for (var p in src) {
            if (src.hasOwnProperty(p)) {
                r[p] = des[p];
                if (src[p]) {
                    $.extend(r[p], src[p]);
                }
            }
        }
        return r;
    },
    createRule: function(json) {
        return this.createItem(json, this.rule);
    },
    createMes: function(json) {
        return this.createItem(json, this.message);
    },
    getTime: function() {
        return new Date().getTime();
    },
    getData: function(data, returnAll, errorCallback) {
        if (!data) return null;
        if (typeof(data) === 'object') {
            if (data.code !== '200') { //fail
                if (data.code === '201') { //never login
                    location.href = util.url.ucLogin;
                } else {
                    if (errorCallback) {
                        errorCallback(data.message, data.code, function() {
                            nAlert(data.message, '提示', function() {
                                // location.reload();
                            });
                        });
                        return null;
                    }
                    if (data.code == '100000') {
                        data.message = '服务器出错，请稍后重试';
                    }
                    if (data.code == '401') {
                        util.jAlert(data.message, '提示', function() {
                            location.reload();
                        });
                    }
                    util.jAlert(data.message, '提示', function () {
                        $('#origImg').data('imgAreaSelect').update();
