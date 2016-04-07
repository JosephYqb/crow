<?php

/**
 * ���ӻظ����
 */
class ReviewModel extends Model
{
    /**
     * ��ȡ���ӻظ�
     * @param $post_id
     *
     * @return mixed
     */
    public function getPostReviewByPostId($post_id)
    {
        $field       = 'user_id , create_time , content , review_id';
        $where       = array(
            'post_id' => $post_id,
            'status'  => 1
        );
        return $this->where($where)->field($field)->select();
    }
}