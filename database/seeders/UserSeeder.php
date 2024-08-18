<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'ahmad',
            'email'=>'ahmad@gmail.com',
            'password'=>'DonyDara#123',
            'role_id'=>1]);
        User::create([
            'name'=>'walaa',
            'email'=>'walaa@gmail.com',
            'password'=>'DonyDara#123',
            'role_id'=>2]);
        User::create([
            'name'=>'zaina',
            'email'=>'zaina@gmail.com',
            'password'=>'DonyDara#123',
            'role_id'=>3]);
    }
}
