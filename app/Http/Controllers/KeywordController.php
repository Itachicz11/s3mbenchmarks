<?php

namespace App\Http\Controllers;

use App\Keyword;
use App\Company;

use Illuminate\Http\Request;
use App\Http\Requests\CreateKeyword;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($company, $keywords_plan)
    {
        $data['keyword'] = new Keyword;
        $data['keywords_plan'] = $keywords_plan;
        $data['company'] = Company::find($company);

        return view('keywords/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateKeyword $request)
    {
        $keywords_plan_id = $request->input('keywords_plan');

        foreach ($request->input('keyword') as $text) {
            $keyword = new Keyword;
            $keyword->text = $text;
            $keyword->keywords_plan_id = $keywords_plan_id;
            $keyword->company_id = $request->input('company');
            $keyword->save();
        }

        return redirect("keywordsplans/$keywords_plan_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        $keyword = Keyword::find($id);
        $keyword->text = $request->input('keyword')[0];
        $keyword->save();

        $keywordsplan = $keyword->keywords_plan;
        $keywordsplan = $keywordsplan->id;


        return redirect("keywordsplans/$keywordsplan/edit");
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
