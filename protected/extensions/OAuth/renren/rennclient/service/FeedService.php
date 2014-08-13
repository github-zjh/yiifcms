<?php
include_once ('RennServiceBase.php');
class FeedService extends RennServiceBase {
        /**
         * 根据新鲜事类型获取新鲜事列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/feed/list }
         * @param FeedType $feedType 新鲜事类型
         * @param Long $userId 用户id,不传时表示获取当前用户人人网首页新鲜事，否则获取对应用户的个人主页新鲜事
         * @param Integer $pageSize 页面大小。取值范围1-100，默认大小30
         * @param Integer $pageNumber 页数，取值大于0，默认值为1
         * @return Feed 新鲜事
         */
         function listFeed($feedType, $userId, $pageSize, $pageNumber) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($feedType)) {
	             $feedTypeList=null;
	             foreach($feedType as $value) {
	                       if($feedTypeList == null) {
			           $feedTypeList = strval($value);	
	                       } else {
		                       $feedTypeList =$feedTypeList.",".strval($value);
			       }
	             }
	             $params ['feedType'] = $feedTypeList;
	     }
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
             return $this->client->execute('/v2/feed/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 发送自定义新鲜事。新鲜事会发布用户的个人动态信息到用户人人网主页，<br> 同时会出现在好友的新鲜事中。
         * <br />对应API:{$link http://dev.renren.com/API/v2/feed/put }
         * @param String $message 用户输入的自定义内容。注意：最多200个字符
         * @param String $title 新鲜事标题 注意：最多30个字符
         * @param String $actionTargetUrl 新鲜事动作模块链接
         * @param String $imageUrl 新鲜事图片地址
         * @param String $description 新鲜事主体内容 注意：最多200个字符。
         * @param String $subtitle 新鲜事副标题 注意：最多20个字符
         * @param String $actionName 新鲜事动作模块文案。 注意：最多10个字符
         * @param String $targetUrl 新鲜事标题和图片指向的链接
         * @return Long 发布新鲜事的ID
         */
         function putFeed($message, $title, $actionTargetUrl, $imageUrl, $description, $subtitle, $actionName, $targetUrl) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($message)) {
	             $params ['message'] = $message;
	     }
	     if (isset($title)) {
	             $params ['title'] = $title;
	     }
	     if (isset($actionTargetUrl)) {
	             $params ['actionTargetUrl'] = $actionTargetUrl;
	     }
	     if (isset($imageUrl)) {
	             $params ['imageUrl'] = $imageUrl;
	     }
	     if (isset($description)) {
	             $params ['description'] = $description;
	     }
	     if (isset($subtitle)) {
	             $params ['subtitle'] = $subtitle;
	     }
	     if (isset($actionName)) {
	             $params ['actionName'] = $actionName;
	     }
	     if (isset($targetUrl)) {
	             $params ['targetUrl'] = $targetUrl;
	     }
             return $this->client->execute('/v2/feed/put', 'POST', $params, $bodyParams, $fileParams);
         } 
}
?>
