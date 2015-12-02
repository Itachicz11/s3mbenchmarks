<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Keyword;
use App\City;
use App\Company;
use App\Http\Requests\CreateCity;
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

        $keywordsPlan = new KeywordsPlan;
        $keywordsPlan->date = $request->input('date');
        $keywordsPlan->approved = false;
        $keywordsPlan->company_id = $request->input('company');

        $keywordsPlan->save();

        $keywordsPlan->attach_keyword($request->input('keyword'));

        if ( $request->input('city') != null ) {
            $keywordsPlan->attach_city($request->input('city'));
        }

        return redirect()->route('companies.show', [$keywordsPlan->company_id]);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($company, $keywordsplan)
    {
        $data['keywordsPlan'] = KeywordsPlan::find($keywordsplan);
        $data['company'] = $data['keywordsPlan']->company;

        return view('keywordsPlans/show', $data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit_keywords($company, $keyword)
    {
        $data['keywordsPlan'] = KeywordsPlan::find($keyword);
        $data['company'] = $data['keywordsPlan']->company;
        $data['keywords'] = $data['keywordsPlan']->keywords;
        $data['date'] = $data['keywordsPlan']->date;


        return view('keywordsPlans/edit_keywords', $data);
    }

    /**
     * Page for removing keywords associated with a keywords plan.
     * @param integer $keywordsPlan - keywodsPlan id
     * @return void
     */
    public function remove_keywords($company, $keywordsPlan)
    {
        $data['keywordsPlan'] = KeywordsPlan::find($keywordsPlan);
        $data['company'] = $data['keywordsPlan']->company;
        $data['keywords'] = $data['keywordsPlan']->keywords;

        return view('keywordsPlans/remove_keywords', $data);
    }

    /**
     * Delete relationship between keyword and keywords plan.
     * @param integer $keywordsPlan - id of keywordsPlan
     * @param integer $keyword_id - keyword id
     * @return void
     */
    public function delete_keyword($keywordsPlan, $keyword_id)
    {
        // find a keyword
        $keyword = Keyword::find($keyword_id);

        // delete relation of the keyword with current Keywords Plan.
        KeywordsPlan::find($keywordsPlan)->keywords()->detach($keyword_id);

        // If this was the last relation with this keyword (no other keywords plan is using this keyword),
        // delete this keyword from keywords table
        if ( $keyword->keywords_plan()->count() < 1 ) {
            $keyword->delete();
        }

        return back();
    }



    /**
     * Page for adding cities to a keywords plan.
     * @param integer $company - id of a company
     * @param integer $keywrodsPlan - id of a keywords plan.
     * @return void - renders view page

     */
    public function add_cities($company, $keywordsPlan)
    {

        $data['keywords_plan'] = KeywordsPlan::find($keywordsPlan);
        $data['company'] = $data['keywords_plan']->company;
        $data['city'] = new City;


        return view('keywordsplans.add_cities', $data);
    }


    public function attach_cities(CreateCity $request, $keywordPlan)
    {
        $keywords_plan = KeywordsPlan::find($keywordPlan);
        $company = $keywords_plan->company;

        foreach ($request->input('city') as $city_name) {

            $city = City::where('name', '=', $city_name)->first();

            if ( $city == null ) {

                $city = City::create(['name' => $city_name]);

            }

            $keywords_plan->cities()->sync($city->get(), false);
        }

        return redirect()->route('keywordsplans.show', [1, 55]);
    }

    /**
     * Page for removing cities from a keywords plan
     * @param integer $company - id of a company
     * @param integer $kw_plan - id of a keywords plan
     * @return void
     */
    public function remove_cities($company, $kw_plan)
    {
        $data['keywords_plan'] = KeywordsPlan::find($kw_plan);
        $data['cities'] = $data['keywords_plan']->cities;
        $data['company'] = $data['keywords_plan']->company;

        return view('keywordsplans.remove_cities', $data);
    }


    public function detach_city($city, $kw_plan)
    {
        $kw_plan = KeywordsPlan::find($kw_plan);
        $city = City::find($city);

        $kw_plan->cities()->detach($city);

        $city->deleteLast();

        return back();

    }

    public function edit_cities($company, $kw_plan)
    {
        $data['company'] = Company::find($company);
        $data['kw_plan'] = KeywordsPlan::find($kw_plan);

        return view('keywordsPlans.edit_cities', $data);

    }

    public function update_city(Request $request, $plan_id, $city_id)
    {
        $original_city = City::find($city_id);

        // If the new keyword is the same as previous one nothing to do here
        if ($original_city->name == $request->city) {
            return back();
        }

        // current keywords plan
        $keywordsPlan = KeywordsPlan::find($plan_id);


        // We are later working with keywordsPlans keywords. Removing and Adding new ones.
        $current_cities = $keywordsPlan->cities();

        // New keyword query
        $new_keyword = City::where('name', '=', $request->city);

        // If changed keyword already exists we don't want to duplicate it.
        if ( $new_keyword->exists() ) {

            // create new relationship
            $current_cities->sync($new_keyword->get(), false);

        } else {
            // create new keyword because this one doesn't exist
            $city = new City;
            $city->name = $request->city;
            $city->save();

            // create new relationship
            $current_cities->attach($city);
        }

        // Get rid of old relationsihp with current keywords plan.
        $current_cities->detach($original_city);

        // if the original keyword has no other relation, delete it.
        $original_city->deleteLast();

        // redicrect back;
        return back();


    }






}
