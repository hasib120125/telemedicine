<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Models\User;
use App\Models\Patient;
use App\Models\Treatment;
use App\Models\RechargeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\Storage;

class TreatmentController extends Controller
{
    public function create($id){
        $treatments = DB::table('treatments')->where('id', $id)->first();
        return view('admin.treatment.create',compact('treatments'));
    }

    public function view(){
    
        $treatments  = Treatment::all();
        // dd($treatments);   
        return view('admin.treatment.view',compact('treatments'));
    }

    public function store(Request $request, $id){
        $doctor   = User::where('user_type', 'doctor')->where('id', auth()->user()->id)->first();

        $treatmtntupdate = [
            'description' => $request->description,
            'advice' => $request->advice,
            'tests' => $request->test,
            'prescription_id' => $id,
            'fee' => $doctor->fee,
            'treatment_time' => Carbon::now(),
            ];

        DB::table('treatments')->update(['status' => '1']);
        DB::table('treatments')->where('id',$id)->update($treatmtntupdate);
        
        $user_id =  Treatment::where('id',$id)->value('user_id');   
        $user_balance = DB::table('user_balances')->where('user_id',$user_id)->first(); 
        
        $updateUserBalance = [
            'balance' =>  $user_balance->balance - $doctor->fee,
            'updated_at' => Carbon::now(),
            ];
        
        $user_id = Treatment::where('id',$id)->first();

        $balances =  DB::table('user_balances')->where('user_id',$user_id->user_id)->update($updateUserBalance);
    
        $treatment = DB::table('treatments')->where('id', $id)->first(); 

        $insertTransaction = [
            'user_id' => $user_id->user_id,
            'transaction_time' => Carbon::now(),
            'debit' => $request->debit,
            'credit' => $doctor->fee,
            'balance' => $user_balance->balance - $doctor->fee,
            'details' => $request->advice,
            'party' => auth()->user()->id,
            'amount' => $doctor->fee,
            'ref_number' => $treatment->patient_id,
            'status' => $treatment->status,
            'created_at' => Carbon::now(),
        ];
        
        DB::table('transactions')->where('user_id', $id)->insert($insertTransaction);

        return redirect('treatment-view');
    }

    public function allPrescription(){
        $prescriptions = Treatment::all();
        return view('admin.treatment.all_prescription', compact('prescriptions'));
    }

    public function prescriptionView($id){

        $prescription = Treatment::where('id', $id)->first();

        $doctors = DB::table('users')->where('user_type', 'doctor')->where('id', $prescription->doctor_id)->first();

        $users = DB::table('users')->where('user_type', 'user')->where('id', $prescription->user_id)->first();

        return view('admin.treatment.prescription', compact('prescription', 'users', 'doctors'));
    }

    public function downloadPDF($id){

        $treatments = Treatment::where('id', $id)->first();

        $doctors = DB::table('users')->where('user_type', 'doctor')->where('id', $treatments->doctor_id)->first();

        $users = DB::table('users')->where('user_type', 'user')->where('id', $treatments->user_id)->first();

        $data = [
            'doctor_first_name' => $doctors->first_name,
            'doctor_last_name' => $doctors->last_name,
            'degree' => $doctors->degree,
            'specialization' => $doctors->specialization,
            'user_first_name' => $users->first_name,
            'user_last_name' => $users->last_name,
            'area' => $users->area,
            'thana' => $users->thana,
            'district' => $users->district,
            'postal_code' => $users->postal_code,
            'patient_name' => $treatments->patient->name,
            'patient_age' => $treatments->patient->age,
            'patient_gender' => $treatments->patient->gender,
            'patient_treatment_time' => $treatments->patient->treatment_time,
            'syntoms' => $treatments->syntoms,
            'weight' => $treatments->weight,
            'height' => $treatments->height,
            'temperature' => $treatments->temperature,
            'pulse' => $treatments->pulse,
            'pressure' => $treatments->pressure,
            'glucose' => $treatments->glucose,
            'advice' => $treatments->advice,
            'test' => $treatments->test,
            'description' => $treatments->description,
            'prescription_id' => $treatments->prescription_id,
        ];

        \PDF::loadView('admin.treatment.pdf', $data, [], [
            'format' => 'Letter-L',
            ])->stream(\Storage::path('prescription/'.$treatments->id.'.pdf'));
    }

    public function treatmentCancel($id){
        $user_id = Treatment::where('id',$id)->first();
        $user_balance = DB::table('user_balances')->where('user_id', $user_id->user_id)->first();
        $doctor = DB::table('users')->where('user_type', 'doctor')->where('id', auth()->user()->id)->first();
        $updateUserBalance = [
            'available_balance' =>  $user_balance->available_balance + $doctor->fee,
            ];

        DB::table('user_balances')->where('user_id',$user_id->user_id)->update($updateUserBalance);
        
        DB::table('treatments')->where('user_id',$user_id->user_id)->update(['status' => '2']);

        return redirect('treatment-view');
    }

    public function patientTreatment(){
        $doctors = DB::table('users')->where('user_type','doctor')->orderby('id','desc')->get();
        $user_balances = DB::table('user_balances')->where('status','1')->where('user_id',auth()->user()->id)->first();
        return view('frontend.doctor',compact('doctors','user_balances'));
    }

    public function patientTreatmentList(){
        
    }
}
