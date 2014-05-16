<?php
/**
 * 助手类
 * @author zhao jinhan
 * @version v1.0.0
 * @author Administrator
 *
 */
class Helper extends CController
{
		/**
		 * 切割utf-8格式的字符串
		 * @author zhao jinhan
		 * @version v1.0.0
		 *
		 */
        public static function truncate_utf8_string($string, $length, $etc = '...')
        {
            $result = '';
            $string = html_entity_decode(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
            $strlen = strlen($string);
            for ($i = 0; (($i < $strlen) && ($length > 0)); $i++)
            {
                if ($number = strpos(str_pad(decbin(ord(substr($string, $i, 1))), 8, '0', STR_PAD_LEFT), '0'))
                {
                    if ($length < 1.0)
                    {
                        break;
                    }
                    $result .= substr($string, $i, $number);
                    $length -= 1.0;
                    $i += $number - 1;
                }
                else
                {
                    $result .= substr($string, $i, 1);
                    $length -= 0.5;
                }
            }
            $result = htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
            if ($i < $strlen)
            {
                $result .= $etc;
            }
            return $result;
        }
        /**
         * 邮件发送
         * @param string $to  要发送的人的邮箱
         * @param string $subject  邮件标题
         * @param string $message  邮件内容
         */
        public static function sendMail($id = 0,$toemail='', $subject='', $message=''){
        	
        	$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
        	$mailer->Host = Yii::app()->params['mailer']['Host'];
        	$mailer->Port = Yii::app()->params['mailer']['Port'];
        	$mailer->Timeout = Yii::app()->params['mailer']['Timeout'];
        	$mailer->ContentType = Yii::app()->params['mailer']['ContentType'];
        	$mailer->SMTPAuth = true;
        	$mailer->Username = Yii::app()->params['mailer']['Username'];
        	$mailer->Password = Yii::app()->params['mailer']['Password'];
        	$mailer->IsSMTP();
        	$mailer->From = $mailer->Username;  //发件人邮箱
        	$mailer->FromName = Yii::app()->params['mailer']['FromName']; //发件人姓名
        	$mailer->AddReplyTo($mailer->Username);        	       	
        	$mailer->CharSet = 'UTF-8';
        	
        	$log = $id>0?MailLog::model()->findByPk($id):null;
        	if(!$log){
        		//添加邮件日志
        		$model = new MailLog();        		
        		$model->accept = $toemail;
        		$model->subject = $subject;
        		$model->message = $message;
        		$model->status = 'waiting';
        		$model->save();
        		        		
        		$log = MailLog::model()->findByPk($model->id);
        		
        		$mailer->AddAddress($toemail);
        		$mailer->Subject = $subject;
        		$mailer->Body = $message;
        		
        	}else{
        		//查询要发送的邮件
	        	$mailer->AddAddress($log->accept);
	        	$mailer->Subject = $log->subject;
	        	$mailer->Body = $log->message;
        	}
        	
        	if($mailer->Send() === true){        		
        		$log->times = $log->times+1;
        		$log->sendtime = time();
        		$log->status = 'success';
        		$log->save();
        		return true;
        	}else{
        		$error = $mailer->ErrorInfo;
        		$log->times = $log->times+1;
        		$log->sendtime = time();
        		$log->status = 'failed';
        		$log->error = $error;
        		$log->save();
        		return false;
        	}        	        	
        }
        
}