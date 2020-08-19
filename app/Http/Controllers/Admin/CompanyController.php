<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Mail\MailSender;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Log;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $list = Company::paginate(10);

        return view('admin.company.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $r
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompanyRequest $r)
    {
        $file = '';
        if ($r->file()) {
            $fileName = $r->logo->getClientOriginalName();
            $fileType = $r->logo->getClientOriginalExtension();
            $file = Storage::url($r->file('logo')->storeAs('/img/companies', md5($fileName) . '.' . $fileType, 'public'));
        }

        $company = Company::create(array_merge($r->validated(), ['logo' => $file]));
        $msg = "Company {$company->name} was created";
        Mail::to(config('mail.to.address'))->send(new MailSender($msg));

        return redirect()->route('admin.company.index')->with('success', trans('admin.company_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Company $company)
    {
        return view('admin.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $r
     * @param  \App\Models\Company                $company
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $r, Company $company)
    {
        $file = '';
        if ($r->file()) {
            $fileName = $r->logo->getClientOriginalName();
            $fileType = $r->logo->getClientOriginalExtension();
            $file = Storage::url($r->file('logo')->storeAs('/img/companies', md5($fileName) . '.' . $fileType, 'public'));
        }

        $company->update(
            array_merge($r->validated(), ['logo' => $file])
        );

        return redirect()->route('admin.company.index')->with('success', trans('admin.company_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Company $company)
    {
        try {
            $company->delete();
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
