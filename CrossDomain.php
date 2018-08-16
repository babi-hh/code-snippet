<?php
/**
 * 跨域header 设置
 */
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
$allow_origin = [
    'https://www.exp0.com',
    'https://www.exp1.com'
];
if (in_array($origin, $allow_origin)) {
    header('Access-Control-Allow-Origin:' . $origin);
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Headers:requested-to');
}
