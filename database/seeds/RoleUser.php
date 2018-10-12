<?php

use think\migration\Seeder;

class RoleUser extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

	  $data = [
            [
                'user_id'    => 1,
				'role_id' =>1,
            ],
            [
                'user_id'    => 2,
				'role_id' =>2,
            ],
            [
                'user_id'    => 3,
				'role_id' =>3,
        ]
        ];
	
        $roles = $this->table('role_user');
        $roles->insert($data)
              ->save();	
		
    }
}