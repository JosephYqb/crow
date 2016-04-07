<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16/04/05
 * Time: 10:23
 */
class PostModel extends Model
{

    /**
     * 获取帖子详情
     * @param $post_id
     *
     * @return mixed
     */
    public function getPostInfo($post_id)
    {
        $where = array(
            'id'     => $post_id,
            'status' => 1
        );
        $field = 'id , title , content, user_id, create_time';

        return $this->where($where)->field($field)->find();
    }

}