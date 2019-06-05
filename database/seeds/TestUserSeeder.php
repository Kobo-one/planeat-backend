<?php

use App\Family;
use App\FamilyMember;
use App\User;
use Illuminate\Database\Seeder;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate([
            'name' => "Kobe Christiaensen"],
            [
                'email' => "kobe.christiaensen@hotmail.com",
                'password' => bcrypt('root'),
            ]);
        $user->assignRole('Super Admin');

        $family = Family::create([
            'completed_tutorial' => '0',
            'user_id' => $user->id,
        ]);

        $member = FamilyMember::create([
            'name' => 'Kobo Parent',
            'pincode' => bcrypt('1234'),
            'birthday' => now()->toDate(),
            'family_id' => $family->id,
            'level' => '0',
            'xp' => '0',
            'avatar_id' => '2',
            'weapon_id' => '1',
            'shield_id' => '3',
        ]);
        $member->assignRole('Parent');

        $member = FamilyMember::create([
            'name' => 'Kobo Child',
            'pincode' => '',
            'birthday' => now()->toDate(),
            'family_id' => $family->id,
            'level' => '0',
            'xp' => '0',
            'avatar_id' => '2',
            'weapon_id' => '1',
            'shield_id' => '3',
        ]);
        $member->assignRole('Child');


    }
}
