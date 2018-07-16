<?php

header("Content-type: text/html; charset=utf-8");


function role($rid){
	
	$rlist = DS('publics._get','','role','id = '.$rid);
	return $rlist[0]['title'];	
}

function user($id){
	
	$ulist = DS('publics._get','','users','id = '.$id);
	return $ulist[0]['realname'];	
}

?>