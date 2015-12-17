<?php
include_once ('RennServiceBase.php');
class AlbumService extends RennServiceBase {
        /**
         * 获取某个用户的某个相册
         * <br />对应API:{$link http://dev.renren.com/API/v2/album/get }
         * @param Long $albumId 相册的ID
         * @param Long $ownerId 相册所有者的ID
         * @return Album 相册
         */
         function getAlbum($albumId, $ownerId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($albumId)) {
	             $params ['albumId'] = $albumId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
             return $this->client->execute('/v2/album/get', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 以分页的方式获取某个用户的相册列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/album/list }
         * @param Long $ownerId 相册所有者的ID
         * @param Integer $pageSize 页面大小。取值范围1-100，默认大小20
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @return Album 相册
         */
         function listAlbum($ownerId, $pageSize, $pageNumber) {
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
             return $this->client->execute('/v2/album/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 创建一个相册
         * <br />对应API:{$link http://dev.renren.com/API/v2/album/put }
         * @param String $location 相册拍摄的地点。不能超过60个字符。
         * @param String $description 相册的描述。不能超过200个字符。
         * @param String $name 相册的名字。不能超过30个字符
         * @param AccessControl $accessControl 相册的访问控制
         * @param String $password 相册的访问密码,1-16个字符
         * @return Album 相册
         */
         function putAlbum($location, $description, $name, $accessControl, $password) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($location)) {
	             $params ['location'] = $location;
	     }
	     if (isset($description)) {
	             $params ['description'] = $description;
	     }
	     if (isset($name)) {
	             $params ['name'] = $name;
	     }
	     if (isset($accessControl)) {
	             $params ['accessControl'] = $accessControl;
	     }
	     if (isset($password)) {
	             $params ['password'] = $password;
	     }
             return $this->client->execute('/v2/album/put', 'POST', $params, $bodyParams, $fileParams);
         } 
}
?>
