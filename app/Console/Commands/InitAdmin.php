<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Console\Command;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class InitAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '初始化超级管理员';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $admin = Admin::find(1);

        if ($admin) {
            self::warn('【超级管理员】已存在');

            $reset = select(
                label: '⚠ 要重置【超级管理员】吗?',
                options: ['否', '是'],
                default: '否'
            );

            if ($reset == '否') {
                return self::SUCCESS;
            }

            if ($reset == '是') {
                self::warn('开始重置【超级管理员】，请谨慎操作！');

                $userId = text(
                    label: '请输入职工号?',
                    required: '必须提供职工号。'
                );

                $user = User::find($userId);

                if ($user) {
                    $admin->update([
                        'user_id' => $userId,
                    ]);

                    self::info('重置【超级管理员】成功。');

                    return self::SUCCESS;
                } else {
                    self::error('无效的职工号');
                    return self::FAILURE;
                }
            }
        } else {
            self::info('开始初始化【超级管理员】...');

            $userId = text(
                label: '请输入职工号?',
                required: '必须提供职工号。'
            );

            $user = User::find($userId);

            if ($user) {
                Admin::create([
                    'user_id' => $userId,
                ]);

                self::info('重置【超级管理员】成功。');

                return self::SUCCESS;
            } else {
                self::error('无效的职工号');
                return self::FAILURE;
            }
        }

        return self::INVALID;
    }
}
