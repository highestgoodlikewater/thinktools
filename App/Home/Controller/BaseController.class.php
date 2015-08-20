<?php

namespace Home\Controller;

class BaseController  extends Think\Controller{
    /**
     * 检查是否登录
     */
    public function _initialize(){       
        if(empty(session(C('SESSION_KEY')))){                                 
            $this->redirect('Home/Public/login');
        }
    }
}
