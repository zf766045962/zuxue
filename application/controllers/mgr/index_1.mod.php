<?php
/**************************************************
*  Created:  2012-3-12
*
*  友情链接管理系统文件说明
*
*  @Xsmart (C)2006-2099Inc.
*  @Author @@赵志强
*
***************************************************/
include('action.abs.php'); 
class index_1_mod extends action 
{
	function banner(){
		//$classlist = DS('publics._get','','ad',' classid = 12 order by id asc ');
		$adlist = DS('publics._get','','bbs_post',"classid = 12 order by pid asc ");	
		TPL :: assign('adlist' 	, $adlist);
	
		$this->_display('index_1/banner');
		}
	function addclass(){
		//$classlist = DS('publics._get','','ad',' classid = 12 order by  lmorder asc');	
		$info = DS('publics._get','','bbs_post',"pid = '".V('r:pid')."'");
		TPL :: assign('info' 	, $info);
		$this->_display('index_1/addclass');
		}
	function saveban(){
		$name = $_SESSION['XSM_CLIENT_SESSION']['screen_name'];	
		$authorid = DS('publics._get','','users',"username='$name'");	
		$data['authorid']  =  $authorid[0]['id'];
		$data['author']  =  $name;
			
		$id = V('r:data');
		if($id['pid'] == NULL){
		foreach(V('r:data') as $k=>$v){
			if($k != 'id' and $k != 'bid' and $k != 'http'){
			$data[$k] 	= $v; 	
			}
	    }
			$tiems = time();
			$data['dateline']  	= $tiems; //插入时间
			$data['imgurl']  	= V('r:imgurl'); 
			$data['classid']  	= V('r:classid')==NULL?'12':V('r:classid'); 
			$data['content']  =  V('r:edit_content');
			
			$data['authorid']  =  $authorid[0]['id'];
			$data['author']  =  $name;
			
			DS('publics._save',3,$data,'bbs_post'); 
			
			/*DS('publics._get','','bbs_post',' order by  lmorder asc');*/	
			
			$ididss = DS('publics._get','','bbs_post',"fid =".$id['fid'] . ' and authorid = '.$authorid[0]['id']
		  .' and dateline='.$tiems );
		  
		  
		$comment['pid'] 	= $id['fid'];
		$comment['authorid'] 	= $authorid[0]['id'];
		$comment['dateline'] = $tiems;
		$comment['poststatus'] = 1;
		$comment['tid']   = $ididss[0]['pid'];
	
        DS('publics._save','',$comment,'bbs_postcomment');
		  
		
	
		}else{
			foreach(V('r:data') as $k=>$v){
				if($k != 'id' and $k != 'bid' and $k != 'http'){
					
					
				$aa .= $k.'='."'$v'".',';
				}
			  }
			$wh = $aa.'imgurl='.'\''.V('r:imgurl').'\''.','.'content='.'\''.V('r:edit_content').'\''.','.'dateline='.'\''.time().'\'';
			//echo $wh;
			DS('publics.date1','','bbs_post',"$wh","pid = '".$id['pid']."'");
			
			
			}	
			if(V('r:classid')==NULL){
					echo "<script> location.href='".URL('mgr/index_1.banner')."' </script>";
				}else{
					echo "<script> location.href='".URL('mgr/index_1.read','&classid=9')."' </script>";	
				}
		}
		
		
	function saveban22(){
		$name = $_SESSION['XSM_CLIENT_SESSION']['screen_name'];	
		$authorid = DS('publics._get','','users',"username='$name'");	
		$data['authorid']  =  $authorid[0]['id'];
		$data['author']  =  $name;
			
		$id = V('r:data');
		if($id['pid'] == NULL){
		foreach(V('r:data') as $k=>$v){
			if($k != 'id' and $k != 'bid' and $k != 'http'){
			$data[$k] 	= $v; 	
			}
	    }
			
			$data['dateline']  	= time(); //插入时间
			$data['imgurl']  	= V('r:imgurl'); 
			$data['classid']  	= 8; 
			$data['content']  =  V('r:edit_content');
			
			$data['authorid']  =  $authorid[0]['id'];
			$data['author']  =  $name;
			
			DS('publics._save',3,$data,'bbs_post1'); 
			
			/*DS('publics._get','','bbs_post',' order by  lmorder asc');*/	
			
			$ididss = DS('publics._get','','bbs_post',"fid =".$id['fid'] . ' and authorid = '.$authorid[0]['id']
		  .' and dateline='.$tiems );
		  
		  
		$comment['pid'] 	= $id['fid'];
		$comment['authorid'] 	= $authorid[0]['id'];
		$comment['dateline'] = $tiems;
		$comment['poststatus'] = 1;
		$comment['tid']   = $ididss[0]['pid'];
	
        DS('publics._save','',$comment,'bbs_postcomment');
			
	
		}else{
			foreach(V('r:data') as $k=>$v){
				if($k != 'id' and $k != 'bid' ){
					
					
				$aa .= $k.'='."'$v'".',';
				}
			  }
			$wh = $aa.'imgurl='.'\''.V('r:imgurl').'\''.','.'content='.'\''.V('r:edit_content').'\''.','.'dateline='.'\''.time().'\'';
			//echo $wh;
			DS('publics.date1','','bbs_post1',"$wh","pid = '".$id['pid']."'");
			
			
			}	
			
				echo "<script> location.href='".URL('mgr/index_1.newinfomation')."' </script>";	
				
		}
			
		
		
