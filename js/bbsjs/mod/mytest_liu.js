/*!
 * X weibo JavaScript Library v1.1
 * http://www.vi163.cn/
 * 
 * Copyright 2010 SINA Inc.
 * Date: 2010/10/28 21:22:06
 */
(function(X,$){
var getText = X.lang.getText;
Xwb.use('verifyBox')


// note设置
//调用方式：pagelet名称.函数
.reg('note.note_add', {
	
    onViewReady : function(){
        var jq = this.jq();
        Xwb.use('Validator', {
            form:jq,
            trigger : jq.find('#trig'),
            onsuccess : function(data, next){
                Xwb.request.updateNote(data, function( e ){
                    if(e.isOk()){
                        Xwb.ui.MsgBox.success('', getText('显示设置已保存。') );
                    }else Xwb.ui.MsgBox.error('', e.getMsg());
                        
                    next();
                });
                // 非FORM提交返回false
                return false;
            }
        });
    }
})
// note设置
//调用方式：pagelet名称.函数
.reg('note.note_add1', {
    onViewReady : function(){
		alert('aaa');
        var jq = this.jq();
        Xwb.use('Validator', {
            form:jq.find('#noteForm'),
            trigger : jq.find('#trig'),
            onsuccess : function(data, next){
                Xwb.request.updateNote(data, function( e ){
					alert('asdd');
                    if(e.isOk()){
                        Xwb.ui.MsgBox.success('', getText('提醒设置已保存。'));
                    }else Xwb.ui.MsgBox.error('', e.getMsg());
                        
                    next();
                });
                
                return false;
            }
        });
		alert('ddd');
    }
})

// 本地私信设置
.reg('localpm.setting', {
    onViewReady : function(){
        var jq = this.jq();
        Xwb.use('Validator', {
            form: jq.find('#localpmForm'),
            trigger : jq.find('#trig'),
            onsuccess : function(data, next){
                Xwb.request.saveLocalpmSet(data, function( e ){
                    if(e.isOk()){
                        Xwb.ui.MsgBox.success('', getText('私信设置已保存。'));
                    }else Xwb.ui.MsgBox.error('', e.getMsg());
                    next();
                });
                return false;
            }
        });
    }
});
})(Xwb,$);