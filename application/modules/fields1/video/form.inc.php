
	function video($field, $value, $fieldinfo) {
		$value_data = '';
		//获取flash上传属性
		pc_base::load_app_class('ku6api', 'video', 0);
		$setting = getcache('video', 'video');
		if(empty($setting)) return L('please_input_video_setting');
		$ku6api = new ku6api($setting['sn'], $setting['skey']);
		$flash_info = $ku6api->flashuploadparam();
		
		//获取上传的视频
		$key = 0;
		$list_str = "<div style='padding:1px'><ul class=\"tbsa\" id=\"video_{$field}_list\">";
		if($value) {
			$video_content_db = pc_base::load_model('video_content_model');
			$video_store_db = pc_base::load_model('video_store_model');
			$videos = $video_content_db->select(array('contentid'=>$this->id), 'videoid, listorder', '', '`listorder` ASC', '', 'videoid');
			if (!empty($videos)) {
				$videoids = '';
				foreach ($videos as $v) {
					$videoids .= $v['videoid'].',';
				}
				$videoids = substr($videoids, 0, -1);
				$result = $video_store_db->select("`videoid` IN($videoids)", '`videoid`, `title`, `picpath`', '', '', '', 'videoid');
				if (is_array($result)) {
					//首先对$result按照$videos的videoid排序
					foreach ($videos as $_vid => $v) {
						$new_result[] = $result[$_vid];
					}
					unset($result, $_vid, $v);
					foreach ($new_result as $_k => $r) {
						$key = $_k+1;
						$picpath = $r['picpath'] ? $r['picpath'] : IMG_PATH.'nopic.gif';
						