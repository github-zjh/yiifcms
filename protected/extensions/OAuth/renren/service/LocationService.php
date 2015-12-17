<?php
include_once ('RennServiceBase.php');
class LocationService extends RennServiceBase {
        /**
         * 通过经纬度获取新鲜事。
         * <br />对应API:{$link http://dev.renren.com/API/v2/location/feed/list }
         * @param Integer $pageSize 页面大小。取值范围1-100，默认大小20
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @param LocationFeedType $locationFeedType 新鲜事类型。
         * @param Integer $radius 半径,500-2000米。
         * @param Double $longitude 经度。
         * @param Double $latitude 纬度。
         * @return LocationFeed 地点新鲜事
         */
         function listLocationFeed($pageSize, $pageNumber, $locationFeedType, $radius, $longitude, $latitude) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
	     if (isset($locationFeedType)) {
	             $params ['locationFeedType'] = $locationFeedType;
	     }
	     if (isset($radius)) {
	             $params ['radius'] = $radius;
	     }
	     if (isset($longitude)) {
	             $params ['longitude'] = $longitude;
	     }
	     if (isset($latitude)) {
	             $params ['latitude'] = $latitude;
	     }
             return $this->client->execute('/v2/location/feed/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 根据经纬度定位地点。
         * <br />对应API:{$link http://dev.renren.com/API/v2/location/get }
         * @param Boolean $deflection 是否偏转。
         * @param Double $longitude 经度。
         * @param Double $latitude 纬度。
         * @return Location 定位的地点。
         */
         function getLocation($deflection, $longitude, $latitude) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($deflection)) {
	             $params ['deflection'] = $deflection;
	     }
	     if (isset($longitude)) {
	             $params ['longitude'] = $longitude;
	     }
	     if (isset($latitude)) {
	             $params ['latitude'] = $latitude;
	     }
             return $this->client->execute('/v2/location/get', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
