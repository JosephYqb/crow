<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/8
 * Time: 9:44
 */
class PostMesAction extends BaseAction
{
    public function postMes()
    {
        $this->display('');
    }

    public function addPost()
    {

        $User = M("User"); // 实例化模型类

        // 构建写入的数据数组

        $data["title"] = I("post.title");

        $data["content"] = I("post.content");

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

        $code = 0;
        // 写入数据
        if ($User->add($data)) {
            $code = 1;
        }

        $this->ajaxReturn(
            array('code' => $code)
        );
    }
}