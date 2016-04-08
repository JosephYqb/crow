<?php

/**
 * Created by PhpStorm.
 * User: zzwoctavianus
 * Date: 16/4/5
 * Time: 下午6:28
 */
class ImageModel extends BaseModel
{
    /**
     * 获取帖子图片和时间戳转化还有统计回复数
     * @param $post_list
     * @return mixed
     */
    public function getImageDateReview($post_list)
    {
        $review_mod = M('Review');
        foreach($post_list as $k => $v) {
            $map = array(
                'post_id' => $v['id'],
                'status' => 1
            );
            $post_list[$k]['review_num'] = $review_mod->where($map)->count();
            $post_list[$k]['update_time'] = date("Y-m-d", $v['update_time']);
            $image_list = $this->where(array('post_id' => $v['id']))->limit('0, 4')->field('img_path')->select();
            $image = array();
            foreach($image_list as $imgk => $imgv) {
                $image[] = $imgv['img_path'];
            }
            $post_list[$k]['post_image'] = $image;
        }
        return $post_list;
    }
}