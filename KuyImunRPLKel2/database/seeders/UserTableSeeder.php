<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserSuperAdmin;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = array(
            array(
                "username" => "superadmin",
                "email" => "superadmin@email.com",
                "password" => "superadmin",
                "role" => "super_admin",
                "name" => "Super Admin",
            ),
        );

        foreach($arr as $user){
            $temp = User::create([
                'username' => strtolower($user['username']),
                'email' => strtolower($user['email']),
                'password' => Hash::make($user['password']),
                'role' => $user['role']
            ]);

            UserSuperAdmin::create([
                'user_id' => $temp->id,
                'name' => $user['name'],
            ]);
        }
    }
}
