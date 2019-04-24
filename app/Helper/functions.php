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
if (!function_exists('unlinkImage')) {
    function unlinkImage($image_name){
        if ($image_name != 'call-to-action.jpg' && $image_name != 'themeqx-cover.jpeg') {
            if (file_exists(public_path("uploads/images/$image_name"))) {
                @unlink(public_path("uploads/images/$image_name"));
            };
        }
    }
}

if (!function_exists('saveImage')) {
     function saveImage($image){
        $image_name = rand(1111,9999).time().".".$image->getClientOriginalExtension();
        $image->move(public_path('uploads/images/'),$image_name);
        return $image_name;
    }
}
if (!function_exists('getCity')) {
     function getCity($url){
        $ch = curl_init();
        $options = [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL            => $url
        ];

        curl_setopt_array($ch, $options);
        $data = json_decode(curl_exec($ch));
        curl_close($ch);
        return $data->Title;
    }
}
