<?php
include_once ('RennServiceBase.php');
class UserService extends RennServiceBase {
        /**
         * 批量获取用户信息
         * <br />对应API:{$link http://dev.renren.com/API/v2/user/batch }
         * @param Long $userIds 批量获取的用户IDs,最多支持50个
         * @return User 用户
         */
         function batchUser($userIds) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($userIds)) {
	             $userIdsList=null;
	             foreach($userIds as $value) {
	                       if($userIdsList == null) {
			           $userIdsList = strval($value);	
	                       } else {
		                       $userIdsList =$userIdsList.",".strval($value);
			       }
	             }
	             $params ['userIds'] = $userIdsList;
	     }
             return $this->client->execute('/v2/user/batch', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取用户信息
         * <br />对应API:{$link http://dev.renren.com/API/v2/user/get }
         * @param Long $userId 用户ID，不传时表示获取access_token对应的用户信息
         * @return User 用户
         */
         function getUser($userId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
             return $this->client->execute('/v2/user/get', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取当前登录用户未安装某应用里的好友列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/user/friend/uninstall/list }
         * @return User 用户
         */
         function listUserFriendUninstall() {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
             return $this->client->execute('/v2/user/friend/uninstall/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取当前登录用户在某个应用里的好友列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/user/friend/app/list }
         * @return User 用户
         */
         function listUserFriendApp() {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
             return $this->client->execute('/v2/user/friend/app/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取某个用户的好友列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/user/friend/list }
         * @param Long $userId 用户ID
         * @param Integer $pageSize 页面大小。取值范围1-100，默认大小20
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @return User 用户
         */
         function listUserFriend($userId, $pageSize, $pageNumber) {
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
             return $this->client->execute('/v2/user/friend/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 以分页的方式获取某个用户与当前登录用户的共同好友
         * <br />对应API:{$link http://dev.renren.com/API/v2/user/friend/mutual/list }
         * @param Long $userId 用户ID
         * @return User 用户
         */
         function listUserFriendMutual($userId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
             return $this->client->execute('/v2/user/friend/mutual/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取当前登录用户信息
         * <br />对应API:{$link http://dev.renren.com/API/v2/user/login/get }
         * @return User 用户
         */
         function getUserLogin() {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
             return $this->client->execute('/v2/user/login/get', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
