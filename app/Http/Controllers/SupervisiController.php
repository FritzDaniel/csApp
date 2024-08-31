<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataNasabah;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApproveMail;
use App\Models\User;

class SupervisiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function nasabahAll() 
    {
        $data = DataNasabah::orderBy('created_by','ASC')->get();
        return view('dataNasabahAll.index', compact('data'));
    }

    public function nasabahDetail($id) 
    {
        $data = DataNasabah::where('id','=',$id)->first();
        return view('dataNasabahAll.detail', compact('data'));
    }

    public function approve(Request $request, $id) 
    {
        $data = DataNasabah::where('id','=',$id)->first();
        $data->status = 1;
        $data->update();

        //Mail::to($data->User->email)->send(new ApproveMail());

        return redirect()->route('nasabahAll')->with('message', 'success');
    }

    public function reject(Request $request, $id) 
    {
        $data = DataNasabah::where('id','=',$id)->first();
        $data->status = 2;
        $data->update();

        return redirect()->route('nasabahAll')->with('message', 'success');
    }

    public function dataCs() {
        $data = User::where('role','=','cs')->get();
        return view('dataUser.index',compact('data'));
    }

    public function unblockCs($id)
{
        $user = User::find($id);
        if ($user) {
            $user->is_blocked = 0;
            $user->save();
        }

    return back()->with('success', 'User has been unblocked.');
}
}
