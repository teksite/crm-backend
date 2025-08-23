<?php
namespace Lareon\CMS\App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;
use Lareon\CMS\App\Models\User;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->can('panel.profile.edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return collect(User::rules())->merge([
            'password' => 'nullable|string',
            'meta' => 'array',
        ])->forget(['email','phone'])->toArray();
    }
}
