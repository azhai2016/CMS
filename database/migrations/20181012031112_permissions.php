<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Permissions extends Migrator
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
        $table = $this->table('permissions',['comment'=>'权限表']);
        $table->addColumn('name', 'string', ['default'=>''])
            ->addColumn('description', 'string', ['null' => true])
            ->addColumn('level_name', 'string', ['default'=>'','comment'=>'级别递归名称'])
            ->addColumn('level_id', 'string', ['default'=>'','comment'=>'级别递归id'])
            ->addColumn('icon', 'string', ['default'=>'','comment'=>'权限图标'])
            ->addColumn('level', 'integer', ['default'=>0,'comment'=>'级别'])
            ->addColumn('sort_order', 'integer', ['default'=>0,'comment'=>'排序'])
            ->addColumn('display_menu', 'integer', ['limit' => MysqlAdapter::INT_TINY,'default'=>0])
            ->addColumn('parent_id', 'integer',['default'=>0])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->addIndex(['name'], ['unique' => true])
            ->addIndex(['parent_id'])
            ->save();
    }
}
