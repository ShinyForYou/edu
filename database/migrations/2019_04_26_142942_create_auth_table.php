<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth', function (Blueprint $table) {
            $table->increments('id');
            $table->string('auth_name', 20)->notNull(); // 权限名称
            $table->string('controller', 40);           // 不带后缀的权限对应的控制器方法
            $table->string('action', 30);               // 权限对应的方法名称
            $table->tinyInteger('pid');                         // 父级权限id(2级权限)，0表示顶级权限
            $table->enum('is_nav', [1,2])->notNull()->default('1'); // 表示菜单是否显示 1=是 2=否
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth');
    }
}
