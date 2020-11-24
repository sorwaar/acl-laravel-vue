<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();

        DB::table('users')->delete();
        DB::table('users')->insert(
            [
                ['name'=>'AUKO Tex Admin','role_id'=>1,'username' => 'admin','password' => bcrypt('123'), 'remember_token' => str_random(10), 'status' => '1', 'created_at' => $time, 'created_by' => 1],
                ['name'=>'Store Admin','role_id'=>2,'username' => 'store','password' => bcrypt('123'), 'remember_token' => str_random(10), 'status' => '1', 'created_at' => $time, 'created_by' => 1],
                ['name'=>'Production Admin','role_id'=>3,'username' => 'production','password' => bcrypt('123'), 'remember_token' => str_random(10), 'status' => '1', 'created_at' => $time, 'created_by' => 1],
            ]
        );
    }
}
