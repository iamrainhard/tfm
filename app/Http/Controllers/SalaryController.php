<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
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
        $psalary = Salary::where('name', 'picker')->first();
        $ssalary = Salary::where('name', 'supervisor')->first();
        return view('admin.salary', compact('psalary', 'ssalary'));
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
            'salary'=>['required','numeric'],
            'commission'=>['required','numeric']
        ]);
        $final = ([
            'name' => $data['name'],
            'salary' => round($data['salary'], 2),
            'commission' => round($data['commission'], 2)
        ]);
        Salary::create($final);
        return redirect('/salary')->with('status', 'Payment Records Stored Successful');
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
        $salary = Salary::findOrFail($id);
        return view('admin.editsalary',compact('salary'));
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
        $salary = Salary::findOrFail($id);
        $data = $request->validate([
            'name'=>['required'],
            'salary'=>['required','numeric'],
            'commission'=>['required','numeric']
        ]);
        $final = ([
            'name' => $data['name'],
            'salary' => round($data['salary'], 2),
            'commission' => round($data['commission'], 2)
        ]);
        $salary->update($final);
        return redirect('/salary')->with('status', 'Payment Records Updated Successful');
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
