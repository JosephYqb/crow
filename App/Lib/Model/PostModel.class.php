<?php

/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: zzwoctavianus
 * Date: 16/4/5
 * Time: 下午4:36
 */
class PostModel extends Model
{
    /**
     * 获取前三项置顶
     * @param $id
     * @return array
     */
    public function getShit()
    {
        $map = array(
            'tb_post.status' => 1,
            'tb_post.shit' => 1
        );
        $selector = "tb_user.id, nickname, headimgurl, tb_post.id, title, content, update_time, read_num";
        $shit_post = $this->join('tb_user ON tb_post.user_id = tb_user.id')->where($map)->limit('0, 3')->order('update_time DESC')->field($selector)->select();
        foreach ($shit_post as $v) {
            $shit_list[] = $v['id'];
        }
        $shit_list = implode(',', $shit_list);
        return array('shit_post' => $shit_post, 'shit_list' => $shit_list);
    }

    /**
     * 获取帖子列表
     * @param $id
     * @param $shit_list
     * @param int $begin
     * @param int $count
     * @return mixed
     */
    public function homeGetPost($shit_list, $key_word = '', $page = 1, $count = 10)
    {
        $begin = ($page - 1) * $count;
        if ($key_word === '') {
            $map = array(
                'tb_post.status' => 1,
                'tb_post.id' => array('not in', $shit_list)
            );
        } else {
            $map = array(
                'tb_post.status' => 1,
                'tb_post.id' => array('not in', $shit_list),
                'tb_post.title|tb_post.content' => array(
                    array('like', "%$key_word%"),
                    array('like', "%$key_word%"),
                    '_multi' => true
                )
            );
        }
        $selector = "tb_user.id, nickname, headimgurl, tb_post.id, title, content, update_time, read_num";
        $post_list = $this->join('tb_user ON tb_post.user_id = tb_user.id')->where($map)->order('update_time DESC')->limit($begin.', '.$count)->field($selector)->select();
        return $post_list;
    }

    /**
     * 获取帖子数
     * @param string $key_word
     * @return mixed
     */
    public function getPostNum($key_word = '')
    {
        if ($key_word === '') {
            $map = array(
                'status' => 1
            );
        } else {
            $map = array(
                'status' => 1,
                'title|content' => array(
                    array('like', "%$key_word%"),
                    array('like', "%$key_word%"),
                    '_multi' => true
                )
            );
        }
        return $this->where($map)->count();
    }
=======
 * User: Administrator
 * Date: 16/04/05
 * Time: 10:23
 */
class PostModel extends Model
{

<<<<<<< HEAD
    /**
     * ��ȡ��������
     * @param $post_id
     *
     * @return mixed
     */
    public function getPostInfo($post_id)
    {
        $where = array(
            'id'     => $post_id,
            'status' => 1
        );
        $field = 'id , title , content, user_id, create_time';

        return $this->where($where)->field($field)->find();
    }

=======
>>>>>>> dca6aaa60109ff7b396db1d7f4fb6568f62bcd34
>>>>>>> 0b89b50c31f250206a86ae9889beee9fd2177e11
}