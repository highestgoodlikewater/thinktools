<?php

/**
 * 
 */

namespace Org;

class HTTP {

    /**
     * get请求
     * 
     * @param string $url URL
     * @param array $params 参数
     * @return mixed
     */
    public static function get($url, $params) {
        $query_str = '';
        if (!empty($params) && is_array($params)) {
            $query_str = http_build_query($params);
        }
        $url = $url . '?' . $query_str;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    /**
     * post请求
     * 
     * @param string $url URL
     * @param array $params 参数
     * @return mixed
     */
    public static function post($url, $params) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}
