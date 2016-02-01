<?php
/**
 * App Component
 * 
 * @author GoldHan.zhao <326196998@qq.com>
 * @copyright (c) 2014-2016
 * @license http://www.yiifcms.com
 */

class App {
    
    const CODE_SUCCESS = 200;
    /**
     * ajax响应
     * 
     * @param type $code
     * @param type $msg
     * @param type $data
     * @param type $header
     */
    public static function response($code = self::CODE_SUCCESS, $msg = '', $data = NULL, $header = 'json')
    {
        if($header == 'json') {
            exit(CJSON::encode(array('code' => $code, 'message' => $msg, 'data' => $data)));
        }
    }
    
    /**
     * 自定义正则出错的情况下抛出异常
     * 
     * @throws Exception
     */
    public static function displayRegErrorHandler()
    {
        throw new Exception('内容过滤正则表达式有误！');
    }
}
