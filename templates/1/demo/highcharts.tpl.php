<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>折线图-柱状图-饼状图</title>
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<?php $highcharts = APP :: N('highcharts');?>
</head>

<body>

<?php // 柱状图
	$setting = array(
		'name'			=> 'container',
		'title'			=> '标题1',
		'subtitle'		=> '副标题1',
		'isMousesShow'	=> 1,
		'isDataShow'	=> 1
	);
	$xyName = array('xName'=>array('一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二'),'yName'=>'名称y');
	$data = array(
				array('name' => '项1','value' => '49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4'),
				array('name' => '项2','value' => '83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3')
			);
	echo $highcharts->makeCharts('column',$setting,$xyName,$data);
?>


<?php // 折线图
	$setting2 = array(
		'name'			=> 'container2',
		'title'			=> '标题2',
		'subtitle'		=> '副标题2',
		'isMousesShow'	=> 1,
		'isDataShow'	=> 1
	);
	$data2 = array(
				array('name' => '项1','value' => '49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4'),
				array('name' => '项2','value' => '83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3')
			);
	$xyName2 = array('xName'=>array('一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二'),'yName'=>'名称y');
	echo $highcharts->makeCharts('line',$setting2,$xyName2,$data2);
?>


<?php // 饼状图
	$setting3 = array(
		'name'			=> 'container3',
		'title'			=> '标题3',
		'subtitle'		=> '副标题3',
		'isMousesShow'	=> 1,
		'isDataShow'	=> 1
	);
	$data3 = array(
				array('name' => '项1','value' => '45.0'),
				array('name' => '项2','value' => '26.8'),
				array('name' => '项3','value' => '12.8'),
				array('name' => '项4','value' => '8.5'),
				array('name' => '项5','value' => '6.2'),
				array('name' => '项6','value' => '0.7')
			);
	echo $highcharts->makeCharts('pie',$setting3,'',$data3);
?>


</body>
</html>