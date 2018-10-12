<?php

use think\migration\Seeder;

class Users extends Seeder
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
                'name'    => 'admin',
				'passwd' => MD5('admin'),
                'description'    => '超级管理员',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'    => 'own',
            	'passwd' => MD5('123'),
                'description'    => '网站拥有者',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'    => 'test',
            	'passwd' => MD5('123'),
                'description'    => '测试',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]
        ];

        $roles = $this->table('users');
        $roles->insert($data)
              ->save();
    }
}