<?php

/**
 * Class BaseAction
 */
class BaseAction extends Action
{
    //存储用户信息系
    public $user_info;

    public function __construct()
    {
        parent::__construct();
        $this->user_info = unserialize(session('user_info'));
        if (!$this->user_info) {
            $this->redirect("Login/login");
        }
    }

    /**
     * 错误提示
     */
    protected function systemError()
    {
        echo "<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>";
        echo "<meta name='viewport' content='width=device-width user-scalable=yes initial-scale=1.0 maximum-scale=3.0 minimum-scale=1.0'>";
        echo "系统出错!";
        exit;
    }

}