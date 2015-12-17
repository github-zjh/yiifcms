<?php
include_once ('RennServiceBase.php');
class FriendService extends RennServiceBase {
        /**
         * 获取某个用户的好友ID列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/friend/list }
         * @param Long $userId 用户ID。该字段默认为当前用户
         * @param Integer $pageSize 页面大小。默认大小500。
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @return Integer [] 好友ID列表
         */
         function listFriend($userId, $pageSize, $pageNumber) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
             return $this->client->execute('/v2/friend/list', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
