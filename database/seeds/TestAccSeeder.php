<?php

use App\Family;
use App\FamilyMember;
use App\User;
use Illuminate\Database\Seeder;

class TestAccSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate([
            'name' => "Test"],
            [
                'email' => "test@planeat.com",
                'password' => bcrypt('test'),
            ]);

        $family = Family::updateOrCreate([
            'user_id' => $user->id,],
            [
                'completed_tutorial' => '0',
            ]);

        $member = FamilyMember::updateOrCreate([
            'name' => 'Parent',],
            [
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

        $member = FamilyMember::updateOrCreate([
            'name' => 'Child',],
            [
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
