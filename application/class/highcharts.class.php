<?php
/**************************************************
*  	Created:  2014-08-15 11:42
*	
* 	highcharts 折线图 柱状图 饼状图
*
*  	@Xsmart (C)2014-2099Inc.
*  	@Author  陈壹宁 
*	UpdateTime:  2015-05-29 13:49
*
***************************************************/
class highcharts {
	
	function __construct(){
		$fileInit = '';
		$fileInit .= '<script src="'.W_BASE_URL.'js/highcharts.js"></script>';
		$fileInit .= "\r\n";
		$fileInit .= '<script src="'.W_BASE_URL.'js/exporting.js"></script>';
		$fileInit .= "\r\n";
		echo $fileInit;
	}
	 
	/*
		方法名：生成图表

		参数说明：
			* @param String 		$type  			图表类型  line/column/pie
			* @param array 			$setting		初始化参数 , 一个参数数组
			* @param array 			$xyName			横(x)纵(y)轴显示的名称  PS: 饼状图为空
			* @param array			$data			绘成图表的数据 一个二维数组 name项 value值
		参数示例 如：
			$xyName = array('xName'=>array(
									'一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二'
								),
							'yName'=>'名称y'
						);
			$setting = array(
							'name'		=> 'container',		唯一名称
							'style'		=> 'min-width: 310px; height: 400px; margin: 0 auto',
							'title'		=> '标题',
							'subtitle'	=> '副标题',
							'isMousesShow'	=> 1,			是否鼠标经过显示数据 0 1
							'isDataShow'	=> 1			是否直接在图上显示数据 0 1
						);
			$data = array(
				array('name' => '项1','value' => '45.0'),
				array('name' => '项2','value' => '26.8'),
				array('name' => '项3','value' => '12.8')
				...
			);
			
	*/
	function makeCharts($type = 'pie',$setting,$xyName = '',$data){
		extract($setting);
		if(is_array($xyName)){
			extract($xyName);
			if(is_array($xName)){
				$xName = implode("','",$xName);
			}
		}
		$total = count($data);
		$html  = '';
		$html .= '<script type="text/javascript">';
		$html .= "\r\n";
		$html .= '	$(function () {';
		$html .= "\r\n";
		$html .= "		$('#".$name."').highcharts({";
		$html .= "\r\n";
		$html .= '			chart: {';
		$html .= "\r\n";
		$html .= "				type: '".$type."'";
		$html .= "\r\n";
		$html .= '			},';
		$html .= "\r\n";
		$html .= '			title: {';
		$html .= "\r\n";
		$html .= "				text: '".$title."'";
		$html .= "\r\n";
		$html .= '			},';
		$html .= "\r\n";
		$html .= '			subtitle: {';
		$html .= "\r\n";
		$html .= "				text: '".$subtitle."'";
		$html .= "\r\n";
		$html .= '			},';
		$html .= "\r\n";
		// xy轴信息
		if($type != 'pie'){
			$html .= '			xAxis: {';
			$html .= "\r\n";
			$html .= "				categories: ['".(isset($xName) ? $xName : '')."']";
			$html .= "\r\n";
			$html .= '			},';
			$html .= "\r\n";
			$html .= '			yAxis: {';
			$html .= "\r\n";
			$html .= '				title: {';
			$html .= "\r\n";
			$html .= "					text: '".(isset($yName) ? $yName : '')."'";
			$html .= "\r\n";
			$html .= '				}';
			$html .= "\r\n";
			$html .= '			},';
			$html .= "\r\n";
		}
		// 鼠标经过数据显示样式
		$html .= '			tooltip: {';
		if($type == 'pie'){
			$html .= "\r\n";
			$html .= "				pointFormat: '数量: <b>{point.y}</b><br />{series.name}: <b>{point.percentage:.1f}%</b>'";
		}else{
			$html .= "\r\n";
			$html .= "				headerFormat: '<span style=\"font-size:10px\">{point.key}</span><table>',";
			$html .= "\r\n";
			$html .= "				pointFormat: '<tr><td style=\"color:{series.color};padding:0\">{series.name}: </td><td style=\"padding:0\"><b>{point.y:.1f}</b></td></tr>',";
			$html .= "\r\n";
			$html .= "				footerFormat: '</table>',";
			$html .= "\r\n";
			$html .= '				shared: true,';
			$html .= "\r\n";
			$html .= '				useHTML: true';
		}
		$html .= "\r\n";
		$html .= '			},';
		$html .= "\r\n";
		// 鼠标经过数据显示配置
		$html .= '			plotOptions: {';
		$html .= "\r\n";
		$html .= '				'.$type.': {';
		$html .= "\r\n";
		$html .= '					allowPointSelect: true,';
		$html .= '					nableMouseTracking: '.($isMousesShow ? true : false).',';
		$html .= "\r\n";
		$html .= '					dataLabels: {';
		$html .= "\r\n";
		if($type == 'pie'){
			$html .= "\r\n";
			$html .= "						format: '<b>{point.name}</b>: {point.percentage:.1f} %',";
			$html .= "\r\n";
			$html .= "						style: {color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'},";
			$html .= "\r\n";
		}
		$html .= '						enabled: '.($isDataShow ? true : false);
		$html .= "\r\n";
		$html .= '					}';
		$html .= "\r\n";
		$html .= '				}';
		$html .= "\r\n";
		$html .= '			},';
		$html .= "\r\n";
		if($type == 'pie'){
			$html .= '			series: [{';
			$html .= "\r\n";
			$html .= "				type: 'pie',";
			$html .= "\r\n";
			$html .= "				name: '占全部',";
			$html .= "\r\n";
			$html .= '				data: [';
			$html .= "\r\n";
			if(!empty($data)){
				foreach($data as $key=>$item){
				$html .= "					['".$item['name']."',".$item['value']."]".($total - 1 == $key ? '' : ',');
				$html .= "\r\n";
				}
			}
			$html .= '				]';
			$html .= "\r\n";
			$html .= '			}]';
		}else{
			$html .= '			series: [';
			if(!empty($data)){
				foreach($data as $key=>$item){
				$html .= "\r\n";
				$html .= "			{	name: '".$item['name']."',";
				$html .= "\r\n";
				$html .= '				data: ['.@implode(',',$item['value']).']';
				$html .= "\r\n";
				$html .= '			}'.($total - 1 == $key ? '' : ',');
				}
			}
			$html .= "\r\n";
			$html .= '			]';
		}
		$html .= "\r\n";
		$html .= '		});';
		$html .= "\r\n";
		$html .= '	});';
		$html .= "\r\n";
		$html .= '</script>';
		
		$html .= '<div id="'.$name.'" style="'.(isset($style) ? $style : 'min-width: 310px; height: 400px; margin: 0 auto').'"></div>';
		return $html;
	}
	
}