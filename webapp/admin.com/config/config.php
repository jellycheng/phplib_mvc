<?php
/**
 * 配置key均小写
 */
return array(
			'encoding'=>'utf-8',
			'default_timezone'=>'Asia/Shanghai',
			'controller_namespace'=>'\\app\\control',
			/* 系统变量名称设置 */
			'var_mod'=>'mod',
			'var_act'=>'act',
			'var_pathinfo'=> 's',
			
			/* 数据库设置 */

            /** other */
            'init_load_file'=>APP_ROOT . 'config/core.php',
			);
	