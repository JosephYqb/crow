<?php

/**
 * 回复相关
 */
class ReviewAction extends Action
{
    public function reviewPost(){

        $post_id = I('.post_id',0,'intval');
        //回复谁的回复
        $review_id = I('.review_id',0,'intval');

        //user_id  todo  ��session �ж�ȡ
        $user_id = 1;

    }
}