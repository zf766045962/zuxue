<?php
/**
 * 本地私信公开模拟接口服务类
 * @Author			@@
 * @version $Id: localpm_service.class.php 17984 2011-08-24 11:37:25Z yaoying $
 *
 */
class localpm_service{
	
	function localpm_service(){
		
	}
	
	/**
	 * （公开模拟接口）获取指定用户有本地私信往来的用户列表，与该用户往来的最新私信。
	 * 返回内容按照往来的最新时间排序。
	 * 2011-08-23 流程改造完毕
	 * @link http://wiki.intra.weibo.com/1/direct_messages/user_list
	 * @param bigint $cc_uid
	 * @param int $page
	 * @param int $count
	 * @return RST_Array 。RST体为一个数组，其中有两个键值：
	 * 第一个键值total_number表示指定用户一共与多少人有对话。
	 * 第二个键值user_list为指定用户的对话列表数据集合数组，单条数据均有如下信息：
	 * array(
	 *       'user_id' => 0,    //该私信往来的用户uid（原本考虑完全模拟，现在暂不实现）
	 *       'iid'=> 0,    //该私信往来的用户uid的唯一私信集合id。普通开发者可忽略 
	 *       'total_number' => 0,    //与该用户的总对话条数
	 *       'unread_count' => 1,    //与该用户的私信对话未读数
	 *       'lasttime' => 0,    //与该用户的最后通讯时间
	 *       'pm' => array(),    //最后一条往来私信。若不存在则为空数组
	 * )
	 */
	function listGroupByUid($cc_uid, $page = 1, $count = 50){
		$result = array('user_list'=>array(), 'total_number'=>0);
		
		$result['total_number'] = DS('localpm_reader.pm_index_user_countOneUser', null, $cc_uid);
		if($result['total_number'] < 1){
			return RST($result);
		}
		
		$iidList = DS('localpm_reader.pm_index_user_getListGroupByUid', null, $cc_uid, $page, $count, true);
		
		if(empty($iidList)){
			return RST($result);
		}
		
		foreach($iidList as $data){ 
			$result['user_list'][(string)$data['iid']] = array();
			$r =& $result['user_list'][(string)$data['iid']];
			$r['iid'] = $data['iid'];
			$r['user_id'] = strtr($data['actors'], array($cc_uid. '#' => '', '#'. $cc_uid=>''));
			$r['total_number'] = $data['total_number'];
			$r['unread_count'] = $data['unread_count'];
			$r['lasttime'] = $data['lasttime'];
			$r['pm'] = !empty($data['last_data']) ? (array)unserialize($data['last_data']) : array();
		}
		
		return RST($result);
		
	}
	
	/**
	 * （公开模拟接口）获取两个指定用户的往来私信列表
	 * 请注意，第一第二个的参数是有顺序的，传错方向会出现被删除的私信又重新出现的情况！
	 * 2011-08-23 流程改造完毕
	 * @link http://wiki.intra.weibo.com/1/direct_messages/conversation
	 * @param bigint $reader_uid 请求查看者的新浪微博uid
	 * @param bigint $target_uid 请求查看者的要查看的目标新浪微博uid
	 * @param int $page
	 * @param int $count
	 * @return array 有如下内容：
	 * array(
	 *     'iid'=> 0,    //两个指定用户的唯一私信集合id。普通开发者可忽略
	 *     'total_number' => 0,    //两个指定用户往来私信总条数
	 *     'pms' => array(),    //两个指定用户往来私信
	 * )
	 */
	function getConversation($reader_uid, $target_uid, $page = 1, $count = 50){
		$return = array('iid' => 0, 'total_number' => 0, 'pms'=>array());
		
		if($reader_uid == $target_uid){
			return RST($return);
		}
		
		$iid = DS('localpm_reader.pm_index_getiid', null, $reader_uid, $target_uid);
		
		if($iid < 1){
			return RST($return);
		}else{
			$return['iid'] = $iid;
		}
		
		$return['pms'] = DS('localpm_reader.pm_content_getAllByiid', null, $iid, $page, $count, $reader_uid);
		return RST($return);
	}
	