	function del(){
		if(V('r:class') == 990 ){
			$tu = DS('publics._get','','bbs_post1','pid='.V('r:id'));
			$unm = 1-(int)$tu[0]['status'];
			$ss = DS('publics.date1','','bbs_post1',"status = $unm","pid = '".V('r:id')."'");
			}else{
			$tu = DS('publics._get','','bbs_post','pid='.V('r:id'));
			$unm = 1-(int)$tu[0]['status'];
			$ss = DS('publics.date1','','bbs_post',"status = $unm","pid = '".V('r:id')."'");	
				}
		
		
			
		
		}	
		
	function is_show(){

		$tu = DS('publics._get','','bbs_post','pid='.V('r:id'));
		$unm = 1-(int)$tu[0]['is_show'];
		$ss = DS('publics.date1','','bbs_post',"is_show = $unm","pid = '".V('r:id')."'");
		}		
	function subject(){
		if(V('r:key') != NULL){
		$muh = 'and title like '.'\''.'%'.V('r:key').'%'.'\'';
		}
		$adlist = DS('publics._get','','bbs_post',"classid = 13 $muh order by pid asc ");	
		//var_dump($adlist);
		TPL :: assign('adlist' 	, $adlist);
		$this->_display('index_1/subject');
		}	
		
	function addclass1(){
		//$classlist = DS('publics._get','','ad',' classid = 12 order by  lmorder asc');
		
		
		$info = DS('publics._get','','bbs_post',"pid = '".V('r:pid')."'");
		TPL :: assign('info' 	, $info);
		$this->_display('index_1/addclass1');
		}	
	function savesub(){
		$id = V('r:data');
		if($id['pid'] == NULL){
		foreach(V('r:data') as $k=>$v){
			if($k != 'id' and $k != 'bid' and $k != 'http'){
			$data[$k] 	= $v; 	
			}
	    }
			$name = $_SESSION['XSM_CLIENT_SESSION']['screen_name'];	
			$authorid = DS('publics._get','','users',"username='$name'");	
			$data['authorid']  =  $authorid[0]['id'];
			$data['author']  =  $name;
			$data['dateline']  	= time(); //插入时间
			$data['imgurl']  	= V('r:imgurl'); 
			$data['classid']  	= 13; 
			$data['content']  =  V('r:edit_content');
			DS('publics._save',3,$data,'bbs_post'); 
			
			
				$ididss = DS('publics._get','','bbs_post',"fid =".$id['fid'] . ' and authorid = '.$authorid[0]['id']
		  .' and dateline='.$tiems );
		  
		  
		$comment['pid'] 	= $id['fid'];
		$comment['authorid'] 	= $authorid[0]['id'];
		$comment['dateline'] = $tiems;
		$comment['poststatus'] = 1;
		$comment['tid']   = $ididss[0]['pid'];
	
        DS('publics._save','',$comment,'bbs_postcomment');
			
			
			/*DS('publics._get','','bbs_post',' order by  lmorder asc');*/	
			echo "<script> location.href='".URL('mgr/index_1.subject')."' </script>";
	
		}else{
			foreach(V('r:data') as $k=>$v){
				if($k != 'id' and $k != 'bid' and $k != 'http'){
					
					
				$aa .= $k.'='."'$v'".',';
				}
			  }
			$wh = $aa.'imgurl='.'\''.V('r:imgurl').'\''.','.'content='.'\''.V('r:edit_content').'\''.','.'dateline='.'\''.time().'\'';
			//echo $wh;
			DS('publics.date1','','bbs_post',"$wh","pid = '".$id['pid']."'");
			echo "<script> location.href='".URL('mgr/index_1.subject')."' </script>";
			}	
		}	
	function show(){
				if(V('r:key') != NULL){
					$muh = ' and subject like '.'\''.'%'.V('r:key').'%'.'\'';
				}
			
	
				if(V('r:select') != NULL){
					$order =V('r:select').' desc';
				}
				
				if(V('r:fidd') != NULL){
					$fid = 'fid ='.V('r:fidd');
				}else{
					$fid = '1=1';	
				}
				
				if(V('r:showindex') != NULL){
					$showindex = ' and is_showindex ='.V('r:showindex');
				}
				
			
			$rss=DS('publics.page_list','',30,"$fid $muh $showindex","$order",V('g'),'bbs_post');
		
			TPL :: assign('rss' 	, $rss['info']);
			TPL :: assign('page' 	, $rss);
			
		$this->_display('index_1/show');
		
		}
	function show_content(){
		$adlist = DS('publics._get','','bbs_post','pid='.V('rid'));	
		
		echo $adlist[0]['content'];
		
		}		
	function plate(){
		$classlist = DS('publics._get','','bbs_forum',"fup='".V('r:fub')."'");	
		TPL :: assign('classlist' 	, $classlist);
		//$info = DS('publics._get','','ad',"id = '".V('r:id')."'");
		//echo 1;
		$this->_display('index_1/plate');
		
		}
	function adplate(){
		$name =  DS('publics._get','','system_nav','classid='.V('r:bid'));
		TPL :: assign('name', $name);
		$info = DS('publics._get','','bbs_forum','fid='.V('r:classid'));
		TPL :: assign('info' 	, $info);
		$this->_display('index_1/adplate');
		
		}	
	function saveplate(){
		
		$id = V('r:data');
		if(V('r:classid') == NULL){
		foreach(V('r:data') as $k=>$v){
			if($k != 'id' and $k != 'bid' and $k != 'http'){
			$data[$k] 	= $v; 	
			}
	    }
			$data['imgurl']  	= V('r:imgurl'); 
			$data['fup']        = V('r:fub');	
			DS('publics._save',3,$data,'bbs_forum'); 
			
			echo "<script> location.href='".URL('mgr/index_1.plate','&fub='.V('r:fub').'&bid='.$id['bid'])."' </script>";
	
		}else{
			foreach(V('r:data') as $k=>$v){
				if($k != 'id' and $k != 'bid' and $k != 'http'){
				$aa .= $k.'='."'$v'".',';
				}
			  }
			$wh = $aa.'imgurl='.'\''.V('r:imgurl').'\'';
			DS('publics.date1','','bbs_forum',"$wh","fid = '".V('r:classid')."'");
			
			echo "<script> location.href='".URL('mgr/index_1.plate','&fub='.V('r:fub').'&bid='.$id['bid'])."' </script>";
			}		

		}	
	function status(){
		$info = DS('publics._get','','bbs_forum','fid='.V('r:id'));
		$unm = 1-(int)$info[0]['status'];
		DS('publics.date1','','bbs_forum',"status = $unm","fid = '".V('r:id')."'");
		
		}	
	function showtid(){
				if(V('r:key') != NULL){
					$muh = ' and subject like '.'\''.'%'.V('r:key').'%'.'\'';
				}
			
	
				if(V('r:select') != NULL){
				$order = V('r:select').' desc';
				}
				
			
			$rss=DS('publics.page_list','',30,"fid = '".V('r:classid')."' $muh ","$order",V('g'),'bbs_post');
		
			TPL :: assign('rss' 	, $rss['info']);
			TPL :: assign('page' 	, $rss);
		    $this->_display('index_1/showtid');	

		//$info = DS('publics._get','','ad',"id = '".V('r:id')."'");
		//echo 1;
		//$this->_display('index_1/showtid');
		
		}	
	function is_showtip(){
		$info = DS('publics._get','','bbs_post','pid='.V('r:id'));
		$unm = 1-(int)$info[0]['is_show'];
		DS('publics.date1','','bbs_post',"is_show = $unm","pid = '".V('r:id')."'");
		
		}
	function update_lmorder(){
		DS('publics.date1','','bbs_post',"lmorder = '".V('r:lmorder')."'","pid = '".V('r:id')."'");
		
		}	
	function showindex(){
		DS('publics.date1','','bbs_post',"sizecolor = '".'#'.V('r:col')."'","pid = '".V('r:id')."'");
		$info1 = DS('publics._get','','bbs_post','pid='.V('r:id'));
		$unm = 1-(int)$info1[0]['showindex'];
		DS('publics.date1','','bbs_post',"showindex = $unm","pid = '".V('r:id')."'");
		
		/*$info = DS('publics._get','','bbs_post','pid='.V('r:id'));
		$srt = "<em style =".'"'."color:#".V('r:col').'"'.">".strip_tags($info[0]['subject'])."</em>";
		DS('publics.date1','','bbs_post',"subject = '".$srt."'","pid = '".V('r:id')."'");
		$info1 = DS('publics._get','','bbs_post','pid='.V('r:id'));
		$unm = 1-(int)$info1[0]['showindex'];
		DS('publics.date1','','bbs_post',"showindex = $unm","pid = '".V('r:id')."'");*/
		

		}	
	function is_showindex(){
		$info = DS('publics._get','','bbs_post','pid='.V('r:id'));
		$unm = 1-(int)$info[0]['is_showindex'];
		DS('publics.date1','','bbs_post',"is_showindex = $unm","pid = '".V('r:id')."'");
		
		}
	function hostplate(){
		$classlist = DS('publics._get','','bbs_forum',"");	
		TPL :: assign('classlist' 	, $classlist);
		//$info = DS('publics._get','','ad',"id = '".V('r:id')."'");
		//echo 1;
		$this->_display('index_1/hostplate');
		
		}		
	function hostplantshow(){
		$info = DS('publics._get','','bbs_forum','fid='.V('r:id'));
		$unm = 1-(int)$info[0]['is_showindex'];
		DS('publics.date1','','bbs_forum',"is_showindex = $unm","fid = '".V('r:id')."'");
		
		}				
	function update_lmorder2(){
		DS('publics.date1','','bbs_forum',"indexlmorder = '".V('r:lmorder')."'","fid = '".V('r:id')."'");
		
		}
	function subjecthome(){
		if(V('r:key') != NULL){
		$muh = 'and title like '.'\''.'%'.V('r:key').'%'.'\'';
		}
		$adlist = DS('publics._get','','bbs_post',"classid = 10 $muh order by pid asc ");	
		//var_dump($adlist);
		TPL :: assign('adlist' 	, $adlist);
		$this->_display('index_1/subjecthome');
		
		}	
	function addclass2(){
		//$classlist = DS('publics._get','','ad',' classid = 12 order by  lmorder asc');
		
		
		$info = DS('publics._get','','bbs_post',"pid = '".V('r:pid')."'");
		TPL :: assign('info' 	, $info);
		$this->_display('index_1/addclass2');
		}	
	function savesubhome(){
		$id = V('r:data');
		
	  
		
		if($id['pid'] == NULL){
		foreach(V('r:data') as $k=>$v){
			if($k != 'id' and $k != 'bid' and $k != 'http'){
			$data[$k] 	= $v; 	
			}
	    }
			$name = $_SESSION['XSM_CLIENT_SESSION']['screen_name'];	
			$authorid = DS('publics._get','','users',"username='$name'");	
			$data['authorid']  =  $authorid[0]['id'];
			$data['author']  =  $name;
			$data['dateline']  	= time(); //插入时间saveban
			$data['imgurl']  	= V('r:imgurl'); 
			$data['classid']  	= 10; 
			$data['content']  =  V('r:edit_content');
			DS('publics._save',3,$data,'bbs_post'); 
			
			
				$ididss = DS('publics._get','','bbs_post',"fid =".$id['fid'] . ' and authorid = '.$authorid[0]['id']
		  .' and dateline='.$tiems );
		  
		  
		$comment['pid'] 	= $id['fid'];
		$comment['authorid'] 	= $authorid[0]['id'];
		$comment['dateline'] = $tiems;
		$comment['poststatus'] = 1;
		$comment['tid']   = $ididss[0]['pid'];
	
        DS('publics._save','',$comment,'bbs_postcomment');
			/*DS('publics._get','','bbs_post',' order by  lmorder asc');*/	
			echo "<script> location.href='".URL('mgr/index_1.subjecthome')."' </script>";
	
		}else{
			foreach(V('r:data') as $k=>$v){
				if($k != 'id' and $k != 'bid' and $k != 'http'){
					
					
				$aa .= $k.'='."'$v'".',';
				}
			  }
			$wh = $aa.'imgurl='.'\''.V('r:imgurl').'\''.','.'content='.'\''.V('r:edit_content').'\''.','.'dateline='.'\''.time().'\'';
			//echo $wh;
			DS('publics.date1','','bbs_post',"$wh","pid = '".$id['pid']."'");
			echo "<script> location.href='".URL('mgr/index_1.subjecthome')."' </script>";
			}	
		}	
	function read(){
		//$classlist = DS('publics._get','','ad',' classid = 12 order by id asc ');
		
		$adlist = DS('publics._get','','bbs_post',"classid = 9 order by pid asc ");	
		TPL :: assign('adlist' 	, $adlist);
	
		$this->_display('index_1/banner');
		}
	function newinfomation (){
		//$classlist = DS('publics._get','','ad',' classid = 12 order by id asc ');
		$adlist = DS('publics._get','','bbs_post1',"classid = 8 order by pid asc ");	
		TPL :: assign('adlist' 	, $adlist);
	
		$this->_display('index_1/newinfomation');
		}
	function addclass3 (){
		
		$info = DS('publics._get','','bbs_post1',"pid = '".V('r:pid')."'");
		TPL :: assign('info' 	, $info);
		$this->_display('index_1/addclass3');
		
	}		
	function sendmessage (){
		$adlist=DS('publics.page_list','',5,"1=1","addtime desc",V('g'),'information');
		TPL :: assign('adlist' 	, $adlist);	
		$this->_display('index_1/sendmessage');
	}
	function sendmessageadd (){
			
		$this->_display('index_1/sendmessageadd');
	}		
	function savesendmessage(){
		$data['addtime']  	= time();
		$data['content']  =  V('r:edit_content');
		DS('publics._save',3,$data,'information'); 
	echo "<script> location.href='".URL('mgr/index_1.sendmessageadd')."' </script>";
	}	
	function informationstatus(){
		$info = DS('publics._get','','information','id='.V('r:id'));
		$unm = 1-(int)$info[0]['status'];
		DS('publics.date1','','information',"status = $unm","id = '".V('r:id')."'");
		
	}
				
}
