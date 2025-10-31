<?php

namespace Database\Seeders;

use App\Models\ExpertType;
use Illuminate\Database\Seeder;

class ExpertTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExpertType::create([
            'id' => 1,
            'name' => '校领导'
        ]);

        ExpertType::create([
            'id' => 2,
            'name' => '教学管理部门领导'
        ]);

        ExpertType::create([
            'id' => 3,
            'name' => '学院（研究院）领导'
        ]);

        ExpertType::create([
            'id' => 4,
            'name' => '系所、课程（组）负责人'
        ]);

        ExpertType::create([
            'id' => 5,
            'name' => '督导'
        ]);

        ExpertType::create([
            'id' => 6,
            'name' => '其他类型专家'
        ]);
    }
}
