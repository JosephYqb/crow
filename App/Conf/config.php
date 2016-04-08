<?php
return array(
	//'配置项'=>'配置值'

    //本地测试环境
    'DB_TYPE' => 'mysql',
    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'zjwdb_499083',
    'DB_USER' => 'root',
    'DB_PWD' => '',
    'DB_PORT' => '3306',
    'DB_PREFIX' => 'tb_',
    'DB_DEBUG' => false,


    //主机屋环境
    /*
    'DB_TYPE' => 'mysql',
    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'zjwdb_499083',
    'DB_USER' => 'zjwdb_499083',
    'DB_PWD' => 'Zjwdb_499083',
    'DB_PORT' => '3306',
    'DB_PREFIX' => 'tb_',
    'DB_DEBUG' => false,
    */


    'SESSION_OPTIONS' => array(
        'expire' => 86400
    ),

    // 默认主页
    'DEFAULT_ACTION'=>'home',
    'PAGE_NUM' => 10,

    //七牛
    'ACCESS_KEY' => 'V2XKPHWqMoVcHFhj1Byr2KGZWB1lUKJ_f0ZfF-4W',
    'SECRET_KEY' => 'yI1Y4fxXskBzMJZlzWgrv6LvPVN5YyJng-tTECUc',
    'BUCKET' => 'octavianus',
    'IMG_URL' => 'http://7xspdi.com1.z0.glb.clouddn.com',
);
