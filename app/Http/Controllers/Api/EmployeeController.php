<?php

namespace App\Http\Controllers\Api;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $list = Employee::paginate(100);
        return response()->json([
                'success' => true,
                'data'    => $list,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Company  $company
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Company $company)
    {
        $list = $company->employees()->paginate(100);
        return response()->json([
                'success' => true,
                'data'    => $list,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $r
     *
     * @param  \App\Models\Company                 $company
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EmployeeRequest $r, Company $company)
    {
        $employee = $company->employees()->create($r->validated());

        return response()->json([
                'success' => true,
                'data'    => $employee,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Company $company, Employee $employee)
    {
        return response()->json([
                'success' => true,
                'data'    => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $r
     * @param  \App\Models\Employee                $employee
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EmployeeRequest $r, Company $company, Employee $employee)
    {
        $employee->update($r->validated());

        return response()->json([
                'success' => true,
                'data'    => $employee,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Company $company, Employee $employee)
    {
        $name = $employee->first_name;
        $employee->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'Employee ' . $name . ' deleted',
            ]
        );
    }
}
