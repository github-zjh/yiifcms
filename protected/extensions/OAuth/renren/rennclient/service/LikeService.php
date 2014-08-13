<?php
include_once ('RennServiceBase.php');
class LikeService extends RennServiceBase {
        /**
         * 取消对站内资源的赞。
         * <br />对应API:{$link http://dev.renren.com/API/v2/like/ugc/remove }
         * @param Long $ugcOwnerId UGC所有者的用户ID
         * @param LikeUGCType $likeUGCType 
         * @param Long $ugcId UGC的ID
         * @return Integer 取消成功返回1
         */
         function removeLikeUgc($ugcOwnerId, $likeUGCType, $ugcId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($ugcOwnerId)) {
	             $params ['ugcOwnerId'] = $ugcOwnerId;
	     }
	     if (isset($likeUGCType)) {
	             $params ['likeUGCType'] = $likeUGCType;
	     }
	     if (isset($ugcId)) {
	             $params ['ugcId'] = $ugcId;
	     }
             return $this->client->execute('/v2/like/ugc/remove', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 赞人人内部资源，相册、照片、日志、分享、视频等。
         * <br />对应API:{$link http://dev.renren.com/API/v2/like/ugc/put }
         * @param Long $ugcOwnerId UGC所有者的用户ID
         * @param LikeUGCType $likeUGCType 
         * @param Long $ugcId UGC的ID
         * @return Integer 赞成功返回1
         */
         function putLikeUgc($ugcOwnerId, $likeUGCType, $ugcId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($ugcOwnerId)) {
	             $params ['ugcOwnerId'] = $ugcOwnerId;
	     }
	     if (isset($likeUGCType)) {
	             $params ['likeUGCType'] = $likeUGCType;
	     }
	     if (isset($ugcId)) {
	             $params ['ugcId'] = $ugcId;
	     }
             return $this->client->execute('/v2/like/ugc/put', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取站内资源被赞的次数。
         * <br />对应API:{$link http://dev.renren.com/API/v2/like/ugc/info/get }
         * @param Integer $limit 最多返回喜欢此资源的用户数，最大为50，默认值为10。
         * @param Boolean $withLikeUsers 是否包含喜欢此资源的用户
         * @param LikeUGCType $likeUGCType 可以赞的UGC类型。
         * @param Long $ugcId UGC的ID
         * @return LikeInfo 获取资源被喜欢的信息，包括喜欢数、当前用户是否喜欢
         */
         function getLikeUgcInfo($limit, $withLikeUsers, $likeUGCType, $ugcId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($limit)) {
	             $params ['limit'] = $limit;
	     }
	     if (isset($withLikeUsers)) {
	             $params ['withLikeUsers'] = $withLikeUsers;
	     }
	     if (isset($likeUGCType)) {
	             $params ['likeUGCType'] = $likeUGCType;
	     }
	     if (isset($ugcId)) {
	             $params ['ugcId'] = $ugcId;
	     }
             return $this->client->execute('/v2/like/ugc/info/get', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
