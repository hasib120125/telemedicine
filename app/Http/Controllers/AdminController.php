<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Patient;
use App\Models\Treatment;
use App\Models\Transaction;
use App\Models\RechargeDetail;
use Illuminate\Http\Request;
use App\Mail\RegistrationComplete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['username' => $data['username'], 'password' => $data['password'], 'status' => '1']))
            {
                return redirect('/admin/dashboard');
            }else
            {
                return redirect('/user-login')->with('flash_message_error','Invalid Email or Password');
            }
        }
        return view('admin.login');
    }

    public function registration(){
        return view('admin.registration');
    }

    public function registrationSave(Request $request){
        $this->validate(
            $request,
            [
              'fname' => 'required',
              'lname' => 'required',
              'username' => 'required|unique:users',
              'email' => 'required|unique:users',
              'pass' => 'required',
              'cpass' => 'required',
              'user_type' => 'required',
              'phone' => 'required|unique:users',
              'area' => 'required',
            ]
        );

        if($request->hasFile('profile_picture')){
            $image = Input::file('profile_picture');
            $imageName  = time() . '.' . $image->getClientOriginalExtension();
            $imageExtension = public_path('profile/' . $imageName);
            Image::make($image->getRealPath())->resize(200, 100)->save($imageExtension);

            $insert = [
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'phone' => $request->phone,
                'country' => $request->country,
                'area' => $request->area,
                'thana' => $request->thana,
                'district' => $request->district,
                'postal_code' => $request->postal_code,
                'gender' => $request->gender,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->pass),
                'confirm_password' => Hash::make($request->cpass),
                'user_type' => $request->user_type,
                'doctor_type' => $request->doctor_type,
                'specialization' => $request->specialization,
                'fee' => $request->fee,
                'visiting_hour' => $request->visiting_hour,
                'degree' => $request->degree,
                'chamber' => $request->chamber,
                'skype' => $request->skype,
                'whatsapp' => $request->whatsapp,
                'viber' => $request->viber,
                'imo' => $request->imo,
                'status' => $request->status,
                'profile_picture' => 'profile/'.$imageName,
                ];
        }else {
            $insert = [
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'phone' => $request->phone,
                'country' => $request->country,
                'area' => $request->area,
                'thana' => $request->thana,
                'district' => $request->district,
                'postal_code' => $request->postal_code,
                'gender' => $request->gender,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->pass),
                'confirm_password' => Hash::make($request->cpass),
                'user_type' => $request->user_type,
                'doctor_type' => $request->doctor_type,
                'specialization' => $request->specialization,
                'fee' => $request->fee,
                'visiting_hour' => $request->visiting_hour,
                'degree' => $request->degree,
                'chamber' => $request->chamber,
                'skype' => $request->skype,
                'whatsapp' => $request->whatsapp,
                'viber' => $request->viber,
                'imo' => $request->imo,
                ];
        }
        $id = DB::table('users')->insertGetId($insert);
        Mail::send(new RegistrationComplete($id));
        return redirect('registration-complete');
    }

    public function registrationComplete(){
        return view('admin.registration-complete');
    }

    public function dashboard(){
        $user = DB::table('users')->where('user_type', 'user')->get(); //Admin Variable
        $patient = Patient::get();
        $treatment = DB::table('treatments')->get();
        $doctor = DB::table('users')->where('user_type', 'doctor')->get();
        $transction = Transaction::where('status', 1)->get();
        $rechargedetail = RechargeDetail::where('status', 1)->get();

        //Doctor Variable
        $doctor_dashboard = Treatment::where('doctor_id', auth()->user()->id)->get();         
        
        //User Variable
        $user_patient = Patient::where('user_id', auth()->user()->id)->get();  
        $user_treatment = Treatment::where('user_id', auth()->user()->id)->get(); 
        $user_treatment_pending = Treatment::where('user_id', auth()->user()->id)->where('status','0')->get(); 
        $user_treatment_complete = Treatment::where('user_id', auth()->user()->id)->where('status','1')->get(); 
        $user_treatment_cancel = Treatment::where('user_id', auth()->user()->id)->where('status','2')->get();
        $user_total_recharge = RechargeDetail::where('user_id', auth()->user()->id)->where('status', 1)->get(); 
        $user_total_fee = Treatment::where('user_id', auth()->user()->id)->get();         

        return view('admin.dashboard', compact('user','patient','doctor','treatment', 'transction','rechargedetail','doctor_dashboard','user_patient','user_treatment','user_treatment_pending','user_treatment_complete','user_treatment_cancel','user_total_recharge','user_total_fee'));
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('flash_message_success','Logout Successfully Done');
    }

    public function create() {
      
        return view('admin.admins.create');
    }
    
    public function store(Request $request) 
    {       
            
        if($request->hasFile('profile_picture')){
            $image = Input::file('profile_picture');
            $imageName  = time() . '.' . $image->getClientOriginalExtension();
            $imageExtension = public_path('profile/' . $imageName);
            Image::make($image->getRealPath())->resize(200, 100)->save($imageExtension);          

            $user = new User;
            $user->first_name       = $request->first_name;
            $user->last_name        = $request->last_name;
            $user->profile_picture  = 'profile/'.$imageName;
            $user->phone            = $request->phone;
            $user->country          = $request->country;
            $user->area             = $request->area;
            $user->thana            = $request->thana;
            $user->district         = $request->district;
            $user->user_type        = $request->user_type;
            $user->status           = $request->status;
            $user->username         = $request->username;
            $user->email            = $request->email;
            $user->password         = Hash::make($request->password);
            $user->confirm_password = Hash::make($request->confirm_password);

            $user->save(); 

        }  else{
            $user = new User;
            $user->first_name       = $request->first_name;
            $user->last_name        = $request->last_name;
            $user->phone            = $request->phone;
            $user->country          = $request->country;
            $user->area             = $request->area;
            $user->thana            = $request->thana;
            $user->district         = $request->district;
            $user->user_type        = $request->user_type;
            $user->status           = $request->status;
            $user->username         = $request->username;
            $user->email            = $request->email;
            $user->password         = Hash::make($request->password);
            $user->confirm_password = Hash::make($request->confirm_password);

            $user->save(); 
        }
        return redirect('admin-list')->with('flash_message_success',
             'User successfully Created.');
    }

    public function adminList(){
        $admins = DB::table('users')->where('user_type','admin')->orderby('id','desc')->get();
        return view('admin.admins.admin-list', compact('admins'));
    }

    public function edit($id){
        $admin = User::findOrFail($id); 
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, $id) {
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
            $user->username = $request->username;
            $user->email      = $request->email;
            $user->save();
        }

        return redirect()->route('admin-list')
            ->with('flash_message_success',
             'Doctor successfully edited.');

        
    }

    public function destroy($id) {
        $faqs = DB::table('users')->where('id', $id)->delete();
        Session::flash('flash_message_success', 'users Deleted Successfully !');
        return redirect('admin-list');
    }
}
