<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16/03/29
 * Time: 10:27
 */

/**
 * @param $time int 时间
 *
 * @return  string  time
 */
function compareDate($time)
{
    static $curr_date = null;
    static $today_begin = null;
    if ($curr_date == null) {
        $curr_date = date('y-m-d');
    }

    $date = date('y-m-d', $time);
    //同一
    if ($date == $curr_date) {
        return date('H:m:s', $time);
    } else {
        $today_begin = $today_begin ? $today_begin: strtotime($curr_date);
        if (($days = (strtotime($date) - $today_begin) / (24 * 60 * 60)) < 7) {
            return $days . "天前";
        } else {
            return date('y-m-s H:m:s', $time);
        }
    }
}

// 兼容array_column
if (!function_exists('array_column')) {

    function array_column($input, $column_key=null, $index_key=null)
    {
        $result = array();
        $i = 0;
        foreach ($input as $v)
        {
            $k = $index_key === null || !isset($v[$index_key]) ? $i++ : $v[$index_key];
            $result[$k] = $column_key === null ? $v : (isset($v[$column_key]) ? $v[$column_key] : null);
        }
        return $result;
    }
}