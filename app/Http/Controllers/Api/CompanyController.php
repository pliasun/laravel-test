<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Mail\MailSender;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data'    => Company::paginate(100),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $r
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CompanyRequest $r)
    {
        $file = '';
        if ($r->file()) {
            $fileName = $r->logo->getClientOriginalName();
            $fileType = $r->logo->getClientOriginalExtension();
            $file = Storage::url(
                $r->file('logo')->storeAs('/img/companies', md5($fileName) . '.' . $fileType, 'public')
            );
        }
        $company = Company::create(array_merge($r->validated(), ['logo' => $file]));
        $msg = "Company { $company->name} was created";
        Mail::to(config('mail.to.address'))->send(new MailSender($msg));

        return response()->json([
                'success' => true,
                'data'    => $company,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Company $company)
    {
        return response()->json([
            'success' => true,
            'data'    => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $r
     * @param  \App\Models\Company                $company
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CompanyRequest $r, Company $company)
    {
        $file = '';
        if ($r->file()) {
            $fileName = $r->logo->getClientOriginalName();
            $fileType = $r->logo->getClientOriginalExtension();
            $file = Storage::url(
                $r->file('logo')->storeAs('/img/companies', md5($fileName) . '.' . $fileType, 'public')
            );
        }

        $company->update(array_merge($r->validated(), ['logo' => $file]));

        return response()->json([
            'success' => true,
            'data'    => $company,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        $name = $company->name;
        $company->delete();

        return response()->json([
            'success' => true,
            'message' => 'Company ' . $name . ' deleted',
        ]);
    }
}
