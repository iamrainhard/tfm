<?php

namespace App\Http\Controllers;
use App\Models\Revenue;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mrevenue = Revenue::where('name', 'monthly')->first();
        $yrevenue = Revenue::where('name', 'yearly')->first();
        return view('admin.revenue', compact('mrevenue', 'yrevenue'));
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
        $data = $request->validate([
            'name'=>['required'],
            'amount'=>['required','numeric'],
        ]);
        $final = ([
            'name' => $data['name'],
            'amount' => round($data['amount'], 2),
        ]);
        Revenue::create($final);
        return redirect('/revenue')->with('status', 'Revenue Records Stored Successful');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revenue = Revenue::findOrFail($id);
        return view('admin.editrevenue',compact('revenue'));
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
        $revenue = Revenue::findOrFail($id);
        $data = $request->validate([
            'name'=>['required'],
            'amount'=>['required','numeric'],
        ]);
        $final = ([
            'name' => $data['name'],
            'amount' => round($data['amount'], 2),
        ]);
        $revenue->update($final);
        return redirect('/revenue')->with('status', 'Revenue Records Updated Successful');
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
}
