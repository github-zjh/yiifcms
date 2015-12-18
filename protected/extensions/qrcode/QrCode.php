<?php
/**
 * 生成二维码类
 * 
 * @author GoldHan.zhao <326196998@qq.com>
 * @link http://apistore.baidu.com/apiworks/servicedetail/1017.html
 */

class QrCode {
    
    public function __construct() {        
        $config = include(Yii::getPathOfAlias('ext') . '/qrcode/config.php');        
        $this->_apikey = $config['apikey'];
    }
    
    /**
     * 生成二维码
     * 
     * @param string $url  二维码内容
     * @param int $size    二维码大小[1-20]
     * @return string      生成的二维码链接
     */
    public function createCode($url = '', $size = 8)
    {
        if($size < 1 || $size > 20) {
            $size = 8;
        }
        $ch = curl_init();        
        $api = 'http://apis.baidu.com/3023/qr/qrcode?size='.$size.'&qr='.$url;
        $header = array(
            'apikey: '.$this->_apikey,
        );
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $api);
        $res = curl_exec($ch);
        curl_close($ch);
        if($res) {
            $data = json_decode($res, true);            
            return $data['url'];
        } else {
            return '';
        }
    }
}
