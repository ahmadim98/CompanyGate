<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Hash;

class UsersData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'empid' => 1001,
            'username' => 'abdulaziz',
            'email' => 'abdulaziz@companygate.com',
            'password' => Hash::make('12345678'),
            'role' => 'manager'
        ],
        [
            'empid' => 1002,
            'username' => 'khaled',
            'email' => 'khaled@companygate.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ],
        [
            'empid' => 1003,
            'username' => 'malaa',
            'email' => 'malaa@companygate.com',
            'password' => Hash::make('12345678'),
            'role' => 'employer'
        ],
        [
            'empid' => 1006,
            'username' => 'mali',
            'email' => 'mali@companygate.com',
            'password' => Hash::make('12345678'),
            'role' => 'employer'
        ],
        [
            'empid' => 1008,
            'username' => 'layla',
            'email' => 'layla@companygate.com',
            'password' => Hash::make('12345678'),
            'role' => 'employer'
        ],
        [
            'empid' => 1013,
            'username' => 'ahussain',
            'email' => 'ahussain@companygate.com',
            'password' => Hash::make('12345678'),
            'role' => 'writer'
        ],
        [
            'empid' => 1014,
            'username' => 'smuhanned',
            'email' => 'smuhanned@companygate.com',
            'password' => Hash::make('12345678'),
            'role' => 'writer'
        ],
        [
            'username' => 'hassansupport',
            'email' => 'ahussain@anothercompany.com',
            'password' => Hash::make('12345678'),
            'role' => 'employer'
        ],
        [
            'username' => 'muhannedsupport',
            'email' => 'smuhanned@anothercompany.com',
            'password' => Hash::make('12345678'),
            'role' => 'employer'
        ],
        [
            'empid' => 1021,
            'username' => 'muhahmad',
            'email' => 'muhahmad@companygate.com',
            'password' => Hash::make('12345678'),
            'role' => 'manager'
        ],
        [
            'empid' => 1031,
            'username' => 'kkhaled',
            'email' => 'kkhaled@companygate.com',
            'password' => Hash::make('12345678'),
            'role' => 'manager'
        ],
        [
            'empid' => 1032,
            'username' => 'kdhafer',
            'email' => 'kdhafer@companygate.com',
            'password' => Hash::make('12345678'),
            'role' => 'employer'
        ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
