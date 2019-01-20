<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'first_name' => 'Douglas',
                'last_name' => 'Were',
                'contact' => '9784579809',
                'email' => 'weredouglas@gmail.com',
                'password' => '123456',
                'type' => 'Primary',
                'company_id' => NULL,
                'api_key_plain' => NULL,
                'api_key' => NULL,
                'digest_hash' => NULL,
                'photo' => '',
            ],
            [
                'id' => '2',
                'first_name' => 'Shamim',
                'last_name' => 'Were',
                'contact' => '256782481746',
                'email' => 'shamim@gmail.com',
                'password' => 'Admin',
                'type' => 'Driver',
                'company_id' => '1',
                'api_key_plain' => '123456',
                'api_key' => '123456',
                'digest_hash' => '123123',
                'photo' => '',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
