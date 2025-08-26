<?php

namespace Lareon\Modules\Department\App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Validation\Rule;
use Lareon\Modules\Department\App\Models\Department;
use Lareon\Modules\Department\App\Models\Team;

class UpdateTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->can('admin.department.edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        dd(request()->all());
        return array_merge(Team::rules(),[
            'title'=>['required','string','max:255', Rule::unique('team','title')->ignore($this->team)],
        ]);
    }
}
