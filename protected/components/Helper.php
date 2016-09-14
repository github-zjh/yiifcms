<?php
/**
 * 助手类
 * 
 * @author Sim Zhao <326196998@qq.com>
 * @version v1.0.0
 */
class Helper
{	
	/**
	 * 判断当前服务器系统
	 * @return string
	 */
	public static function getOS(){
		if(PATH_SEPARATOR == ':'){
			return 'Linux';
		}else{
			return 'Windows';
		}
	}
	/**
	 * 当前微妙数
	 * @return number
	 */
	public static function microtime_float() {
		list ( $usec, $sec ) = explode ( " ", microtime () );
		return (( float ) $usec + ( float ) $sec);
	}
	
	/**
	 * 切割utf-8格式的字符串(一个汉字或者字符占一个字节)
	 * 
	 * @author zhao jinhan
	 * @version v1.0.0
	 *         
	 */
	public static function truncate_utf8_string($tstring, $length, $etc = '...') {
		$res = '';
		$string = html_entity_decode ( trim ( strip_tags ( $tstring ) ), ENT_QUOTES, 'UTF-8' );
		$strlen = strlen ( $string );
		for($i = 0; (($i < $strlen) && ($length > 0)); $i ++) {
			if ($number = strpos ( str_pad ( decbin ( ord ( substr ( $string, $i, 1 ) ) ), 8, '0', STR_PAD_LEFT ), '0' )) {
				if ($length < 1.0) {
					break;
				}
				$res .= substr ( $string, $i, $number );
				$length -= 1.0;
				$i += $number - 1;
			} else {
				$res .= substr ( $string, $i, 1 );
				$length -= 0.5;
			}
		}
		$result = htmlspecialchars ( $res, ENT_QUOTES, 'UTF-8' );
		if ($i < $strlen) {
			$result .= $etc;
		}
		return $result;
	}
	
