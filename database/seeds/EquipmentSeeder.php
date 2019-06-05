<?php

use App\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            [
                'name' => 'first weapon',
                'type' => 'weapon',
                'img' => '/img/icon-logo.svg',
                'unlock_level' => '0',
            ],
            [
                'name' => 'first avatar',
                'type' => 'avatar',
                'img' => '/img/icon-logo.svg',
                'unlock_level' => '0',
            ],
            [
                'name' => 'first shield',
                'type' => 'shield',
                'img' => '/img/icon-logo.svg',
                'unlock_level' => '0',
            ],
        ];
        $equipment = Equipment::insert($data);
    }
}
