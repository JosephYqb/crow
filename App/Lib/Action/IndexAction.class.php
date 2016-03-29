<?php
class IndexAction extends Action {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
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
        $res = $this->getUrl($get_access_token_url);
        $res = json_decode($res, true);

        $url_userinfo = "https://api.weixin.qq.com/sns/userinfo?access_token=".$res['access_token']."&openid=".$res['openid'];
        $res_info = $this->getUrl($url_userinfo);
        var_dump($res_info);
    }

    /**
     * get请求微信接口
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