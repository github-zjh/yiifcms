<?php
include_once ('RennServiceBase.php');
class BlogService extends RennServiceBase {
        /**
         * 以分页的方式获取某个用户的日志列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/blog/list }
         * @param Long $ownerId 日志所有者的ID
         * @param Integer $pageSize 页面大小。取值范围1-20，默认大小10
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @return Blog 日志
         */
         function listBlog($ownerId, $pageSize, $pageNumber) {
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
             return $this->client->execute('/v2/blog/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 创建一篇日志
         * <br />对应API:{$link http://dev.renren.com/API/v2/blog/put }
         * @param String $title 日志的标题
         * @param AccessControl $accessControl 日志的访问控制
         * @param String $password 日志的访问密码,1-16个字符
         * @param $paramter.simpleType2 $content 日志的内容
         * @return Blog 日志
         */
         function putBlog($title, $accessControl, $password,  $content) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($title)) {
	             $params ['title'] = $title;
	     }
	     if (isset($accessControl)) {
	             $params ['accessControl'] = $accessControl;
	     }
	     if (isset($password)) {
	             $params ['password'] = $password;
	     }
	     if (isset($content)) {
		    $bodyParams ['content'] = $content;
	     }
             return $this->client->execute('/v2/blog/put', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取某个用户的某篇日志
         * <br />对应API:{$link http://dev.renren.com/API/v2/blog/get }
         * @param Long $ownerId 日志所有者的ID
         * @param Long $blogId 日志的ID
         * @param String $password 日志访问密码
         * @return Blog 日志
         */
         function getBlog($ownerId, $blogId, $password) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
	     if (isset($blogId)) {
	             $params ['blogId'] = $blogId;
	     }
	     if (isset($password)) {
	             $params ['password'] = $password;
	     }
             return $this->client->execute('/v2/blog/get', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
