<?php 
	if(empty($data)){
		$subUrl = URL('mgr/page_manager.doCreateComponent');
	}else{
		$subUrl = URL('mgr/page_manager.doEditComponent');
	}
?>
<form id="addForm" action="<?= $subUrl;?>" method="post" name="changes-newlink">
    <div class="form-box">
        <div id="componentPropertyDiv">
            <input type="hidden" name="page_id" value="<?= $page_id; ?>">
            <input type="hidden" name="data[component_id]" value="<?= $component_id; ?>">
            
            <div class="form-row">
                 <label class="form-field">标题</label>
                <div class="form-cont">
                     <input class="input-txt w130" type="text" vrel="_f|ne=m:不能为空" warntip="#titleErr" name="data[title]" value="<?= isset($data['title']) ? $data['title'] : V('r:title',''); ?>" />
                     <span class="tips-error hidden" id="titleErr"></span>
                </div>
            </div>

            <div class="form-row">
                <label class="form-field">链接</label>
                <div class="form-cont">
                    <input class="input-txt w130" type="text" name="param[link]" value="<?= isset($data['param']['link']) ? $data['param']['link'] : 'http://'; ?>"/>
                    <input type="hidden" name="param[src]" id="imgSrc" value="" />
                    <p class="form-tips">如不需要链接，此处留空即可</p>
                </div>
            </div>
                    
            <div class="form-row">
                <label class="form-field">文字介绍<br />(支持HTML)</label>
                <div class="form-cont">
                    <textarea class="input-area w250" name="param[desc]"><?= isset($data['param']['desc']) ? $data['param']['desc'] : ''; ?></textarea>
                </div>
            </div>
           	            
            <?php
				$pageSetting = '<div class="form-row">
									<label class="form-field">显示方式</label>
									<div class="form-cont">				
										<p class="input-item"><input class="ipt-radio" type="radio" name="param[page_type]" value="1" #pageTypeChecked# >分页显示，每页显示<input class="input-txt w30 input-disabled" type="text" name="param[show_num]" value="#showNumValue#" vrel="ne" disabled="disabled" />条</p>
										
										<p class="input-item"><input class="ipt-radio" type="radio" name="param[page_type]" value="0" #pageSizeChecked# >仅显示<input class="input-txt w30" type="text" name="param[show_num]" value="#showNumValue#" vrel="ne" checked="checked" />条</p>
									</div>
								</div>';
				
				$pageType 							= isset($data['param']['page_type']) ? $data['param']['page_type'] : '';
				$settingValue['#pageTypeChecked#']  = $pageType ? 'checked' : '';
				$settingValue['#pageSizeChecked#']  = empty($pageType) ? 'checked' : '';
				$settingValue['#showNumValue#']		= isset($data['param']['show_num']) ? intval($data['param']['show_num']) : 15;
				echo str_replace(array_keys($settingValue), array_values($settingValue), $pageSetting);
            ?>

        </div> 
 
        <div class="btn-area">
            <a class="btn-general highlight" href="#" id="submitBtn"><span>确定</span></a>
            <a class="btn-general" href="#" id="pop_cancel"><span>取消</span></a>
        </div>
        
    </div>
</form>