<?php
session_start ();

include_once ('config.php');
include_once ('../rennclient/RennClient.php');

$renn_client = new RennClient ( APP_KEY, APP_SECRET );
$renn_client->setDebug ( DEBUG_MODE );
// 获得保存的token
$renn_client->authWithStoredToken ();
// 获得用户接口
$user_service = $renn_client->getUserService ();
// 获得指定用户
$user = $user_service->get ( 431695399 );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>人人api2 demo</title>
</head>

<body>
	<!-- 用户头像 -->
	<img src="<?php echo $user['avatar'][1]['url'];?>" title="头像" alt="头像"
		border="0" />
	<br />
	<!-- 用户名 -->
<?php echo $user['name'];?>
</body>
</html>
