<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Company;
use App\Benchmark;
use App\Http\Requests\CreateBenchmark;
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
        $data['company'] = $company;
        $data['keywords'] = Company::find($company)->getKeywords();

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
        $benchmark->benchmark_data = $request->input('benchmark_data');
        $benchmark->company_id = $request->input('company');

        $benchmark->save();

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
        $data['keywords'] = $data['benchmark']->company->getKeywords();

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
        $benchmark_data['benchmark'] = Benchmark::find($id);
        $benchmark_data['company'] = $company;
        $benchmark_data['keywords'] = Company::find($company)->getKeywords();


        return view('benchmarks/edit', $benchmark_data);
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
        $benchmark = Benchmark::find($id);
        $benchmark = $benchmark->update($request->all());

        dd($benchmark);


        return redirect("benchmarks/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Benchmark::destroy($id);
    }


    public function compare()
    {
        $benchmarks = json_decode(Input::get('benchmarks_arr'));

        $benchmarks = Benchmark::whereIn('id', $benchmarks)->orderBy('date', 'DESC')->get();


        $data['benchmarks'] = $benchmarks;
        $data['keywords'] = $benchmarks->first()->company->getKeywords();
        $data['compared'] = $benchmarks->first()->compare($benchmarks->last()->id);



        return view('benchmarks/compare', $data);
    }

}
