<?php

/**
<<<<<<< HEAD
 * Created by PhpStorm.
 * User: zzw
 * Date: 16-3-31
 * Time: 下午12:33
 */
class UserModel extends Model
{
    /**
     * 获取用户信息存入数据库
     * @param $user_info
     * @return bool
     */
    public function getUser($user_info)
    {
        $user = $this->where(array('open_id' => $user_info['openid']))->find();
        if ($user) {
            return $user['id'];
        } else {
            $data = array(
                'open_id' => $user_info['openid'],
                'nickname' => $user_info['nickname'],
                'sex' => $user_info['sex'],
                'country' => $user_info['country'],
                'province' => $user_info['province'],
                'city' => $user_info['city'],
                'language' => $user_info['language'],
                'headimgurl' => $user_info['headimgurl']
            );
            $flag = $this->add($data);
            if ($flag !== false) {
                return $flag;
            } else {
                return false;
            }
        }
    }

    /**
     * 用户登陆获取用户信息
     * @param $username
     * @param $password
     * @return mixed
     */
    public function getUserInfo($username, $password)
    {
        $map = array(
            'nickname' => $username,
            'password' => $password
        );
        $user_info = $this->where($map)->find();
        if($user_info) {
            return $user_info;
        } else {
            return false;
        }
    }
=======
 * �û���Ϣ���
 */
class UserModel extends Model
{

>>>>>>> dca6aaa60109ff7b396db1d7f4fb6568f62bcd34

}