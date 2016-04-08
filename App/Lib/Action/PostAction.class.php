<?php

/**
 * 帖子详情相关
 */
class PostAction extends BaseAction
{

    /**
     * 帖子详情页
     */
    public function detail()
    {

        $post_id = I('get.pid',0,'intval');
        if ($post_id != 0) {
            $post_info = D('Post')->getPostInfo($post_id);
            if (!empty($post_info)) {

                $post_image_info = M('image')->where('post_id = ' . $post_id)->field('img_path')->select();
                $this->assign('post_image_info', $post_image_info ? $post_image_info : array());
                // 获取改帖子评论列表
                $review_info = D('Review')->getPostReviewByPostId($post_id);
                $this->assign('review_info', $review_info);

                if (!empty($review_info)) {
                    $user_list = array_column($review_info, 'user_id');
                }
                $user_list[] = $post_info['user_id'];

                $user_info   = D('User')->getUseInfoByUserList($user_list);

                if (!empty($user_info)) {
                    $account = array();

                    foreach ($user_info as $v) {
                        $account[$v['id']] = array(
                            'nickname'   => $v['nickname'],
                            'headimgurl' => $v['headimgurl']
                        );
                    }
                    $this->assign('account', $account);
                }
            }
        }

        $this->assign('post_info', empty($post_info) ? $this->_getDefault() : $post_info);
        $this->display('');
    }


    private function _getDefault()
    {
        return array(
            'content' => '文章走丢了'
        );
    }

    public function getList()
    {
    }

    public function edit()
    {
    }

    public function add()
    {
    }
}