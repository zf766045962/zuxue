<?php 
/**************************************************
*  Created:  2015-05-15
*
*  自定义模型操作项
*
*  @Xsmart (C)2015-2099 Nit Inc.
*  @Author Chenyining
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
extract($param);
/**
*	直接判断 $modelid 值显示不同操作即可
*
*	@param	int		$modelid	模型id
*	@param	int		$catid		栏目id
*	@param	array	$modelInfo	当前模型信息
*	@param	array	$info		当前数据信息
*/
?>

<?php // 课程测评
	if($modelid == 4){
?>
<a href="<?= URL('mgr/modelForm.infoList','modelid=16&'.$modelInfo['tablename'].'@id='.$info['id']);?>">试题管理</a> | 
<?php }?>

<?php // 章节列表/关联课程
	if($modelid == 11){
?>
<a href="<?= URL('mgr/modelForm.infoList','modelid=6&'.$modelInfo['tablename'].'@id='.$info['id']);?>"><?= $catid == 2 ? '章节列表' : '关联课程';?></a> | 
<?php }?>


<a href="<?= URL('mgr/modelForm.add',$getParam.'&id='.$info['id']);?>">编辑</a> | <a href="javascript:confirmUrl('<?= URL('mgr/modelForm.delete',$getParam.'&id='.$info['id']);?>','您确定要删除ID“<?= $info['id'];?>”的信息吗？');">删除</a>