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
                'password' => '$2y$10$xsoCFcdFddDwtHhowws/Gu5CORdYXja5pnC9p6jhGW0J4aP6IVQaq',
                'type' => 'Management',
                'company_id' => '2',
                'api_key_plain' => '45c2de29ced0c30b3296e40cdc24c19afe286ab2124e4ced34fce0751fd2afa4',
                'api_key' => '$2y$10$5omcU0j5N2ISlUXQFdtIDOdF6OPrgeLe78UAUQ0L0E6jLBEFnCGvi',
                'digest_hash' => '4261bda16d464fb3a6334d3a42090a1f',
                'photo' => 'Passport.jpg',
                'photo_dir' => 'webroot\\files\\Users\\photo\\',
                'photo_size' => '127651',
                'photo_type' => 'image/jpeg',
                'activated' => 'yes',
            ],
            [
                'id' => '2',
                'first_name' => 'Shamim',
                'last_name' => 'Were',
                'contact' => '256782481746',
                'email' => 'shamim@gmail.com',
                'password' => '$2y$10$bIuOVgV/mUY5a6Hg0ZTE1uIeJcIv.hmz1b1ODEQL7CPhVhrZyPTyG',
                'type' => 'Administrator',
                'company_id' => '2',
                'api_key_plain' => 'e83f3e5ab16ef2216879580bfcc646672a257d84a24b490d2fdda24ad4bc439b',
                'api_key' => '$2y$10$4I3vp77qT6ekK.555Dz4iO7bM27FtP8m60QvsRh6X0miurX1ga7iW',
                'digest_hash' => '4261bda16d464fb3a6334d3a42090a1f',
                'photo' => 'wify.jpg',
                'photo_dir' => 'webroot\\files\\Users\\photo\\',
                'photo_size' => '79697',
                'photo_type' => 'image/jpeg',
                'activated' => 'yes',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
