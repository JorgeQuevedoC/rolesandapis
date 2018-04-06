<?php

use Illuminate\Database\Seeder;

class PrivilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privileges')->insert([
            'role_header' => 'role1',
            'privilege' => 'director',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role2',
            'privilege' => 'general manager',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role3',
            'privilege' => 'fc senior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role4',
            'privilege' => 'fc junior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role5',
            'privilege' => 'quotation senior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role6',
            'privilege' => 'quotation junior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role7',
            'privilege' => 'fuel senior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role8',
            'privilege' => 'fuel junior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role9',
            'privilege' => 'membership senior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role10',
            'privilege' => 'membership junior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role11',
            'privilege' => 'accounting senior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role12',
            'privilege' => 'accounting junior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role13',
            'privilege' => 'customer service senior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role14',
            'privilege' => 'customer service junior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role15',
            'privilege' => 'it senior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role16',
            'privilege' => 'it junior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role17',
            'privilege' => 'hr senior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role18',
            'privilege' => 'hr junior',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role19',
            'privilege' => 'trainee',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role20',
            'privilege' => 'fltplan customer',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role21',
            'privilege' => 'cst customer pro',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role22',
            'privilege' => 'cst customer',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role23',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role24',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role25',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role26',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role27',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role28',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role29',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role30',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role31',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role32',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role33',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role34',
            'privilege' => 'empty',
        ]);

        DB::table('privileges')->insert([
            'role_header' => 'role35',
            'privilege' => 'empty',
        ]);
    }
}
