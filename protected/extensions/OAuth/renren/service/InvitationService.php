<?php
include_once ('RennServiceBase.php');
class InvitationService extends RennServiceBase {
        /**
         * 发送邀请
         * <br />对应API:{$link http://dev.renren.com/API/v2/invitation/put }
         * @param InvitationType $invitationType 邀请类别，默认为应用邀请
         * @param Long $userId 被邀请用户id
         * @param String $img 图片链接
         * @param String $gitName 礼物名称,InvitationType为GIFT时有效，不能超过6个字符
         * @param String $url 应用的链接地址
         * @return Invitation 邀请信息
         */
         function putInvitation($invitationType, $userId, $img, $gitName, $url) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($invitationType)) {
	             $params ['invitationType'] = $invitationType;
	     }
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
	     if (isset($img)) {
	             $params ['img'] = $img;
	     }
	     if (isset($gitName)) {
	             $params ['gitName'] = $gitName;
	     }
	     if (isset($url)) {
	             $params ['url'] = $url;
	     }
             return $this->client->execute('/v2/invitation/put', 'POST', $params, $bodyParams, $fileParams);
         } 
}
?>
