<?php
require_once("BaseAction.class.php");

/**
 * Created by PhpStorm.
 * User: zzwoctavianus
 * Date: 16/4/6
 * Time: 下午2:12
 */
class SearchAction extends BaseAction
{
    /**
     * 搜索页
     */
    public function search()
    {
        if (!empty($_POST['key_word'])) {

        } else {
            $this->display();
        }
    }
}