<?php
include_once ('RennServiceBase.php');
class PageService extends RennServiceBase {
        /**
         * 判断用户是否为某个公共主页的粉丝
         * <br />对应API:{$link http://dev.renren.com/API/v2/page/isfan }
         * @param Integer $pageId pageId
         * @param Integer $userId 目标用户Id,如果不传此参数则默认获取token用户是否为指定page的粉丝
         * @return Boolean 是否是公共主页粉丝
         */
         function isfanPage($pageId, $userId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($pageId)) {
	             $params ['pageId'] = $pageId;
	     }
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
             return $this->client->execute('/v2/page/isfan', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取用户的所有公共主页信息。
         * <br />对应API:{$link http://dev.renren.com/API/v2/page/user/list }
         * @param Integer $userId 目标用户Id,如果不传此参数则默认获取token用户的page信息
         * @param Integer $pageSize 页大小1-500之间
         * @param Integer $pageNumber 页码大于等于1
         * @return PageInfo Page的信息
         */
         function listPageUser($userId, $pageSize, $pageNumber) {
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
             return $this->client->execute('/v2/page/user/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取所有公共主页信息。
         * <br />对应API:{$link http://dev.renren.com/API/v2/page/list }
         * @param Integer $pageSize 页大小1-500之间
         * @param Integer $pageNumber 页码大于等于1
         * @return PageInfo Page的信息
         */
         function listPage($pageSize, $pageNumber) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
             return $this->client->execute('/v2/page/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取指定id公共主页信息。
         * <br />对应API:{$link http://dev.renren.com/API/v2/page/get }
         * @param Integer $pageId pageId
         * @return PageInfo Page的信息
         */
         function getPage($pageId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($pageId)) {
	             $params ['pageId'] = $pageId;
	     }
             return $this->client->execute('/v2/page/get', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
