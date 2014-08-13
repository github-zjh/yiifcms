<?php
include_once ('RennServiceBase.php');
class ProfileService extends RennServiceBase {
        /**
         * 获取用户的主页信息，包括各种统计数据。
         * <br />对应API:{$link http://dev.renren.com/API/v2/profile/get }
         * @param Long $userId 用户ID
         * @return Profile 个人主页信息
         */
         function getProfile($userId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
             return $this->client->execute('/v2/profile/get', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
