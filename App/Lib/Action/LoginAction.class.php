<?php

/**
 * Created by PhpStorm.
 * User: zzwoctavianus
 * Date: 16/4/7
 * Time: 上午9:45
 */
class LoginAction extends Action
{
    public function __construct()
    {
        parent::__construct();
        session('user_info', null);
    }

    public function login()
    {
        $flag = intval(I("get.flag"));
        if ($this->_post()) {
            $username = I("post.username") ? trim(I("post.username")) : '';
            $password = I("post.password") ? md5(trim(I("post.password"))) : '';
            $user_info = D('User')->getUserInfo($username, $password);
            if ($user_info) {
                session('user_info', serialize($user_info));
                $this->redirect("Index/home");
            } else {
                //unset()
                $this->redirect("Login/login", array('flag' => 1));
            }

            exit;
        }
        $this->assign("flag", $flag);
        $this->display();
    }
}