	/**
	 * （公开模拟接口）向目标新浪微博uid发送一条本地私信
	 * 已包含有关前置条件检查
	 * 2011-08-23 流程改造完毕
	 * @link http://open.weibo.com/wiki/Direct_messages/new
	 * @param bigint $from_uid 哪个人发消息？
	 * @param bigint $to_uid 哪个人接收消息？
	 * @param string $text 本地私信内容
	 * @param bool $ignore_from_uid_check 是否忽略发消息人的合法性检查(默认true)？如果第一个参数不能保证为当前登录用户的cc_uid，请设置为false
	 * @param bool $ignore_from_uid_check 是否忽略接收消息人的合法性检查(默认false)？如果第二个参数不能保证是否存在，请设置为false
	 * @return RST_Array
	 */
	function writeNew($from_uid, $to_uid, $text, $ignore_from_uid_check = true, $ignore_to_uid_check = false){
		if(!is_numeric($from_uid) || !is_numeric($to_uid) || $from_uid < 1 || $to_uid < 1 || empty($text)){
			return RST(null, 1010000, 'Parameter is illegal');
		}elseif($from_uid == $to_uid){
			return RST(null, 1022000, 'Can not send pm to myself');
		}
		
		if(APP::F('strlen_weibo', $text) > 300){
			return RST(null, 1022006, 'pm text can not larger than 300');
		}
		
		if(true != $ignore_to_uid_check){
			$to_uid_result = DS('mgr/userCom.getByUid', null, $to_uid);
			if(!is_array($to_uid_result) || empty($to_uid_result)){
				return RST(null, 1022001, 'Can not send pm to someone who doesn’t login this site yet');
			}
		}
		
		if(true != $ignore_from_uid_check){
			$from_uid_result = DS('mgr/userCom.getByUid', null, $from_uid);
			if(!is_array($from_uid_result) || empty($from_uid_result)){
				return RST(null, 1022002, 'You are not the member of this site, send action halted');
			}
		}
		
		$options = DS('common/userConfig.get', null, null, $to_uid);
		$disallow_not_friend_local_pm = isset($options['disallow_not_friend_local_pm']) ? intval($options['disallow_not_friend_local_pm']) : 0;
		
		if(0 != $disallow_not_friend_local_pm){
			$res = DR('Xsmart/xwb.existsFriendship', null, $to_uid, $from_uid);
			if(!isset($res['rst']['friends']) || (isset($res['errno']) && $res['errno'] != 0)){
				return RST(null, 1040002, 'api error occur');
			}elseif(true != $res['rst']['friends']){
				return RST(null, 1022003, 'You are not allowed to send pm to recipient');
			}
		}else{
		}
		
		$result = DR('localpm_writer.writeNew', null, $from_uid, $to_uid, $text);
		if($result['errno'] != 0){
			return RST(null, 1022004, 'Write new failure:'. $result['err']);
		}
		
		$new_local_pm = isset($options['new_local_pm']) ? (abs(intval($options['new_local_pm']))) + 1 : 1;
		DS('common/userConfig.set', null, 'new_local_pm', $new_local_pm, $to_uid);
		
		return RST(true);
		
	}
	
	/**
	 * （公开模拟接口）向目标新浪微博昵称发送一条本地私信
	 * 请注意，一旦采用本接口，将被强制检查接收消息人的合法性检查
	 * @param bigint $from_uid 哪个人（cc_uid）发消息？
	 * @param bigint $to_uid 哪个昵称接收消息？
	 * @param string $text 本地私信内容
	 * @param bool $ignore_from_uid_check 是否忽略发消息人的合法性检查(默认true)？如果第一个参数不能保证为当前登录用户的cc_uid，请设置为false
	 * @return RST_Array
	 */
	function writeNewUsingNickname($from_uid, $to_username, $text, $ignore_from_uid_check = true){
		$q = array(
			'q' => $to_username,
			'snick' => 1,
		);
		$rs = DR('Xsmart/xwb.searchUser', '', $q);
		
		if(!is_array($rs['rst'])){
			return RST(null, 1022005, 'recipient does not exist');
		}elseif(!isset($rs['rst'][0])){
			return RST(null, 1022005, 'recipient does not exist');
		}elseif( count($rs['rst']) != 1
				&& strncasecmp($rs['rst'][0]['screen_name'], $to_username, 100) != 0
				&& strncasecmp($rs['rst'][0]['name'], $to_username, 100) != 0)
		{
			return RST(null, 1022005, 'recipient does not exist');
		}
		
		$to_uid = $rs['rst'][0]['id'];
		unset($rs);
		
		return $this->writeNew($from_uid, $to_uid, $text, $ignore_from_uid_check, false);
	}
	
	
	/**
	 * （公开模拟接口）删除一条私信
	 * 2011-08-23 流程改造完毕
	 * @link http://open.weibo.com/wiki/Direct_messages/destroy
	 * @param int $id 私信id
	 * @param bigint $action_uid 操作者的新浪微博id
	 * @return RST_Array
	 */
	function destroyByid($id, $action_uid){
		$id = abs(intval($id));
		if($id < 1 || !is_numeric($action_uid) || $action_uid < 1){
			return RST(null, 1010000, 'Parameter is illegal');
		}
		
		$pm_data = DS('localpm_reader.pm_content_get', null, $id, $action_uid);
		if(empty($pm_data)){
			return RST(0);
		}
		
		if($pm_data['last_del_uid'] != 0 && $pm_data['last_del_uid'] != $action_uid){
			$affectrow = DS('localpm_writer.pm_content_deleteByid', null, $id, $action_uid);
		}elseif($pm_data['last_del_uid'] == 0){
			$affectrow = DS('localpm_writer.pm_content_update', null, $id, array('last_del_uid' => $action_uid));
		}else{
			$affectrow = 0;
		}
		
		if($affectrow < 1){
			return RST(0);
		}
		
		$action_uid_index_user_data = DS('localpm_reader.pm_index_user_getByKey', null, $action_uid, $pm_data['iid']);
		if(empty($action_uid_index_user_data)){
			return RST(1);
		}
		
		//更新pm_index_user相关缓存最后本地私信信息
		$last_pmdata = DS('localpm_reader.pm_content_getAllByiid', null, $pm_data['iid'], 1, 1, $action_uid);
		if(!isset($last_pmdata[0]['id'])){
			//没查到消息？删除
			DS('localpm_writer.pm_index_user_delete', null, $pm_data['iid'], $action_uid);
		}else{
			$otherdata = array();
			if($action_uid_index_user_data['last_id'] != $last_pmdata[0]['id']){
				$otherdata['last_id'] = $last_pmdata[0]['id'];
				$otherdata['last_data'] = serialize($last_pmdata[0]);
				$otherdata['lasttime'] = $last_pmdata[0]['created_at'];
			}
			DS('localpm_writer.pm_index_user_update_unread', null, $action_uid, $pm_data['iid'], 0, -1, $otherdata);
		}
		
		return RST(1);
	}
	
