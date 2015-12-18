<?php

/**
 * 分词
 * 
 * @author GoldHan.zhao <326196998@qq.com>
 */
class AutoKeyword
{

    /**
     * 使用discuz词库
     * @param 标题 $title
     * @param 内容 $content
     * @param 最多匹配词数
     */
    public static function discuz ($title = '', $content = '', $max = 10)
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
                if ($valuearray['tag'] == 'kw' || $valuearray['tag'] == 'ekw') {
                    $kws[] = trim($valuearray['value']);
                }
            }            
            $return = '';
            $dot = ',';            
            if ($kws) {             
                $kws = array_slice($kws, 0 , $max);
                foreach ($kws as $kw) {
                    $kw = CHtml::encode(strip_tags($kw));
                    $return .= $kw.$dot ;                    
                }
                $return = trim($return, $dot);
            }            
            return $return;
        }
    
    }
    /**
     * 简易自定义获取关键词
     * @param string $title
     * @param string $content
     * @param int   
     * @return JSON
     */
    public static function simple($title = '', $content='', $max = 10){
    	$words = include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'words.php';
    	$data = array();    	
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