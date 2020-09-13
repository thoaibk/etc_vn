<?php


use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table(config('permission.table_names.model_has_permissions'))->truncate();
        DB::table(config('permission.table_names.model_has_roles'))->truncate();
        DB::table(config('permission.table_names.permissions'))->truncate();
        DB::table(config('permission.table_names.roles'))->truncate();

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = config('permission.seed.permissions');
        foreach ($permissions as $permission){
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }

        $roles = config('permission.seed.roles');
        foreach ($roles as $role){
            $newRole = \Spatie\Permission\Models\Role::create(['name' => $role['name']]);
            $newRole->givePermissionTo($role['allow_permissions']);
        }
    }
}
