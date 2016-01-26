<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF;
use App\Company;
use App\PageRank;
use App\Keyword;
use App\Benchmark;
use App\Http\Requests\CreateBenchmark;
use App\Http\Requests\CompareBenchmarks;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PrintBenchmarkRequest;

class BenchmarkController extends Controller
{

    public $pdf_view;
    public $neco = 2;

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
        // ids of benchmarks to compare
        $benchmark_id_a = $request->input('first_compare');;
        $benchmark_id_b = $request->input('second_compare');;

        // ids of benchmarks to compare
        $benchmark_ids = [$benchmark_id_a, $benchmark_id_b];
        // Get the pageranks which are associated with selected benchmarks
        $page_ranks = PageRank::whereHas('benchmark', function( $query ) use ($benchmark_ids) {
            $query->whereIn('id', $benchmark_ids);
        })->with('keyword')->with('benchmark')->get();

        // get the benchmarks which we grabbed with previous request
        $benchmarks = Benchmark::whereIn('id', [$benchmark_id_a, $benchmark_id_b])->with('page_ranks')->get(); 
        $keywords = $page_ranks->unique('keyword')->pluck('keyword');

        $page_ranks_a = $page_ranks->filter(function ($item) use ($benchmark_id_a) {
            return $item->benchmark->id == $benchmark_id_a;
        });
        $page_ranks_b = $page_ranks->filter(function ($item) use ($benchmark_id_b) {
            return $item->benchmark->id == $benchmark_id_b;
        })->flatten();

        $results = [];
        foreach($page_ranks_a as $index => $page_rank){
            $val_a = $page_rank->value;
            $val_b = $page_ranks_b[$index]->value;
            
            $results[$index] = $val_a - $val_b;
        }

        $data = [
            'page_ranks' => $page_ranks,
            'benchmarks' => $benchmarks,
            'results' => $results,
            'keywords' => $keywords
        ];

        return view('benchmarks.compare', $data);

    }



    public function print_pdf($bench_id_a, $bench_id_b, PrintBenchmarkRequest $request)
    {

        $benchmarks = Benchmark::whereIn('id', [$bench_id_a, $bench_id_b])->with('page_ranks')->get();
        $page_ranks = PageRank::whereIn('benchmark_id', [$bench_id_a, $bench_id_b])->with('keyword')->get();
        $keywords = $page_ranks->pluck('keyword')->unique();

        // page ranks of first benchmark
        $page_ranks_a = $benchmarks->pluck('page_ranks')[0];
        // page ranks of second benchmark
        $page_ranks_b = $benchmarks->pluck('page_ranks')[1];

        $results = [];
        foreach ($page_ranks_a as $key => $page_rank) {
            $results[] = $page_rank->value - $page_ranks_b[$key]->value;
        }

        $data = [
            'benchmarks' => $benchmarks,
            'page_ranks' => $page_ranks,
            'keywords' => $keywords,
            'results' => $results,
        ];

        // return view('pdf.benchmarks_compare', $data);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.benchmarks_compare', $data);
        return $pdf->stream();

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadView('pdf.benchmarks_compare', $data);
        // return $pdf->stream();       
    }

}
