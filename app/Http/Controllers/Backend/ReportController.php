<?php

namespace App\Http\Controllers\Backend;

use App\Models\OrganizationRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\Province;
use App\Models\OrganizationUpload;
use App\Models\OrganizationRepresentative;
use Auth;



/**
 * Class DashboardController.
 */
class ReportController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data =  OrganizationRegistration::where('status',0)->get();
        return view('backend.reports.registered',compact('data'));
    }

    function approve($id){ 

        $register = OrganizationRegistration::find($id);
        if(!$register)
        {
            abort(404);
        }
        $register->is_verified = 1;
        $register->status = 1;
        $register->updated_by = Auth::user()->name;
        $register->save();
       return "Form Approved Successfully";
    }

    function show_form($id){ 
     
        $result = OrganizationRegistration::
        leftjoin('organization_representatives','organization_representatives.org_rep_id','organization_registrations.id')
        ->leftjoin('organization_uploads','organization_uploads.org_reg_id','organization_registrations.id')
        ->where('organization_registrations.id',$id)->first();
   
        $province = Province::get();
        $signupStep=0;
        return view('backend.reports.show',compact('province','signupStep','result'));
    }

    public function reject_form(Request $r)
    {
        $v = array(
            'sel_app' => 'required',
            'rmsg' => 'required'
            );
        $r->validate($v);
        $raw = $r->get('sel_app');
        for($i=0;$i<count($raw);$i++){
        $data = OrganizationRegistration::find($raw[$i]);
        $data->status = 2;
        $data->updated_by = Auth::user()->name;
        $data->message = $r->get('rmsg');
        $data->save();
        $regNo =$data->reg_no;
       
        //UtilController::sendEmail($data->email,"Dear ".$data->full_name_capital."\n\nYour Registration Form with submission no ". $data->submission_no." has been Rejected. Kindly check your email and update your form.\n\n ICAN");
       // UtilController::sendSMS($data->mobile_no,"Dear ".$data->full_name_capital."\n\nYour Registration Form with submission no ". $data->submission_no." has been Rejected. Kindly check your email for further details.\n\n ICAN");
        
        }
        echo ("Exam Forms Rejected With Message.");
     //   return response(['msg' => 'Exam Forms Rejected With Message.']);
    }


    public function check_form(Request $r)
    {
        $v = array(
            'sel_app' => 'required'
            );
        $r->validate($v);
        $raw = $r->get('sel_app');
        for($i=0;$i<count($raw);$i++){
            ReportController:: approve($raw[$i]);
        }
        return response(['msg' => 'Registration Approved.']);
    }


    

    public function approved()
    {
        $data =  OrganizationRegistration::where('status',1)->get();
        return view('backend.reports.approved',compact('data'));
    }

    public function rejected()
    {
        $data =  OrganizationRegistration::where('status',2)->get();
        return view('backend.reports.rejected',compact('data'));
    }
}
