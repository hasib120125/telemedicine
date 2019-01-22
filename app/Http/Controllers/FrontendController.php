<?php

namespace App\Http\Controllers;
use DB;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Treatment;

// use App\User; 
// use App\Patient; 

class FrontendController extends Controller
{
    public function index()  //web landing page
    {
        return view('frontend.index');
    }

    public function show_doctor()  //Doctor list without login
    {
        $doctors  = DB::table('users')->where('user_type','doctor')->orderby('id','desc')->get();
        return view('frontend.show_doctor',compact('doctors'));
    }

    public function doctor()  //Doctor list with login must
    {
        $doctors = DB::table('users')->where('user_type','doctor')->orderby('id','desc')->get();
        $user_balances = DB::table('user_balances')->where('status','1')->where('user_id',auth()->user()->id)->first();
        return view('frontend.doctor',compact('doctors','user_balances'));
    }

    public function about()  
    {
        return view('frontend.about');
    }

    public function contact()  
    {
        return view('frontend.contact');
    }

    public function gellary()  
    {
        return view('frontend.gellary');
    }

    public function searchPatient(Request $request, $id)  
    {
        $doctor   = User::where('user_type','doctor')->where('id', $id)->first();
        $user_balances = DB::table('user_balances')->where('status','1')->where('user_id',auth()->user()->id)->first();
        return view('frontend.treatment.search_patient',compact('doctor'));
    }

    public function patientSearchResult(Request $request)
    {
        $patient = Patient::where('user_id',auth()->user()->id)->where('id',$request->patient_id)->first();
        $doctor   = User::where('id',$request->doctor_id)->first();
        if($patient)
        {
            return view('frontend.treatment.patient_search_result',compact('patient','doctor'));
        }else{
            return view('admin.patient.create')->with('flash_message_success','Have no Patient in this ID');
        }
    }


    public function patientInformation(Request $request)  
    {
        $patient = Patient::where('user_id',auth()->user()->id)->where('id',$request->patient_id)->first();
        $doctor   = User::where('id',$request->doctor_id)->first();
        if($patient)
        {
            return view('frontend.treatment.patient-information',compact('patient','doctor'));
        }else{
            return view('admin.patient.create')->with('flash_message_success','Have no Patient in this ID');
        }
    }
    public function patientInformationSave(Request $request, $id){

        $doctor   = User::where('id',$request->doctor_id)->first();

        $patients= DB::table('patients')->where('id', $id)->first();

        $user_balance = DB::table('user_balances')->where('user_id', auth()->user()->id)->first();

        $treatment = new Treatment;
        $treatment->user_id     = auth()->user()->id;
        $treatment->patient_id  = $patients->id;
        $treatment->doctor_id   = $doctor->id;
        $treatment->height      = $request->height;
        $treatment->weight      = $request->weight;
        $treatment->temperature = $request->temperature;
        $treatment->pulse       = $request->pulse_rate;
        $treatment->pressure    = $request->blood_pressure;
        $treatment->glucose     = $request->blood_glucose;
        $treatment->syntoms     = $request->symtoms;
        $treatment->status      = $request->status;
        $treatment->save();

        $updateUserBalance = [
            'available_balance' =>  $user_balance->available_balance - $doctor->fee,
            ];
        DB::table('user_balances')->where('user_id', auth()->user()->id)->update($updateUserBalance);

        return redirect('treatment-patient-list');

    }

    public function patientList()  
    {
        $treatments  = Treatment::paginate(10);
        return view('frontend.treatment.patient_list',compact('treatments'));
    }

}