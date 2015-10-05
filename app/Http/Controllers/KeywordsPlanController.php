<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Keyword;
use App\Company;
use App\Http\Controllers\Controller;

use App\KeywordsPlan;
use App\Http\Requests\CreateKeywordsPlan;
use App\Http\Requests\UpdateKeywordsPlan;

class KeywordsPlanController extends Controller
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
        $keywordsPlans = KeywordsPlan::all();
        return view('keywordsPlans/index', compact('keywordsPlans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($company)
    {
        $data['keywordsPlan'] = new KeywordsPlan;
        $data['company'] = Company::find($company);
        $data['keywords'] = $data['company']->keywords;

        return view("keywordsPlans/create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateKeywordsPlan $request)
    {
        $company_id = $request->input('company');

        $keywordsPlan = new KeywordsPlan;
        $keywordsPlan->date = $request->input('date');
        $keywordsPlan->approved = false;
        $keywordsPlan->company_id = $company_id;

        $keywordsPlan->save();

        return redirect("companies/$company_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data['keywordsPlan'] = KeywordsPlan::find($id);
        $data['company'] = $data['keywordsPlan']->company;

        return view('keywordsPlans/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data['keywordsPlan'] = KeywordsPlan::find($id);
        $data['company'] = $data['keywordsPlan']->company;
        return view('keywordsPlans/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateKeywordsPlan $request, $id)
    {
        $keywordsPlan = KeywordsPlan::find($id);
        $keywordsPlan = $keywordsPlan->update($request->all());
        $company = $request->input('company');

        return redirect("companies/$company");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        KeywordsPlan::destroy($id);
        return redirect()->back();
    }

    public function approved($id)
    {
        $keywordsPlan = KeywordsPlan::find($id);


        if ( $keywordsPlan->approved ) {
            $keywordsPlan->update(['approved' => 0]);
        } else {
            $keywordsPlan->update(['approved' => 1]);
        }

        return redirect()->back();
    }

}
