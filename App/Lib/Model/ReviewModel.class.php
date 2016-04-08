<?php

/**
 * 帖子回复相关
 */
class ReviewModel extends BaseModel
{
    /**
     * 获取帖子回复
     *
     * @param $post_id
     *
     * @return mixed
     */
    public function getPostReviewByPostId($post_id)
    {
        $field = 'id , user_id , create_time , content , review_id';
        $where = array(
            'post_id' => $post_id,
            'status'  => 1
        );

        return $this->where($where)->field($field)->select();
    }

    public function getReviewInfoByReviewId($review_id, $field = '*')
    {
        $where = array(
            'review_id' => $review_id,
            'status'    => 1
        );
        return $this->where($where)->field($field)->find();
    }
}