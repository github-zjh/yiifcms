<?php
session_start ();

include_once ('config.php');
include_once ('../rennclient/RennClient.php');
// include_once ('renrenoauth/oauth2-client.class.php');
// include_once ('renrenoauth/renn-client.class.php');

$rennClient = new RennClient ( APP_KEY, APP_SECRET );
$rennClient->setDebug ( DEBUG_MODE );

// 生成state并存入SESSION，以供CALLBACK时验证使用
$state = uniqid ( 'renren_', true );
$_SESSION ['renren_state'] = $state;

// 得认证授权的url
$code_url = $rennClient->getAuthorizeURL ( CALLBACK_URL, 'code', $state );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>人人 PHP SDK Demo</title>
</head>

<body>
	<!-- 打开认证授权的页面 -->
	<p>
		<a href="<?=$code_url?>"><img
			src="http://s.xnimg.cn/imgpro/v6/logo.png?f=home" title="点击进入授权页面"
			alt="点击进入授权页面" border="0" /></a>
	</p>
	<hr />
</body>
</html>
