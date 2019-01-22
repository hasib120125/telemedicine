<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use DB;
use Auth;
use Session;

class PatientController extends Controller
{ 
   
    public function index()  //Patient list
    {
        $patients  = DB::table('patients')->orderby('id','desc')->get();
        
        return view('admin.patient.index',compact('patients'));
    }

    public function view(){
        $patients = DB::table('patients')->where('user_id', auth()->user()->id)->get();
        return view('admin.patient.patient-list', compact('patients'));
    }
    
    public function create()
    {
        return view('admin.patient.create');
    }

    
    public function store(Request $request) 
    {   
        $this->validate(
            $request,
            [
              'name' => 'required',
              'birth' => 'required',
              'mobile' => 'required|unique:patients',
              'email' => 'required|unique:patients',
              'age' => 'required',
              'religion' => 'required',
              'occupation' => 'required',
              'gender' => 'required',
            ]
        );
        
        if($request->hasFile('image'))
        {
            $image = $request->image->getClientOriginalName();            
            $request->image->storeAs('public/upload',$image);            

            $patient = new Patient;
            $patient->user_id      = auth()->user()->id;
            $patient->name         = $request->name;
            $patient->mobile       = $request->mobile;
            $patient->email       = $request->email;
            $patient->image        = $image;
            $patient->birth        = date('Y-m-d', strtotime($request->birth));
            $patient->age          = $request->age;
            $patient->religion     = $request->religion;
            $patient->occupation   = $request->occupation;
            $patient->gender       = $request->gender;
            $patient->m_status     = $request->m_status;
            $patient->save(); 

        } else{
                $patient = new Patient;
                $patient->user_id      = auth()->user()->id;
                $patient->name         = $request->name;
                $patient->mobile       = $request->mobile;
                $patient->email       = $request->email;
                $patient->birth        = date('Y-m-d', strtotime($request->birth));
                $patient->age          = $request->age;
                $patient->religion     = $request->religion;
                $patient->occupation   = $request->occupation;
                $patient->gender       = $request->gender;
                $patient->m_status     = $request->m_status;
                $patient->save(); 
    
            }  
        return redirect('patient-list');
    }

    public function show($id)
    {
        $patient  = Patient::findOrFail($id);
        return view ('patients.show', compact('patient'));
    }
    
    //Manage post
    public function manage()
    {   
        if(auth()->check()){
            $patients = Patient::where('user_id', auth()->user()->id)->get();
            $patients = Patient::orderBy('id', 'DESC')->get(); //Latest post show first

            return view('patients.manage', compact('patients'));
        }
        else {
            return view('patients.index');
        }
    }

    
    public function edit($id)
    {
        // dd($id);
        $patient = Patient::findOrFail($id);
        return view('admin.patient.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        if($request->hasFile('image'))
        {
            $image = $request->image->getClientOriginalName();            
            $request->image->storeAs('public/upload',$image);

            $update = [
                'name' => $request->name,
                'email' => $request->email,
                'image' => $image,
                'age' => $request->age,
                'mobile' => $request->mobile,
                'religion' => $request->religion,
                'occupation' => $request->occupation,
                'gender' => $request->gender,
                'm_status' => $request->m_status,
                ];
        }else{
            $update = [
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
                'mobile' => $request->mobile,
                'religion' => $request->religion,
                'occupation' => $request->occupation,
                'gender' => $request->gender,
                'm_status' => $request->m_status,
                ];
        }

        DB::table('patients')->where('id',$id)->update($update);

        return redirect('patient-list');
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect()->back();
    }
}