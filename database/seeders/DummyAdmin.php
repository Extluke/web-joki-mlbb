<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userData = [
            [
                'name'=>'Admin',
                'email'=>'Admin@telu',
                'role'=>'admin',
                'password'=>bcrypt('admin123'),
            ],
            [
                'name'=>'Adminkikir',
                'email'=>'Adminkikir@telu',
                'role'=>'admin',
                'password'=>bcrypt('adminkikir123'),
            ]
        ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
