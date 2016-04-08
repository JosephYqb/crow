<?php

/**
 * 回复相关
 */
class ReviewAction extends BaseAction
{
    public function reviewPost()
    {

        $post_id = I('get.pid', 0, 'intval');
        //回复谁的回复
        $review_id = I('get.review_id', 0, 'intval');
        // 回复用户
        if (!empty($review_id)) {
            $review_user = D('Review')->getReviewInfoByReviewId($review_id, 'user_id');
            if (!empty($review_user)) {
                $review_user_info = D('User')->findById($review_user['user_id'], 'nickname');
                $this->assign('review_user_info', $review_user_info);
            } else {
            }
        }
        if (IS_POST) {
            $content = I('post.content', '', 'htmlspecialchars');
            if (empty($content)) {
                $message = '回复内容不能为空';
            } else {

                $data    = array(
                    'user_id'     => $this->user_info['id'],
                    'post_id'     => $post_id,
                    'review_id'   => $review_id,
                    'content'     => $content,
                    'create_time' => NOW_TIME,
                    'status'      => 1
                );
                if (D('Review')->add($data)) {
                    $this->redirect("Post/detail?pid=" . $post_id);
                } else {
                    $message = '回复失败，请稍后再试';
                }
            }
        }
        $this->assign('message', $message);
        $this->assign('review_user_info', $review_user_info);
        $this->display('');
    }
}