<?php

namespace Install\Controller;
use Exception;

class IndexController extends InstallbaseController {

    /**
     * 安装引导
     */
    public function index() {
        $this->show_nav(array(
            '安装向导' => U('/Home/Index/index')
        ));
        $allow_fopen = false;
        $ini = ini_get_all();
        if ($ini['allow_url_fopen']['global_value']) {
            $allow_fopen = TRUE;
        }
        $writable = FALSE;
        if (is_writable('./')) {
            $writable = TRUE;
        }
        //视图赋值
        $this->assign(array(
            'dbtest'=>U('/Install/Index/dbtest'),
            'install_url'=>U('/Install/Index/install'),
            'allow_fopen' => $allow_fopen,
            'writable' => $writable
        ));
        $this->show();
    }

    /**
     * 数据库测试
     */
    public function dbtest() {
        try {
            $db_url = I('db_url');
            $db_user = I('db_user');
            $db_pass = I('db_pass');
            $db_database = I('db_database');
            if (!mysql_connect($db_url, $db_user, $db_pass)) {
                throw new Exception('数据库连接失败!');
            }
            if(!mysql_select_db($db_database)){
                throw new Exception('数据库'.$db_database.'不存在！');
            }
            $this->ajaxReturn(array('status'=>0),'JSON');
        } catch (Exception $e) {
            $this->ajaxReturn(array('status' => 1, 'msg' => $e->getMessage()), 'JSON');
        }
    }
    
    /**
     * 安装
     */
    public function install(){
        
    }

}
