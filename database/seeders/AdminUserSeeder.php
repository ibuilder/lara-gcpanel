<?php
// filepath: database/seeders/AdminUserSeeder.php
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Company; // Import Company model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure roles exist first
        if (Role::count() == 0) {
            $this->command->call('db:seed', ['--class' => 'RoleSeeder']);
        }

        // Optional: Create a default company if none exist
        $company = Company::first();
        if (!$company) {
            $company = Company::create(['name' => 'Default Admin Company']);
        }

        // Get the administrator role
        $adminRole = Role::where('name', 'administrator')->first();

        if ($adminRole) {
            // Check if admin user already exists
            $adminUser = User::where('email', 'admin@gcpanel.com')->first();

            if (!$adminUser) {
                // Create the admin user
                $adminUser = User::create([
                    'name' => 'Admin User',
                    'email' => 'admin@gcpanel.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'), // Change this in production!
                    'company_id' => $company->id, // Assign to company
                ]);

                // Attach the administrator role using the pivot table relationship
                $adminUser->roles()->attach($adminRole->id);

                $this->command->info('Admin user created successfully.');
                $this->command->info('Email: admin@gcpanel.com');
                $this->command->info('Password: password'); // Remind to change
            } else {
                // Ensure existing admin user has the role
                if (!$adminUser->hasRole('administrator')) {
                    $adminUser->roles()->syncWithoutDetaching([$adminRole->id]); // Use syncWithoutDetaching
                    $this->command->info('Administrator role assigned to existing admin@gcpanel.com user.');
                } else {
                     $this->command->info('Admin user admin@gcpanel.com already exists with the administrator role.');
                }
            }
        } else {
            $this->command->error('Administrator role not found. Run RoleSeeder first.');
        }
    }
}