<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Company;
use App\PageRank;
use App\Keyword;
use App\Benchmark;
use App\Http\Requests\CreateBenchmark;
use App\Http\Requests\CompareBenchmarks;
use Illuminate\Support\Facades\Input;

class BenchmarkController extends Controller
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
        $benchmarks = Benchmark::all();
        return view('benchmarks/index', compact('benchmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($company)
    {

        $data['benchmark'] = new Benchmark;
        $data['company'] = Company::find($company);
        $data['keywords'] = $data['company']->keywords();


        return view("benchmarks/create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateBenchmark $request)
    {
        $company_id = $request->input('company');
        $benchmark = new Benchmark;
        $benchmark->date = $request->input('date');
        $benchmark->company_id = $request->input('company');

        $benchmark->save();

        $page_ranks = [];
        foreach ($request->page_rank as $key => $value) {
            $page_rank = new PageRank;
            $page_rank->value = $value;
            $page_rank->keyword_id = $key;
            $page_rank->benchmark_id = $benchmark->id;
            array_push($page_ranks, $page_rank);
        }


        $benchmark->page_ranks()->saveMany($page_ranks);

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
        $data['benchmark'] = Benchmark::find($id);
        $data['page_ranks'] = PageRank::with('keyword')->where('benchmark_id', $id)->get();


        return view('benchmarks/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, $company)
    {
        $data['benchmark'] = Benchmark::find($id);
        $data['company'] = $company;
        $data['page_ranks'] = $data['benchmark']->page_ranks()->get();


        return view('benchmarks/edit', $data);
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

        foreach ($request->input('page_rank') as $index => $page_rank) {
            $temp = PageRank::find($index);
            $temp->value = $page_rank;
            $temp->save();
        }

        $benchmark = Benchmark::find($id);
        $benchmark->date = $request->input('date');
        $benchmark->save();

        return redirect("benchmarks/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Benchmark::destroy($id);
    }


    public function compare(CompareBenchmarks $request)
    {
        $benchmark_ids = $request->input('compare');
        $benchmarks = Benchmark::whereIn('id', $benchmark_ids)->orderBy('date', 'ASC')->get();
        $company = Company::find($request->input('company'));
        $keywords = $company->keywords();


        $results = [];


        foreach ($benchmarks[0]->page_ranks as $key => $page_rank) {
            $keyword = $page_rank->keyword->text;

            $value = $benchmarks[0]->page_ranks[$key]->value - $benchmarks[1]->page_ranks[$key]->value;

            array_push($results, $value);
        }

        $data['benchmarks'] = $benchmarks;
        $data['results'] = $results;
        $data['keywords'] = $keywords;
        $data['company'] = $company;

        return view('benchmarks.compare', $data);

    }

}
