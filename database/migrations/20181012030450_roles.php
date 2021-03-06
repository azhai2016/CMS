<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Roles extends Migrator
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
		
		$table = $this->table('roles',['comment'=>'角色表']);
        $table->addColumn('name', 'string', ['limit' => 20,'default'=>'','comment'=>'角色名称'])
            ->addColumn('description', 'string', ['null' => true,'comment'=>'说明'])
            ->addColumn('created_at', 'datetime',['comment'=>'创建时间'])
            ->addColumn('updated_at', 'datetime',['comment'=>'更新时间'])
            ->addIndex(['name'], ['unique' => true,['comment'=>'名称索引']])
            ->save();

    }
}
