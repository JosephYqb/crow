<?php

/**
 * 用户信息相关
 */
class UserModel extends Model
{
    /**
     * @param  array $user_list 用户数组
     *
     * @return array mixed         用户信息
     */
    public function getUseInfoByUserList($user_list)
    {
        $user_list = array_unique($user_list);
        $where     = array(
            'id' => array(
                'in',
                implode(',', $user_list)
            )
        );

        //获取用户信息
        return $this->where($where)->field('id , nickname, headimgurl')->select();
    }

}