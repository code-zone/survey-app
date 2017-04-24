<?php

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $config = [
            [
                'value' => 'Mobile Social Software Learnability Index',
                'key' => 'site_name',
            ],
            [
                'key' => 'author',
                'value' => 'Nelson Masese',
            ],
            [
                'key' => 'phone',
                'value' => '',
            ],
            [
                'key' => 'secondary_phone',
                'value' => '',
            ],
            [
                'key' => 'email',
                'value' => '',
            ],
            [
                'key' => 'site_email',
                'value' => '',
            ],
            [
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nam magnam natus tempora cumque, aliquam deleniti voluptatibus voluptas. Repellat vel, et itaque commodi iste ab, laudantium voluptas deserunt nobis',
                'key' => 'about',
            ],
        ];
        foreach ($config as $value) {
            DB::table('configs')->insert($value);
        }
    }
}
