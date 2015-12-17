<?php

if (!function_exists('curl_init')) {
	throw new Exception('Renn PHP SDK needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
	throw new Exception('Renn PHP SDK needs the JSON PHP extension.');
}

class RennClientBase {
	/**
	 * token终端
	 */
	const TOKEN_ENDPOINT = 'http://graph.renren.com/oauth/token';
	/**
	 * 授权终端
	 */
	const AUTHORIZATION_ENDPOINT = 'http://graph.renren.com/oauth/authorize';
	/**
	 * API host
	 */
	const API_HOST = 'api.renren.com';
	/**
	 * Set the useragnet.
	 */
	const USERAGENT = 'Renn API2.0 SDK PHP v0.1';
	/**
	 * Set timeout default.
	 */
	const TIMEOUT = 60;
	/**
	 * Set connect timeout.
	 */
	const CONNECTTIMEOUT = 30;
	
	/**
	 * Default options for curl.
	 */
	public static $CURL_OPTS = array (
			CURLOPT_CONNECTTIMEOUT => self::CONNECTTIMEOUT,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => self::TIMEOUT,
			CURLOPT_USERAGENT => self::USERAGENT 
	);
	/**
	 * 应用id
	 */
	protected $clientId;
	/**
	 * 应用密钥
	 */
	protected $clientSecret;
	/**
	 * token
	 */
	protected $accessToken;
	/**
	 * 签名方法的工厂
	 */
	protected $signatureMethodFactory;
	/**
	 * token存储
	 */
	protected $tokenStore;
	
	/**
	 * print the debug info
	 */
	public $debug = FALSE;
	
	/**
	 * 构造函数
	 */
	function __construct($clientId, $clientSecret) {
		$this->clientId = $clientId;
		$this->clientSecret = $clientSecret;
		$this->signatureMethodFactory = new OAuth2SignatureMethodFactory ();
		$this->tokenStore = new CookieTokenStore ();
	}
	
	/**
	 * 用code来授权：通过code来获得token
	 *
	 * @param string $code        	
	 */
	public function authWithAuthorizationCode($code, $redirectUri) {
		$keys = array ();
		$keys ['code'] = $code;
		$keys ['redirect_uri'] = $redirectUri;
		try {
			// 根据code来获得token
			$token = $this->getTokenFromTokenEndpoint ( 'code', $keys );
			return $token;
		} catch ( RennException $e ) {
			throw new InvalideAuthorizationException ( "Authorization failed with Authorization Code. " . $e->getMessage () );
		}
	}
	
	/**
	 * 用已有的token来授权
	 *
	 * @param string $token        	
	 */
	public function authWithToken($token) {
		$this->accessToken = $token;
	}
	
	/**
	 * Client Credentials来授权
	 */
	public function authWithClientCredentials() {
		$keys = array ();
		$keys ['client_id'] = $this->clientId;
		$keys ['client_secret'] = $this->clientSecret;
		try {
			$token = $this->getTokenFromTokenEndpoint ( 'client_credentials', $keys );
		} catch ( RennException $e ) {
			throw new InvalideAuthorizationException ( "Authorization failed with Client Credentials. " . $e->getMessage () );
		}
	}
	
	/**
	 * 用已用户的用户名和密码授权
	 */
	public function authWithResourceOwnerPassword($username, $password) {
		$keys = array ();
		$keys ['username'] = $username;
		$keys ['password'] = $password;
		try {
			$token = $this->getTokenFromTokenEndpoint ( 'password', $keys );
		} catch ( RennException $e ) {
			throw new InvalideAuthorizationException ( "Authorization failed with Resource Owner Password. " . $e->getMessage () );
		}
	}
	
	/**
	 * 用存储的token来授权
	 */
	public function authWithStoredToken() {
		$token = $this->getTokenFromTokenStore ();
		if (! isset ( $token )) {
			throw new InvalideAuthorizationException ( "Authorization failed with Stored Token. token: null" );
		}
	}
	
	/**
	 * ********************************** 获得token ****************************************
	 */
	/**
	 * authorize接口
	 *
	 * @param string $redirectUri
	 *        	授权后的回调地址,站外应用需与回调地址一致,站内应用需要填写canvas page的地址
	 * @param string $responseType
	 *        	支持的值包括 code 和token 默认值为code
	 * @param string $state
	 *        	用于保持请求和回调的状态。在回调时,会在Query Parameter中回传该参数
	 * @param string $display
	 *        	授权页面类型 可选范围:
	 * @param bool $forcelogin
	 *        	是否强制用户重新登录，true：是，false：否。默认false。
	 * @param string $language
	 *        	授权页语言，缺省为中文简体版，en为英文版。
	 * @return array
	 */
	public function getAuthorizeURL($redirectUri, $responseType = 'code', $state = null, $display = null, $forcelogin = null) {
		$params = array ();
		$params ['client_id'] = $this->clientId;
		$params ['redirect_uri'] = $redirectUri;
		$params ['response_type'] = $responseType;
		$params ['state'] = $state;
		$params ['display'] = $display;
		$params ['x_renew'] = $forcelogin;
		return self::AUTHORIZATION_ENDPOINT . "?" . http_build_query ( $params );
	}
	
	/**
	 * 从token endpoint获得token
	 *
	 * @param string $grantType
	 *        	请求的类型,可以为:code, password, token
	 * @param array $keys
	 *        	其他参数：
	 *        	- 当$grant_type为code时： array('code'=>..., 'redirect_uri'=>...)
	 *        	- 当$grant_type为password时： array('username'=>..., 'password'=>...)
	 *        	- 当$grant_type为token时： array('refresh_token'=>...)
	 * @param
	 *        	string token_type token的类型,可以为:bearer,mac
	 * @return array
	 */
	private function getTokenFromTokenEndpoint($grantType, $keys, $tokenType = TokenType::MAC) {
		$params = array ();
		$params ['client_id'] = $this->clientId;
		$params ['client_secret'] = $this->clientSecret;
		$params ['token_type'] = $tokenType;
		if ($grantType === 'token') {
			$params ['grant_type'] = 'refresh_token';
			$params ['refresh_token'] = $keys ['refresh_token'];
		} elseif ($grantType === 'code') {
			$params ['grant_type'] = 'authorization_code';
			$params ['code'] = $keys ['code'];
			$params ['redirect_uri'] = $keys ['redirect_uri'];
		} elseif ($grantType === 'client_credentials') {
			$params ['grant_type'] = 'client_credentials';
		} elseif ($grantType === 'password') {
			$params ['grant_type'] = 'password';
			$params ['username'] = $keys ['username'];
			$params ['password'] = $keys ['password'];
		} else {
			throw new ClientException ( "wrong auth type" );
		}
		
		// 获得token
		$response = $this->http ( self::TOKEN_ENDPOINT, 'POST', http_build_query ( $params, null, '&' ) );
		$token = json_decode ( $response, true );
		$tokenObj = null;
		if (is_array ( $token ) && ! isset ( $token ['error'] )) {
			
			$tokenType = null;
			$accessToken = $token ['access_token'];
			$refreshToken = null;
			$macAlgorithm = null;
			$macKey = null;
			
			if (isset ( $token ['refresh_token'] )) {
				$refreshToken = $token ['refresh_token'];
			}
			// TODO use token type
			if (isset ( $token ['mac_algorithm'] ) && isset ( $token ['mac_key'] )) { // mac token
				$tokenType = TokenType::MAC;
				$macAlgorithm = $token ['mac_algorithm'];
				$macKey = $token ['mac_key'];
			} else { // bearer token
				$tokenType = TokenType::Bearer;
			}
			
			$tokenObj = new AccessToken ( $tokenType, $accessToken, $refreshToken, $macKey, $macAlgorithm );
			$this->accessToken = $tokenObj;
		} else {
			throw new ClientException ( "Get access token failed. " . $token ['error'] . ": " . $token ['error_description'] );
		}
		
		// 存储token
		$this->tokenStore->saveToken ( 'renren_' . $this->clientId, $tokenObj );
		
		return $tokenObj;
	}
	
	/**
	 * 从token存储中获得token
	 */
	private function getTokenFromTokenStore() {
		$token = $this->tokenStore->loadToken ( 'renren_' . $this->clientId );
		$this->accessToken = $token;
		return $token;
	}
	public function execute($path, $httpMethod, $queryParams, $bodyParams = null, $fileParams = null) {
		$schema = "http";
		// 组装URL
		if ($this->accessToken->type == TokenType::Bearer) {
			$schema = "https";
		}
		
		// path & query
		$url = $schema . "://" . self::API_HOST . $path;
		$pathAndQuery = $path;
		if (! empty ( $queryParams )) { // 注意：在get请求的url中，有参数有'?'，无参数无'?'
			$query = http_build_query ( $queryParams );
			if (!empty ($query)) {
				$url = $url . '?' . $query;
				$pathAndQuery = $path . '?' . $query;
			}
		}
		
		// headers
		$headers = array ();
		
		// authorization header
		if ($this->accessToken) {
			$headers [] = $this->getAuthorizationHeader ( $schema, $pathAndQuery, $httpMethod );
		}
		
		// body
		if (! empty ( $fileParams )) {
			// body里的参数和文件参数都用multipart方式传输
			$boundary = uniqid ( '------------------' );
			$headers [] = "Content-Type: multipart/form-data; boundary=" . $boundary;
			$body = $this->http_build_multipart_body ( $fileParams, $bodyParams, $boundary );
			$response = $this->http ( $url, $httpMethod, $body, $headers );
		} else {
			$headers [] = 'Content-type: application/x-www-form-urlencoded';
			if (isset ( $bodyParams )) {
				$body = http_build_query ( $bodyParams, null, '&' );
				$length = strlen ( $body );
				$headers [] = 'Content-length: ' . $length;
				$response = $this->http ( $url, $httpMethod, $body, $headers );
			} else {
				$headers [] = 'Content-length: 0';
				$response = $this->http ( $url, $httpMethod, null, $headers );
			}
		}
		
		// // body
		// if (isset ( $fileParams )) {
		// // body里的参数和文件参数都用multipart方式传输
		// $headers [] = "Content-Type: multipart/form-data; boundary=" . self::$boundary;
		// $body = $this->http_build_multipart_body ( $fileParams, $bodyParams );
		// $response = $this->http ( $url, $httpMethod, $body, $headers );
		// } else {
		// if (isset ( $bodyParams )) {
		// $body = http_build_query ( $bodyParams );
		// $response = $this->http ( $url, $httpMethod, $body, $headers );
		// } else {
		// $response = $this->http ( $url, $httpMethod, null, $headers );
		// }
		// }
		
		$result = json_decode ( $response, true );
		if (isset ( $result ['error'] ) && $result ['error']) {
			throw new ServerException ( $result ['error'] ['code'], $result ['error'] ['message'] );
		}
		return $result ['response'];
	}
	private function http_build_multipart_body($fileParams, $textParams, $boundary) {
		$MPboundary = '--' . $boundary;
		$endMPboundary = $MPboundary . '--';
		$multipartbody = '';
		
		foreach ( $fileParams as $fileParamName => $fileUrl ) {
			$content = file_get_contents ( $fileUrl );
			$array = explode ( '?', basename ( $fileUrl ) );
			$filename = $array [0];
			
			$multipartbody .= $MPboundary . "\r\n";
			$multipartbody .= 'Content-Disposition: form-data; name="' . $fileParamName . '"; filename="' . $filename . '"' . "\r\n";
			$multipartbody .= "Content-Type: image/unknown\r\n\r\n";
			$multipartbody .= $content . "\r\n";
		}
		
		foreach ( $textParams as $param => $value ) {
			$multipartbody .= $MPboundary . "\r\n";
			$multipartbody .= 'Content-Disposition: form-data; name="' . $param . "\"\r\n\r\n";
			$multipartbody .= $value . "\r\n";
		}
		
		$multipartbody .= $endMPboundary;
		return $multipartbody;
	}
	// /**
	// * Makes an HTTP request.
	// * This method can be overridden by subclasses if
	// * developers want to do fancier things or use something other than curl to
	// * make the request.
	// *
	// * @param string $url
	// * The URL to make the request to
	// * @param array $postdata
	// * The parameters to use for the POST body
	// * @param CurlHandler $ch
	// * Initialized curl handle
	// *
	// * @return string The response text
	// */
	// protected function http($url, $method, $postdata = null, $header = array()) {
	// $ch = curl_init ();
	// $opts = self::$CURL_OPTS;
	// $opts [CURLOPT_HTTPHEADER] = $header;
	// if ($method === 'POST') {
	// $opts [CURLOPT_POST] = true;
	// $opts [CURLOPT_POSTFIELDS] = $postdata;
	// }
	// $opts [CURLOPT_URL] = $url;
	// curl_setopt_array ( $ch, $opts );
	// $result = curl_exec ( $ch );
	// curl_close ( $ch );
	// return $result;
	// }
	/**
	 * Make an HTTP request
	 *
	 * @return string API results
	 */
	private function http($url, $method, $postfields = null, $headers = array()) {
		$this->httpInfo = array ();
		$ci = curl_init ();
		/* Curl settings */
		curl_setopt ( $ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0 );
		curl_setopt ( $ci, CURLOPT_USERAGENT, self::USERAGENT );
		curl_setopt ( $ci, CURLOPT_CONNECTTIMEOUT, self::CONNECTTIMEOUT );
		curl_setopt ( $ci, CURLOPT_TIMEOUT, self::TIMEOUT );
		curl_setopt ( $ci, CURLOPT_RETURNTRANSFER, TRUE );
		curl_setopt ( $ci, CURLOPT_ENCODING, "" );
		curl_setopt ( $ci, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $ci, CURLOPT_SSL_VERIFYHOST, 2 );
		curl_setopt ( $ci, CURLOPT_HEADER, FALSE );
		
		// 方法
		switch ($method) {
			case 'POST' :
				curl_setopt ( $ci, CURLOPT_POST, TRUE );
				if (! empty ( $postfields )) {
					curl_setopt ( $ci, CURLOPT_POSTFIELDS, $postfields );
					$this->postdata = $postfields;
				}
				break;
			case 'DELETE' :
				curl_setopt ( $ci, CURLOPT_CUSTOMREQUEST, 'DELETE' );
				if (! empty ( $postfields )) {
					$url = "{$url}?{$postfields}";
				}
		}
		
		curl_setopt ( $ci, CURLOPT_URL, $url );
		curl_setopt ( $ci, CURLOPT_HTTPHEADER, $headers );
		curl_setopt ( $ci, CURLINFO_HEADER_OUT, TRUE );
		
		$response = curl_exec ( $ci );
		$this->httpCode = curl_getinfo ( $ci, CURLINFO_HTTP_CODE );
		$this->httpInfo = array_merge ( $this->httpInfo, curl_getinfo ( $ci ) );
		
		if ($this->debug) {
			echo "=====post data======\r\n";
			var_dump ( $postfields );
			
			echo "=====headers======\r\n";
			print_r ( $headers );
			
			echo '=====request info=====' . "\r\n";
			print_r ( curl_getinfo ( $ci ) );
			
			echo '=====response=====' . "\r\n";
			print_r ( $response );
		}
		curl_close ( $ci );
		return $response;
	}
	
	/**
	 * 根据token类型来获得认证头
	 */
	private function getAuthorizationHeader($schema, $pathAndQuery, $method) {
		// bearer token
		if ($this->accessToken->type !== TokenType::MAC) {
			return "Authorization:Bearer " . $this->accessToken->accessToken;
		}
		// mac token
		// 根据签名方法名来获得签名方法
		$signMethod = $this->signatureMethodFactory->getSignatureMethod ( $this->accessToken->macAlgorithm );
		if (empty ( $signMethod )) {
			throw new ClientException ( "wrong mac algorithm" );
		}
		
		// 签名相关参数
		$timestamp = intval ( time () / 1000 ); // 时间戳，以秒为单位，以客户端的时间为准
		$nonce = $this->generateRandomString ( 8 ); // 随机码，随即字符串，由客户端生成
		$ext = ""; // 其他信息，客户端自定义
		$host = self::API_HOST; // 目标服务器的主机 TODO 常量
		$port = $schema == "https" ? 443 : 80;
		
		// 签名的原始字符串
		$signatureBaseString = $timestamp . "\n" . $nonce . "\n" . $method . "\n" . $pathAndQuery . "\n" . $host . "\n" . $port . "\n" . $ext . "\n";
		
		// 签名
		$signature = $signMethod->buildSignature ( $signatureBaseString, $this->accessToken->macKey );
		return sprintf ( "Authorization:MAC id=\"%s\",ts=\"%s\",nonce=\"%s\",mac=\"%s\"", $this->accessToken->accessToken, $timestamp, $nonce, $signature );
	}
	
	/**
	 * 生成随机字符串
	 *
	 * @param integer $length        	
	 */
	private function generateRandomString($length = 8) {
		// 密码字符集，可任意添加你需要的字符
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$random_str = "";
		for($i = 0; $i < $length; $i ++) {
			// 这里提供两种字符获取方式
			// 第一种是使用 substr 截取$chars中的任意一位字符；
			// $random_str .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
			// 第二种是取字符数组 $chars 的任意元素
			$random_str .= $chars [mt_rand ( 0, strlen ( $chars ) - 1 )];
		}
		return $random_str;
	}
	
	/**
	 * 开启调试信息
	 *
	 * 开启调试信息后，SDK会将每次请求微博API所发送的POST Data、Headers以及请求信息、返回内容输出出来。
	 *
	 * @access public
	 * @param bool $enable
	 *        	是否开启调试信息
	 * @return void
	 */
	function setDebug($enable) {
		$this->debug = $enable;
	}
}
/**
 * token类型
 */
class TokenType {
	const Bearer = "Bearer";
	const MAC = "MAC";
}
class AccessToken {
	public $type;
	public $accessToken;
	public $refreshToken;
	public $macKey;
	public $macAlgorithm;
	function __construct($type, $accessToken, $refreshToken, $macKey, $macAlgorithm) {
		$this->type = $type;
		$this->accessToken = $accessToken;
		$this->refreshToken = $refreshToken;
		$this->macKey = $macKey;
		$this->macAlgorithm = $macAlgorithm;
	}
}

/**
 * oauth2异常
 */
class RennException extends Exception {
	// pass
}

/**
 * *************************** 客户端的异常 *************************************
 */
/**
 * 客户端的异常
 */
class ClientException extends RennException {
	// pass
}
class InvalideAuthorizationException extends ClientException {
	// pass
}
class UnauthorizedException extends ClientException {
	// pass
}

/**
 * *************************** 服务端的异常 *************************************
 */
/**
 * 服务端的异常
 */
class ServerException extends RennException {
	protected $errorCode;
	
	/**
	 *
	 * @param unknown $code
	 *        	code和message使用父类的属性
	 * @param unknown $message
	 *        	code和message使用父类的属性
	 * @param string $previous        	
	 */
	function __construct($code, $message, $previous = null) {
		parent::__construct ( $message, null, $previous );
		$this->errorCode = $code;
	}
        function getErrorCode() {
		return $this->errorCode;
        }
}


/**
 * http error code is 400.
 * 请求参数错误，参数使业务逻辑无法正常运行下去。
 */
class InvalidRequestException extends ServerException {
	public function __construct($code, $message, $previous = null) {
		parent::__construct ( $code, $message, $previous );
	}
}

/**
 * http error code is 401.
 * 认证信息错误，token错误，签名错误等。
 */
class InvalidAuthorizationException extends ServerException {
	public function __construct($code, $message, $previous = null) {
		parent::__construct ( $code, $message, $previous );
	}
}

/**
 * http error code is 403 认证通过，但是也不允许其访问。例如超配额
 */
class ForbiddenException extends ServerException {
	public function __construct($code, $message, $previous = null) {
		parent::__construct ( $code, $message, $previous );
	}
}

/**
 * http error code is 500 内部错误
 */
class InternalErrorException extends ServerException {
	public function __construct($code, $message, $previous = null) {
		parent::__construct ( $code, $message, $previous );
	}
}

/**
 * oauth签名方法的工厂
 */
class OAuth2SignatureMethodFactory {
	
	/* 签名方法的数组 */
	private $signature_methods;
	function __construct() {
		$this->signature_methods = array ();
		// 注册HMAC_SHA1签名方法
		$signatureMethod_HMAC_SHA1 = new OAuth2SignatureMethod_HMAC_SHA1 ();
		$this->signature_methods [$signatureMethod_HMAC_SHA1->getName ()] = $signatureMethod_HMAC_SHA1;
	}
	
	/**
	 * 根据方法名来获得签名方法
	 *
	 * @param string $methodName        	
	 * @return OAuth2SignatureMethod
	 */
	function getSignatureMethod($methodName) {
		return $this->signature_methods [$methodName];
	}
}

/**
 * oauth签名方法
 * A class for implementing a Signature Method
 * See section 9 ("Signing Requests") in the spec
 */
abstract class OAuth2SignatureMethod {
	/**
	 * 获得签名方法名
	 * Needs to return the name of the Signature Method (ie HMAC-SHA1)
	 *
	 * @return string
	 */
	abstract public function getName();
	
	/**
	 * 生成 签名
	 * Build up the signature
	 * NOTE: The output of this function MUST NOT be urlencoded.
	 * the encoding is handled in OAuthRequest when the final
	 * request is serialized
	 *
	 * @param string $signatureBaseString        	
	 * @param string $signatureSecret        	
	 * @return string
	 */
	abstract public function buildSignature($signatureBaseString, $signatureSecret);
	
	/**
	 * 检验签名
	 * Verifies that a given signature is correct
	 *
	 * @param string $signatureBaseString        	
	 * @param string $signatureSecret        	
	 * @param string $signature        	
	 * @return bool
	 */
	public function checkSignature($signatureBaseString, $signatureSecret, $signature) {
		$built = $this->buildSignature ( $signatureBaseString, $signatureSecret );
		return $built == $signature;
	}
}

/**
 * 基于HMAC_SHA1算法的签名方法
 * The HMAC-SHA1 signature method uses the HMAC-SHA1 signature algorithm as defined in [RFC2104]
 * where the Signature Base String is the text and the key is the concatenated values (each first
 * encoded per Parameter Encoding) of the Consumer Secret and Token Secret, separated by an '&'
 * character (ASCII code 38) even if empty.
 * - Chapter 9.2 ("HMAC-SHA1")
 */
class OAuth2SignatureMethod_HMAC_SHA1 extends OAuth2SignatureMethod {
	/**
	 * 获得签名方法名
	 *
	 * @see OAuthSignatureMethod::get_name()
	 */
	function getName() {
		return "hmac-sha-1";
	}
	
	/**
	 * 生成 签名
	 *
	 * @see OAuthSignatureMethod::build_signature()
	 */
	public function buildSignature($signatureBaseString, $signatureSecret) {
		return base64_encode ( hash_hmac ( 'sha1', $signatureBaseString, $signatureSecret, true ) );
	}
}

/**
 * token存储
 */
interface TokenStore {
	
	/**
	 * 加载token
	 *
	 * @param string $key        	
	 * @return array 成功返回array('access_token'=>'value', 'refresh_token'=>'value'); 失败返回false
	 */
	public function loadToken($key);
	
	/**
	 * 保存token
	 *
	 * @param string $key        	
	 * @param array $token        	
	 */
	public function saveToken($key, $token);
}

/**
 * 基于cookie的token存储
 */
class CookieTokenStore implements TokenStore {
	/**
	 * 加载token
	 *
	 * @param string $key        	
	 * @return array 成功返回array('access_token'=>'value', 'refresh_token'=>'value'); 失败返回false
	 */
	public function loadToken($key) {
		//if (isset ( $_COOKIE [$key] ) && $cookie = $_COOKIE [$key]) {
		  $cookies = Yii::app()->request->getCookies();
		  $token_cookie = $cookies[$key]->value;
		  if(isset($token_cookie) && $cookie=$token_cookie){
			parse_str ( $cookie, $token );
			return new AccessToken ( $token ['type'], $token ['accessToken'], isset ( $token ['refreshToken'] ) ? $token ['refreshToken'] : null, isset ( $token ['macKey'] ) ? $token ['macKey'] : null, isset ( $token ['macAlgorithm'] ) ? $token ['macAlgorithm'] : null );
		} else {
			return null;
		}
	}
	
	/**
	 * 保存token
	 *
	 * @param string $key        	
	 * @param array $token        	
	 */
	public function saveToken($key, $token) {
		//echo $key;
		$cookie = new CHttpCookie($key, http_build_query($token));
		$cookie->expire = time()+60*60*24*30;  //有限期30天
		Yii::app()->request->cookies[$key]=$cookie;
		//setcookie ( $key, http_build_query ( $token ) );
	}
}
?>
