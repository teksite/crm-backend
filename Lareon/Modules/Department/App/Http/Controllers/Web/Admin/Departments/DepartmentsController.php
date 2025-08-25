<?php

namespace Lareon\Modules\Department\App\Http\Controllers\Web\Admin\Departments;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Lareon\Modules\Department\App\Http\Controllers\Controller;
use Lareon\Modules\Department\App\Http\Requests\Admin\NewDepartmentRequest;
use Lareon\Modules\Department\App\Http\Requests\Admin\UpdateDepartmentRequest;
use Lareon\Modules\Department\App\Logic\DepartmentLogic;
use Lareon\Modules\Department\App\Models\Department;
use Teksite\Lareon\Facade\WebResponse;

class DepartmentsController extends Controller
{
  public function __construct(public DepartmentLogic $logic)
  {
  }

  public static function middleware(): array
  {
    return [
      new Middleware('can:admin.department.read'),
      new Middleware('can:admin.department.create', only: ['create', 'store']),
      new Middleware('can:admin.department.edit', only: ['edit', 'update']),
      new Middleware('can:admin.department.delete', only: ['destroy']),
    ];
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $res=$this->logic->get();
    $departments=$res->result;
    return view('department::admin.pages.departments.index', compact('departments'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('department::admin.pages.departments.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(NewDepartmentRequest $request)
  {
    $res = $this->logic->register($request->validated());
    return WebResponse::byResult($res, route('admin.departments.index'))->go();
  }

  /**
   * Display the specified resource.
   */
  public function show(Department $department)
  {

    abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Department $department)
  {
    return view('department::admin.pages.departments.edit', compact('department'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateDepartmentRequest $request, Department $department)
  {
    $res = $this->logic->change($request->validated() , $department);
    return WebResponse::byResult($res, route('admin.departments.edit', $department))->go();
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Department $department)
  {
    $res = $this->logic->delete($department);
    return WebResponse::byResult($res, route('admin.departments.index'))->go();
  }
}
