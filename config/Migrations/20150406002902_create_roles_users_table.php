<?php

use Phinx\Migration\AbstractMigration;

class CreateRolesUsersTable extends AbstractMigration
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
        $this->table('roles_users', ['id' => false, 'primary_key' => ['role_id', 'user_id']])
            ->addColumn('role_id', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('user_id', 'integer', ['signed' => false, 'null' => false])
            ->addIndex('role_id')
            ->addIndex('user_id')
            ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('roles_users');
    }
}