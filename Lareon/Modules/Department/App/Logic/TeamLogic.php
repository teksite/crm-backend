<?php

namespace Lareon\Modules\Department\App\Logic;

use Illuminate\Support\Arr;
use Lareon\Modules\Department\App\Models\Department;
use Lareon\Modules\Department\App\Models\Team;
use Teksite\Handler\Actions\ServiceWrapper;
use Teksite\Handler\Services\FetchDataService;

class TeamLogic
{
    public function get(mixed $fetchData = [])
    {
        return app(ServiceWrapper::class)(function () use ($fetchData) {
            return app(FetchDataService::class)(Team::class, ['title'], ...$fetchData);
        });
    }

    public function getByDepartment(Department $department, mixed $fetchData = [])
    {
        return app(ServiceWrapper::class)(function () use ($fetchData ,$department) {
            return app(FetchDataService::class)(function () use ($fetchData,$department) {
                $keyword = request('s');
                return $department->teams()->when($keyword , function ($query) use ($keyword) {
                    $query->where('title', "%$keyword%");
                })->paginate(25);
            });
        });
    }


    public function register(array $input)
    {
        return app(ServiceWrapper::class)(function () use ($input) {
            return Team::query()->create($input);
        });
    }

    public function registerByDepartment(Department $department,array $input)
    {
        return app(ServiceWrapper::class)(function () use ($input , $department) {
            return $department->teams()->create($input);
        });
    }

    public function change(array $input, Team $department)
    {
        return app(ServiceWrapper::class)(function () use ($input, $department) {
            $department->update($input);
            return $department;
        });
    }

    public function delete(Team $department)
    {
        return app(ServiceWrapper::class)(function () use ($department) {
            $department->delete();
        });
    }
}


