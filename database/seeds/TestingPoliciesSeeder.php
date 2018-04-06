<?php

use Illuminate\Database\Seeder;

class TestingPoliciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //USERS CRUD
        DB::table('policies')->insert([
            'policy' => 'indexUser',
            'section_id' => '1',
            'role1'=>'1'
        ]);
        DB::table('policies')->insert([
            'policy' => 'createUser',
            'section_id' => '1',
            'role1'=>'1'
        ]);
        DB::table('policies')->insert([
            'policy' => 'updateUser',
            'section_id' => '1',
            'role1'=>'1'
        ]);
        DB::table('policies')->insert([
            'policy' => 'readUser',
            'section_id' => '1',
            'role1'=>'1'
        ]);
        DB::table('policies')->insert([
            'policy' => 'deleteUser',
            'section_id' => '1',
            'role1'=>'1'
        ]);

        //FULL ACCESS (SECTIONS & POLICIES)
        DB::table('policies')->insert([
            'policy' => 'fullAccess',
            'section_id' => '1',
            'role1'=>'1'
        ]);

    }
}
