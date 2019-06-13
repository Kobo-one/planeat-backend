<?php

use App\Family;
use App\FamilyMember;
use App\FamilyMemberDifficultIngredient;
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
            'level' => '1',
            'xp' => '0',
            'avatar_id' => '37',
            'weapon_id' => null,
            'shield_id' => null,
        ]);
        $member->assignRole('Parent');

        $member = FamilyMember::updateOrCreate([
            'name' => 'Child',],
            [
            'pincode' => '',
            'birthday' => now()->toDate(),
            'family_id' => $family->id,
            'level' => '1',
            'xp' => '0',
            'avatar_id' => 26,
            'weapon_id' => null,
            'shield_id' => null,
        ]);
        $member->assignRole('Child');

        FamilyMemberDifficultIngredient::updateOrCreate([
            'ingredient_id' => 8,
            'family_member_id'=>$member->id,],
            [
            'times_tried' => 0
        ]);

        FamilyMemberDifficultIngredient::updateOrCreate([
            'ingredient_id' => 12,
            'family_member_id' => $member->id,],
            [
                'times_tried' => 0
            ]);
        FamilyMemberDifficultIngredient::updateOrCreate([
            'ingredient_id' => 6,
            'family_member_id' => $member->id,],
            [
                'times_tried' => 0
            ]);

    }
}
