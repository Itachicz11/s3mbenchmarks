<?php

namespace App\Http\Controllers;

use App\Keyword;
use App\KeywordsPlan;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CreateKeyword;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class KeywordController extends Controller
{
    /**
     * Display a listing of the keyword.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new keyword.
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
     * Store a newly created keywords plan in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateKeyword $request)
    {
        $keywordsPlan = KeywordsPlan::find($request->input('keywords_plan'));

        foreach ($request->input('keyword') as $text) {

            $keyword = Keyword::where('text', '=', $request->input('keyword'))->first();

            if ($keyword != null) {
                $keywordsPlan->keywords()->attach($keyword);
            } else {
                $keyword = new Keyword;
                $keyword->text = $text;
                $keyword->save();

                $keywordsPlan->keywords()->attach($keyword);
            }

        }


        return redirect()->route('keywordsplans.show', [$keywordsPlan->company, $keywordsPlan]);
    }

    /**
     * Display the specified keyword.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified keyword.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * 1. grab old keyword
     * 2. check if old keyword and new keyword are the same
     * 3. check if new keyword is already in database
     * 4. create relationship with it
     * 5. remove old relationsihp
     * 7. go back
     *
     * @param Request $request
     * @param integer $id keyword id
     * @param integer $plan_id keywordsPlan id
     * @return Response
     */
    public function update(Request $request, $plan_id, $keyword_id)
    {
        $original_keyword = Keyword::find($keyword_id);

        // If the new keyword is the same as previous one nothing to do here
        if ($original_keyword->text == $request->keyword) {
            return back();
        }

        // current keywords plan
        $keywordsPlan = KeywordsPlan::find($plan_id);


        // We are later working with keywordsPlans keywords. Removing and Adding new ones.
        $current_keywords = $keywordsPlan->keywords();

        // New keyword query
        $new_keyword = Keyword::where('text', '=', $request->keyword);

        // If changed keyword already exists we don't want to duplicate it.
        if ( $new_keyword->exists() ) {

            // create new relationship
            $current_keywords->sync($new_keyword->get(), false);

        } else {
            // create new keyword because this one doesn't exist
            $keyword = new Keyword;
            $keyword->text = $request->keyword;
            $keyword->save();

            // create new relationship
            $current_keywords->attach($keyword);
        }

        // Get rid of old relationsihp with current keywords plan.
        $current_keywords->detach($original_keyword);

        // if the original keyword has no other relation, delete it.
        $original_keyword->deleteLast();

        // redicrect back;
        return back();
    }

    /**
     * Remove the specified keywords plan from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Keyword::find($id)->remove();
        return back();
    }
}
