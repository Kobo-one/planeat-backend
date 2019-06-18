<?php

use App\Equipment;
use App\Family;
use App\FamilyMember;
use App\FamilyMemberDifficultIngredient;
use App\User;
use Illuminate\Database\Seeder;

class JuryAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logo = Equipment::where('type','other')->first();
        $avatar = Equipment::where('type','avatar')->first();

        $user = User::updateOrCreate([
            'name' => "Jury account"],
            [
                'email' => "jury@planeat.app",
                'password' => bcrypt('verysafe'),
            ]);

        $family = Family::updateOrCreate([
            'user_id' => $user->id,],
            [
                'completed_tutorial' => '0',
            ]);

        $parent = FamilyMember::updateOrCreate([
            'name' => 'David',
            'family_id' => $family->id,],
            [
                'pincode' => bcrypt('1234'),
                'birthday' => now()->toDate(),

                'level' => '1',
                'xp' => '0',
                'avatar_id' => $logo->id,
                'weapon_id' => null,
                'shield_id' => null,
            ]);
        $parent->assignRole('Parent');

        $child1 = FamilyMember::updateOrCreate([
            'name' => 'Pham',
            'family_id' => $family->id,],
            [
                'pincode' => '',
                'birthday' => now()->toDate(),

                'level' => '1',
                'xp' => '250',
                'avatar_id' => $avatar->id,
                'weapon_id' => null,
                'shield_id' => null,
            ]);
        $child1->assignRole('Child');

        $child2 = FamilyMember::updateOrCreate([
            'name' => 'Thomas',
            'family_id' => $family->id,],
            [
                'pincode' => '',
                'birthday' => now()->toDate(),

                'level' => '1',
                'xp' => '50',
                'avatar_id' => $avatar->id,
                'weapon_id' => null,
                'shield_id' => null,
            ]);

        $child2->assignRole('Child');

        $child3 = FamilyMember::updateOrCreate([
            'name' => 'Kobe',
            'family_id' => $family->id,],
            [
                'pincode' => '',
                'birthday' => now()->toDate(),

                'level' => '1',
                'xp' => '120',
                'avatar_id' => $avatar->id,
                'weapon_id' => null,
                'shield_id' => null,
            ]);
        $child3->assignRole('Child');

        $children = $family->children;

        foreach ($children as $child) {
            $child->checkForLevelUp();
            FamilyMemberDifficultIngredient::updateOrCreate([
                'ingredient_id' => 12,
                'family_member_id' => $child->id,],
                [
                    'times_tried' => 0
                ]);

            FamilyMemberDifficultIngredient::updateOrCreate([
                'ingredient_id' => 9,
                'family_member_id' => $child->id,],
                [
                    'times_tried' => 2
                ]);

            FamilyMemberDifficultIngredient::updateOrCreate([
                'ingredient_id' => 43,
                'family_member_id' => $child->id,],
                [
                    'times_tried' => 0
                ]);

            FamilyMemberDifficultIngredient::updateOrCreate([
                'ingredient_id' => 44,
                'family_member_id' => $child->id,],
                [
                    'times_tried' => 0
                ]);

            FamilyMemberDifficultIngredient::updateOrCreate([
                'ingredient_id' => 45,
                'family_member_id' => $child->id,],
                [
                    'times_tried' => 0
                ]);

            FamilyMemberDifficultIngredient::updateOrCreate([
                'ingredient_id' => 46,
                'family_member_id' => $child->id,],
                [
                    'times_tried' => 0
                ]);

            FamilyMemberDifficultIngredient::updateOrCreate([
                'ingredient_id' => 10,
                'family_member_id' => $child->id,],
                [
                    'times_tried' => 2
                ]);
        }
    }
}
