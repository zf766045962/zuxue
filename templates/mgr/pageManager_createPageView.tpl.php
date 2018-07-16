<?php if (empty($pageList)) {echo "没有可创建的页面";} else {?>
<form id="addForm" action="<?= URL('mgr/page_manager.doCreatePage');?>" method="post"  name="changes-newlink">
	<div class="form-box">
		<div class="form-row">
			<label class="form-field">页面名称</label>
			<div class="form-cont">
				<input name="data[page_name]" class="ipt-txt" vrel="_f|ne=m:不能为空|sz=max:15,m:15个汉字以内" warntip="#nameTip" type="text" value=""/>
				<span class="tips-error hidden" id="nameTip"></span>
			</div>
		</div>
		<div class=" form-row">
				<label class="form-field">选择模板:</label>
				<select name="data[type]" >
                	<option value="0">空白模板</option>
					<option value="1">首页模板</option>
					<option value="2">文章模板</option>
					<option value="3">产品模板</option>
					<option value="4">会员模板</option>
				</select>
		</div>
		<div class=" form-row" style="display:;">
				<label class="form-field">页面类型:</label>
				<select name="data[prototype_id]" >
				<?php
                    foreach ($pageList as $aPage) 
                    {
                        echo '<option value="' . $aPage['id'].'">' . F('escape', $aPage['name']) . '</option>';
                    }
                ?>
				</select>
		</div>
		<div class="form-row">
			<label class="form-field">页面描述</label>
			<div class="form-cont">
				<textarea name="data[desc]" class="input-area w250" ></textarea>
			</div>
		</div>
		<div class="btn-area">
			<a class="btn-general highlight" id="submitBtn"><span>确定</span></a>
			<a class="btn-general" id="pop_cancel"><span>取消</span></a>
		</div>
	</div>
</form>
<?php }?>
