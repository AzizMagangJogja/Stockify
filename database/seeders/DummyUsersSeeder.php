<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData=[
            [
                'id'=>'1',
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'admin'
            ], [
                'id'=>'2',
                'name'=>'Manajer',
                'email'=>'manager@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'manager'
            ], [
                'id'=>'3',
                'name'=>'Staff',
                'email'=>'staff@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'staff'
            ] 
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}