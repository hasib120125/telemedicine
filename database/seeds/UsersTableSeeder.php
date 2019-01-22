<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        // User::truncate();

        $users = [
            [
                'first_name' => 'Mr.',
                'last_name' => 'Admin',
                'phone' => '01725651254',
                'country' => 'Admin',
                'area' => 'Mirpur',
                'thana' => 'Mirpur',
                'district' => 'Dhaka',
                'username' => 'sa',
                'email' => 'sa@robi.com',
                'password' => bcrypt('admin'),
                'confirm_password' => bcrypt('admin'),
                'user_type' => 'admin',
                'status' => '1',
            ],
        ];
        foreach ($users as $key => $value) {
            $user = new User();
            $user->fill($value);
            $user->save();  
        }
    }
}
