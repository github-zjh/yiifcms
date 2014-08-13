<?php
include_once ('RennServiceBase.php');
class StatusService extends RennServiceBase {
        /**
         * 获取用户状态
         * <br />对应API:{$link http://dev.renren.com/API/v2/status/get }
         * @param Long $statusId 状态ID
         * @param Long $ownerId 状态所有者的用户ID
         * @return Status 状态
         */
         function getStatus($statusId, $ownerId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($statusId)) {
	             $params ['statusId'] = $statusId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
             return $this->client->execute('/v2/status/get', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取用户状态列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/status/list }
         * @param Long $ownerId 状态所有者的用户ID
         * @param Integer $pageSize 页面大小。取值范围1-100，默认大小20
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @return Status 状态
         */
         function listStatus($ownerId, $pageSize, $pageNumber) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
             return $this->client->execute('/v2/status/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 更新用户状态
         * <br />对应API:{$link http://dev.renren.com/API/v2/status/put }
         * @param String $content 状态的内容。状态内容不能长于240个字符。内容中的UBB表情代码未经过处理，需要开发者自行进行替换。UBB表情参见：[http://wiki.dev.renren.com/wiki/V2/ubb/list 获取人人网ubb列表]
         * @return Status 状态
         */
         function putStatus($content) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
             return $this->client->execute('/v2/status/put', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 分享用户状态
         * <br />对应API:{$link http://dev.renren.com/API/v2/status/share }
         * @param String $content 状态的内容。状态内容不能长于240个字符。内容中的UBB表情代码未经过处理，需要开发者自行进行替换。UBB表情参见：[http://wiki.dev.renren.com/wiki/V2/ubb/list 获取人人网ubb列表]
         * @param Long $statusId 状态ID
         * @param Long $ownerId 状态所有者的用户ID
         * @return Status 状态
         */
         function shareStatus($content, $statusId, $ownerId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
	     if (isset($statusId)) {
	             $params ['statusId'] = $statusId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
             return $this->client->execute('/v2/status/share', 'POST', $params, $bodyParams, $fileParams);
         } 
}
?>
