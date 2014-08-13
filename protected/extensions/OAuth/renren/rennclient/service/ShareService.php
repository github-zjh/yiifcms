<?php
include_once ('RennServiceBase.php');
class ShareService extends RennServiceBase {
        /**
         * 分享人人网内部UGC资源，例如：日志、照片、相册、分享(基于已有分享再次进行分享）
         * <br />对应API:{$link http://dev.renren.com/API/v2/share/ugc/put }
         * @param Long $ugcOwnerId UGC所有者的用户ID
         * @param String $comment 分享时用户的评论，评论字数不能超过500字符
         * @param Long $ugcId UGC的ID
         * @param UGCType $ugcType UGC的类型。
         * @return Share 分享
         */
         function putShareUgc($ugcOwnerId, $comment, $ugcId, $ugcType) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($ugcOwnerId)) {
	             $params ['ugcOwnerId'] = $ugcOwnerId;
	     }
	     if (isset($comment)) {
	             $params ['comment'] = $comment;
	     }
	     if (isset($ugcId)) {
	             $params ['ugcId'] = $ugcId;
	     }
	     if (isset($ugcType)) {
	             $params ['ugcType'] = $ugcType;
	     }
             return $this->client->execute('/v2/share/ugc/put', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取站内UGC分享数及浏览数
         * <br />对应API:{$link http://dev.renren.com/API/v2/share/count/get }
         * @param Long $ugcOwnerId 用户ID
         * @param Long $ugcId 分享UGC的ID
         * @param UGCType $ugcType 分享UGC类型,TYPE_SHARE类型，不支持获取浏览数
         * @return ShareViewCount 封装分享数及浏览数结果，值为-1表示获取不到对应数据
         */
         function getShareCount($ugcOwnerId, $ugcId, $ugcType) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($ugcOwnerId)) {
	             $params ['ugcOwnerId'] = $ugcOwnerId;
	     }
	     if (isset($ugcId)) {
	             $params ['ugcId'] = $ugcId;
	     }
	     if (isset($ugcType)) {
	             $params ['ugcType'] = $ugcType;
	     }
             return $this->client->execute('/v2/share/count/get', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取某个用户的某个分享
         * <br />对应API:{$link http://dev.renren.com/API/v2/share/get }
         * @param Long $shareId 分享ID
         * @param Long $ownerId 分享所有者ID
         * @return Share 分享
         */
         function getShare($shareId, $ownerId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($shareId)) {
	             $params ['shareId'] = $shareId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
             return $this->client->execute('/v2/share/get', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 以分页的方式获取某个用户的分享列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/share/list }
         * @param Long $ownerId 分享所有者ID
         * @param Integer $pageSize 页面大小。取值范围1-100，默认大小20
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @return Share 分享
         */
         function listShare($ownerId, $pageSize, $pageNumber) {
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
             return $this->client->execute('/v2/share/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取人人推荐资源
         * <br />对应API:{$link http://dev.renren.com/API/v2/share/hot/list }
         * @param Integer $pageSize 页面大小。取值范围1-50，默认大小20
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @param ShareType $shareType 分享类型
         * @return Share 分享
         */
         function listShareHot($pageSize, $pageNumber, $shareType) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
	     if (isset($shareType)) {
	             $params ['shareType'] = $shareType;
	     }
             return $this->client->execute('/v2/share/hot/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 分享人人网外部资源，例如：视频、图片等<br> 如果要分享一张本地照片到人人网（即上传），建议使用[http://wiki.dev.renren.com/wiki/v2/photo/upload /v2/photo/upload]接口
         * <br />对应API:{$link http://dev.renren.com/API/v2/share/url/put }
         * @param String $comment 分享时用户的评论，评论字数不能超过500个字符
         * @param String $url 分享资源的URL
         * @return Share 分享
         */
         function putShareUrl($comment, $url) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($comment)) {
	             $params ['comment'] = $comment;
	     }
	     if (isset($url)) {
	             $params ['url'] = $url;
	     }
             return $this->client->execute('/v2/share/url/put', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取视频、链接等源地址分享数及浏览数
         * <br />对应API:{$link http://dev.renren.com/API/v2/share/url/count/get }
         * @param String $url 分享资源(视频、链接等)源地址
         * @return ShareViewCount 封装分享数及浏览数结果，值为-1表示获取不到对应数据
         */
         function getShareUrlCount($url) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($url)) {
	             $params ['url'] = $url;
	     }
             return $this->client->execute('/v2/share/url/count/get', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
