<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Cawards;

class CAwardsData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cawards = [[
            'name' => 'افضل شركة في الشرق الاوسط',
            'issuer' => 'منظمة التجارة العالمية',
            'location' => 'واشنطن',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'award_date' => '2022-01-01',
        ],
        [
            'name' => 'اعلى نسبة تطبيق سعودة',
            'issuer' => 'صندوق هدف ',
            'location' => 'الرياض',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'award_date' => '2022-02-01',
        ],
        [
            'name' => 'ISO 9001 Certificate',
            'issuer' => 'ISO Organization',
            'location' => 'New York',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'award_date' => '2022-03-01',
        ],
        [
            'name' => 'افضل موزع لانظمة الحماية في الشرق الاوسط',
            'issuer' => 'Avast',
            'location' => 'سياتل',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'award_date' => '2022-04-01',
        ]];

        foreach($cawards as $caward){
            Cawards::create($caward);
        }
    }
}
