<?php

/**
<<<<<<< HEAD
 * Created by PhpStorm.
 * User: zzw
 * Date: 16-3-31
 * Time: ä¸‹åˆ12:33
 */
class UserModel extends Model
{
    /**
     * è·å–ç”¨æˆ·ä¿¡æ¯å­˜å…¥æ•°æ®åº“
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
     * ç”¨æˆ·ç™»é™†è·å–ç”¨æˆ·ä¿¡æ¯
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
 * ÓÃ»§ĞÅÏ¢Ïà¹Ø
 */
class UserModel extends Model
{
    /**
     * @param  array $user_list ÓÃ»§Êı×é
     *
     * @return array mixed         ÓÃ»§ĞÅÏ¢
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

<<<<<<< HEAD
        //»ñÈ¡ÓÃ»§ĞÅÏ¢
        return $this->where($where)->field('id , nickname, headimgurl')->select();
    }
=======
>>>>>>> dca6aaa60109ff7b396db1d7f4fb6568f62bcd34
>>>>>>> 0b89b50c31f250206a86ae9889beee9fd2177e11

}