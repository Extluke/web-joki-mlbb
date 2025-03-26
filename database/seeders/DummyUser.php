<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userData = [
            [
                'name'=>'amad',
                'email'=>'amad@telu',
                'role'=>'user',
                'password'=>bcrypt('user123'),
            ]
        ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
