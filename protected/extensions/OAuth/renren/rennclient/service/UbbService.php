<?php
include_once ('RennServiceBase.php');
class UbbService extends RennServiceBase {
        /**
         * 获取人人网ubb列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/ubb/list }
         * @return Ubb UBB表情
         */
         function listUbb() {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
             return $this->client->execute('/v2/ubb/list', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
