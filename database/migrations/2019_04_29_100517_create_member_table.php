<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 20)->notNull(); // 用户名
            $table->string('password')->notNull(); // 密码
            $table->string('avatar', 100); // 头像
            $table->string('mobile', 11); // 手机号
//            $table->integer('country_id'); // 国家 id
//            $table->integer('province_id'); // 省份 id
//            $table->integer('city_id'); // 城市 id
//            $table->integer('county_id'); // 市区 id
            $table->enum('gender', [1,2,3])->notNull()->default('1'); // 性别 1男 2女 3保密
            $table->string('email',40); // 邮箱
            $table->rememberToken(); // 记住登录功能需要存储的标记
            $table->enum('type', [1, 2])->notNull()->default('1'); // 账号类型 1 学生 2 老师
            $table->enum('status', [1,2])->notNull()->default('2'); // 账号状态 1 禁用 2 启用
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
