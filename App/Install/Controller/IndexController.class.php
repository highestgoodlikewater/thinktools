<?php

namespace Install\Controller;

class IndexController extends InstallbaseController {

    /**
     * 安装引导
     */
    public function index() {
        $this->show_nav(array(
            '安装向导'=>U('/Home/Index/index')
        ));        
        $allow_fopen=false;
        $ini = ini_get_all();        
        if ($ini['allow_url_fopen']['global_value']) {
            $allow_fopen=TRUE;
            
        }
        $writable=FALSE;
        if (is_writable('./')) {
            $writable=TRUE;            
        }
        //视图赋值
        $this->assign(array(
            'allow_fopen' => $allow_fopen,
            'writable'=>$writable
        ));
        $this->show();
    }

}
