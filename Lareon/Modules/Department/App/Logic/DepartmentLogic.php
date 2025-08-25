<?php

namespace Lareon\Modules\Department\App\Logic;

use Illuminate\Support\Arr;
use Lareon\Modules\Department\App\Models\Department;
use Teksite\Handler\Actions\ServiceWrapper;
use Teksite\Handler\Services\FetchDataService;

class DepartmentLogic
{
    public function get(mixed $fetchData = [])
    {
        return app(ServiceWrapper::class)(function () use ($fetchData) {
            return app(FetchDataService::class)(Department::class, ['title'], ...$fetchData);
        });
    }

    public function register(array $input)
    {
        return app(ServiceWrapper::class)(function () use ($input) {
            return Department::query()->create($input);
        });
    }

    public function change(array $input, Department $department)
    {
        return app(ServiceWrapper::class)(function () use ($input, $department) {
            $department->update($input);
            return $department;
        });
    }

    public function delete(Department $department)
    {
        return app(ServiceWrapper::class)(function () use ($department) {
            $department->delete();
        });
    }
}


