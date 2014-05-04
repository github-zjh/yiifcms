<?php
/**
 * 覆盖原Captcha获取验证码的方法
 * @author zhaojinhan <326196998@qq.com>
 * @copyright Copyright (c) 2014-2015 Personal. All rights reserved. 
 * @version v1.0.0
 *
 */
class MyCaptchaAction extends CCaptchaAction
{	

	/**
	 * Generates a new verification code.
	 * @return string the generated verification code
	 */
	protected function generateVerifyCode()
	{
		if($this->minLength > $this->maxLength)
			$this->maxLength = $this->minLength;
		if($this->minLength < 3)
			$this->minLength = 3;
		if($this->maxLength > 20)
			$this->maxLength = 20;
		$length = mt_rand($this->minLength,$this->maxLength);

		$letters = '123456789fghujklmnpqrstvwxyz';
		$vowels = 'abcde';
		$code = '';
		for($i = 0; $i < $length; ++$i)
		{
			if($i % 2 && mt_rand(0,10) > 2 || !($i % 2) && mt_rand(0,10) > 9)
				$code.=$vowels[mt_rand(0,4)];
			else
				$code.=$letters[mt_rand(0,20)];
		}

		return $code;
	}
	
}