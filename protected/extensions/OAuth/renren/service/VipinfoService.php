<?php
include_once ('RennServiceBase.php');
class VipinfoService extends RennServiceBase {
        /**
         * 获取某个用户的VIP信息
         * <br />对应API:{$link http://dev.renren.com/API/v2/vipinfo/get }
         * @param Long $userId 被获取VIP信息的用户ID
         * @return VIPInfo VIP信息
         */
         function getVipinfo($userId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
             return $this->client->execute('/v2/vipinfo/get', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
