<?php

use think\migration\Seeder;

class Roles extends Seeder
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
                'name'    => '超级管理员',
                'description'    => '管理员角色',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'    => '网站拥有者',
                'description'    => '网站',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'    => 'test',
                'description'    => '测试',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]
        ];

        $roles = $this->table('roles');
        $roles->insert($data)
            ->save();
		
    }
}