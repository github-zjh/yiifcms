<?php
include_once ('RennServiceBase.php');
class PlaceService extends RennServiceBase {
        /**
         * 通过地点获取新鲜事。
         * <br />对应API:{$link http://dev.renren.com/API/v2/place/feed/list }
         * @param String $placeId 地点ID。
         * @param Integer $pageSize 页面大小。取值范围1-100，默认大小20
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @param LocationFeedType $locationFeedType 新鲜事类型。
         * @return LocationFeed 地点新鲜事
         */
         function listPlaceFeed($placeId, $pageSize, $pageNumber, $locationFeedType) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($placeId)) {
	             $params ['placeId'] = $placeId;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
	     if (isset($locationFeedType)) {
	             $params ['locationFeedType'] = $locationFeedType;
	     }
             return $this->client->execute('/v2/place/feed/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取自己和好友的带lbs信息的feed列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/place/friend/feed/list }
         * @param Integer $pageNo 页码
         * @param Integer $pageSize 页大小
         * @return LocationFeed 地点新鲜事
         */
         function listPlaceFriendFeed($pageNo, $pageSize) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($pageNo)) {
	             $params ['pageNo'] = $pageNo;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
             return $this->client->execute('/v2/place/friend/feed/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 创建地点
         * <br />对应API:{$link http://dev.renren.com/API/v2/place/put }
         * @param String $address 地址
         * @param String $name 地点名称
         * @param Double $longitude 经度
         * @param Double $latitude 纬度
         * @return SavePoiResponse 签到结果
         */
         function putPlace($address, $name, $longitude, $latitude) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($address)) {
	             $params ['address'] = $address;
	     }
	     if (isset($name)) {
	             $params ['name'] = $name;
	     }
	     if (isset($longitude)) {
	             $params ['longitude'] = $longitude;
	     }
	     if (isset($latitude)) {
	             $params ['latitude'] = $latitude;
	     }
             return $this->client->execute('/v2/place/put', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 根据经纬度获取地点列表。
         * <br />对应API:{$link http://dev.renren.com/API/v2/place/list }
         * @param Integer $pageSize 页面大小。取值范围1-100，默认大小20
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @param String $placeName 地点名称。
         * @param Integer $radius 半径,500-2000米。
         * @param Double $longitude 经度。
         * @param Boolean $deflection 是否偏转。
         * @param Double $latitude 纬度。
         * @return Place 地点信息
         */
         function listPlace($pageSize, $pageNumber, $placeName, $radius, $longitude, $deflection, $latitude) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
	     if (isset($placeName)) {
	             $params ['placeName'] = $placeName;
	     }
	     if (isset($radius)) {
	             $params ['radius'] = $radius;
	     }
	     if (isset($longitude)) {
	             $params ['longitude'] = $longitude;
	     }
	     if (isset($deflection)) {
	             $params ['deflection'] = $deflection;
	     }
	     if (isset($latitude)) {
	             $params ['latitude'] = $latitude;
	     }
             return $this->client->execute('/v2/place/list', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
