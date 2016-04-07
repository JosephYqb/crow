<?php
vendor("qiniu.io");
vendor("qiniu.rs");
/**
 * Created by PhpStorm.
 * User: zzwoctavianus
 * Date: 16/4/7
 * Time: 上午11:10
 */
class SignupAction extends Action
{

    /**
     * 用户注册
     */
    public function signUp(){
        if ($this->_post()) {
            $data['nickname'] = I("post.username") ? trim(I("post.username")) : '';
            $data['password'] = I("post.password") ? md5(trim(I("post.password"))) : '';

            $head_img = $_FILES['header'];
            $ext = explode('/', $head_img['type']);
            $ext = $ext[1];
            $file_path = $head_img['tmp_name'];

            $bucket = C("BUCKET");
            $file_name = substr(md5(uniqid(microtime(true))), 0, 16).".".$ext;
            $access_key = C("ACCESS_KEY");
            $secret_key = C("SECRET_KEY");
            Qiniu_SetKeys($access_key, $secret_key);
            $putPolicy = new Qiniu_RS_PutPolicy($bucket);
            $upToken = $putPolicy->Token(null);
            $putExtra = new Qiniu_PutExtra();
            $putExtra->Crc32 = 1;
            list($ret, $err) = Qiniu_PutFile($upToken, $file_name, $file_path, $putExtra);
            if ($err !== null) {
                var_dump($err);
            } else {
                $data['headimgurl'] = C("IMG_URL").DIRECTORY_SEPARATOR.$ret['key'];
            }
            unlink($file_path);


            $data['open_id'] = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
            shuffle($data['open_id']);
            $data['open_id'] = substr(implode("", $data['open_id']), 3, 28);

            $user_mod = M('User');
            $flag = $user_mod->add($data);
            if ($flag) {
                $user = $user_mod->where(array("id" => $flag))->find();
                session("user_info", serialize($user));
                $this->redirect("Index/home");
            } else {
                echo "<script>alert('注册失败!')</script>";
                $this->redirect("Signup/signUp");
            }
            exit;
        }
        $this->display();
    }

    /**
     * 注册时检查用户名是否存在
     */
    public function checkUsername(){
        $username = I("post.username") ? trim(I("post.username")) : '';
        //var_dump($username);
        $flag = M('User')->where(array('nickname' => $username))->select();
        //var_dump($flag);
        if ($flag) {
            echo 0;
        } else {
            echo 1;
        }
    }

}