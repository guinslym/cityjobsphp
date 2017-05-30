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
    public function index(Request $request, $ordering=null)
    {
        //
        $ordering = $request->get('ordering');
        
        //expired 2 weeks ago
        //http://localhost:8000/?ordering=ago
        if ($ordering == 'ago') {
           $emplois = Emploi::orderBy('created_at', 'asc')->first();
           //return view('emploi.index', ['emplois' => $emplois]);
           return response()->json($emplois,200,[],JSON_PRETTY_PRINT);
        }
        // will expire 2 weeks from now
        //http://localhost:8000/?ordering=from
        elseif ($ordering == 'from') {
           $emplois = Emploi::orderBy('created_at', 'desc')->first();
           //return view('emploi.index', ['emplois' => $emplois]);
           return response()->json($emplois,200,[],JSON_PRETTY_PRINT);
        }else {
           $emplois = Emploi::all();
           //return view('emploi.index', ['emplois' => $emplois]);
           return response()->json($emplois,200,[],JSON_PRETTY_PRINT);
        }
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