	/**
	 * （公开模拟接口）批量删除两个用户之间的私信
	 * @link http://wiki.intra.weibo.com/1/direct_messages/destroy_batch
	 * @param bigint $action_uid 请求删除者的新浪微博uid
	 * @param bigint $target_uid 请求删除者的要删除的与之对话的目标新浪微博uid
	 * @return RST_array RST体内为删除的数目
	 */
	function destroyBatchBySinaUid($action_uid, $target_uid){
		if($action_uid < 1 || $target_uid < 1){
			return RST(0);
		}
		
		$iid = DS('localpm_reader.pm_index_getiid', null, $action_uid, $target_uid);
		if($iid < 1){
			return RST(0);
		}
		
		$affectRow_update = DS('localpm_writer.pm_content_markDelByiid', null, $iid, $action_uid);
		$affectRow_del = DS('localpm_writer.pm_content_deleteByiid', null, $iid, $target_uid);
		$affectRow = $affectRow_update + $affectRow_del;
		
		DS('localpm_writer.pm_index_user_delete', null, $iid, $action_uid);
		
		if($affectRow < 1){
			return RST(0);
		}
		
		return RST($affectRow);
		
	}
	
	/**
	 * 标记一组对话已经被接收者阅读
	 * @param int $iid
	 * @param bigint $action_uid
	 */
	function markRecipientHasReadByiid($iid, $recipient_id){
		if($recipient_id < 1){
			return RST(false);
		}
		
		DS('localpm_writer.pm_content_mark_recipient_readed', null, $iid, $recipient_id);
		$data = DS('localpm_reader.pm_index_user_getByKey', null, $recipient_id, $iid);
		if($data['unread_count'] > 0){
			DS('localpm_writer.pm_index_user_update', null, $recipient_id, $iid, array('unread_count'=>0));
			$new_local_pm = DS('common/userConfig.get', null, 'new_local_pm', $recipient_id);
			$new_local_pm = intval($new_local_pm) - $data['unread_count'];
			if($new_local_pm < 1){
				$new_local_pm = 0;
			}
			DS('common/userConfig.set', null, 'new_local_pm', $new_local_pm, $recipient_id);
		}
		return RST(true);
	}
	
	/**
	 * 重置指定用户的本地私信未读数为0
	 * @param bigint $cc_uid
	 * @param bool $force 是否连pm_index_user表、每个对话中的未读数也清为0？默认为false
	 * @return RST_array
	 */
	function resetUnread($cc_uid, $force = false){
		if(!is_numeric($cc_uid)){
			return RST(false);
		}
		DR('common/userConfig.set', null, 'new_local_pm', 0, $cc_uid);
		
		if(true == $force){
			DR('localpm_writer.pm_index_user_reset_unread_all', null, $cc_uid);
		} 
		return RST(true);
	}
	
}