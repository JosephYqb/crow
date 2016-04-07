<?php
/**
 * 帖子详情相关
 */


class PostAction extends Action
{

    public function detail()
    {

        $post_id = (int) $_REQUEST['pid'];
        if ($post_id != 0) {
            $where     = array(
                'id'     => $post_id,
                'status' => 1
            );
            $field     = 'id , title , content, user_id';
            $post_info = M('post')->where($where)->field($field)->find();
            if (!empty($post_info)) {

                $post_image_info = M('image')->where('post_id = ' . $post_id)->field('img_path')->select();
                $this->assign('post_image_info', $post_image_info ?: array());
                // 获取改帖子评论列表
                $field       = 'user_id , create_time , content';
                $where       = array(
                    'post_id' => $post_id,
                    'status'  => 1
                );
                $review_info = M('review')->where($where)->field($field)->select();
                $this->assign('review_info', $review_info);

                if (!empty($review_info)) {
                    $user_list = array_column($review_info, 'user_id');
                }
                $user_list[] = $post_info['user_id'];
                $user_list   = array_unique($user_list);
                $where       = array(
                    'id' => array(
                        'in',
                        implode(',', $user_list)
                    )
                );
                //获取用户信息
                $user_info = M('user')->where($where)->field('id , nickname, headimgurl')->select();

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