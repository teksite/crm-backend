<?php
namespace Lareon\CMS\App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;
use Lareon\Modules\Captcha\App\Rules\CaptchaRule;

class LoginRequest extends FortifyLoginRequest
{

    public function rules(): array
    {
        return [
            Fortify::username() => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => ['required', new CaptchaRule()],
        ];
    }
}
