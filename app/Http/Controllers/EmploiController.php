<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emploi;
use App\Description;


class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $emplois = Emploi::all();
        return view('emploi.index', ['emplois' => $emplois]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('emploi.show', 
                        ['emploi' => Emploi::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display an About page.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutPage()
    {
        //
        return view('emploi.about');
    }

    /**
     * Display a Statistic page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStatistics()
    {
        //
        return view('emploi.stats');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $route = \Route::current();

        $searchkey = $request('searchkey')
        //https://stackoverflow.com/questions/30549416/laravel-5-routes-and-variable-parameters-in-controllers
        $emplois = DB::table('emploi')
                ->where('JOBURL', 'like', $searchKey)
                ->get();
        return view('emploi.search', 
                        ['emploi' => $emplois ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        //
        $emplois = Emploi::all();
        return $emplois;
    }
}
