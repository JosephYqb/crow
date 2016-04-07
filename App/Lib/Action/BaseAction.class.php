<?php

class BaseAction extends Action {

    public function __construct()
    {
        parent::__construct();
        $user = unserialize(session('user_info'));
        if (!$user) {
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