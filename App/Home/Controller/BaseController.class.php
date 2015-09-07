<?php

namespace Home\Controller;

class BaseController  extends \Think\Controller{
    /**
     * 检查是否登录
     */
    public function _initialize(){
        $auth=session(C('SESSION_KEY'));
        if(empty($auth)){                                 
            $this->redirect('Home/Public/login');
        }
    }
}
