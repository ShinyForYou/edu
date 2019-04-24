<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manager')->truncate();
        // 产生一个faker实例
        $faker = Faker\Factory::create('zh_CN');

        $data = [];
        for($i=0; $i<=100; $i++){
            // 访问具体的属性来获取数据
            $data[] = [
                'username'      => $faker->userName, // 生成用户名
                'password'      => bcrypt('123456'), // 使用框架内置bcrypt进行加密
                'gender'        => rand(1,3), // 性别
                'mobile'        => $faker->phoneNumber,
                'email'         => $faker->email,
                'role_id'       => rand(1,6),
                'created_at'    => date('Y-m-d H:i:s', time()),
                'status'        => rand(1,2) // 状态
            ];
        }

        // 写入数据表
        DB::table('manager')->insert($data);

    }
}
