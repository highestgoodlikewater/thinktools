<?php
return array(
    'SHOW_PAGE_TRACE' =>true, //页面trace
    'DEFAULT_MODULE' => 'Home',
    'URL_MODEL' => 2,    
    'DELIVERY_API'=>array(       
        'ZT'=>'http://www.zto.cn/GuestService/Bill',//中通快递查询接口
        'KD100'=>'http://www.kuaidi100.com/query',
        'KD100_TYPE_SEARCH'=>'www.kuaidi100.com/autonumber/autoComNum'
    ),   
    'ID_API'=>'http://apis.baidu.com/apistore/idservice/id',//身份证查询接口
    'IP_API'=>'http://apis.baidu.com/apistore/iplookupservice/iplookup',//ip接口
    'TEL_API'=>'http://apis.baidu.com/apistore/mobilephoneservice/mobilephone',//电话号码归属地查询
);