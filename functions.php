<?php


function dd($data, $params = false){
    if ($params){
        var_dump('<pre>',$data,'</pre>');
    }
    else{
        echo '<pre>' . print_r($data,1) . '</pre>';
    }
    die;
}