	/**
	 * 遍历文件夹
	 * @param string $dir
	 * @param boolean $all  true表示递归遍历
	 * @return array
	 */
	public static function scanfDir($dir='', $all = false, &$ret = array()){	
		if ( false !== ($handle = opendir ( $dir ))) {
			while ( false !== ($file = readdir ( $handle )) ) {
				if (!in_array($file, array('.', '..', '.git', '.gitignore', '.svn', '.buildpath', '.project', '.settings', 'nbproject'))) {
					$cur_path = $dir . '/' . $file;
					if (is_dir ( $cur_path )) {
						$ret['dirs'][] =$cur_path;
						$all && self::scanfDir( $cur_path, $all, $ret);
					} else {						
						$ret ['files'] [] = $cur_path;
					}
				}				
			}
			closedir ( $handle );
		}
		return $ret;		
	}
	/**
	 * 邮件发送
	 * @param number $id  用户id
	 * @param string $toemail
	 * @param string $subject
	 * @param string $message
	 * @return boolean
	 */
	public static function sendMail($id = 0, $toemail = '', $subject = '', $message = '') {		
		$mailer = Yii::createComponent ( 'application.extensions.mailer.EMailer' );
		
		//查询邮件配置
		$settings = Setting::model()->findAll();
		foreach ($settings as $key => $row) {
			$setting[$row['variable']] = $row['value'];
		}
		$mailer->SetLanguage('zh_cn');		
		$mailer->Host = $setting['email_host'];
		$mailer->Port = $setting['email_port'];
		$mailer->Timeout = $setting['email_timeout'];
		$mailer->ContentType = 'text/html';
		$mailer->SMTPAuth = true;
		$mailer->Username = $setting['email_username'];
		$mailer->Password = $setting['email_password'];
		$mailer->IsSMTP ();		
		$mailer->From = $mailer->Username; // 发件人邮箱
		$mailer->FromName = $setting['email_fromname']; // 发件人姓名		
		$mailer->AddReplyTo ( $mailer->Username );
		$mailer->CharSet = 'UTF-8';
		
		$log = $id > 0 ? MailLog::model ()->findByPk ( $id ) : null;
		if (! $log) {
			// 添加邮件日志
			$model = new MailLog ();
			$model->accept = $toemail;
			$model->subject = $subject;
			$model->message = $message;
			$model->status = 'waiting';
			$model->save ();
			
			$log = MailLog::model ()->findByPk ( $model->id );
			
			$mailer->AddAddress ( $toemail );
			$mailer->Subject = $subject;
			$mailer->Body = $message;
		} else {
			// 查询要发送的邮件
			if($mailer->times > 3 && $mailer->status='failed'){
				//有3次发送失败，则不再发送
				return false;
			}
			$mailer->AddAddress ( $log->accept );
			$mailer->Subject = $log->subject;
			$mailer->Body = $log->message;
		}
		if ($mailer->Send () === true) {
			$log->times = $log->times + 1;
			$log->sendtime = time ();
			$log->status = 'success';
			$log->save ();			
			return true;
		} else {
			$error = $mailer->ErrorInfo;
			$log->times = $log->times + 1;
			$log->sendtime = time ();
			$log->status = 'failed';
			$log->error = $error;
			$log->save ();
			return false;
		} 
	}
	/**
	 * 判断字符串是utf-8 还是gb2312
	 * @param unknown $str
	 * @param string $default
	 * @return string
	 */
	public static function utf8_gb2312($str, $default = 'gb2312')
	{
	    $str = preg_replace("/[\x01-\x7F]+/", "", $str);
	    if (empty($str)) return $default;
	    
	    $preg =  array(
	        "gb2312" => "/^([\xA1-\xF7][\xA0-\xFE])+$/", //正则判断是否是gb2312
	        "utf-8" => "/^[\x{4E00}-\x{9FA5}]+$/u",      //正则判断是否是汉字(utf8编码的条件了)，这个范围实际上已经包含了繁体中文字了
	    );
	
	    if ($default == 'gb2312') {
	        $option = 'utf-8';
	    } else {
	        $option = 'gb2312';
	    }
	
	    if (!preg_match($preg[$default], $str)) {
	        return $option;
	    }
	    $str = @iconv($default, $option, $str);
	    
	    //不能转成 $option, 说明原来的不是 $default
	    if (empty($str)) {
	        return $option;
	    }
	    return $default;
	}
	/**
	 * utf-8和gb2312自动转化
	 * @param unknown $string
	 * @param string $outEncoding
	 * @return unknown|string
	 */
	public static function safeEncoding($string,$outEncoding = 'UTF-8')
	{
		$encoding = "UTF-8";
		for($i = 0; $i < strlen ( $string ); $i ++) {
			if (ord ( $string {$i} ) < 128)
				continue;
	
			if ((ord ( $string {$i} ) & 224) == 224) {
				// 第一个字节判断通过
				$char = $string {++ $i};
				if ((ord ( $char ) & 128) == 128) {
					// 第二个字节判断通过
					$char = $string {++ $i};
					if ((ord ( $char ) & 128) == 128) {
						$encoding = "UTF-8";
						break;
					}
				}
			}
			if ((ord ( $string {$i} ) & 192) == 192) {
				// 第一个字节判断通过
				$char = $string {++ $i};
				if ((ord ( $char ) & 128) == 128) {
					// 第二个字节判断通过
					$encoding = "GB2312";
					break;
				}
			}
		}
	
		if (strtoupper ( $encoding ) == strtoupper ( $outEncoding )) {
			return $string;
        } else {
            return mb_convert_encoding($string, $outEncoding, $encoding);
			//return @iconv ( $encoding, $outEncoding, $string );
        }
	}
	/**
	 * 返回二维数组中某个键名的所有值
	 * @param input $array
	 * @param string $key
	 * @return array
	 */
	public static function array_key_values($array =array(), $key='')
	{
		$ret = array();
		foreach((array)$array as $k=>$v){
			$ret[$k] = $v[$key];
		}
		return $ret;
	}
	
	
	/**
	 * 判断 文件/目录 是否可写（取代系统自带的 is_writeable 函数）
	 *
	 * @param string $file 文件/目录
	 * @return boolean
	 */
	public static function is_writeable($file) {
		if (is_dir($file)){
			$dir = $file;
			if ($fp = @fopen("$dir/test.txt", 'w')) {
				@fclose($fp);
				@unlink("$dir/test.txt");
				$writeable = 1;
			} else {
				$writeable = 0;
			}
		} else {
			if ($fp = @fopen($file, 'a+')) {
				@fclose($fp);
				$writeable = 1;
			} else {
				$writeable = 0;
			}
		}
	
		return $writeable;
	}
	/**
     * 格式化单位
     * 
     * @param int $size
     * @param int $dec
     * @return numberic
     */
	public static function byteFormat( $size, $dec = 2 ) {
		$a = array ( "B" , "KB" , "MB" , "GB" , "TB" , "PB" );
		$pos = 0;
		while ( $size >= 1024 ) {
			$size /= 1024;
			$pos ++;
		}
		return round( $size, $dec ) . " " . $a[$pos];
	}
	
