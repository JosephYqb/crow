<?php

/**
 * 用户信息相关
 */
class UserAction extends Action
{

    /**
     * 获取用户信息
     */
    public function getUserInfoById()
    {
        $user_id = I('get.id', 0, 'intval');
        $user_info = array();
        if (empty($user_id)) {
            //todo 空用户页面
            echo 'todo 404';
        } else {
            $where['id'] = $user_id;
            $user_info   = M('user')->field('nickname , sex, province , city, headimgurl')
                ->where($where)->find();
        }
        if (empty($user_info)) {
            //todo 空用户页面
            echo 'todo 404';
        }else{
            $this->assign('user_info', $user_info);
            $this->display('');
        }

    }
}