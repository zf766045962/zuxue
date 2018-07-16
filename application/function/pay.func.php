<?php

header("Content-type: text/html; charset=utf-8");

//充值来源
function pay_source($source){
	
	switch($source){
		case "1":
			echo "系统充值";
		break;
		
		case "2":
			echo "用户充值";
		break;
	} 
} 

//操作类型
function pay_type($source){
	
	switch($source){
		case "1":
			echo "-";
		break;
		
		case "2":
			echo "+";
		break;
		
		case "3":
			echo "+";
		break;
	}	 
}

//来源类型
function type($type){
	
	switch($type){
		case "1":
			echo "购买视频";
		break;
		
		case "2":
			echo "充值学币";
		break;
		
		case "3":
			echo "分享视频";
		break;
	}
	 
}

?>