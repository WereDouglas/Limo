<?php
use Migrations\AbstractSeed;

/**
 * Companies seed.
 */
class CompaniesSeed extends AbstractSeed
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
                'name' => 'Brooks',
                'photo' => 'logo.png',
                'address' => '159 Overland Road',
                'contact' => '98832423423',
                'photo_dir' => 'webroot\\files\\Companies\\photo\\',
                'photo_size' => '16367',
                'photo_type' => 'image/png',
                'email' => NULL,
                'activated' => '',
            ],
            [
                'id' => '2',
                'name' => 'Omnierps',
                'photo' => 'omnierps_logo.png',
                'address' => '220 Merrill Ln, APT 4',
                'contact' => '9784579809',
                'photo_dir' => 'webroot\\files\\Companies\\photo\\',
                'photo_size' => '8130',
                'photo_type' => 'image/png',
                'email' => NULL,
                'activated' => 'yes',
            ],
        ];

        $table = $this->table('companies');
        $table->insert($data)->save();
    }
}
