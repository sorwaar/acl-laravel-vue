<?php

use Illuminate\Database\Seeder;

class MenuPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acl_menu_permissions')->delete();
        DB::table('acl_menu_permissions')->insert(
            [
                // for store modules
                ['role_id' => 1,'menu_id' => 1], ['role_id' => 2,'menu_id' => 1],
                ['role_id' => 1,'menu_id' => 2],['role_id' => 2,'menu_id' => 2],
                ['role_id' => 1,'menu_id' => 3],['role_id' => 2,'menu_id' => 3],
                ['role_id' => 1,'menu_id' => 4],['role_id' => 2,'menu_id' => 4],
                ['role_id' => 1,'menu_id' => 5],['role_id' => 2,'menu_id' => 5],
                ['role_id' => 1,'menu_id' => 6],['role_id' => 2,'menu_id' => 6],
                ['role_id' => 1,'menu_id' => 7],['role_id' => 2,'menu_id' => 7],
//                ['role_id' => 1,'menu_id' => 8],['role_id' => 2,'menu_id' => 8],
//                ['role_id' => 1,'menu_id' => 9],['role_id' => 2,'menu_id' => 9],
//                ['role_id' => 1,'menu_id' => 10],['role_id' => 2,'menu_id' => 10],
//                ['role_id' => 1,'menu_id' => 11],['role_id' => 2,'menu_id' => 11],
//                ['role_id' => 1,'menu_id' => 12],['role_id' => 2,'menu_id' => 12],
//                ['role_id' => 1,'menu_id' => 13],['role_id' => 2,'menu_id' => 13],
//                ['role_id' => 1,'menu_id' => 14],['role_id' => 2,'menu_id' => 14],
//                ['role_id' => 1,'menu_id' => 15],['role_id' => 2,'menu_id' => 15],
//                ['role_id' => 1,'menu_id' => 17],['role_id' => 2,'menu_id' => 17],

                // for production modules
                ['role_id' => 3,'menu_id' => 1],
                ['role_id' => 3,'menu_id' => 2],
                ['role_id' => 3,'menu_id' => 3],
                ['role_id' => 3,'menu_id' => 4],
                ['role_id' => 3,'menu_id' => 5],
                ['role_id' => 3,'menu_id' => 6],
                ['role_id' => 3,'menu_id' => 7],
//                ['role_id' => 3,'menu_id' => 16],
//                ['role_id' => 3,'menu_id' => 17],
            ]
        );
    }
}
