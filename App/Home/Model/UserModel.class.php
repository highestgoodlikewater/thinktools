<?php

namespace Home\Model;
class UserModel  extends \Think\Model\MongoModel{
    /**
     * 
     * @param array $data 数据
     * @param array $options 表达式
     * @param bool $replace 是否替换
     * @return array
     */
    public function addData($data, $options=array(),$replace=false){
      return   $this->add($data, $options,$replace);
    }
}
