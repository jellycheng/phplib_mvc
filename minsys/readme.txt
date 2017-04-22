
小系统的使用方案
业务简单, 单个域名的情况.

目录结构
|-common 项目公共文件目录,一般放置通用方法,类等,如public.fun.php
|-config 项目配置
|-control 控制器
|-data	缓存文件,log等本目录可读可写
|-model  业务逻辑部分
|-template 模板
|-public   document_root指向这个目录,web server入口
|-third  第三方文件
|-
