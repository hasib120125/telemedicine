<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\User;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\RegistrationConfirm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
    //Get all users and pass it to the view
        $users = User::where('username','!=', 'sa')->orderby('id','desc')->paginate(10); 
        return view('admin.users.index')->with('users', $users);
    }

    public function view(){
        $users = DB::table('users')->where('user_type','user')->orderby('id','desc')->get();
        return view('admin.users.user-list', compact('users'));
    }
        

    public function userAccount(){

        $accounts = UserBalance::where('user_id', auth()->user()->id)->where('status', '1')->get();

        return view('admin.users.account', compact('accounts'));
    }
    
    public function userBalance(){

        $balances = UserBalance::all();

        return view('admin.users.balance', compact('balances'));
    }

    public function transaction(){
        $transactions = Transaction::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.users.transaction', compact('transactions'));
    }

    public function manage() {
        $users = User::where('username','!=', 'sa')->orderby('id','desc')->paginate(10); 
        return view('admin.users.manage')->with('users', $users);
    }
    
    public function edit($id) {
        $user = User::findOrFail($id); 
        return view('admin.users.edit', compact('user'));

    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        if($request->hasFile('profile_picture')){
            $image = Input::file('profile_picture');
            $imageName  = time() . '.' . $image->getClientOriginalExtension();
            $imageExtension = public_path('profile/' . $imageName);
            Image::make($image->getRealPath())->resize(200, 100)->save($imageExtension);

            $user             = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name  = $request->last_name;
            $user->profile_picture  = 'profile/'.$imageName;
            $user->phone      = $request->phone;
            $user->country    = $request->country;
            $user->area       = $request->area;
            $user->thana      = $request->thana;
            $user->district   = $request->district;
            $user->user_type        = $request->user_type;
            $user->username = $request->username;
            $user->email      = $request->email;
            $user->save();
        }else{
            $user             = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name  = $request->last_name;
            $user->phone      = $request->phone;
            $user->country    = $request->country;
            $user->area       = $request->area;
            $user->thana      = $request->thana;
            $user->district   = $request->district;
            $user->user_type        = $request->user_type;
            $user->username = $request->username;
            $user->email      = $request->email;
            $user->save();
        }
    
        return redirect('admin-users-manage')->with('flash_message_success',
            'User successfully edited.');
            
    }
    

    public function activeStatus(Request $request, $id){
        $account_balance = 0;
        $balance_status = 1;
        $balance = new UserBalance;
        $balance->user_id  = $id;
        $balance->balance  =$account_balance;
        $balance->available_balance = $account_balance;
        $balance->comission = $account_balance;
        $balance->status = $balance_status;
        $balance->created_by          = $request->created_by;
        $balance->created_at = Carbon::now();
        $balance->save(); 
        DB::table('users')->where('id', $id)->update(['status' => '1']);

        return redirect('user-list');
    }

    //Edit Password
    public function changepassword($id) {
        $user = User::findOrFail($id); 
        return view('admin.users.changepassword', compact('user'));

    }

    //Update Password 
    public function update_password(Request $request, $id) {
        $user = User::find($id);
        $user->password   = Hash::make($request->password);
        $user->save();

        return redirect('admin-user-manage')->with('flash_message_success','User successfully edited.');
    }

    public function pendingStatus($id){
        DB::table('users')->where('id', $id)->update(['status' => '0']);
        return redirect('user-list');
    }
    public function destroy($id) {
        $faqs = DB::table('users')->where('id', $id)->delete();
        Session::flash('flash_message_success', 'users Deleted Successfully !');
        return redirect('user-list');
    }
}