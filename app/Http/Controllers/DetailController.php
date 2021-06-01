<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DetailController extends Controller
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
        $this->authorize('isAdmin');
        $pickers = User::where('role', 'picker')->get();
//        dd($users);
        return view('admin.viewpicker', compact('pickers'));
    }

    public function supervisorView()
    {
        $this->authorize('isAdmin');
        $supervisors = User::where('role','supervisor')->get();
        $pickers = User::where('role','picker')->get();
//        dd($supervisors);
        return view("admin.supervisor", compact('supervisors','pickers'));
    }

    public function supervisorEdit(Request $request, $supervisor )
    {
        $this->authorize('isAdmin');
//        dd($supervisor);
        $user = User::findOrFail($supervisor);

        $data = $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$supervisor],
            'nationality' => ['required', 'string'],
            'national_id' => ['required', 'string', 'min:6'],
            'phone' => ['required', 'phone:TZ,KE,UG']
        ]);
        $userdata = ([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'gender' => $data['gender']
        ]);

        $userdetails = ([
            'nationality' => $data['nationality'],
            'national_id' => $data['national_id'],
            'phone' => $data['phone']
        ]);

        $user->update($userdata);
//        dd($user);
        $details = $user->detail()->update($userdetails);

        return redirect('/supervisor')->with('status', 'Supervisor Updated Successful');
    }

    public function supervisorAppoint(Request $request)
    {
        $this->authorize('isAdmin');
        $data = $request->validate([
            'user_id' => ['required']
        ]);

        $old = User::where('role', 'supervisor')->first();
        if ($old !== null) {
//            dd($old->id);
            $old->role = 'picker';
            $old->save();
        }
        $appointed = User::findOrFail($data['user_id']);
        $appointed->role = 'supervisor';
        $appointed->salary_id = '2';
        $appointed->save();
        return redirect('/supervisor')->with('status', 'Supervisor Appointed Successful');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isAdmin');
        return view('admin.addpicker');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');
        $data = $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nationality' => ['required', 'string'],
            'national_id' => ['required', 'string', 'min:6'],
            'phone' => ['required', 'phone:TZ,KE,UG']
        ]);

        $userdata = ([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password'])
        ]);

        $userdetails = ([
            'nationality' => $data['nationality'],
            'national_id' => $data['national_id'],
            'phone' => $data['phone']
        ]);
//        dd($userdetails);


        $user = User::create($userdata);
        $details = $user->detail()->create($userdetails);

        return redirect('/pickers')->with('status', 'Tea Picker Registered Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('isAdmin');
        $picker = User::findOrFail($id);
        return view('admin.editpicker', compact('picker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $picker)
    {
        $this->authorize('isAdmin');
        $user = User::findOrFail($picker);

        $data = $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$picker],
            'nationality' => ['required', 'string'],
            'national_id' => ['required', 'string', 'min:6'],
            'phone' => ['required', 'phone:TZ,KE,UG']
        ]);
        $userdata = ([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'gender' => $data['gender']
        ]);

        $userdetails = ([
            'nationality' => $data['nationality'],
            'national_id' => $data['national_id'],
            'phone' => $data['phone']
        ]);

        $user->update($userdata);
//        dd($user);
        $details = $user->detail()->update($userdetails);

        return redirect('/pickers')->with('status', 'Tea Picker Updated Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy($picker)
    {
        $this->authorize('isAdmin');
//        dd(User::findOrFail($picker));
        User::findOrFail($picker);
        $user = User::destroy($picker);
        Detail::where('user_id', $picker)->delete();
        return redirect('/pickers')->with('status', 'Tea Picker Deleted Successful');
    }
}
