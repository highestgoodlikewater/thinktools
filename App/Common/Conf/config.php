<?php

return array(
    'SHOW_PAGE_TRACE' => true, //页面trace
    'DEFAULT_MODULE' => 'Home',
    'URL_MODEL' => 2,
    'LANG_SWITCH_ON' => true, // 开启语言包功能
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST' => 'zh-cn', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE' => 'l', // 默认语言切换变量    
    'ERROR_PAGE' =>'/Home/Public/err.html',
    'DELIVERY_API' => array(
        'ZT' => 'http://www.zto.cn/GuestService/Bill', //中通快递查询接口
        'KD100' => 'http://www.kuaidi100.com/query',
        'KD100_TYPE_SEARCH' => 'www.kuaidi100.com/autonumber/autoComNum'
    ),
    'ID_API' => 'http://apis.baidu.com/apistore/idservice/id', //身份证查询接口
    'IP_API' => 'http://apis.baidu.com/apistore/iplookupservice/iplookup', //ip接口
    'TEL_API' => 'http://apis.baidu.com/apistore/mobilephoneservice/mobilephone', //电话号码归属地查询
);
