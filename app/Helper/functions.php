<?php
if (!function_exists('get_thumbnail')) {
    function get_thumbnail($file_name,$suffix = 'thumb'){
        // 50701548045060.jpg
        if ($file_name) {
            $replace =substr($file_name,0,strrpos($file_name,"."));
            return str_replace($replace,"{$replace}_{$suffix}",$file_name);
        }
        return '';
    }
}
