## 项目初始化 laravel=5.5.*
- 修改时区 
    * config/app.php  timezone => 'PRC'
- 项目本地化操作 语言包 laravel-lang
    * composer require caouecs/laravel-lang:~3.0
    * Files of languages are in "vendor/caouecs/laravel-lang" directory
    * 将文件下的zh-CN拷贝到resource下lang下
    * 修改config/app.php 'locale' => 'zh-CN'

- 数据库初始化
    * 创建数据库edu;.env文件配置数据库
    * mysql严格模式 config/database.php 'strict' => false
- hosts文件配置虚拟主机名 onlineedu.test; restart apache
- 删除项目不必要文件
    * app/user.php
    * app/Http/Controller/Auth 目录
    * database/migrations/*.php 
    * database/seeds/*.php
    * public/css 目录
    * public/js 目录
    * resource/views/*
 
- 安装debugbar(php version>7)
    * composer require barryvdh/laravel-debugbar
    * config/app.php 修改为 'debug' => env('APP_DEBUG', true),[当我添加服务和别名之后一样有效]
    * 修改 provider 和 aliases 注册 
    * 'Debugbar' => Barryvdh\Debugbar\Facade::class,
    * 'Debugbar' => Barryvdh\Debugbar\Facade::class,
   
- 根目录下steps目录记录实现步骤
    