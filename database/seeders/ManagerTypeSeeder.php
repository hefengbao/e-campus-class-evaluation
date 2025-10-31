<?php

namespace Database\Seeders;

use App\Models\ManagerType;
use Illuminate\Database\Seeder;

class ManagerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ManagerType::create([
            'id' => 1,
            'name' => '校领导',
            'scope' => '',
            'scope_desc' => '查看所有'
        ]);

        ManagerType::create([
            'id' => 2,
            'name' => '研究生课程管理',
            'scope' => "degree_level='M'",
            'scope_desc' => '查看研究生课程',
        ]);

        ManagerType::create([
            'id' => 3,
            'name' => '本科生课程管理',
            'scope' => "degree_level='B'",
            'scope_desc' => '查看本科生课程',
        ]);

        ManagerType::create([
            'id' => 4,
            'name' => '学院（研究院）',
            'scope' => 'dept_id=:dept_id,dept_id',
            'scope_desc' => '查看本学院（研究院）开设的课程',
        ]);
    }
}
