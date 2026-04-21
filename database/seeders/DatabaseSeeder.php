<?php

namespace Database\Seeders;

use App\Models\{User, VolunteerProfile, Project, Task, ProjectUpdate, Announcement, Donation};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Admin ──────────────────────────────────────────
        $admin = User::create([
            'name'     => 'مدير النظام',
            'email'    => 'admin@volunteer.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
            'phone'    => '0991234567',
            'city'     => 'دمشق',
            'bio'      => 'مدير منصة التطوع لإعادة الإعمار',
            'is_active'=> true,
        ]);

        // ─── Project Owners ─────────────────────────────────
        $owners = [];
        $ownerData = [
            ['name' => 'أحمد محمد الحلبي', 'city' => 'حلب',   'email' => 'ahmed@test.com'],
            ['name' => 'محمود السوري',      'city' => 'دمشق',  'email' => 'mahmoud@test.com'],
            ['name' => 'سمر العلي',         'city' => 'حمص',   'email' => 'samar@test.com'],
            ['name' => 'خالد الدرعاوي',    'city' => 'درعا',  'email' => 'khaled@test.com'],
        ];

        foreach ($ownerData as $data) {
            $owners[] = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make('password'),
                'role'     => 'project_owner',
                'city'     => $data['city'],
                'phone'    => '099' . rand(1000000, 9999999),
                'is_active'=> true,
            ]);
        }

        // ─── Volunteers ─────────────────────────────────────
        $volunteersData = [
            ['name'=>'علي حسن',      'city'=>'حلب',   'skills'=>['carpentry','painting'],         'points'=>250, 'hours'=>120],
            ['name'=>'رنا أحمد',     'city'=>'دمشق',  'skills'=>['electrical','coordination'],    'points'=>180, 'hours'=>90],
            ['name'=>'يوسف سالم',    'city'=>'حمص',   'skills'=>['plumbing','masonry'],           'points'=>320, 'hours'=>160],
            ['name'=>'لينا خليل',    'city'=>'حلب',   'skills'=>['cleaning','logistics'],         'points'=>90,  'hours'=>45],
            ['name'=>'عمر الزعبي',   'city'=>'دمشق',  'skills'=>['ironwork','masonry'],           'points'=>410, 'hours'=>200],
            ['name'=>'مريم يوسف',    'city'=>'اللاذقية','skills'=>['painting','tiling'],          'points'=>150, 'hours'=>75],
            ['name'=>'حسين محمد',    'city'=>'درعا',  'skills'=>['carpentry','ironwork'],         'points'=>280, 'hours'=>140],
            ['name'=>'نور السيد',    'city'=>'حمص',   'skills'=>['coordination','cleaning'],      'points'=>60,  'hours'=>30],
        ];

        $volunteers = [];
        foreach ($volunteersData as $i => $v) {
            $user = User::create([
                'name'     => $v['name'],
                'email'    => 'volunteer'.$i.'@test.com',
                'password' => Hash::make('password'),
                'role'     => 'volunteer',
                'city'     => $v['city'],
                'phone'    => '099' . rand(1000000, 9999999),
                'is_active'=> true,
            ]);

            VolunteerProfile::create([
                'user_id'                 => $user->id,
                'skills'                  => $v['skills'],
                'hours_per_week'          => rand(5, 20),
                'total_hours_contributed' => $v['hours'],
                'points'                  => $v['points'],
                'experience_level'        => ['beginner','intermediate','expert'][rand(0,2)],
                'has_vehicle'             => (bool)rand(0,1),
                'travel_distance_km'      => rand(5, 50),
                'completed_projects'      => rand(1, 10),
                'rating'                  => rand(35, 50) / 10,
                'rating_count'            => rand(2, 15),
                'availability'            => ['saturday','sunday','monday'],
            ]);

            $volunteers[] = $user;
        }

        // ─── Projects ────────────────────────────────────────
        $projectsData = [
            [
                'title'      => 'إعادة إعمار محل بقالة في حلب',
                'type'       => 'shop',
                'city'       => 'حلب',
                'status'     => 'in_progress',
                'priority'   => 'critical',
                'damage'     => 85,
                'volunteers_needed' => 5,
                'description'=> 'محل بقالة تضرر بشكل كبير جراء الزلزال، يحتاج إلى إعادة بناء الجدران وإصلاح الكهرباء والسباكة وطلاء الجدران.',
                'owner'      => $owners[0],
                'progress'   => 40,
            ],
            [
                'title'      => 'ترميم ورشة نجارة في دمشق',
                'type'       => 'workshop',
                'city'       => 'دمشق',
                'status'     => 'approved',
                'priority'   => 'high',
                'damage'     => 60,
                'volunteers_needed' => 4,
                'description'=> 'ورشة نجارة تعمل منذ 20 عاماً تضررت بشكل جزئي، تحتاج إلى إصلاح السقف وبعض الجدران وإعادة تركيب الكهرباء.',
                'owner'      => $owners[1],
                'progress'   => 0,
            ],
            [
                'title'      => 'إصلاح عيادة طبية في حمص',
                'type'       => 'clinic',
                'city'       => 'حمص',
                'status'     => 'completed',
                'priority'   => 'high',
                'damage'     => 45,
                'volunteers_needed' => 6,
                'description'=> 'عيادة طبية تخدم مئات المرضى شهرياً تضررت من الزلازل. تم إصلاحها بالكامل بفضل تضافر جهود المتطوعين.',
                'owner'      => $owners[2],
                'progress'   => 100,
            ],
            [
                'title'      => 'إعادة بناء مخبز شعبي في درعا',
                'type'       => 'bakery',
                'city'       => 'درعا',
                'status'     => 'pending',
                'priority'   => 'critical',
                'damage'     => 90,
                'volunteers_needed' => 8,
                'description'=> 'مخبز شعبي يخدم أكثر من 500 عائلة يومياً تهدم بالكامل تقريباً ويحتاج إلى إعادة بناء شاملة.',
                'owner'      => $owners[3],
                'progress'   => 0,
            ],
            [
                'title'      => 'ترميم صيدلية في اللاذقية',
                'type'       => 'pharmacy',
                'city'       => 'اللاذقية',
                'status'     => 'approved',
                'priority'   => 'medium',
                'damage'     => 35,
                'volunteers_needed' => 3,
                'description'=> 'صيدلية حي تحتاج إلى إصلاح بسيط في الجدران والأرضيات وإعادة تركيب الواجهة الزجاجية.',
                'owner'      => $owners[0],
                'progress'   => 0,
            ],
        ];

        $projects = [];
        foreach ($projectsData as $pd) {
            $p = Project::create([
                'owner_id'           => $pd['owner']->id,
                'title'              => $pd['title'],
                'description'        => $pd['description'],
                'type'               => $pd['type'],
                'status'             => $pd['status'],
                'priority'           => $pd['priority'],
                'damage_percentage'  => $pd['damage'],
                'address'            => 'شارع الثورة، حي النزهة',
                'city'               => $pd['city'],
                'required_skills'    => ['carpentry','electrical','painting'],
                'volunteers_needed'  => $pd['volunteers_needed'],
                'volunteers_assigned'=> rand(1, $pd['volunteers_needed']),
                'estimated_days'     => rand(7, 30),
                'progress_percentage'=> $pd['progress'],
                'estimated_cost'     => rand(500, 5000),
                'notes'              => 'يرجى إحضار أدوات العمل الخاصة بكم.',
            ]);

            // Attach volunteers
            $p->volunteers()->attach($volunteers[rand(0, 3)]->id, [
                'status'    => 'accepted',
                'joined_at' => now()->subDays(rand(1, 10)),
            ]);

            $projects[] = $p;
        }

        // ─── Tasks for first project ─────────────────────────
        $taskData = [
            ['title'=>'إزالة الأنقاض وتنظيف الموقع',   'status'=>'completed', 'skill'=>'cleaning',   'hours'=>8],
            ['title'=>'إصلاح الجدران الخارجية',          'status'=>'in_progress','skill'=>'masonry',   'hours'=>16],
            ['title'=>'تركيب اللوحة الكهربائية',         'status'=>'pending',   'skill'=>'electrical', 'hours'=>6],
            ['title'=>'إصلاح شبكة المياه',               'status'=>'pending',   'skill'=>'plumbing',   'hours'=>4],
            ['title'=>'طلاء الجدران الداخلية',            'status'=>'pending',   'skill'=>'painting',   'hours'=>8],
        ];

        foreach ($taskData as $td) {
            Task::create([
                'project_id'      => $projects[0]->id,
                'created_by'      => $admin->id,
                'assigned_to'     => $volunteers[rand(0,3)]->id,
                'title'           => $td['title'],
                'status'          => $td['status'],
                'priority'        => 'high',
                'required_skill'  => $td['skill'],
                'estimated_hours' => $td['hours'],
                'due_date'        => now()->addDays(rand(3, 14)),
            ]);
        }

        // ─── Project Update ──────────────────────────────────
        ProjectUpdate::create([
            'project_id'          => $projects[0]->id,
            'user_id'             => $admin->id,
            'title'               => 'تحديث: انتهاء مرحلة التنظيف',
            'description'         => 'تم الانتهاء من إزالة الأنقاض وتنظيف الموقع بالكامل. الفريق جاهز للبدء بأعمال البناء.',
            'progress_percentage' => 40,
        ]);

        // ─── Announcements ───────────────────────────────────
        Announcement::create([
            'user_id'      => $admin->id,
            'title'        => 'افتتاح موسم التطوع الصيفي 2025',
            'content'      => 'يسعدنا الإعلان عن انطلاق موسم التطوع الصيفي! انضم إلينا وكن جزءاً من إعادة بناء مجتمعنا. سجّل في أقرب مشروع بالقرب منك.',
            'target'       => 'all',
            'is_published' => true,
        ]);

        Announcement::create([
            'user_id'      => $admin->id,
            'title'        => 'تدريب المتطوعين الجدد',
            'content'      => 'سيُعقد تدريب خاص للمتطوعين الجدد يوم السبت القادم. يرجى التسجيل مسبقاً عبر التواصل مع إدارة المنصة.',
            'target'       => 'volunteers',
            'is_published' => true,
        ]);

        // ─── Donation ────────────────────────────────────────
        Donation::create([
            'project_id'  => $projects[0]->id,
            'donor_id'    => $volunteers[0]->id,
            'type'        => 'materials',
            'description' => 'تبرع بأكياس إسمنت وحديد تسليح',
            'amount'      => 500,
            'status'      => 'received',
        ]);

        $this->command->info('✅ تم تعبئة قاعدة البيانات بنجاح!');
        $this->command->info('📧 المدير: admin@volunteer.com | كلمة المرور: password');
        $this->command->info('📧 متطوع: volunteer0@test.com | كلمة المرور: password');
        $this->command->info('📧 صاحب مشروع: ahmed@test.com | كلمة المرور: password');
    }
}