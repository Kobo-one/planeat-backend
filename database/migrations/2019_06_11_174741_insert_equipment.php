<?php

use App\Equipment;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data=[
            ['name' => 'broccoli',
                'type' => 'avatar',
                'img' => 'img/avatars/broccoli.svg',
                'unlock_level' => '0'
            ],
            ['name' => 'radish',
                'type' => 'avatar',
                'img' => 'img/avatars/radish.svg',
                'unlock_level' => '1'
            ],
            ['name' => 'corn',
                'type' => 'avatar',
                'img' => 'img/avatars/corn.svg',
                'unlock_level' => '2'
            ],
            ['name' => 'artichoke',
                'type' => 'avatar',
                'img' => 'img/avatars/artichoke.svg',
                'unlock_level' => '3'
            ],

            ['name' => 'sword1',
                'type' => 'weapon',
                'img' => 'img/weapons/sword1.svg',
                'unlock_level' => '0'
            ],
            ['name' => 'axe1',
                'type' => 'weapon',
                'img' => 'img/weapons/axe1.svg',
                'unlock_level' => '1'
            ],
            ['name' => 'sword2',
                'type' => 'weapon',
                'img' => 'img/weapons/sword2.svg',
                'unlock_level' => '2'
            ],
            ['name' => 'sword3',
                'type' => 'weapon',
                'img' => 'img/weapons/sword3.svg',
                'unlock_level' => '3'
            ],

            ['name' => 'shield1',
                'type' => 'shield',
                'img' => 'img/shields/shield1.svg',
                'unlock_level' => '0'
            ],
            ['name' => 'shield2',
                'type' => 'shield',
                'img' => 'img/shields/shield2.svg',
                'unlock_level' => '1'
            ],

            //other
            ['name' => 'logo',
                'type' => 'other',
                'img' => 'img/avatars/logo.svg',
                'unlock_level' => '0'
            ],

        ];
        Equipment::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
