<?php exit("Access deny");?>
TRUNCATE TABLE `xsmart_system_nav`;
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("1","起始页","","0","0","0","1","3","0","2","0","","0","0","0","","","1","Home","","1","0"),("2","系统设置","","0","0","0","2","6","1","3","0","后台系统菜单  系统设置  system","0","0","0","","","2","system","","0","0"),("9","起始管理","","1","0,1","1","1","7","0","256","1","","0","0","0","","","1","","","1","0"),("10","起始页","mgr/admin.default_page","9","0,1,9","2","1","0","0","11","7","","0","0","0","","","1","","","1","0"),("15","基础设置","","2","0,2","1","2","8","0","22","1","系统设置－基础设置","0","0","0","","","1","","","1","0"),("16","站点设置","mgr/setting.editIndex","15","0,2,15","2","2","0","0","17","12","","0","0","0","","","1","","","1","0"),("17","优化设置","mgr/setting.editRewrite","15","0,2,15","2","2","0","16","18","13","","0","0","0","","","2","","","1","0"),("18","数据库管理","mgr/backup.backupData","15","0,2,15","2","2","0","17","19","14","基础设置－帐号登录设置","0","0","0","","","3","","","1","0");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("21","清除缓存","mgr/setting.cacheClear","15","0,2,15","2","2","0","20","76","17","","0","0","0","","","4","","","1","0"),("24","管理员","","85","0,85","1","2","3","22","75","3","","0","0","0","","","2","","","1","0"),("25","管理员设置","mgr/admin.userlist","24","0,85,24","2","2","0","0","26","8","","0","0","0","","","2","","","1","0"),("26","添加管理员","mgr/admin.adminAdd","24","0,85,24","2","2","0","25","27","9","","0","0","0","","","1","","","1","0"),("27","修改密码","mgr/admin.repassword","24","0,85,24","2","2","0","26","0","10","","0","0","0","","","3","","","1","0"),("77","管理组管理","","85","0,85","1","2","2","75","0","5","","0","0","0","","","1","","","1","0");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("78","管理员组列表","mgr/admingroup","77","0,85,77","2","2","0","0","81","6","","0","0","0","","","1","","","1","0"),("81","设置组权限","mgr/admingroup.setPermitByRoute","77","0,85,77","2","2","0","78","0","7","","0","0","0","","","2","","","3","0"),("83","添加系统菜单","mgr/sysNav.addSysnav","9","0,1,9","2","1","0","13","84","11","","0","0","0","","","2","","","1","0"),("84","系统菜单列表","mgr/sysNav.sysClasslist","9","0,1,9","2","1","0","83","0","12","","0","0","0","","","3","","","1","0"),("85","管理员","","0","0","0","83","2","0","86","0","","0","0","0","","","3","Permit","","1","0"),("170","广告管理","","0","0","0","110","3","180","183","0","","0","0","0","","","300","banner","","0","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("171","广告管理","","170","0,170","1","110","3","0","192","1","","0","0","0","","","10","","","1","1"),("172","添加信息","mgr/ad.add&bid=1","171","0,170,171","2","110","0","0","190","6","","0","0","0","","","20","","","1","1"),("180","栏目管理","","0","0","0","109","2","192","183","0","","0","0","0","","","400","","","1","1"),("181","分类管理","","180","0,180","1","109","1","0","0","1","","0","0","0","","","0","","","1","1"),("182","分类列表","mgr/articleclass.classlist","181","0,180,181","2","109","0","0","210","2","","0","0","0","","","0","","","1","1"),("190","信息管理","mgr/ad&bid=1","171","0,170,171","2","110","0","172","191","7","","0","0","0","","","10","","","1","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("191","广告分类","mgr/ad.classlist&bid=1","171","0,170,171","2","110","0","190","0","8","","0","0","0","","","30","","","1","1"),("192","友情链接管理","","170","0,170","1","110","3","171","0","2","","0","0","0","","","20","","","1","1"),("193","信息管理","mgr/link&bid=2","192","0,170,192","2","110","0","0","194","3","","0","0","0","","","10","","","0","1"),("194","添加友链","mgr/link.add&bid=2","192","0,170,192","2","110","0","193","195","4","","0","0","0","","","20","","","1","1"),("195","友链分类","mgr/link.classlist&bid=2","192","0,170,192","2","110","0","194","0","5","","0","0","0","","","30","","","1","1"),("196","界面管理","","0","0","0","112","1","160","201","0","","0","0","0","","","4","page","","1","0");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("197","界面管理","","196","0,196","1","112","3","0","0","1","","0","0","0","","","10","","","1","1"),("198","导航","mgr/page_nav.nav","197","0,196,197","2","112","0","0","199","2","","0","0","0","","","10","","","1","1"),("199","页面设置","mgr/page_manager","197","0,196,197","2","112","0","198","200","3","","0","0","0","","","20","","","0","1"),("200","添加模块","mgr/page_manager.addComponent","197","0,196,197","2","112","0","199","0","4","","0","0","0","","","30","","","1","1"),("201","模型","","0","0","0","113","1","196","204","0","","0","0","0","","","6","model","","1","0"),("202","管理","","201","0,201","1","113","1","0","0","1","","0","0","0","","","0","","","0","0");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("203","模型列表","mgr/sitemodel.init","202","0,201,202","2","113","0","0","0","2","","0","0","0","","","0","","","0","1"),("204","内容管理","","0","0","0","114","1","201","207","0","","0","0","0","","","200","content","","1","1"),("205","内容管理","","204","0,204","1","114","4","0","256","1","","0","0","0","","","1","","","1","1"),("206","关于我们","mgr/modelForm.infoList&modelid=1&catid=9","205","0,204,205","2","114","0","0","211","5","","0","0","0","","","2","","","1","1"),("207","分类管理","","0","0","0","115","1","204","213","0","","0","0","0","","","500","linkage","","1","1"),("208","联动菜单管理","","207","0,207","1","115","1","0","0","1","","0","0","0","","","0","","","1","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("209","菜单列表","mgr/linkage.init","208","0,207,208","2","115","0","0","0","2","","0","0","0","","","10","","","0","1"),("211","新闻中心","mgr/modelForm.infoList&modelid=1&catid=8","205","0,204,205","2","114","0","206","212","6","","0","0","0","","","1","","","1","1"),("212","帮助与支持","mgr/modelForm.infoList&modelid=1&catid=11","205","0,204,205","2","114","0","211","290","7","","0","0","0","","","3","","","1","1"),("213","会员中心","","0","0","0","116","1","207","217","0","","0","0","0","","","100","usercenter","","1","1"),("214","会员管理","","213","0,213","1","116","4","0","0","1","","0","0","0","","","0","","","0","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("215","学生列表","mgr/member2.memberlist&type=2","214","0,213,214","2","116","0","0","216","2","","0","0","0","","","0","","","1","1"),("216","教师列表","mgr/member2.memberlist&type=1","214","0,213,214","2","116","0","215","226","3","","0","0","0","","","0","","","1","1"),("217","课程管理","","0","0","0","117","4","213","229","0","","0","0","0","","","50","classes","","1","1"),("218","课程管理","","217","0,217","1","117","1","0","219","1","","0","0","0","","","0","","","0","1"),("219","课程体系管理","","217","0,217","1","117","1","218","220","3","","0","0","0","","","0","","","0","1"),("220","进阶课程管理","","217","0,217","1","117","1","219","221","5","","0","0","0","","","0","","","1","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("221","职业课程管理","","217","0,217","1","117","1","220","0","7","","0","0","0","","","0","","","0","1"),("222","课程列表","mgr/modelForm.infoList&modelid=4&catid=","218","0,217,218","2","117","0","0","0","2","","0","0","0","","","0","","","1","1"),("223","课程体系列表","mgr/modelForm.infoList&modelid=11&catid=2","219","0,217,219","2","117","0","0","0","4","","0","0","0","","","0","","","1","1"),("224","进阶课程列表","mgr/modelForm.infoList&modelid=11&catid=3","220","0,217,220","2","117","0","0","0","6","","0","0","0","","","0","","","1","1"),("225","职业课程列表","mgr/modelForm.infoList&modelid=11&catid=4","221","0,217,221","2","117","0","0","0","8","","0","0","0","","","0","","","1","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("226","角色列表","mgr/role.index","214","0,213,214","2","116","0","216","286","4","","0","0","0","","","0","","","1","1"),("229","订单管理","","0","0","0","118","2","217","232","0","","0","0","0","","","600","recharge","","1","1"),("230","充值管理","","229","0,229","1","118","1","0","291","1","","0","0","0","","","10","","","0","1"),("231","充值记录","mgr/mgr_balance","230","0,229,230","2","118","0","0","0","4","","0","0","0","","","0","","","0","1"),("240","社区","","0","0","0","120","3","232","257","0","","0","0","0","","","50","bbs","","1","1"),("241","板块","","240","0,240","1","120","4","0","246","1","","0","0","0","","","1","","","1","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("242","热门","mgr/index_1.plate&fub=1&bid=255","241","0,240,241","2","120","0","0","243","11","","0","0","0","","","1","","","0","1"),("243","推荐","mgr/index_1.plate&fub=2&bid=256","241","0,240,241","2","120","0","242","244","12","","0","0","0","","","5","","","0","1"),("244","特色","mgr/index_1.plate&fub=3&bid=265","241","0,240,241","2","120","0","243","245","13","","0","0","0","","","10","","","0","1"),("245","分类","mgr/index_1.plate&fub=4&bid=266","241","0,240,241","2","120","0","244","0","14","","0","0","0","","","4","","","0","1"),("246","系统消息管理","","240","0,240","1","120","1","241","248","2","","0","0","0","","","60","","","0","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("247","消息列表","mgr/index_1.sendmessage","246","0,240,246","2","120","0","0","0","10","","0","0","0","","","1","","","1","1"),("248","社区广告管理","","240","0,240","1","120","6","246","0","3","","0","0","0","","","30","","","0","1"),("249","banner管理","mgr/index_1.banner&id=202","248","0,240,248","2","120","0","0","250","4","","0","0","0","","","1","","","0","1"),("250","主题管理","mgr/index_1.subject","248","0,240,248","2","120","0","249","251","5","","0","0","0","","","3","","","0","1"),("251","社区热帖","mgr/index_1.show","248","0,240,248","2","120","0","250","252","6","","0","0","0","","","9","","","0","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("252","热门板块","mgr/index_1.hostplate","248","0,240,248","2","120","0","251","253","7","","0","0","0","","","10","","","0","1"),("253","最新活动","mgr/index_1.newinfomation","248","0,240,248","2","120","0","252","254","8","","0","0","0","","","50","","","0","1"),("254","推荐阅读","mgr/index_1.read&classid=9","248","0,240,248","2","120","0","253","0","9","","0","0","0","","","60","","","0","1"),("257","院校管理","","0","0","0","121","5","240","270","0","","0","0","0","","","350","university","","1","1"),("258","院校banner","","257","0,257","1","121","2","0","261","1","","0","0","0","","","10","","","0","1"),("259","banner列表","mgr/university&bid=21","258","0,257,258","2","121","0","0","260","14","","0","0","0","","","10","","","1","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("260","添加banner","mgr/university.add&bid=21","258","0,257,258","2","121","0","259","0","15","","0","0","0","","","20","","","1","1"),("261","院校新闻","","257","0,257","1","121","2","258","264","2","","0","0","0","","","20","","","0","1"),("262","新闻列表","mgr/university&bid=23","261","0,257,261","2","121","0","0","263","12","","0","0","0","","","10","","","1","1"),("263","添加新闻","mgr/university.add&bid=23","261","0,257,261","2","121","0","262","0","13","","0","0","0","","","20","","","1","1"),("264","院校课程","","257","0,257","1","121","2","261","267","3","","0","0","0","","","30","","","0","1"),("265","课程列表","mgr/university&bid=24","264","0,257,264","2","121","0","0","266","10","","0","0","0","","","10","","","1","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("266","添加课程","mgr/university.add&bid=24","264","0,257,264","2","121","0","265","0","11","","0","0","0","","","20","","","1","1"),("267","院校简介","","257","0,257","1","121","2","264","283","4","","0","0","0","","","15","","","0","1"),("268","简介列表"," mgr/university&bid=22                     ","267","0,257,267","2","121","0","0","269","8","","0","0","0","","","10","","","0","1"),("269","添加简介","mgr/university.add&bid=22","267","0,257,267","2","121","0","268","0","9","","0","0","0","","","20","","","1","1"),("270","EDM管理","","0","0","0","122","1","257","279","0","","0","0","0","","","700","EDM","","0","1"),("271","EDM管理","","270","0,270","1","122","7","0","0","1","","0","0","0","","","10","","","0","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("272","邮箱列表","mgr/email.E_list&statue=0&modelid=61&catid=2","271","0,270,271","2","122","0","0","273","2","","0","0","0","","","10","","","0","1"),("273","全局设置","mgr/email.basic&statue=0&modelid=57&cid=3","271","0,270,271","2","122","0","272","274","3","","0","0","0","","","20","","","0","1"),("274","smtp服务器","mgr/email.smtp&statue=0&modelid=61&catid=4","271","0,270,271","2","122","0","273","275","4","","0","0","0","","","30","","","0","1"),("275","邮件模板","mgr/email.tpl&statue=0&modelid=61&catid=5","271","0,270,271","2","122","0","274","276","5","","0","0","0","","","40","","","0","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("276","邮箱导入","mgr/email.import&statue=0&modelid=61&catid=6","271","0,270,271","2","122","0","275","277","6","","0","0","0","","","50","","","0","1"),("277","分类管理","mgr/email.E_class&statue=0&modelid=61&catid=7","271","0,270,271","2","122","0","276","278","7","","0","0","0","","","60","","","0","1"),("278","发送邮件","mgr/email.send&statue=0&modelid=61&catid=70","271","0,270,271","2","122","0","277","279","8","","0","0","0","","","70","","","0","1"),("279","问答管理","","0","0","0","123","1","270","287","0","","0","0","0","","","800","reply&question","","0","1"),("280","问答管理","","279","0,279","1","123","2","0","0","1","","0","0","0","","","10","","","0","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("281","问题管理","mgr/questionReply.questionList","280","0,279,280","2","123","0","0","282","2","","0","0","0","","","10","","","0","1"),("282","回复管理","mgr/questionReply.replyList","280","0,279,280","2","123","0","281","0","3","","0","0","0","","","20","","","0","1"),("283","院校logo","","257","0,257","1","121","2","267","0","5","","0","0","0","","","5","","","0","1"),("284","logo列表","mgr/university&bid=20","283","0,257,283","2","121","0","0","285","6","","0","0","0","","","10","","","0","1"),("285","添加logo","mgr/university.add&bid=20","283","0,257,283","2","121","0","284","0","7","","0","0","0","","","20","","","0","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("286","会员数据统计分析","mgr/data.users","214","0,213,214","2","116","0","226","0","5","","0","0","0","","","0","","","1","1"),("287","明星学员","","0","0","0","124","1","279","0","0","","0","0","0","","","150","star","","0","1"),("288","明星学员","","287","0,287","1","124","1","0","0","1","","0","0","0","","","10","","","0","1"),("289","明星学员","mgr/modelForm.infoList&modelid=17","288","0,287,288","2","124","0","0","0","2","","0","0","0","","","10","","","0","1"),("290","联系我们","mgr/modelForm.infoList&modelid=1&catid=13","205","0,204,205","2","114","0","212","0","8","","0","0","0","","","4","","","0","1"),("291","购买管理","","229","0,229","1","118","1","230","0","2","","0","0","0","","","20","","","1","1");
INSERT INTO `xsmart_system_nav`(`classid`,`classname`,`classurl`,`parentid`,`parentpath`,`depth`,`rootid`,`child`,`previd`,`nextid`,`orderid`,`readme`,`elite`,`ontop`,`Author`,`keyword`,`description`,`lmorder`,`uunique`,`pictureurl`,`statue`,`systype`) VALUES ("292","购买记录","mgr/buy_history","291","0,229,291","2","118","0","0","0","3","","0","0","0","","","10","","","0","1");
