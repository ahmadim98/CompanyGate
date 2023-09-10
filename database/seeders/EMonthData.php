<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Emonth;

class EMonthData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emonths = [
            [
                'name' => 'بدر احمد بدر',
                'department' => 'قسم الموارد البشرية',
                'month' => 1,
                'year' => 2022,
            ],
            [
                'name' => 'ليلى احمد محمد',
                'department' => 'قسم جودة البرمجيات',
                'month' => 2,
                'year' => 2022,
            ],
            [
                'name' => 'خالد بدر احمد',
                'department' => 'قسم تطوير البرامج',
                'month' => 3,
                'year' => 2022,
            ],
            [
                'name' => 'علي بن حسين',
                'department' => 'الادارة العامة',
                'month' => 4,
                'year' => 2022,
            ],
            [
                'name' => 'علي بن بدر',
                'department' => 'ادارة الدعم الفني',
                'month' => 5,
                'year' => 2022,
            ],
            [
                'name' => 'محمد حمد',
                'department' => 'قسم جودة البرمجيات',
                'month' => 6,
                'year' => 2022,
            ],
            [
                'name' => 'حاتم بن ابراهيم',
                'department' => 'ادارة البنية التحتية التقنية',
                'month' => 7,
                'year' => 2022,
            ],
            [
                'name' => 'بدر محمد بدر',
                'department' => 'قسم الموارد البشرية',
                'month' => 8,
                'year' => 2022,
            ],
            [
                'name' => 'نورة بنت محمد',
                'department' => 'قسم تطوير البرامج',
                'month' => 9,
                'year' => 2022,
            ]
        ];

        foreach($emonths as $emonth){
            Emonth::create($emonth);
        }
    }
}
