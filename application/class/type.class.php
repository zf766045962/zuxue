<?php

	class type{
	
		function state($state){
		
			switch($state){
			
				case "0":
					return '已取消';
					break;
				case "100":
					return '等待确认';
					break;
				case "101":
					return '等待备货';
					break;
				case "102":
					return '等待发货';
					break;
				case "103":
					return '等待签收';
					break;
				case "104":
					return '未结账';
					break;
				case "105":
					return '订单完成';
					break;
				case "1":
					return '付款中';
					break;
				case "2":
					return '取消';
					break;
				case "3":
					return '无效';
					break;
				case "4":
					return '退货';
					break;
				case "5":
					return '退款';
					break;
			}
		}

		function payment($payment){
			switch($payment){
				case "1":
					return '在线付款';
					break;
				case "2":
					return '合约账期';
					break;
				case "3":
					return '货到付款';
					break;
			}
		}
		function dispatchmode($dispatchmode){
			switch($dispatchmode){
				case "0":
					return '快递运输';
					break;
			}
		}
		function invoice_type($invoice_type){
			switch($invoice_type){
				case "0":
					return '普通发票';
					break;
				case "1":
					return '增值锐发票';
					break;
			}
		}
		function invoice_header_type($type){
			switch($type){
				case "0":
					return '个人';
					break;
				case "1":
					return '单位';
					break;
			}
		}
		
	}