	/**
	 * 下拉框，单选按钮 自动选择
	 *
	 * @param $string 输入字符
	 * @param $param  条件
	 * @param $type   类型
	 * selected checked
	 * @return string
	 */
	static public function selected( $string, $param = 1, $type = 'select' ) {
        
		if ( is_array( $param ) ) {
			$true = in_array( $string, $param );
		}else if ( strval($string) === strval($param) ) {
			$true = true;
		} else {
            $true = false;
        }
        $return = '';
		if ( $true ) {
            $return = $type == 'select' ? 'selected="selected"' : 'checked="checked"';        
        }	
		echo $return;
	}
	
	/**
	 * 下载远程图片
	 * @param string $url 图片的绝对url
	 * @param string $filepath 文件的完整路径（例如/www/images/test） ，此函数会自动根据图片url和http头信息确定图片的后缀名
	 * @param string $filename 要保存的文件名(不含扩展名)
	 * @return mixed 下载成功返回一个描述图片信息的数组，下载失败则返回false
	 */
	static public function downloadImage($url, $filepath, $filename) {
		//服务器返回的头信息
		$responseHeaders = array();
		//原始图片名
		$originalfilename = '';
		//图片的后缀名
		$ext = '';
		$ch = curl_init($url);
		//设置curl_exec返回的值包含Http头
		curl_setopt($ch, CURLOPT_HEADER, 1);
		//设置curl_exec返回的值包含Http内容
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//设置抓取跳转（http 301，302）后的页面
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		//设置最多的HTTP重定向的数量
		curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
	
		//服务器返回的数据（包括http头信息和内容）
		$html = curl_exec($ch);
		//获取此次抓取的相关信息
		$httpinfo = curl_getinfo($ch);
		curl_close($ch);
		if ($html !== false) {
			//分离response的header和body，由于服务器可能使用了302跳转，所以此处需要将字符串分离为 2+跳转次数 个子串
			$httpArr = explode("\r\n\r\n", $html, 2 + $httpinfo['redirect_count']);
			//倒数第二段是服务器最后一次response的http头
			$header = $httpArr[count($httpArr) - 2];
			//倒数第一段是服务器最后一次response的内容
			$body = $httpArr[count($httpArr) - 1];
			$header.="\r\n";
	
			//获取最后一次response的header信息
			preg_match_all('/([a-z0-9-_]+):\s*([^\r\n]+)\r\n/i', $header, $matches);
			if (!empty($matches) && count($matches) == 3 && !empty($matches[1]) && !empty($matches[1])) {
				for ($i = 0; $i < count($matches[1]); $i++) {
					if (array_key_exists($i, $matches[2])) {
						$responseHeaders[$matches[1][$i]] = $matches[2][$i];
					}
				}
			}
			//获取图片后缀名
			if (0 < preg_match('{(?:[^\/\\\\]+)\.(jpg|jpeg|gif|png|bmp)$}i', $url, $matches)) {
				$originalfilename = $matches[0];
				$ext = $matches[1];
			} else {
				if (array_key_exists('Content-Type', $responseHeaders)) {
					if (0 < preg_match('{image/(\w+)}i', $responseHeaders['Content-Type'], $extmatches)) {
						$ext = $extmatches[1];
					}
				}
			}
			//保存文件
			if (!empty($ext)) {
				//如果目录不存在，则先要创建目录
				if(!is_dir($filepath)){
					mkdir($filepath, 0777, true);
				}
					
				$filepath .= '/'.$filename.".$ext";
				$local_file = fopen($filepath, 'w');
				if (false !== $local_file) {
					if (false !== fwrite($local_file, $body)) {
						fclose($local_file);
						$sizeinfo = getimagesize($filepath);
						return array('filepath' => realpath($filepath), 'width' => $sizeinfo[0], 'height' => $sizeinfo[1], 'orginalfilename' => $originalfilename, 'filename' => pathinfo($filepath, PATHINFO_BASENAME));
					}
				}
			}
		}
		return false;
	}
	
	
	/**
	 * 查找ip是否在某个段位里面
	 * @param string $ip 要查询的ip
	 * @param $arrIP     禁止的ip
	 * @return boolean
	 */
	public static function ipAccess($ip='0.0.0.0', $arrIP = array()){
		$access = true;		
		$ip && $arr_cur_ip = explode('.', $ip);		
		foreach((array)$arrIP as $key=> $value){
			if($value == '*.*.*.*'){
				$access = false; //禁止所有
				break;
			}
			$tmp_arr = explode('.', $value);
			if(($arr_cur_ip[0] == $tmp_arr[0]) && ($arr_cur_ip[1] == $tmp_arr[1])) {
				//前两段相同
				if(($arr_cur_ip[2] == $tmp_arr[2]) || ($tmp_arr[2] == '*')){
					//第三段为* 或者相同
					if(($arr_cur_ip[3] == $tmp_arr[3]) || ($tmp_arr[3] == '*')){
						//第四段为* 或者相同
						$access = false; //在禁止ip列，则禁止访问
						break;
					}
				}
			}
		}
		return $access;	
	}
	
