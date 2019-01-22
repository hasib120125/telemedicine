<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Treatment;
use App\Models\User;

class DoctorController extends Controller
{
    public function index(){
        $users = User::where('username','!=', 'sa')->orderby('id','desc'); 
        return view('admin.doctor.index')->with('users', $users);
    }

    public function view(){
        $doctors = DB::table('users')->where('user_type','doctor')->orderby('id','desc')->get();
        return view('admin.doctor.doctor-list', compact('doctors'));
    }

    public function doctorAccount(){
        $accounts = Treatment::where('doctor_id', auth()->user()->id)->where('status', '1')->get();
        return view('admin.doctor.account', compact('accounts'));
    }

    public function doctorBill(){
        $doctors = Treatment::all();
        return view('admin.doctor.bills', compact('doctors'));
    }
   
    public function edit($id){
        $doctor = User::findOrFail($id); 
        return view('admin.doctor.edit', compact('doctor'));
    }

    public function update(Request $request, $id) {
        $user             = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->phone      = $request->phone;
        $user->country    = $request->country;
        $user->area       = $request->area;
        $user->thana      = $request->thana;
        $user->district   = $request->district;
        $user->postal_code = $request->postal_code;
        $user->email      = $request->email;
        $user->save();

        return redirect()->route('doctor-list')
            ->with('flash_message_success',
             'Doctor successfully edited.');
    }

    public function destroy($id) {
        $faqs = DB::table('users')->where('id', $id)->delete();
        Session::flash('flash_message_success', 'users Deleted Successfully !');
        return redirect('admin.doctor-list');
    }

    public function activeStatus($id){
        DB::table('users')->where('id', $id)->update(['status' => '1']);
        return redirect('doctor-list');
    }
    public function pendingStatus($id){
        DB::table('users')->where('id', $id)->update(['status' => '0']);
        return redirect('doctor-list');
    }
}