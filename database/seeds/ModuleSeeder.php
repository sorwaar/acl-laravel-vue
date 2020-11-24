<?php

use Illuminate\Database\Seeder;


class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acl_modules')->truncate();
        DB::table('acl_modules')->insert(
            [
                ['id' => 1, 'name' => 'Administration','icon_class' => 'fa fa-id-card'],
            ]
        );
    }
}