	/**
	 * @param string $string 原文或者密文
	 * @param string $operation 操作(ENCODE | DECODE), 默认为 DECODE
	 * @param string $key 密钥
	 * @param int $expiry 密文有效期, 加密时候有效， 单位 秒，0 为永久有效
	 * @return string 处理后的 原文或者 经过 base64_encode 处理后的密文
	 *
	 * @example
	 *
	 * $a = authcode('abc', 'ENCODE', 'key');
	 * $b = authcode($a, 'DECODE', 'key');  // $b(abc)
	 *
	 * $a = authcode('abc', 'ENCODE', 'key', 3600);
	 * $b = authcode('abc', 'DECODE', 'key'); // 在一个小时内，$b(abc)，否则 $b 为空
	 */
	public static function authcode($string, $operation = 'DECODE', $key = '', $expiry = 3600) {
	
		$ckey_length = 4;
		// 随机密钥长度 取值 0-32;
		// 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。
		// 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方
		// 当此值为 0 时，则不产生随机密钥
	
	
		$key = md5 ( $key ? $key : 'key' ); //这里可以填写默认key值
		$keya = md5 ( substr ( $key, 0, 16 ) );
		$keyb = md5 ( substr ( $key, 16, 16 ) );
		$keyc = $ckey_length ? ($operation == 'DECODE' ? substr ( $string, 0, $ckey_length ) : substr ( md5 ( microtime () ), - $ckey_length )) : '';
	
		$cryptkey = $keya . md5 ( $keya . $keyc );
		$key_length = strlen ( $cryptkey );
	
		$string = $operation == 'DECODE' ? base64_decode ( substr ( $string, $ckey_length ) ) : sprintf ( '%010d', $expiry ? $expiry + time () : 0 ) . substr ( md5 ( $string . $keyb ), 0, 16 ) . $string;
		$string_length = strlen ( $string );
	
		$result = '';
		$box = range ( 0, 255 );
	
		$rndkey = array ();
		for($i = 0; $i <= 255; $i ++) {
			$rndkey [$i] = ord ( $cryptkey [$i % $key_length] );
		}
	
		for($j = $i = 0; $i < 256; $i ++) {
			$j = ($j + $box [$i] + $rndkey [$i]) % 256;
			$tmp = $box [$i];
			$box [$i] = $box [$j];
			$box [$j] = $tmp;
		}
	
		for($a = $j = $i = 0; $i < $string_length; $i ++) {
			$a = ($a + 1) % 256;
			$j = ($j + $box [$a]) % 256;
			$tmp = $box [$a];
			$box [$a] = $box [$j];
			$box [$j] = $tmp;
			$result .= chr ( ord ( $string [$i] ) ^ ($box [($box [$a] + $box [$j]) % 256]) );
		}
	
		if ($operation == 'DECODE') {
			if ((substr ( $result, 0, 10 ) == 0 || substr ( $result, 0, 10 ) - time () > 0) && substr ( $result, 10, 16 ) == substr ( md5 ( substr ( $result, 26 ) . $keyb ), 0, 16 )) {
				return substr ( $result, 26 );
			} else {
				return '';
			}
		} else {
			return $keyc . str_replace ( '=', '', base64_encode ( $result ) );
		}
	
	}
	/**
     * 浏览器友好的变量输出
     * @param mixed $var 变量
     * @param boolean $echo 是否输出 默认为True 如果为false 则返回输出字符串
     * @param string $label 标签 默认为空
     * @param boolean $strict 是否严谨 默认为true
     * @return void|string
     */
    public static function dump($var, $echo = true, $label = null, $strict = true)
    {
        if ($label === null) {
            $label = '';
        } else {
            $label = rtrim($label) . ' ';
        }
        if (!$strict) {
            if (ini_get('html_errors')) {
                $output = '<pre>' . $label . htmlspecialchars(print_r($var, true), ENT_QUOTES) . '</pre>';
            } else {
                $output = $label . print_r($var, true);
            }
        } else {
            ob_start();
            var_dump($var);
            $output = ob_get_clean();
            if (!extension_loaded('xdebug')) {
                $output = '<pre>' . $label . htmlspecialchars(preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output), ENT_QUOTES) . '</pre>';
            }
        }
        if ($echo) {
            echo $label, $output;
            return null;
        } else {
            return $output;
        }
    }
    /**
     * 递归删除目录
     * 
     * @param string $dir
     */
    public static function rrmdir($dir = '') {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . DS . $object) == "dir") {
                        rrmdir($dir . DS . $object);
                    } else {
                        unlink($dir . DS . $object);
                    }
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }
    
    /**
	 * 取得上传文件的后缀
	 * @access private
	 * @param string $realname 文件名
	 * @return boolean
	 */
	public static function getExtensionName($realname = '') {		
		$pathinfo = pathinfo($realname);
        return strtolower($pathinfo['extension']);		
	}
	
    /**
     * 转换中文文件名
     * 
     * @param string $name
     * @return string
     */
    public static function convertChineseName($name = '') 
    {
        return Helper::getOS() == 'Windows' ? self::safeEncoding($name, 'GB2312') : $name;
    }
    
    /**
     * 取得文件/图片带域名的完整路径
     * 
     * @param string $file_path
     * @return string
     */
    public static function getFullUrl($file_path = '')
    {
        if(strpos($file_path, 'http://') !== false) {
            return $file_path;
        }
        $host = Yii::app()->request->hostInfo.Yii::app()->request->baseUrl;
        return "$host/".ltrim($file_path,'/');
    }
    
    /**
     * 验证邮箱是否合法
     * 
     * @param string $email
     * @return boolean
     */
    public static function validateEmail($email = '')
    {
        $reg = '/^[a-zA-Z0-9_]+@(qq|126|163|sina|hotmail|yahoo|gmail|sohu|live)(\.com|\.com\.cn)$/';
        return preg_match($reg, trim($email));
    }
    
    /**
	 * 引用字符串
	 * @param  $string
	 * @return string or array
	 */
	public static function mixaddslashes($string) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = self::addslashes($val);
			}
		} else {
			$string = addslashes($string);
		}
		return $string;
	}

    /**
     * 过滤字符防止xss攻击
     *
     * @param string $val
     * @return mixed|string
     */
	public static function removeXss($val = '')
    {
        // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
        // this prevents some character re-spacing such as <java\0script>
        // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
        $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);
        // straight replacements, the user should never need these since they're normal characters
        // this prevents like <IMG SRC=@avascript:alert('XSS')>
        $search = 'abcdefghijklmnopqrstuvwxyz';
        $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $search .= '1234567890!@#$%^&*()';
        $search .= '~`";:?+/={}[]-_|\'\\';
        for ($i = 0; $i < strlen($search); $i++) {
            // ;? matches the ;, which is optional
            // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

            // @ @ search for the hex values
            $val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val); // with a ;
            // @ @ 0{0,7} matches '0' zero to seven times
            $val = preg_replace('/(�{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val); // with a ;
        }

        // now the only remaining whitespace attacks are \t, \n, and \r
        $ra1 = array(
            'javascript',
            'vbscript',
            'expression',
            'applet',
            'meta',
            'xml',
            'blink',
            'link',
            'style',
            'script',
            'embed',
            'object',
            'iframe',
            'frame',
            'frameset',
            'ilayer',
            'layer',
            'bgsound',
            'title',
            'base'
        );
        $ra2 = array(
            'onabort',
            'onactivate',
            'onafterprint',
            'onafterupdate',
            'onbeforeactivate',
            'onbeforecopy',
            'onbeforecut',
            'onbeforedeactivate',
            'onbeforeeditfocus',
            'onbeforepaste',
            'onbeforeprint',
            'onbeforeunload',
            'onbeforeupdate',
            'onblur',
            'onbounce',
            'oncellchange',
            'onchange',
            'onclick',
            'oncontextmenu',
            'oncontrolselect',
            'oncopy',
            'oncut',
            'ondataavailable',
            'ondatasetchanged',
            'ondatasetcomplete',
            'ondblclick',
            'ondeactivate',
            'ondrag',
            'ondragend',
            'ondragenter',
            'ondragleave',
            'ondragover',
            'ondragstart',
            'ondrop',
            'onerror',
            'onerrorupdate',
            'onfilterchange',
            'onfinish',
            'onfocus',
            'onfocusin',
            'onfocusout',
            'onhelp',
            'onkeydown',
            'onkeypress',
            'onkeyup',
            'onlayoutcomplete',
            'onload',
            'onlosecapture',
            'onmousedown',
            'onmouseenter',
            'onmouseleave',
            'onmousemove',
            'onmouseout',
            'onmouseover',
            'onmouseup',
            'onmousewheel',
            'onmove',
            'onmoveend',
            'onmovestart',
            'onpaste',
            'onpropertychange',
            'onreadystatechange',
            'onreset',
            'onresize',
            'onresizeend',
            'onresizestart',
            'onrowenter',
            'onrowexit',
            'onrowsdelete',
            'onrowsinserted',
            'onscroll',
            'onselect',
            'onselectionchange',
            'onselectstart',
            'onstart',
            'onstop',
            'onsubmit',
            'onunload'
        );
        $ra  = array_merge($ra1, $ra2);

        $found = true; // keep replacing as long as the previous round replaced something
        while ($found == true) {
            $val_before = $val;
            for ($i = 0; $i < sizeof($ra); $i++) {
                $pattern = '/';
                for ($j = 0; $j < strlen($ra[$i]); $j++) {
                    if ($j > 0) {
                        $pattern .= '(';
                        $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                        $pattern .= '|';
                        $pattern .= '|(�{0,8}([9|10|13]);)';
                        $pattern .= ')*';
                    }
                    $pattern .= $ra[$i][$j];
                }
                $pattern .= '/i';
                $replacement = substr($ra[$i], 0, 2) . '<x>' . substr($ra[$i], 2); // add in <> to nerf the tag
                $val         = preg_replace($pattern, $replacement, $val); // filter out the hex tags
                if ($val_before == $val) {
                    // no replacements were made, so exit the loop
                    $found = false;
                }
            }
        }
        return $val;
    }

}
