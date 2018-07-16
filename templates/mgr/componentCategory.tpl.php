<div class="tab-box">
    <h5 class="tab-nav clear" id="tabHead">
        <?php if (isset($component_cty) && is_array($component_cty)) {foreach ($component_cty as $key => $name) {?>
        <a><span><?= $name;?></span></a>
        <?php }}?>
    </h5>
    <div class="tab-con" id="tabMain">
    <?php if (isset($component_cty) && is_array($component_cty)) {
		foreach ($component_cty as $key => $name) {
			if (isset($componentList) && is_array($componentList)) {
				echo '<ul class="pic-item clear">';
				if (isset($componentList[$key]) && is_array($componentList[$key])) { 
					foreach($componentList[$key] as $component) {
						//var_dump($component);
						echo '<li class="modules-'.  $component['component_id'].'">'. $component['name'];
						echo  '<a rel="e:openPop,url:'. URL('mgr/page_manager.createComponentView',array('component_id' => $component['component_id'],'page_id' => $page_id,'settingTpl' => $component['settingTpl'])).',';
						echo 'title:'. $component['name'].',component_id:'. $component['component_id'].'"><img src="'.($component['preview_img'] ? $component['preview_img'] : '/img/no_image.gif').'" width="100%" height="100%"/></a></li>';
					}
				}else{
					echo '<p style="text-align:center; line-height:290px;">暂无组件！</p>';
					
					//echo  '<a rel="e:openPop,url:'. URL('mgr/page_manager.search',array('component_cty' => $key)).',';
					//echo 'title:'. $name.',component_id:0"></a>';
				}
				
				echo '</ul>';
			}
		}
	}
    ?>
    
    </div>
</div>
