<?php

namespace app\admin\model;

use think\Model;

use Rbac\Traits\RbacUser;

class Users extends Model
{
     use RbacUser;

    protected $hidden=['password','created_at','updated_at'];

    protected $auto = [];
    protected $insert = ['created_at','updated_at'];
    protected $update = ['updated_at'];

    protected $type = [
        'id'               =>  'integer',
        'password'         =>  'string',
        'last_login_time'  =>  'datetime',
        'created_at'       =>  'datetime',
        'updated_at'       =>  'datetime',
    ];

    protected function setCreatedAtAttr()
    {
        return get_time();
    }

    protected function setUpdatedAtAttr()
    {
        return get_time();
    }
	
}
