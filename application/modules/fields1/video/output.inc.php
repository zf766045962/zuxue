
	function video($field, $value) {
		$video_content_db = pc_base::load_model('video_content_model');
		$video_store_db = pc_base::load_model('video_store_model');
		//先获取目前contentid下面的videoid
		$videos = $video_content_db->select(array('contentid'=>$this->id, 'modelid'=>$this->modelid), 'videoid', '', '`listorder` ASC', '', 'videoid');
		if (is_array($videos) && !empty($videos)) {
			$videoids = '';
			foreach ($videos as $_vid => $r) {
				$videoids .= $_vid.',';
			}
			$videoids = substr($videoids, 0, -1);
			$result = $video_store_db->select("`videoid` IN($videoids) AND `status`=21", '*', '', '', '', 'videoid');
			$pagenumber = count($result);
			$return_data = array();
			if ($pagenumber>0) {
				if (is_array($result) && !empty($result)) {
					//首先对$result按照$videos的videoid排序
					foreach ($videos as $_vid => $v) {
						if ($result[$_vid]) $new_result[] = $result[$_vid];
					}
					unset($result, $_vid, $v);
				}

				$this->url = pc_base::load_app_class('url', 'content');
				for($i=1; $i<=$pagenumber; $i++) {
					$pageurls[$i] = $this->url->show($this->id, $i, $this->data['catid'], $this->data['inputtime']);
				}
				//构建返回数组
				foreach ($pageurls as $page =>$urls) {
					$_k = $page - 1;
					if ($_k==0) $arr = reset($new_result);
					else $arr = next($new_result);
					$return_data['data'][$page