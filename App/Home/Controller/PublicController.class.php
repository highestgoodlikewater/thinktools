<?php

namespace Home\Controller;

class PublicController extends \Think\Controller {

    public function _initialize() {
        $auth = session(C('SESSION_KEY'));
        if (!empty($auth)) {
            $this->redirect('Home/Index/index');
        }
    }

    public function create() {
        $data = array();
        $data['user_browser'] = GetBrowser();
        $data['user_ip'] = GetIP();
        $data['user_lang'] = GetLang();
        $data['user_os'] = GetOs();
        $result = D('User')->addData($data);
        echo '<pre/>';
        print_r($result);
    }

    /**
     * 登录
     */
    public function login() {
        $this->display('login');
    }

    /**
     * 注册
     */
    public function register() {
        
    }
    
    /**
     * 错误页面
     */
    public function err(){
        $this->display('error');
    }

}
