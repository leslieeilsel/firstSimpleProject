<?php
return array(
	//'配置项'=>'配置值'
    'DEFAULT_MODULE'        =>   'Home',      // 默认模块
    'DEFAULT_CONTROLLER'    =>   'Index',     // 默认控制器名称
    'DEFAULT_ACTION'        =>   'index',     // 默认操作名称
    'TMPL_ACTION_ERROR'     =>   THINK_PATH.'Tpl/dispatch_jump.tpl',             // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>   "./Application/Admin/View/Public/success.html", // 默认成功跳转对应的模板文件
    'TMPL_L_DELIM'          =>   '{',         // 模板引擎普通标签  开始  标记
    'TMPL_R_DELIM'          =>   '}',         // 模板引擎普通标签  结束  标记
    'DB_TYPE'               =>   'mysql',     // 数据库类型
    'DB_HOST'               =>   'localhost', // 服务器地址
    'DB_NAME'               =>   'national',  // 数据库名
    'DB_USER'               =>   'root',      // 用户名
    'DB_PWD'                =>   '',          // 密码
    'DB_PREFIX'             =>   '',          // 数据库表前缀
	//'DEFAULT_THEME'         =>   'default',   // 设置默认的模板主题
	//'TMPL_DETECT_THEME'     =>   true,        // 自动侦测模板主题
	
);