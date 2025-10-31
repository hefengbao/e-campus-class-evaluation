<?php

namespace Database\Seeders;

use App\Models\Metric;
use Illuminate\Database\Seeder;

class MetricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Metric::create([
            'id' => 1,
            'item' => '政治导向、立德树人、价值引领等',
            'point' => 20
        ]);
        Metric::create([
            'id' => 2,
            'item' => '与课程实施方案的一致性，教材使用效果等',
            'point' => 15
        ]);
        Metric::create([
            'id' => 3,
            'item' => '设计合理、内容熟练、重点突出、难度适当、逻辑严谨等',
            'point' => 15
        ]);
        Metric::create([
            'id' => 4,
            'item' => '灵活有效、兴趣激发、思维培养等',
            'point' => 15
        ]);
        Metric::create([
            'id' => 5,
            'item' => '课堂氛围、合作学习、学生参与等',
            'point' => 10
        ]);
        Metric::create([
            'id' => 6,
            'item' => '精神饱满、衣容整洁、仪态端庄、语言文明简洁、表达准确等',
            'point' => 10
        ]);
        Metric::create([
            'id' => 7,
            'item' => '教学目标达成、学生学习收获等',
            'point' => 15
        ]);
    }
}
