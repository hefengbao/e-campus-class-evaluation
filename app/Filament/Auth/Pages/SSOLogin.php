<?php

namespace App\Filament\Auth\Pages;

use App\Models\User;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;
use phpCAS;

class SSOLogin
{
    public function __invoke()
    {
        //指定log文件
        //phpCas::setDebug(storage_path('logs/auth.log'));
        phpCAS::client(
            server_version: CAS_VERSION_2_0,
            server_hostname: config('core.cas.server_hostname'),
            server_port: config('core.cas.server_port'),
            server_uri: config('core.cas.server_uri'),
            service_base_url: config('core.cas.service_base_url'),
            changeSessionID: false
        );
        //设置no ssl，即忽略证书检查.如果需要ssl，请用 phpCAS::setCasServerCACert()设置
        //setCasServerCACert方法设置ssl证书，
        phpCAS::setNoCasServerValidation();
        phpCAS::handleLogoutRequests();
        phpCAS::forceAuthentication();

        $attributes = phpCAS::getAttributes();

        $user = User::where('id', $attributes['uid'])->firstOrFail();

        if (!Filament::auth()->login($user)) {
            abort(403);
        }

        if (
            ($user instanceof FilamentUser) &&
            (!$user->canAccessPanel(Filament::getCurrentPanel()))
        ) {
            abort(403);
        }

        session()->regenerate();

        return app(LoginResponse::class);
    }
}
