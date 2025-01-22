<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name'=>'Aryo',
                'email'=>'aryo@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'admin'
            ], [
                'id'=>'2',
                'name'=>'Anjar',
                'email'=>'anjar@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'manager'
            ], [
                'id'=>'3',
                'name'=>'Suryo',
                'email'=>'suryo@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'staff'
            ] 
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}