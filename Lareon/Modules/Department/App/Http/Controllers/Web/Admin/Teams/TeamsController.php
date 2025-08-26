<?php

namespace Lareon\Modules\Department\App\Http\Controllers\Web\Admin\Teams;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Lareon\Modules\Department\App\Http\Controllers\Controller;
use Lareon\Modules\Department\App\Http\Requests\Admin\NewDepartmentRequest;
use Lareon\Modules\Department\App\Http\Requests\Admin\UpdateDepartmentRequest;
use Lareon\Modules\Department\App\Http\Requests\Admin\UpdateTeamRequest;
use Lareon\Modules\Department\App\Logic\DepartmentLogic;
use Lareon\Modules\Department\App\Logic\TeamLogic;
use Lareon\Modules\Department\App\Models\Department;
use Lareon\Modules\Department\App\Models\Team;
use Teksite\Lareon\Facade\WebResponse;

class TeamsController extends Controller
{
  public function __construct(public TeamLogic $logic)
  {
  }

  public static function middleware(): array
  {
    return [
      new Middleware('can:admin.department.team.read'),
      new Middleware('can:admin.department.team.create', only: ['create', 'store']),
      new Middleware('can:admin.department.team.edit', only: ['edit', 'update']),
      new Middleware('can:admin.department.team.delete', only: ['destroy']),
    ];
  }

  /**
   * Display a listing of the resource.
   */
  public function index(Department $department)
  {
    $res=$this->logic->getByDepartment($department);
    $teams=$res->result;
    return view('department::admin.pages.teams.index', compact('department' ,'teams'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('department::admin.pages.teams.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(NewDepartmentRequest $request ,Department $department)
  {
    $res = $this->logic->registerByDepartment($department , $request->validated());
    return WebResponse::byResult($res, route('admin.departments.teams.index' , $department))->go();
  }

  /**
   * Display the specified resource.
   */
  public function show(Department $department ,Team $team)
  {
    abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Department $department , Team $team)
  {
    return view('department::admin.pages.teams.edit', compact('department' ,'team'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateTeamRequest $request, Department $department ,Team $team)
  {
    $res = $this->logic->change($request->validated() ,$team);
    return WebResponse::byResult($res, route('admin.departments.teams.edit', [$department,$team]))->go();
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Department $department ,Team $team)
  {
    $res = $this->logic->delete($team);
    return WebResponse::byResult($res, route('admin.departments.teams.index' ,$department))->go();
  }
}
