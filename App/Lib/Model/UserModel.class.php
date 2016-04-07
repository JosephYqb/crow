<?php

/**
 * �û���Ϣ���
 */
class UserModel extends Model
{
    /**
     * @param  array $user_list �û�����
     *
     * @return array mixed         �û���Ϣ
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

        //��ȡ�û���Ϣ
        return $this->where($where)->field('id , nickname, headimgurl')->select();
    }

}