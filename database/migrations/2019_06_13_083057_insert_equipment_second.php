<?php

use App\Equipment;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertEquipmentSecond extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $avatars=[
            ['name' => 'tomato',
                'type' => 'avatar',
                'img' => 'img/avatars/tomato.svg',
                'imgBig' => 'img/avatars/big/tomato.svg',
                'unlock_level' => '0'
            ],
            ['name' => 'radish',
                'type' => 'avatar',
                'img' => 'img/avatars/radish.svg',
                'imgBig' => 'img/avatars/big/radish.svg',
                'unlock_level' => '1'
            ],
            ['name' => 'corn',
                'type' => 'avatar',
                'img' => 'img/avatars/corn.svg',
                'imgBig' => 'img/avatars/big/corn.svg',
                'unlock_level' => '2'
            ],
            ['name' => 'bell-pepper',
                'type' => 'avatar',
                'img' => 'img/avatars/bell-pepper.svg',
                'imgBig' => 'img/avatars/big/bell-pepper.svg',
                'unlock_level' => '3'
            ],
            ['name' => 'red-cabbage',
                'type' => 'avatar',
                'img' => 'img/avatars/red-cabbage.svg',
                'imgBig' => 'img/avatars/big/red-cabbage.svg',
                'unlock_level' => '4'
            ],
        ];
        Equipment::insert($avatars);


        $weapons = [

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
        ];
        Equipment::insert($weapons);

        $shields=[

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

        ];
        Equipment::insert($shields);

        $other=[
            //other
            ['name' => 'logo',
                'type' => 'other',
                'img' => 'img/avatars/logo.svg',
                'unlock_level' => '0'
            ],
        ];
        Equipment::insert($other);
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
