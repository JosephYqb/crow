<?php

/**
 * ���ӻظ����
 */
class ReviewAction extends Action
{
    public function reviewPost(){

        $post_id = I('.post_id',0,'intval');
        //�Ƿ�ظ�ĳ��
        $review_id = I('.review_id',0,'intval');

        //user_id  todo  ��session �ж�ȡ
        $user_id = 1;

    }
}