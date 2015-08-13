<?php
/**
 * App Component
 * 
 * @author Sim Zhao <326196998@qq.com>
 * @copyright (c) 2015, Sim Zhao
 * @license http://www.yiifcms.com
 */

class App {
    
    /**
     * ajax响应
     * 
     * @param type $code
     * @param type $msg
     * @param type $data
     * @param type $header
     */
    public static function response($code = 200, $msg = '', $data = NULL, $header = 'json')
    {
        if($header == 'json') {
            exit(CJSON::encode(array('code' => $code, 'message' => $msg, 'data' => $data)));
        }
    }
}
