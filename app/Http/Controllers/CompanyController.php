<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateCompany;
use Auth;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $companies = Company::all();
        
        return view('companies/index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {

        return view('companies/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCompany|Request $request
     * @return Response
     */
    public function store(CreateCompany $request)
    {
        Company::create($request->all());
        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data['company'] = Company::find($id);
        $data['keywordsPlans'] = $data['company']->keywordsPlans->sortByDesc('date');
        $data9['approved'] = $data['company']->getApproved();
        $data['benchmarks'] = $data['company']->benchmarks;

        return view('companies/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
