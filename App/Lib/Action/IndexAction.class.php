<?php
class IndexAction extends BaseAction {
    public function index(){
        $this->display();
    }

    public function test(){
        $this->display();
    }
	public function test1(){
		D('index')->index();
	}

    /**
     * 微信授权获取用户信息
     */
    public function wxAuth()
    {
        if (isset($_GET['code'])) {
            $code = $_GET['code'];
        } else {
            die("no code, auth failed!");
        }

        $get_access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx2cdc84d09235b490&secret=118d1cd3445c2ac6e5bbfa7aa1f3f9f2&code=$code&grant_type=authorization_code";
        $res = file_get_contents($get_access_token_url);
        $res = json_decode($res, true);

        $url_userinfo = "https://api.weixin.qq.com/sns/userinfo?access_token=".$res['access_token']."&openid=".$res['openid'];
        $res_info = file_get_contents($url_userinfo);
        $res_info = json_decode($res_info, true);
        $flag = D("User")->getUser($res_info);
        if ($flag) {
            $res_info['id'] = $flag;
            session('user_info', $res_info);
            $this->redirect("index");
        } else {
            echo "<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>";
            echo "<meta name='viewport' content='width=device-width user-scalabel=yes initial-scale=1.0 maximum-scale=3.0 minimun-scale=1.0'";
            echo "用户授权失败！";
        }
    }

    /**
     * get请求微信接口(暂时不用)
     * @param $url
     * @return mixed
     */
    private function getUrl($url)
    {
        $curl = curl_init();
        CURL_SETOPT($curl, CURLOPT_URL, $url);
        CURL_SETOPT($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }
}