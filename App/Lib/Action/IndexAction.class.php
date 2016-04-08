<?php
require_once("BaseAction.class.php");

class IndexAction extends BaseAction
{
    /**
     * 首页
     */
    public function index()
    {
        $open_id   = trim(I("get.open"));
        $page      = I('get.page', 1, 'intval');
        $shit_list = I("get.shit_list") ? trim(I("get.shit_list")) : '';
        $key_word  = I("get.key_word") ? trim(I("get.key_word")) : '';
        //var_dump($open_id);
        //exit;
        if (empty($open_id)) {
            $this->systemError();
        } else {
            $post_mod = D('Post');
            if ($page == 1) {
                //初始列表
                $count     = $post_mod->getPostNum($key_word);
                $page_num  = (Int) ceil($count / C("PAGE_NUM"));
                $shit_info = $post_mod->getShit();
                //var_dump($shit_info['shit_post']);
                $post_list = $post_mod->homeGetPost($shit_info['shit_list'], $key_word, $page, 7);
                if (empty($post_list)) {
                    $post_list = $shit_info['shit_post'];
                } else {
                    $post_list = array_merge($shit_info['shit_post'], $post_list);
                }
                $post_list = D('Image')->getImageDateReview($post_list);

                $this->assign("shit_list", $shit_info['shit_list']);
                $this->assign('open', $open_id);
                $this->assign('post_list', $post_list);
                $this->assign('page_num', $page_num);
                $this->assign('key_word', $key_word);
                $this->display();
            } else {
                //上拉加载
                $post_list = $post_mod->homeGetPost($shit_list, $key_word, $page);
                $post_list = D('Image')->getImageDateReview($post_list);
                echo json_encode((Object) $post_list);
            }
        }
    }

    /**
     * 首页外框
     */
    public function home()
    {
        $user     = unserialize(session("user_info"));
        $open_id  = $user['open_id'];
        $key_word = trim(I("post.key_word"));
        //var_dump($key_word);
        if (empty($open_id)) {
            $this->systemError();
        } else {
            $this->assign("open", $open_id);
            $this->assign("key_word", $key_word);
            $this->display();
        }
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
        $res                  = file_get_contents($get_access_token_url);
        $res                  = json_decode($res, true);

        $url_userinfo = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $res['access_token'] . "&openid=" . $res['openid'];
        $res_info     = file_get_contents($url_userinfo);
        $res_info     = json_decode($res_info, true);
        $flag         = D("User")->getUser($res_info);
        if ($flag) {
            $res_info['id'] = $flag;
            session('user_info', $res_info);
            $this->redirect("home", array(
                'open' => $res_info['openid'],
                'page' => 0
            ));
        } else {
            echo "<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>";
            echo "<meta name='viewport' content='width=device-width user-scalable=yes initial-scale=1.0 maximum-scale=3.0 minimum-scale=1.0'";
            echo "用户授权失败！";
        }
    }

    /**
     * get请求微信接口(暂时不用)
     *
     * @param $url
     *
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