<?php

namespace Lareon\CMS\App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Lareon\CMS\App\Actions\Fortify\CreateNewUser;
use Lareon\CMS\App\Actions\Fortify\ResetUserPassword;
use Lareon\CMS\App\Actions\Fortify\UpdateUserPassword;
use Lareon\CMS\App\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        $this->views();
    }

    public function views(): void
    {
        Fortify::loginView(fn() => View::first(['pages.auth.login', 'lareon::auth.pages.login']));
        Fortify::registerView(fn() => View::first(['pages.auth.register', 'lareon::auth.pages.register']));
        Fortify::requestPasswordResetLinkView(fn() => View::first(['pages.auth.forgot-password', 'lareon::auth.pages.forgot-password']));
        Fortify::resetPasswordView(fn() => View::first(['pages.auth.reset-password', 'lareon::auth.pages.reset-password']));
//        Fortify::verifyEmailView(fn() => View::first(['pages.auth.verify-email', 'lareon::pages.auth.verify-email']));
        Fortify::twoFactorChallengeView(fn() => View::first(['pages.auth.two-factor-challenge', 'lareon::auth.pages.two-factor-challenge']));
        Fortify::confirmPasswordView(fn() => View::first(['pages.pages.auth.confirm-password', 'lareon::panel.pages.profiles.confirm-password']));
    }
}
