<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('cars')
            ->addColumn('plate', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('registration', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('expiry', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('photo', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('photo_dir', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('photo_size', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('photo_type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('companies')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('photo', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('address', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('contact', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('photo_dir', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('photo_size', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('photo_type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('drivers')
            ->addColumn('license', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('expires', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('permissions')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('role_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'role_id',
                ]
            )
            ->create();

        $this->table('roles')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('roles_users', ['id' => false, 'primary_key' => ['user_id', 'role_id']])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('role_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'role_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('trips', ['id' => false, 'primary_key' => ['id', 'company_id']])
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('company_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('client', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('phone', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('pick_up_time', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('appointment_time', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('pick_up_address', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('pick_up_city', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('drop_off_address', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('drop_off_city', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('comments', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'timestamp', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('distance', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('complete', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('start_lat', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 8,
            ])
            ->addColumn('start_long', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 11,
                'scale' => 8,
            ])
            ->addColumn('drop_lat', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 8,
            ])
            ->addColumn('drop_long', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 11,
                'scale' => 8,
            ])
            ->addIndex(
                [
                    'company_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('users')
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('contact', 'string', [
                'default' => null,
                'limit' => 25,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => true,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => true,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('company_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('api_key_plain', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => true,
            ])
            ->addColumn('api_key', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => true,
            ])
            ->addColumn('digest_hash', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('photo', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('photo_dir', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('photo_size', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('photo_type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addIndex(
                [
                    'company_id',
                ]
            )
            ->create();

        $this->table('cars')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('drivers')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('roles_users')
            ->addForeignKey(
                'role_id',
                'roles',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('trips')
            ->addForeignKey(
                'company_id',
                'companies',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                'company_id',
                'companies',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('cars')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('drivers')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('roles_users')
            ->dropForeignKey(
                'role_id'
            )
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('trips')
            ->dropForeignKey(
                'company_id'
            )
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('users')
            ->dropForeignKey(
                'company_id'
            )->save();

        $this->table('cars')->drop()->save();
        $this->table('companies')->drop()->save();
        $this->table('drivers')->drop()->save();
        $this->table('permissions')->drop()->save();
        $this->table('roles')->drop()->save();
        $this->table('roles_users')->drop()->save();
        $this->table('trips')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
