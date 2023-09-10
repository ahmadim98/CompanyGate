<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Employer;

class EmployeesData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employers = [[
            'empID' => 1001,
            'name' => 'عبدالعزيز عبدالله علي',
            'email' => 'abdulaziz@companygate.com',
            'phone' => '0554433222',
            'ext' => '101',
            'position'=>'مدير عام',
            'department' => 'مجلس الادارة'
        ],[
            'empID' => 1002,
            'name' => 'خالد بن احمد',
            'email' => 'khaled@companygate.com',
            'phone' => '0554433223',
            'ext' => '102',
            'position'=>'مدير تنفيذي',
            'department' => 'مجلس الادارة'
        ],[
            'empID' => 1003,
            'name' => 'محمد علاء',
            'email' => 'malaa@companygate.com',
            'phone' => '0554433224',
            'ext' => '103',
            'position'=>'محاسب',
            'department' => 'ادارة المحاسبة'
        ],
        [
            'empID' => 1004,
            'name' => 'Fredrico Xian',
            'email' => 'fxian@companygate.com',
            'phone' => '0554433225',
            'ext' => '104',
            'position'=>'System Administrator',
            'department' => 'IT Infrastructure'
        ],
        [
            'empID' => 1005,
            'name' => 'Jack Daniel',
            'email' => 'jdan@companygate.com',
            'phone' => '0554433226',
            'ext' => '105',
            'position'=>'Software Developer',
            'department' => 'Software Development Department'
        ],
        [
            'empID' => 1006,
            'name' => 'محمد علي احمد',
            'email' => 'mali@companygate.com',
            'phone' => '0554433227',
            'ext' => '106',
            'position'=>'مطور برامج',
            'department' => 'قسم تطوير البرامج'
        ],
        [
            'empID' => 1007,
            'name' => 'بدر احمد بدر',
            'email' => 'bader@companygate.com',
            'phone' => '0554433228',
            'ext' => '107',
            'position'=>'مختص موارد بشرية',
            'department' => 'قسم الموارد البشرية'
        ],
        [
            'empID' => 1008,
            'name' => 'ليلى احمد محمد',
            'email' => 'layla@companygate.com',
            'phone' => '0554433229',
            'ext' => '108',
            'position'=>'مختبر برامج',
            'department' => 'قسم جودة البرمجيات'
        ],
        [
            'empID' => 1009,
            'name' => 'خالد فهد احمد',
            'email' => 'kfahad@companygate.com',
            'phone' => '0554433230',
            'ext' => '109',
            'position'=>'مراقب اداء الموظفين',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1010,
            'name' => 'خالد بدر احمد',
            'email' => 'kbader@companygate.com',
            'phone' => '0554433231',
            'ext' => '110',
            'position'=>'مطور واجهات البرامج',
            'department' => 'قسم تطوير البرامج'
        ],
        [
            'empID' => 1011,
            'name' => 'نورة بنت فهد',
            'email' => 'norah@companygate.com',
            'phone' => '0554433232',
            'ext' => '111',
            'position'=>'مطور واجهات البرامج',
            'department' => 'قسم تطوير البرامج'
        ],
        [
            'empID' => 1012,
            'name' => 'براء بن احمد',
            'email' => 'bahmad@companygate.com',
            'phone' => '0554433233',
            'ext' => '112',
            'position'=>'مطور برامج',
            'department' => 'قسم تطوير البرامج'
        ],
        [
            'empID' => 1013,
            'name' => 'علي بن حسين',
            'email' => 'ahussain@companygate.com',
            'phone' => '0554433234',
            'ext' => '113',
            'position'=>'موظف استقبال',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1014,
            'name' => 'ساره مهند',
            'email' => 'smuhanned@companygate.com',
            'phone' => '0554433235',
            'ext' => '114',
            'position'=>'موظف استقبال',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1015,
            'name' => 'ساره خالد',
            'email' => 'skhaled@companygate.com',
            'phone' => '0554433236',
            'ext' => '115',
            'position'=>'دعم فني',
            'department' => 'ادارة الدعم الفني'
        ],
        [
            'empID' => 1016,
            'name' => 'منيرة احمد',
            'email' => 'munerah@companygate.com',
            'phone' => '0554433237',
            'ext' => '116',
            'position'=>'دعم فني',
            'department' => 'ادارة الدعم الفني'
        ],
        [
            'empID' => 1017,
            'name' => 'علي بن بدر',
            'email' => 'alibader@companygate.com',
            'phone' => '0554433238',
            'ext' => '117',
            'position'=>'دعم فني',
            'department' => 'ادارة الدعم الفني'
        ],
        [
            'empID' => 1018,
            'name' => 'محمد حمد',
            'email' => 'mhamad@companygate.com',
            'phone' => '0554433239',
            'ext' => '118',
            'position'=>'مختبر برامج',
            'department' => 'قسم جودة البرمجيات'
        ],
        [
            'empID' => 1019,
            'name' => 'جمال احمد',
            'email' => 'jahmad@companygate.com',
            'phone' => '0554433240',
            'ext' => '119',
            'position'=>'مختبر برامج',
            'department' => 'قسم جودة البرمجيات'
        ],
        [
            'empID' => 1020,
            'name' => 'حاتم بن ابراهيم',
            'email' => 'hatem@companygate.com',
            'phone' => '0554433241',
            'ext' => '120',
            'position'=>'مدير النظام',
            'department' => 'ادارة البنية التحتية التقنية'
        ],
        [
            'empID' => 1021,
            'name' => 'Muhanned Ahmad',
            'email' => 'muhahmad@companygate.com',
            'phone' => '0554433242',
            'ext' => '121',
            'position'=>'مدير النظام',
            'department' => 'ادارة البنية التحتية التقنية'
        ],
        [
            'empID' => 1022,
            'name' => 'علي بن خالد',
            'email' => 'alikhaled@companygate.com',
            'phone' => '0554433243',
            'ext' => '122',
            'position'=>'موظف استقبال',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1023,
            'name' => 'ساره ماجد',
            'email' => 'smajed@companygate.com',
            'phone' => '0554433244',
            'ext' => '123',
            'position'=>'موظف استقبال',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1024,
            'name' => 'هيله خالد',
            'email' => 'helahkhaled@companygate.com',
            'phone' => '0554433245',
            'ext' => '124',
            'position'=>'دعم فني',
            'department' => 'ادارة الدعم الفني'
        ],
        [
            'empID' => 1025,
            'name' => 'منيرة سعد',
            'email' => 'munerahsaad@companygate.com',
            'phone' => '0554433246',
            'ext' => '125',
            'position'=>'دعم فني',
            'department' => 'ادارة الدعم الفني'
        ],
        [
            'empID' => 1026,
            'name' => 'علي بن ناصر',
            'email' => 'alinasser@companygate.com',
            'phone' => '0554433247',
            'ext' => '126',
            'position'=>'دعم فني',
            'department' => 'ادارة الدعم الفني'
        ],
        [
            'empID' => 1027,
            'name' => 'Jack Barsky',
            'email' => 'jbarsky@companygate.com',
            'phone' => '0554433248',
            'ext' => '127',
            'position'=>'Software Developer',
            'department' => 'Software Development Department'
        ],
        [
            'empID' => 1028,
            'name' => 'محمد نادر احمد',
            'email' => 'mohmmednader@companygate.com',
            'phone' => '0554433249',
            'ext' => '128',
            'position'=>'مطور برامج',
            'department' => 'قسم تطوير البرامج'
        ],
        [
            'empID' => 1029,
            'name' => 'بدر محمد بدر',
            'email' => 'badermohammed@companygate.com',
            'phone' => '0554433250',
            'ext' => '129',
            'position'=>'مختص موارد بشرية',
            'department' => 'قسم الموارد البشرية'
        ],
        [
            'empID' => 1030,
            'name' => 'ليلى احمد علي',
            'email' => 'laylaali@companygate.com',
            'phone' => '0554433251',
            'ext' => '130',
            'position'=>'مختبر برامج',
            'department' => 'قسم جودة البرمجيات'
        ],
        [
            'empID' => 1031,
            'name' => 'خالد فهد خالد',
            'email' => 'kkhaled@companygate.com',
            'phone' => '0554433252',
            'ext' => '131',
            'position'=>'مراقب اداء الموظفين',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1032,
            'name' => 'خالد بدر ظافر',
            'email' => 'kdhafer@companygate.com',
            'phone' => '0554433253',
            'ext' => '132',
            'position'=>'مطور واجهات البرامج',
            'department' => 'قسم تطوير البرامج'
        ],
        [
            'empID' => 1033,
            'name' => 'نورة بنت محمد',
            'email' => 'norahmohammed@companygate.com',
            'phone' => '0554433254',
            'ext' => '133',
            'position'=>'مطور واجهات البرامج',
            'department' => 'قسم تطوير البرامج'
        ],
        [
            'empID' => 1034,
            'name' => 'براء بن نادر',
            'email' => 'baraanader@companygate.com',
            'phone' => '0554433255',
            'ext' => '134',
            'position'=>'مطور برامج',
            'department' => 'قسم تطوير البرامج'
        ],
        [
            'empID' => 1035,
            'name' => 'ظافر احمد علي',
            'email' => 'Dhafer@companygate.com',
            'phone' => '0554433256',
            'ext' => '135',
            'position'=>'مختبر برامج',
            'department' => 'قسم جودة البرمجيات'
        ],
        [
            'empID' => 1036,
            'name' => 'يحيى خالد',
            'email' => 'yahyakhaled@companygate.com',
            'phone' => '0554433257',
            'ext' => '136',
            'position'=>'مراقب اداء الموظفين',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1037,
            'name' => 'ضاري المطيري',
            'email' => 'dhari@companygate.com',
            'phone' => '0554433258',
            'ext' => '137',
            'position'=>'مطور واجهات البرامج',
            'department' => 'قسم تطوير البرامج'
        ],
        [
            'empID' => 1038,
            'name' => 'عيد بن محمد',
            'email' => 'eidmohammed@companygate.com',
            'phone' => '0554433259',
            'ext' => '138',
            'position'=>'مطور واجهات البرامج',
            'department' => 'قسم تطوير البرامج'
        ],
        [
            'empID' => 1039,
            'name' => 'هتان احمد',
            'email' => 'hattanahmed@companygate.com',
            'phone' => '0554433260',
            'ext' => '139',
            'position'=>'مطور برامج',
            'department' => 'قسم تطوير البرامج'
        ],
        [
            'empID' => 1040,
            'name' => 'سعود بن ابراهيم',
            'email' => 'saudibrahim@companygate.com',
            'phone' => '0554433261',
            'ext' => '140',
            'position'=>'مدير النظام',
            'department' => 'ادارة البنية التحتية التقنية'
        ],
        [
            'empID' => 1041,
            'name' => 'Mohammed Ahmad',
            'email' => 'Mohammedahmad@companygate.com',
            'phone' => '0554433262',
            'ext' => '141',
            'position'=>'مراقب اداء النظام',
            'department' => 'ادارة البنية التحتية التقنية'
        ],
        [
            'empID' => 1042,
            'name' => 'علي بن سعد',
            'email' => 'alisaad@companygate.com',
            'phone' => '0554433263',
            'ext' => '142',
            'position'=>'موظف استقبال',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1043,
            'name' => 'ساره بدر علي خالد',
            'email' => 'sarakhaled@companygate.com',
            'phone' => '0554433264',
            'ext' => '143',
            'position'=>'موظف استقبال',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1044,
            'name' => 'سمر خالد',
            'email' => 'samarkhaled@companygate.com',
            'phone' => '0554433265',
            'ext' => '144',
            'position'=>'دعم فني',
            'department' => 'ادارة الدعم الفني'
        ],
        [
            'empID' => 1045,
            'name' => 'بدر بن حاتم بن ابراهيم',
            'email' => 'baderhatem@companygate.com',
            'phone' => '0554433266',
            'ext' => '145',
            'position'=>'مدير النظام',
            'department' => 'ادارة البنية التحتية التقنية'
        ],
        [
            'empID' => 1046,
            'name' => 'Muhanned Mohammed',
            'email' => 'muhannedmohammed@companygate.com',
            'phone' => '0554433267',
            'ext' => '146',
            'position'=>'مدير النظام',
            'department' => 'ادارة البنية التحتية التقنية'
        ],
        [
            'empID' => 1047,
            'name' => 'هند بن خالد',
            'email' => 'hindkhaled@companygate.com',
            'phone' => '0554433268',
            'ext' => '147',
            'position'=>'موظف استقبال',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1048,
            'name' => 'رؤى ماجد',
            'email' => 'roaamajed@companygate.com',
            'phone' => '0554433269',
            'ext' => '148',
            'position'=>'موظف استقبال',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1049,
            'name' => 'بدر محمد وليد',
            'email' => 'baderwaleed@companygate.com',
            'phone' => '0554433270',
            'ext' => '149',
            'position'=>'مختص موارد بشرية',
            'department' => 'قسم الموارد البشرية'
        ],
        [
            'empID' => 1050,
            'name' => 'وليد محمد بدر',
            'email' => 'waleedbader@companygate.com',
            'phone' => '0554433271',
            'ext' => '150',
            'position'=>'مختص موارد بشرية',
            'department' => 'قسم الموارد البشرية'
        ],
        [
            'empID' => 1051,
            'name' => 'غيداء احمد',
            'email' => 'ghaidaahmad@companygate.com',
            'phone' => '0554433272',
            'ext' => '151',
            'position'=>'مختص موارد بشرية',
            'department' => 'قسم الموارد البشرية'
        ],
        [
            'empID' => 1052,
            'name' => 'فاطمة احمد',
            'email' => 'fatimaahmad@companygate.com',
            'phone' => '0554433273',
            'ext' => '152',
            'position'=>'مختص موارد بشرية',
            'department' => 'قسم الموارد البشرية'
        ],
        [
            'empID' => 1053,
            'name' => 'نادر ابراهيم',
            'email' => 'naderibrahim@companygate.com',
            'phone' => '0554433274',
            'ext' => '153',
            'position'=>'موظف استقبال',
            'department' => 'الادارة العامة'
        ],
        [
            'empID' => 1054,
            'name' => 'يسرا محمد',
            'email' => 'yosramohammed@companygate.com',
            'phone' => '0554433275',
            'ext' => '154',
            'position'=>'موظف استقبال',
            'department' => 'الادارة العامة'
        ],
        ];

        foreach($employers as $employer){
            Employer::create($employer);
        }
    }
}
