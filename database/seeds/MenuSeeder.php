<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $modules = \App\Model\ACL\AclModule::get();
        $administrationModuleId = null;


        foreach ($modules as $module){
            if ($module->name == 'Administration'){
                $administrationModuleId = $module->id;
            }
        }
        DB::table('acl_menus')->delete();
        DB::table('acl_menus')->insert([
            ['id' => 1,'parent_id' => 0,'action'=>NULL,'name'  => 'Manage Role', 'menu_url'  => NULL, 'module_id'  => $administrationModuleId, 'status'  => '1','module_group_id'=>$administrationModuleId.'.01'],
            ['id' => 2,'parent_id' => 1,'action'=>NULL,'name'  => 'Add Role', 'menu_url'  => 'role.create', 'module_id'  => $administrationModuleId, 'status'  => '1','module_group_id'=>$administrationModuleId.'.02'],
            ['id' => 3,'parent_id' => 2,'action'=> 2,'name'  => 'Add', 'menu_url'  => 'role.store', 'module_id'  => $administrationModuleId, 'status'  => '1','module_group_id'=>$administrationModuleId.'.03'],
            ['id' => 4,'parent_id' => 2,'action'=> 2,'name'  => 'Edit', 'menu_url'  => 'role.edit', 'module_id'  => $administrationModuleId, 'status'  => '1','module_group_id'=>$administrationModuleId.'.04'],
            ['id' => 5,'parent_id' => 2,'action'=> 2,'name'  => 'Delete', 'menu_url'  => 'role.destroy', 'module_id'  => $administrationModuleId, 'status'  => '1','module_group_id'=>$administrationModuleId.'.05'],
            ['id' => 6,'parent_id' => 1,'action'=>NULL,'name'  => 'Role Permission', 'menu_url'  => 'permission.index', 'module_id'  => $administrationModuleId, 'status'  => '1','module_group_id'=>$administrationModuleId.'.05'],
            ['id' => 7,'parent_id' => 0,'action'=>NULL,'name'  => 'Add User', 'menu_url'  => 'user-registration.create', 'module_id'  =>  $administrationModuleId, 'status'  => '1','module_group_id'=>$administrationModuleId.'.06'],
            ['id' => 8,'parent_id' => 7,'action'=>7,'name'  => 'Add User', 'menu_url'  => 'user-registration.store', 'module_id'  =>  $administrationModuleId, 'status'  => '1','module_group_id'=>$administrationModuleId.'.07'],
            ['id' => 9,'parent_id' => 7,'action'=>7,'name'  => 'Add User', 'menu_url'  => 'user-registration.edit', 'module_id'  =>  $administrationModuleId, 'status'  => '1','module_group_id'=>$administrationModuleId.'.08'],
            ['id' => 10,'parent_id' => 7,'action'=>7,'name'  => 'Add User', 'menu_url'  => 'user-registration.destroy', 'module_id'  =>  $administrationModuleId, 'status'  => '1','module_group_id'=>$administrationModuleId.'.09'],
        ]);

    }
}
