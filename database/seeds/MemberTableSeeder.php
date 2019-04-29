<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('member')->truncate();
        // 产生一个faker实例
        $faker = Faker\Factory::create('zh_CN');

        $data = [];
        for($i=0; $i<=500; $i++){
            // 访问具体的属性来获取数据
            $data[] = [
                'username'      => $faker->userName, // 生成用户名
                'password'      => bcrypt('888888'), // 使用框架内置bcrypt进行加密
                'gender'        => rand(1,3), // 性别
                'mobile'        => $faker->phoneNumber,
                'email'         => $faker->email,
                'avatar'        => "/avatar.jpg",
                'created_at'    => date('Y-m-d H:i:s', time()),
                'type'          => rand(1,2), // 账号类型 1 学生 2 老师
                'status'        => rand(1,2) // 账号状态 1 禁用 2 启用
            ];
        }

        // 写入数据表
        DB::table('member')->insert($data);
    }
}
