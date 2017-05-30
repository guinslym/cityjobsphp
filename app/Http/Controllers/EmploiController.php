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
        //return view('emploi.index', ['emplois' => $emplois]);
        return response()->json($emplois,200,[],JSON_PRETTY_PRINT);
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
        $emploi = Emploi::findOrFail($id);
        //return view('emploi.show', ['emploi' => $emplois]);
        return response()->json($emploi,200,[],JSON_PRETTY_PRINT);
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
        //return view('emploi.about');
        return response()->json('About page' ,200,[],JSON_PRETTY_PRINT);
    }

    /**
     * Display a Statistic page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStatistics()
    {
        //
        //return view('emploi.stats');
        return response()->json('Statistics' ,200,[],JSON_PRETTY_PRINT);
    }

    /**
     * Display a Statistic page AJAX call.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStatisticsJSON(Request $request)
    {
        //
        $annee = $request->get('annee');
        $mois = $request->get('mois');
        $jour = $request->get('jour');
        $emplois = DB::table('emploi')
                ->where('year', 'like', $searchKey)
                ->where('month', 'like', $searchKey)
                ->where('day', 'like', $searchKey)
                ->get();
        return response()->json('Statistics' ,200,[],JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        
        

        $searchkey = $request->get('search');
        //https://stackoverflow.com/questions/30549416/laravel-5-routes-and-variable-parameters-in-controllers
        $emplois = DB::table('emploi')
                ->where('JOBURL', 'like', $searchKey)
                ->get();
        //return view('emploi.search', ['emploi' => $emplois ]);
        return 0;
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
        return response()->json($emplois,200,[],JSON_PRETTY_PRINT);
    }
}
