/*!
/*!
 * Xsmart JavaScript Library v2.0
 * http://www.vi163.cn/
 * 
 * Copyright 2011 SINA Inc.
 * @Date: 2011/5/18 17:47
 * @description javascript语言包
 */
(function(L){

L.texts = {};

//错误代码
L.ERRORMAP = {
        '0': '发布失败。',
        '5': '超过字数了！',
        '1': '图片正在上传，请稍候。',
        '2': '正在发布,请稍候。。',
        '3': '请先输入内容。',
        '4': '请写上你要说的话题。',
        '1010005':'超出字数了哦！',
        '1020002': '请不要重复发布相同的内容。',
        '1010006': '不能采用sina域下的邮箱。',
        '1010007': '已经提交，请耐心等待管理员审核，谢谢！',  //文档 描述 ：参数含有敏感字符
        '20011': '评论字数超过限制',
        '20016': '他还没有关注你,不能发私信',
        '30000' : '信息已进入审核中',
        '30001': '皮肤保存失败，请重试。',
        //图片相关
        '20020':'上传图片为空',
        '20021':'上传图片大小超过限制',
        '20022':'上传图片类型不符合要求',
        '20023':'上传图片失败，重新试试看？',
        '20024':'非法的上传图片',
        '1021200':'此昵称不存在',
        '1020500':'此微博已被作者移除。',
        '1020301':'此微博已被作者移除。',
        '1020700':'此微博已被作者移除。',
        '1020402':'此微博已被作者移除。',
        '1020504':'此微博已被作者移除。',
        '1020501':'此评论已被作者移除。',
        '1020600':'此评论已被作者移除。',
        '1040003':'您尚未登录，请先登录再操作',
        '1040000':'您尚未登录，请先登录再操作',		 //文档 描述 ：token不合法
        '1050000':'系统繁忙，请稍候再试。',
        '1040007':'发评论太多啦，休息一会儿吧。',
        '1040006':'发微博太多啦，休息一会儿吧。',
        '1040005':'你已经被禁止发言',
        '1040004': '请不要发表违法和不良信息。',
        '1021301': '该昵称已存在，请换一个昵称。',
        '1020104': '不要太贪心哦，发一次就够啦。',  //文档 描述:内容长度不正确 分享图片微博内容为空
		'1020809': '你的关注人数已达到上限',
        '1020808': '你不能关注自己。',
        '1020801': '关注的用户不存在。',
        '1020800': '关注失败',
        '1020805': '已关注该用户',
        '1050000': '操作失败，重新试试看？',
        '1020404': '由于用户设置，你暂不能发表评论。',
        '1020405': '根据对方的设置，你不能进行此操作。',
        '1020806': '你使用的帐号或IP关注过于频繁，今日将无法再进行同类操作，请谅解！',
        // 上传文件由于其它原因出错
        // 这里后台最好和上面的一致
        '2010009' : '上传图片大小超过限制。',
        '2010010' : '上传图片大小超过限制。',
        '2010011' : '上传图片的数据不完整，重新试试看？',
        '2010012' : '图片上传失败，重新试试看？',
        '2010013' : '上传图片失败，重新试试看？',
        '2010014' : '上传图片失败，重新试试看？',
        '1040016_def' : '出错啦，该网站调用API次数已超过限制，请联系站长解决！',
        '1040016' : '抱歉，目前{0}功能暂不可用，请联系网站管理员！',
		'1040017' : '只能使用POST方法',
		'1040018' : '缺少参数',
		'1040019' : '参数格式不正确',
		'1040020' : '创建备份目录失败',
		'1040021' : '错误的帐号密码',
		'1040022' : '指定的数据库可能不存在',
		'1040023' : '请填写数据库的相关信息',
		'1040024' : '没有可以恢复的数据',
		'1040025' : '请先使用connect()方法连接数据库',
		'1040026' : '指定的存放路径不存在',
		'1040027' : '找不到文件要恢复的文件',
		'1040028' : '执行备份的SQL时出错',
		'1040029' : '连接时出错，可能输入的帐号信息不正确',
		'1040030' : '恭喜，数据操作成功',
		// API 上传图片出错
		'1020100' : '没有上传图片或图片内容为空。',
		'1020101' : '上传图片格式类型不符合要求。',
		'1020102' : '上传图片大小超过限制。',
		
		//后期添加的 api错误码
		'1010000' : '参数不能为空',
		'1010002' : '参数必须为数字',
		'1010003' : '参数格式必须为email格式',
		'1010004' : '参数格式必须为json格式',
		'1040001' : '当前用户没有开通微博',
		'1040002' : 'api访问超时或拒绝访问',
		'1040003' : 'token为空',
		'1040014' : '不要太贪心哦，发一次就够啦',
		'1040015' : '接口不可用',
		'1020000' : '发微博内容不能为空',
		'1020001' : '发微博内容超过140个字',
		'1020003' : '请不要重复发送类同内容',
		'1020100' : '上传的不是图片或图片内容为空',
		'1020103' : '分享图片微博内容超过140个字',
		'1020200' : '转发微博id为空',
		'1020201' : '转发微博内容超过140个字',
		'1020300' : '删除微博id为空',
		'1020302' : '删除的微博不是本人发的',
		'1020400' : '评论微博id为空',
		'1020401' : '评论微博内容为空',
		'1020502' : '回复评论评论内容为空',
		'1020503' : '回复评论评论内容超过140个字',
		'1020601' : '删除评论id不存在或不是本人发的',
		'1020602' : '删除评论失败',
		'1020701' : '删除收藏微博微博id为空或不存在',
		'1020802' : '取消关注的用户id为空或不存在',
		'1020803' : '取消关注的用户name为空或不存在',
		'1020804' : '关注失败',
		'1020807' : '你已经把此用户加入黑名单，加关注前请先解除',
		'1020900' : '发私信的内容为空',
		'1020901' : '发送方的id为空或本人',
		'1020902' : '发送方的不是本人的粉丝',
		'1020903' : '删除私信id为空或不是本人发的',
		'1020904' : '删除私信id不存在',
		'1021001' : '订阅分类名称为空',
		'1021100' : '设置用户提醒参数为空',
		'1021300' : '更改的昵称已经存在',
		'1021302' : '请重写简介',
		'1021500' : '标签为空',
		'1021501' : '添加标签失败',
		'1021502' : '删除标签的标签id为空',
		'1021600' : '要加入黑名单的用户不存在',
		'1021700' : '要更新的选项值都为空',
		'1021800' : 'id为空',
		'1021900' : '注册失败 使用sina的email注册',
		'1021901' : 'ip被封或不合法',
		'1021902' : '昵称重复或者非法',
		'1021903' : '该邮箱地址已被注册',
		'1021904' : 'ip受限制',
		'1020810' : 'hi 超人，你今天已经关注很多喽，...问题，请联系新浪客服：400 690 0000',
		'1020811' : 'hi 超人，你今天已经关注很多喽，接下来的时间想想如何让大家都来关注你吧！如有问题，请联系新浪客服：400 690 0000',
		
		'1010001' : '搜索的用户不存在',
		'1022000' : '不能自己向自己发送私信',
		'1022001' : '对方未登录本网站，无法收到你的私信',
		'1022002' : '未登录网站用户不允许发送本地私信',
		'1022003' : '根据用户设置，你不能给他发私信',
		'1022004' : '本地私信发送过程中出现了内部错误',
		'1022005' : '搜索的用户不存在',
		'1022006' : '私信内容超过300个字，请适当缩短'

};
    
})(window.Xwb.lang);
