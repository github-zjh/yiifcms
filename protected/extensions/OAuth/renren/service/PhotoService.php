<?php
include_once ('RennServiceBase.php');
class PhotoService extends RennServiceBase {
        /**
         * 获取某个用户某个相册里的某张照片
         * <br />对应API:{$link http://dev.renren.com/API/v2/photo/get }
         * @param Long $albumId 相册的ID
         * @param Long $photoId 照片的ID
         * @param Long $ownerId 相册所有者的ID
         * @param String $password 相册的密码
         * @return Photo 照片
         */
         function getPhoto($albumId, $photoId, $ownerId, $password) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($albumId)) {
	             $params ['albumId'] = $albumId;
	     }
	     if (isset($photoId)) {
	             $params ['photoId'] = $photoId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
	     if (isset($password)) {
	             $params ['password'] = $password;
	     }
             return $this->client->execute('/v2/photo/get', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 上传照片至用户相册。此接口需要采用multipart/form-data的编码方式。
         * <br />对应API:{$link http://dev.renren.com/API/v2/photo/upload }
         * @param Long $albumId 相册ID,albumId省略时会上传到应用相册
         * @param String $description 照片描述。不能超过200个字符
         * @param $paramter.simpleType2 $file 照片
         * @return Photo 照片
         */
         function uploadPhoto($albumId, $description, $file) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($albumId)) {
	             $params ['albumId'] = $albumId;
	     }
	     if (isset($description)) {
	             $params ['description'] = $description;
	     }
	     if (isset($file)) {
	             $fileParams ['file'] = $file;
	     }
             return $this->client->execute('/v2/photo/upload', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 以分页的方式获取某个用户某个相册里的照片列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/photo/list }
         * @param Long $albumId 相册的ID
         * @param Long $ownerId 相册所有者的ID
         * @param Integer $pageSize 页面大小。取值范围1-100，默认大小20
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @param String $password 相册的密码，
         * @return Photo 照片
         */
         function listPhoto($albumId, $ownerId, $pageSize, $pageNumber, $password) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($albumId)) {
	             $params ['albumId'] = $albumId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
	     if (isset($password)) {
	             $params ['password'] = $password;
	     }
             return $this->client->execute('/v2/photo/list', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
