<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Company  $company
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function list()
    {
        $list = Employee::paginate(10);

        return view('admin.employee.list', compact('list'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Company  $company
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Company $company)
    {
        $list = $company->employees()->paginate(10);

        return view('admin.employee.index', compact('list', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Company  $company
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create(Company $company)
    {
        return view('admin.employee.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $r
     *
     * @param  \App\Models\Company                 $company
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeRequest $r, Company $company)
    {
        $company->employees()->create($r->validated());

        return redirect()->route('admin.employee.index', [$company->id])
                         ->with('success', trans('admin.employee_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     *
     * @param  \App\Models\Company   $company
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function show(Company $company, Employee $employee)
    {
        return view('admin.employee.show', compact('employee', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     *
     * @param  \App\Models\Company   $company
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function edit(Company $company, Employee $employee)
    {
        return view('admin.employee.edit', compact('employee', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $r
     * @param  \App\Models\Company                 $company
     * @param  \App\Models\Employee                $employee
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeRequest $r, Company $company, Employee $employee)
    {
        $employee->update($r->validated());

        return redirect()->route('admin.employee.index', [$company->id])
                         ->with('success', trans('admin.employee_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company   $company
     * @param  \App\Models\Employee  $employee
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Company $company, Employee $employee)
    {
        try {
            $employee->delete();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->getMessage(),
            ]);
        }

        return response()->json([
                'success' => true,
        ]);
    }
}
