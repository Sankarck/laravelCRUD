<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HospitalModel;
use App\SignupModel;
use Carbon\Carbon;

class HospitalController extends Controller
{
    public function signup()
        {
            return view('Hospital/signup');
        }
    
    public function cancel()
        {
            return view('Hospital/login');
        }

    public function storeSignupDetails(Request $signupData)
        {   
            $this->validate($signupData,[
                'username'=>'required',
                'email'=>'required|email|unique:signup,Email',
                'password'=>'required'  
                ]);
            $signup = new SignupModel;//Model name
            $signup->Name= $signupData->username;
            $signup->Email= $signupData->email;
            $signup->Password = $signupData->password;
            $signup->Usertype = $signupData->usertype;
            $signup->save();
            
            return redirect('login');        
        }

    public function loginForm()
        {
            return view('Hospital/login');
        }
    //For inserting login data into database and validating it
    public function storeLoginForm(Request $loginData)
        {
            $this->validate($loginData,[
                'email'=>'required',
                'password'=>'required'  
                ]);

        //      $signup_details=SignupModel::where('Email',$loginData->email)->first();  
        //      if($signup_details)  //checking whether the email is there or not
        //      {
        //          if($signup_details->password==$loginData->password) //checking the password
        //          {   
        //              $temp="";  //declaring temporary variable for authentication
        //              $temp=$signup_details->Usertype;
        //              if($temp =="admin"){
        //                  return redirect('patientDetails'); 
        //              }
        //              else if($temp=="doctor"){
        //                  return redirect('displayfordoctorview');
        //              }
        //          }
        //          else
        //              return back()->with('invalid_password','Invalid Password');
        //      }
        //      else
        //          return back()->with('invalid_password',"Invalid Email");
        //    }
        
            
            $logindata=SignupModel::all();
            
            foreach($logindata as $temp)
            {
                if($loginData->email==$temp->Email && $loginData->password==$temp->Password)
                {
                $user= $temp->Usertype;
                }
            }  
            if($user=='admin')
                {
                return redirect('patientDetails');
                } 
            elseif($user=='doctor')
                {   
                return redirect('displayfordoctorview');
                }   
            else
                { 
                    echo "Error :  The username or password is incorrect <br>";
                }
            
        }

    public function patientDetailsForm()
        {
            return view('Hospital/Patient_details');
        }

    public function storePatientDetails(Request $patientdetails)
        {
        
                $this->validate($patientdetails,[
                'patient_name' => 'required',
                'dob'=>'required',
                'Treatment'=>'required',
                'description'=>'required'
                ]);

            //For uploading image
            $baseUrl="http://localhost/Hospital/public/image";
            $imageName = time().'.'.$patientdetails->image->getClientOriginalExtension();
            $patientdetails->image->move(public_path('image'), $imageName);
            $imageUrl=$baseUrl.$imageName;
            
            $Hospitaldata = new HospitalModel;//Model name
            $Hospitaldata->Name= $patientdetails->patient_name;
            $Hospitaldata->DOB= Carbon::parse($patientdetails->dob);
            $Hospitaldata->Age = $patientdetails->age;
            $Hospitaldata->Sex =$patientdetails->gender;
            $checkbox=$patientdetails->Treatment;
            $problem="";
            foreach($checkbox as $temp) //For entering the checkbox values separately
            {
                $problem.=$temp.",";
            }
            $Hospitaldata->Treatment = $problem;
            $Hospitaldata->Description = $patientdetails->description;
            $Hospitaldata->Images = $imageUrl; 
            $Hospitaldata->save();

            return redirect('displayData');  
    }
    public function displayData()
        {
            $patientdetails=new HospitalModel;
            $patient_data=$patientdetails::paginate(3);
            return view('Hospital/Displaydata')->with('patient_data', $patient_data);
        }
    public function doctorView()
        {
            $patientdetails=new HospitalModel;
            $patient_data=$patientdetails::paginate(3);
            return view('Hospital/forDoctorView')->with('patient_data', $patient_data);
        }

    //To display edit forms with values inserted
    public function editData($id)
        {
            $patientdetails=HospitalModel::find($id);
            return view('Hospital/Editform')->with('patientdetails', $patientdetails);
        }
    public function update(Request $editData)
        {
                $Edit_data=HospitalModel::find($editData->formId);
                $Edit_data->Name=$editData->patient_name;
                $Edit_data->DOB=Carbon::parse($editData->dob);
                $Edit_data->Age=$editData->age;
                $Edit_data->Description=$editData->description;
                $Edit_data->save();
                return redirect('displayData');
        }
    public function delete($id)
        {
            $patientdetails=HospitalModel::find($id);
            $patientdetails->delete();
            return redirect('displayData');
        }
    //For searching the username
    public function searchView(Request $searchQuery)
        {   
            $search=$searchQuery->search;
            $user=$searchQuery->Usertype;
            if($user=='admin')
            {
                $p_name = HospitalModel::where('Name', 'LIKE', '%'.$search.'%')->get();
                return view('Hospital/SearchresultForAdmin')->with('p_name',$p_name);
            }
            else
            {
                $p_name = HospitalModel::where('Name', 'LIKE', '%'.$search.'%')->get();
                return view('Hospital/searchresultForDoctor')->with('p_name',$p_name);
            }
        }
}
