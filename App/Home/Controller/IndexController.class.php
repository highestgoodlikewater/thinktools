<?php

namespace Home\Controller;

use Exception;

class IndexController extends BaseController {

    public function index() {
        $this->display();
    }

    public function delivery() {
        $this->display();
    }

    public function idservice() {
        $this->display();
    }

    public function ipservice() {
        $this->delivery();
    }

    public function tel() {
        $this->display();
    }

    public function weather() {
        $this->display();
    }

    /**
     * 快递查询
     */
    public function search_delivery() {
        try {
            $postid = I('postid');
            $delivery_api_url = C('DELIVERY_API.KD100_TYPE_SEARCH');
            $json = \Org\HTTP::post($delivery_api_url, array('text' => $postid));
            if (empty($json)) {
                throw new Exception('快递单号不正确！');
            }
            $result = json_decode($json, TRUE);
            if (empty($result['auto']) || !is_array($result['auto'])) {
                throw new Exception('没有查询到相关数据！');
            }
            $noCount = 0;
            $type = '';
            foreach ($result['auto'] as $value) {
                if ($value['noCount'] > $noCount) {
                    $noCount = $value['noCount'];
                    $type = $value['comCode'];
                }
            }
            if (empty($type)) {
                throw new Exception('没有查询到相关数据!');
            }
            $delivery_api = C('DELIVERY_API.KD100');
            $re = \Org\HTTP::post($delivery_api, array('type' => $type, 'postid' => $postid));
            echo $re;
        } catch (Exception $ex) {
            $this->ajaxReturn($ex->getMessage(), 'JSON');
        }
    }

    /**
     * 中通快递
     */
    public function search_zt() {
        vendor('simple_html_dom');
        $params['txtBill'] = I('postid');
        $delivery_api_url = C('DELIVERY_API.ZT');
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

    /**
     * 身份证查询
     */
    public function search_id() {
        $id = I('id');
        $id_api = C('ID_API');
        $id_apikey = C('BAIDU_APIKEY');
        $json = \Org\HTTP::get($id_api, array('id' => $id), array('apikey:' . $id_apikey));
        echo $json;
    }

    /**
     * ip地址查询
     */
    public function search_ip() {
        $ip = I('ip');
        $ip_api = C('IP_API');
        $apikey = C('BAIDU_APIKEY');
        $json = \Org\HTTP::get($ip_api, array('ip' => $ip), array('apikey:' . $apikey));
        echo $json;
    }

    /**
     * 电话号码归属地查询
     */
    public function search_tel() {
        $tel = I('tel');
        $tel_api = C('TEL_API');
        $apikey = C('BAIDU_APIKEY');
        $json = \Org\HTTP::get($tel_api, array('tel' => $tel), array('apikey:' . $apikey));
        echo $json;
    }

    public function pinyin() {
        $this->display();
    }

    /**
     * 汉字转拼音
     */
    public function topinyin() {
        $hz = I('hz');
        $pinyin = \Org\Pinyin::trans($hz, array('accent' => FALSE));
        $this->ajaxReturn(array('status'=>0,'result'=>$pinyin),'JSON');
    }

}
