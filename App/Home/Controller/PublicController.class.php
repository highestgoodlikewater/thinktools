<?php

namespace Home\Controller;
class PublicController  extends \Think\Controller{
    
    public function create(){
        $data=array();
        $data['user_browser']= GetBrowser();
        $data['user_ip']=  GetIP();
        $data['user_lang']=  GetLang();
        $data['user_os']=  GetOs();
        $result=D('User')->addData($data);
        echo '<pre/>';
        print_r($result);
    }
    
    public function login(){
        
    }
}
