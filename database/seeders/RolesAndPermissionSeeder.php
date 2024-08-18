<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accountant = Role::create(['name' => 'Accountant']);
        $supervisor = Role::create(['name' => 'Supervisor']);
        $admin = Role::create(['name' => 'Admin']);
    
        // Create permissions
        $createPayment = Permission::create(['name' => 'create-payment']);
        $Sport = Permission::create(['name' => 'manage-sport']);
        $manageArticle = Permission::create(['name' => 'manage-article']);
    
        // Assign permissions to roles
        $accountant->permissions()->attach($createPayment->id);
        $supervisor->permissions()->attach($Sport->id);
        $admin->permissions()->attach([$createPayment->id, $Sport->id, $manageArticle->id]);
    
    }}