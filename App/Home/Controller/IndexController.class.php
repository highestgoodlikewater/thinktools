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
                throw new Exception('返回数据格式错误！');
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
                throw new Exception('没有查询到相关数据');
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
        $id_apikey = C('ID_APIKEY');
        $json = \Org\HTTP::get($id_api, array( 'id' => $id),array('apikey:'.$id_apikey));
        echo $json;
    }

}
