<?php

namespace Install\Controller;

class InstallbaseController extends \Think\Controller {

    public function _initialize() {
        $webname = C('WEBNAME');
        $version = C('VERSION');        
        //
        $this->assign(array(           
            'webname' => $webname,
            'version' => $version
        ));
    }
    
    /**
     * 视图导航 
     * 
     * @param array $nav 导航菜单
     */
    public function show_nav(array $nav){
        $this->assign('nav',$nav);
    }

}
