<?php
include_once ('RennServiceBase.php');
class AppService extends RennServiceBase {
        /**
         * 获取某个应用的信息，部分信息取自缓存，不能立即生效
         * <br />对应API:{$link http://dev.renren.com/API/v2/app/get }
         * @return App App
         */
         function getApp() {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
             return $this->client->execute('/v2/app/get', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
