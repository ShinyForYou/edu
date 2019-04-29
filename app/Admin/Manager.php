<?php

namespace App\Admin;


use Illuminate\Database\Eloquent\Model;

// Require Trait
//use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticate;
//class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
class Manager extends Authenticate
{
    // 定义当前模型需要关联的数据表
    protected $table = 'manager';

    // Use Trait, is equivalent to coping code here
//    use Authenticatable;

    // 用户表关联角色表(1 对 1)
    // select t1.*, t2.role_name from manager t1
    public function role()
    {
        return $this->hasOne('App\Admin\Role', 'id', 'role_id');
    }

}
