<?php

/**
 * model 基类
 */
class BaseModel extends Model
{
    //通过id来查询一条记录
    public function findById($id, $field = '*', $where = null,$key = 'id')
    {
        if(empty($where)){
            $where = array();
        }
        $where[$key] = $id;
        return $this->where($where)->field($field)->find();
    }
}