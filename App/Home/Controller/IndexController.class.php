<?php

namespace Home\Controller;

class IndexController extends BaseController {

    public function index() {
        $this->display();
    }

    /**
     * 快递查询
     */
    public function seach_delivery() {
        vendor('simple_html_dom');
        $params['txtBill'] = I('postid');
        $sp=I('sp');
        $delivery_api_url = C('DELIVERY_API.'.strtoupper($sp));
        $result = \Org\HTTP::post($delivery_api_url, $params);
        $html = str_get_html($result);
        $re = $html->find(".state");
        $str = '';
        foreach ($re as $val) {
            $a = $val->find('a');
            foreach ($a as $v) {
                $data_sitetel = $v->getAttribute('data-sitetel');
                $v->setAttribute('data-toggle', 'tooltip');
                $v->setAttribute('data-placement', "bottom");
                $v->setAttribute('title', "联系方式：\n" . $data_sitetel);
                $v->setAttribute('href', '#');
            }

            $str .= strval($val);
        }
        $this->ajaxReturn($str);
    }

}
