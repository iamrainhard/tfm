<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductionController extends Controller
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
//        $this->authorize('isSuper',);
//        dd(Carbon::today());
        $prods = Production::whereDate('created_at', Carbon::today())->get();
        $pickers = User::where('role', 'picker')->where('status', 'active')->get();
        return view('supervisor.production', compact('pickers', 'prods'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required'],
            'quantity' => ['required', 'numeric', 'between:0,99.99']
        ]);
        $proddata = ([
            'user_id' => $data['user_id'],
            'quantity' => round($data['quantity'], 2)
        ]);
        Production::create($proddata);
        return redirect('/production')->with('status', 'Production Record Stored Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Production::findOrFail($id);
        return view('supervisor.editprod', compact('prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Production::findOrFail($id);
        $data = $request->validate([
            'user_id' => ['required'],
            'quantity' => ['required', 'numeric', 'between:0,99.99']
        ]);

        $record->update($data);
        return redirect('/production')->with('status', 'Production Record Updated Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Production::findOrFail($id);
        $record = Production::destroy($id);
        return redirect('/production')->with('status', 'Production Record Deleted Successful');
    }
}
