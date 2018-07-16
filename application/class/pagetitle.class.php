<?php 

//当前页面名称_老师办公室_互动空间_-华师筋斗云--轻松办公、高效教学
class pagetitle{
	function getTitle($type='home',$myTitle='首页'){
		$siteName='华师教育云';
		
		$title=array(
		
			
			'home'=>array(
				'subtitle'=>'老师办公室',
				'moduleName'=>'互动空间',
				'desc'=>'轻松办公、高效教学',
			),
		
	
		//老师部分
			'teacher_blog'=>array(		 	'subtitle'=>'日志',			'moduleName'=>'老师办公室',			'desc'=>'我的记录、我的语言',),
			'teacher_classroom_pre'=>array(	'subtitle'=>'课前',			'moduleName'=>'老师办公室',			'desc'=>'发布预习、沟通学习',),
			'teacher_homework'=>array(		'subtitle'=>'作业',			'moduleName'=>'老师办公室',			'desc'=>'发布作业、课后辅导',),
			'teacher_classroom'=>array(		'subtitle'=>'课堂',			'moduleName'=>'老师办公室',			'desc'=>'轻松办公、高效教学',),
			'teacher_lession_pre'=>array(	'subtitle'=>'备课',			'moduleName'=>'老师办公室',			'desc'=>'再现课堂、教学反思',),
			'teacher_res'=>array(		 	'subtitle'=>'资源',			'moduleName'=>'老师办公室',			'desc'=>'教案制作、课堂演练',),
			'teacher_video'=>array(		 	'subtitle'=>'视频',			'moduleName'=>'老师办公室',			'desc'=>'我是讲师、我的视频',),
			'teacher_tools'=>array(		 	'subtitle'=>'教具',			'moduleName'=>'老师办公室',			'desc'=>'随时随地的实验',),
		
		//学生部分
			'student_blog'=>array(		 	'subtitle'=>'日志',			'moduleName'=>'学生书房',			'desc'=>'我的记录、我的语言',),
			'student_classroom_pre'=>array(	'subtitle'=>'课前',			'moduleName'=>'学生书房',			'desc'=>'沟通学习、交流无时限',),
			'student_homework'=>array(		'subtitle'=>'作业',			'moduleName'=>'学生书房',			'desc'=>'接发作业、在线作业',),
			'student_classroom'=>array(		'subtitle'=>'课堂',			'moduleName'=>'学生书房',			'desc'=>'再现课堂、重复收听',),
			'student_res'=>array(		 	'subtitle'=>'资源',			'moduleName'=>'学生书房',			'desc'=>'优质资源、贴心资源',),
			'student_video'=>array(		 	'subtitle'=>'视频',			'moduleName'=>'学生书房',			'desc'=>'我需要的视频',),
			'student_lab'=>array(		 	'subtitle'=>'实验室',			'moduleName'=>'学生书房',			'desc'=>'随时随地的实验',),
			'student_tools'=>array(		 	'subtitle'=>'学具',			'moduleName'=>'学生书房',			'desc'=>'高效智能学习',),
		//家长部分
			'parents_mychild'=>array(		'subtitle'=>'我的孩子',			'moduleName'=>'家长书房',			'desc'=>'轻松办公高效教学',),
			'parents_res'=>array(			'subtitle'=>'资源',			'moduleName'=>'家长书房',			'desc'=>'与孩子一起成长',),
			'parents_video'=>array(			'subtitle'=>'视频',			'moduleName'=>'家长书房',			'desc'=>'孩子用到的优质资源',),
			'parents_lab'=>array(			'subtitle'=>'实验室',			'moduleName'=>'家长书房',			'desc'=>'家长视频、精品视频',),
		//班级部分
			'class_home'=>array(		 	'subtitle'=>'班级首页',			'moduleName'=>'虚拟班级',			'desc'=>'老师和学生的网络班级',),
			'class_manage'=>array(			'subtitle'=>'班级管理',			'moduleName'=>'虚拟班级',			'desc'=>'班主任教务管理',),
		//学校部分
			'school_home'=>array(		 	'subtitle'=>'学校首页',			'moduleName'=>'',			'desc'=>'学校门户',),
		//地方分站部分
			'city_news'=>array(		 	'subtitle'=>'教育新闻',			'moduleName'=>'',			'desc'=>'全国教育大事',),
			'city_local_news'=>array(		 	'subtitle'=>'教育动态',			'moduleName'=>'',			'desc'=>'地方教育动态',),
			'city_school_star'=>array(		 	'subtitle'=>'名校巡展',			'moduleName'=>'',			'desc'=>'地方名校介绍',),
			'city_teacher_star'=>array(		 	'subtitle'=>'名师风采',			'moduleName'=>'',			'desc'=>'地方名师推荐',),
			'city_school_list'=>array(		 	'subtitle'=>'学校名录',			'moduleName'=>'',			'desc'=>'地方学校风采一览',),
			'city_res'=>array(		 	'subtitle'=>'资源中心',			'moduleName'=>'',			'desc'=>'地方名师优质资源',),
			'city_video'=>array(		 	'subtitle'=>'视频中心',			'moduleName'=>'',			'desc'=>'地方名师、优质视频分享',),
			'city_lab'=>array(		 	'subtitle'=>'虚拟实验室',			'moduleName'=>'',			'desc'=>'形象生动虚拟实验室',),
		//总站
			'home_teacher'=>array(		 	'subtitle'=>'教师平台',			'moduleName'=>'互动空间',			'desc'=>'教师用户风采展示',),
			'home_sns'=>array(		 	'subtitle'=>'互动社区',			'moduleName'=>'互动空间',			'desc'=>'老师、学生、家长用户动态',),
			'home_res'=>array(		 	'subtitle'=>'资源中心',			'moduleName'=>'互动空间',			'desc'=>'全国名师、优质资源分享',),
			'home_video'=>array(		 	'subtitle'=>'视频中心',			'moduleName'=>'互动空间',			'desc'=>'全国名师、优质视频分享',),
			'home_lab'=>array(		 	'subtitle'=>'虚拟实验室',			'moduleName'=>'互动空间',			'desc'=>'形象生动虚拟实验室',),
			'home_reg'=>array(		 	'subtitle'=>'注册登陆',			'moduleName'=>'互动空间',			'desc'=>'高效学习快乐成长',),
			'default'=>array(
				'subtitle'=>'课前',
				'moduleName'=>'互动空间',
				'desc'=>'发布预习、沟通学习',
			)
	
		);
		
		$subtitle= isset($title[$type]['subtitle'])? ('_'.$title[$type]['subtitle']):'_华师云教育';
		$moduleName= isset($title[$type]['moduleName'])? ('_'.$title[$type]['moduleName']):'';
		$desc= isset($title[$type]['desc'])? ('_'.$title[$type]['desc']):'_科技让教育更精彩';
		echo $myTitle.$subtitle.$moduleName.$desc;
		//echo $myTitle.'_'.$subtitle.'_'.$moduleName.'_'.$siteName.'-'.$desc;
		
	}
}

?>