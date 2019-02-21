<?php

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if ($this->command->confirm('Do you wish to refresh migration before seeding, Make sure it will clear all old data ?')) {
            $this->command->call('migrate:refresh');
            $this->command->warn("Data deleted, starting from fresh database.");
    }
    $permissions = Permission::defaultPermissions();
    foreach ($permissions as $permission) {
        Permission::firstOrCreate(['name' => $permission]);
    }
    $this->command->info('Default Permissions added.');
    if ($this->command->confirm('Create Roles for user, default is admin and user? [y|N]', true)) {
        // Ask for roles from input
        $roles = $this->command->ask('Enter roles in comma separate format.', 'Admin,User');
        // Explode roles
        $rolesArray = explode(',', $roles);
        // add roles
        foreach($rolesArray as $role) {
            $role = Role::firstOrCreate(['name' => trim($role)]);
            if( $role->name == 'Admin' ) {
                // assign all permissions to admin role
                $role->permissions()->sync(Permission::all());
                $this->command->info('Admin will have full rights');
            } else {
                // for others, give access to view only
                $role->permissions()->sync(Permission::where('name', 'LIKE', 'view_%')->get());
            }
            // create one user for each role
            $this->createUser($role);
        }
        $this->command->info('Roles ' . $roles . ' added successfully');
    } else {
        Role::firstOrCreate(['name' => 'User']);
        $this->command->info('By default, User role added.');
    }

}
/**
 * Create a user with given role
 *
 * @param $role
 */
private function createUser($role)
{
    $user = factory(User::class)->create();
    $user->assignRole($role->name);
    if( $role->name == 'Admin' ) {
        $this->command->info('Admin login details:');
        $this->command->warn('Username : '.$user->email);
        $this->command->warn('Password : "secret"');
    }
}

}
