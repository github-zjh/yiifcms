<?php

/**
 * 分词
 * @author zhao jinhan <326196998@qq.com>
 *
 */
class AutoKeyword
{

    /**
     * 使用discuz词库
     * @param unknown_type $title
     * @param unknown_type $content
     */
    public static function discuz ($title = '', $content = '')
    {
        $subjectenc = rawurlencode(strip_tags($title));
        $messageenc = rawurlencode(strip_tags(preg_replace("/\[.+?\]/U", '', $content)));
        $data = @implode('', file("http://keyword.discuz.com/related_kw.html?title=$subjectenc&content=$messageenc&ics=utf-8&ocs=utf-8"));
        
        if ($data) {
            $parser = xml_parser_create();
            xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
            xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
            xml_parse_into_struct($parser, $data, $values, $index);
            xml_parser_free($parser);
            $kws = array ();
            foreach ($values as $valuearray) {
                if ($valuearray['tag'] == 'kw' || $valuearray['tag'] == 'ekw')
                    $kws[] = trim($valuearray['value']);
            }
            $return = '';
            if ($kws) {
                foreach ($kws as $kw) {
                    $kw = CHtml::encode(strip_tags($kw));
                    $return .= $dot.$kw ;
                    $dot = ',';
                }
                $return = trim($return);
            }
            
            return $return;
        }
    
    }
    /**
     * 简易自定义获取关键词
     * @param string $title
     * @param string $content
     * @return JSON
     */
    public static function simple($title = '', $content=''){
    	$words = include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'words.php';
    	$data = array();
    	$max = 10; //最多匹配10个
    	if($words){
    		foreach((array)$words as $word){
    			if(count($data) > $max){
    				break;
    			}else{
	    			if($title && preg_match('/'.$word.'/is', $title)){
	    				array_push($data, $word);
	    			}
	    			if($content && preg_match('/'.$word.'/is', $content)){
	    				if(!in_array($word, $data)){
	    					array_push($data, $word);
	    				}	    					
	    			}
    			}
    		}
    	}
    	return array_unique($data);
    }


}