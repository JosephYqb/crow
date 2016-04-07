<?php

/**
 * 帖子回复相关
 */
class ReviewAction extends Action
{
    public function reviewPost(){

        $post_id = I('.post_id',0,'intval');
        //是否回复某人
        $review_id = I('.review_id',0,'intval');

        //user_id  todo  从session 中读取
        $user_id = 1;

    }
}