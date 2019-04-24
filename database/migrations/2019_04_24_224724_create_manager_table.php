<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 建表方法
        Schema::create('manager', function (Blueprint $table) {
            // 设计字段
            $table->increments('id');
            $table->string('username', 20)->notNull();
            $table->string('password')->notNull();
            $table->enum('gender', [1,2,3])->notNull()->default('1'); // 1 男 2 女 3 保密
            $table->string('mobile', 11);
            $table->string('email', 40);
            $table->tinyInteger('role_id');  // 角色表中主键 ID
            $table->timestamps(); // created_at and updated_at (系统自己创建)
            $table->rememberToken();  // 实现一个记住登录状态的字段，用于存储token秘钥
            $table->enum('status', [1,2])->notNull()->default('2'); // 账号状态 1 禁用 2 启用
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 删表方法
        Schema::dropIfExists('manager');
    }
}
