<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Employer;
use Hash;

class DefaultAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  Store data in database
        Employer::create([
            'empID' => 1,
            'name' => 'احمد بن ابراهيم',
            'email' => 'ahmad@companygate.com',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'phone' => '0554433221',
            'ext' => '2138',
            'position'=>'مالك الشركة',
            'department' => 'مجلس الادارة'
        ]);

        User::create([
            'empid' => 1,
            'username' => 'ahmad',
            'email' => 'ahmad@companygate.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);
    }
}
