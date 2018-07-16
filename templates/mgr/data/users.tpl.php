<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员管理</title>
<link href="<?= W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script src="<?= W_BASE_URL;?>js/jquery-1.7.2.min.js"></script>
<?php $highcharts = APP :: N('highcharts');?>
</head>

<body class="main-body">

	<div class="path">
	  	<p>当前位置：后台管理<span>&gt;</span>报表统计</p>
   	</div>
    
    <div class="main-cont">
        <h3 class="title">会员统计信息</h3>
        <div class="btn-group clear">
			<?php 
				// 折线图
				$setting3 = array(
					'name'			=> 'container3',
					'title'			=> '近一月新增会员',
					'style'			=> 'max-width:900px;height:400px;margin:0 auto;margin-top:20px',
					'subtitle'		=> date("Y-m-d",mktime(0,0,0,date("m"),date("d")-31,date("Y"))).' - '.date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y"))),
					'isMousesShow'	=> 1,
					'isDataShow'	=> 1
				);
				for($i=31; $i>=1; $i--){
					$xName[] = date("m-d",mktime(0,0,0,date("m"),date("d")-$i,date("Y")));
					$start = mktime(0,0,0,date("m"),date("d")-$i,date("Y"));
					$end = mktime(23,59,59,date("m"),date("d")-$i,date("Y"));
					$value[] = DS('publics.get_total','','users','addtime > '.$start.' and addtime < '.$end);
				}
				$data = array(
							array('name' => '会员数','value' => $value),
						);
				$xyName3 = array('xName'=>$xName,'yName'=>'每日新增数');
				echo $highcharts->makeCharts('line',$setting3,$xyName3,$data);
				
				// 柱状图
				$setting2 = array(
					'name'			=> 'container2',
					'title'			=> '全部用户统计',
					'style'			=> 'max-width:900px;height:400px;margin:0 auto;margin-bottom:20px',
					'subtitle'		=> '',
					'isMousesShow'	=> 1,
					'isDataShow'	=> 1
				);
				$xyName2 = array('xName'=>array('学生','教师'),'yName'=>'');
				$data = array(
							array('name' => '总数量','value' => array($member,$member1)),
						);
				echo $highcharts->makeCharts('column',$setting2,$xyName2,$data);
				
				
				// 饼状图
				$setting = array(
                    'name'			=> 'container',
                    'title'			=> '会员注册总数占比',
                    'subtitle'		=> '',
                    'isMousesShow'	=> 1,
                    'isDataShow'	=> 1
                );
				$data = array(
							array('name' => '男','value' => $boy),
							array('name' => '女','value' => $girl),
							array('name' => '保密','value' => $nok)
						);
                echo $highcharts->makeCharts('pie',$setting,'',$data);
				
				
            ?>
        </div>
        
    </div>

</body>
</html>
