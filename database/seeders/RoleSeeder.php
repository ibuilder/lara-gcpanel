<?php
// filepath: database/seeders/RoleSeeder.php
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear table first
        DB::table('roles')->delete();

        $roles = [
            ['name' => 'administrator', 'display_name' => 'Administrator', 'description' => 'Full access to the system.'],
            ['name' => 'editor', 'display_name' => 'Editor', 'description' => 'Can create, read, and update records.'],
            ['name' => 'contributor', 'display_name' => 'Contributor', 'description' => 'Can create and read records.'],
            ['name' => 'viewer', 'display_name' => 'Viewer', 'description' => 'Can only read records.'],
            ['name' => 'restricted', 'display_name' => 'Restricted', 'description' => 'No access to modules.'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}