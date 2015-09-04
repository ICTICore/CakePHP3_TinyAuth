<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */

    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->table('users', ['id' => false, 'primary_key' => 'id'])
            ->addColumn('id', 'integer', ['identity' => true, 'signed' => false])
            ->addColumn('active', 'integer', ['limit' => MysqlAdapter::INT_TINY, 'default' => 0, 'signed' => false])
            ->addColumn('first_name', 'string', ['length' => 255])
            ->addColumn('middle_name', 'string', ['length' => 255, 'null' => true])
            ->addColumn('last_name', 'string', ['length' => 255])
            ->addColumn('email', 'string', ['length' => 255])
            ->addColumn('password', 'string', ['length' => 255])
            ->addColumn('created', 'datetime')
            ->addColumn('created_by', 'integer', ['signed' => false, 'null' => true])
            ->addColumn('modified', 'datetime')
            ->addColumn('modified_by', 'integer', ['signed' => false, 'null' => true])
            ->addIndex('first_name')
            ->addIndex('middle_name')
            ->addIndex('last_name')
            ->addIndex('email', ['unique' => true])
            ->addIndex('created_by')
            ->addIndex('modified_by')
            ->save();

        $this->execute('INSERT INTO users (id, active, first_name, last_name, email, password, created, modified)
                        VALUES (1, 1, "John", "Jones", "jjones@example.com", "123456", NOW(), NOW())');
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('users');
    }
}