<?php

use think\migration\Migrator;
use think\migration\db\Column;

class PermissionRole extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('permission_role',['comment'=>'权限角色表']);
        $table->addColumn('permission_id', 'integer', ['signed' => true])
            ->addColumn('role_id', 'integer', ['signed' => true])
            ->addForeignKey('permission_id','permissions','id',['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->addForeignKey('role_id','roles','id',['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->addIndex(['permission_id','role_id'])
            ->save();
    }
}
