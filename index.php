<?php
// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./App/');


// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
