<?php

/**
 * 分词
 * @author shuguang <5565907@qq.com>
 *
 */
class XAutoKeyword
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


}