<?php

/**
 * 
 *
 * @author eyslce@foxmail.com
 * @filename BaseController.class.php
 * @since 2015-7-8
 */
namespace Home\Controller;
use Think\Controller;
class BaseController  extends Controller{
    /**
     * 检查是否安装
     */
    public function _initialize(){       
//        if(!C('INSTALLED')){                                 
//            $this->redirect('Install/Index/index');
//        }
    }
}
