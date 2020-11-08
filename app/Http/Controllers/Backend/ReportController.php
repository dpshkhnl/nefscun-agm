<?php

namespace App\Http\Controllers\Backend;

use App\Models\OrganizationRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\Province;
use App\Models\OrganizationUpload;
use App\Models\OrganizationRepresentative;
use App\Models\Helper;
use App\Models\PratibedanComment;
use Illuminate\Support\Str;
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
        $data =  OrganizationRegistration::select('organization_registrations.*','organization_registrations.id as orgid',
        'organization_representatives.*','provinces.*','districts.*','local_bodies.*','organization_uploads.*')->
        join('organization_representatives','organization_representatives.org_rep_id','organization_registrations.id')
        ->join('provinces','provinces.state_id','organization_registrations.province')
        ->join('districts','districts.dist_id','organization_registrations.district')
        ->join('local_bodies','local_bodies.id','organization_registrations.local')
        ->join('organization_uploads','organization_uploads.org_reg_id','organization_registrations.id')
        ->where('status',0)->orderBy('organization_registrations.created_at','desc')->get();
        //dd($data);
        return view('backend.reports.registered',compact('data'));
    }

    public function comments()
    {
        $data =  PratibedanComment::select('pratibedan_comments.*','organization_registrations.*','organization_registrations.id as orgid',
        'organization_representatives.*','provinces.*','districts.*','local_bodies.*','organization_uploads.*')->
        join('organization_registrations','pratibedan_comments.org_reg_id','organization_registrations.id')
        ->join('organization_representatives','organization_representatives.org_rep_id','organization_registrations.id')
        ->join('provinces','provinces.state_id','organization_registrations.province')
        ->join('districts','districts.dist_id','organization_registrations.district')
        ->join('local_bodies','local_bodies.id','organization_registrations.local')
        ->join('organization_uploads','organization_uploads.org_reg_id','organization_registrations.id')
        ->orderBy('organization_registrations.created_at','desc')->get();
        //dd($data);
        return view('backend.reports.comment',compact('data'));
    }

    function approve($id){ 
        //return ($id);
        $register = OrganizationRegistration::find($id);
        if(!$register)
        {
            abort(404);
        }
        $register->is_verified = 1;
        $register->status = 1;
        $register->updated_by = Auth::user()->name;
        $register->save();
        $text = "Dear".$register->org_name."
        Your registration for 29th AGM is approved. Please login and proceed.
        NEFSCUN";
        
         Helper::sendSms($register->mobile_no, $text);
        Helper::sendEmail($register->email, "Approved", "नमस्कार,  

नेफ्स्कूनको २९ औं साधारणसभामा सहभागीताको लागि यहाँले उपलब्ध गराउनुभएको जानकारी र आवश्यक कागजातहरु प्राप्त भएको छ । साधारणसभामा प्रस्तुत हुने वार्षिक प्रतिवेदनहरु पढ्न र सुझावको लागि यस लिंकमा क्लिक गर्नुहोला ।<br/> http://agm.shutradhar.com.np/login");

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
        $token = $data->token;
        if(empty($token))
        {
            $token= (string)Str::uuid();
            $data->token = $token;
            $data->save();
        } 
        //dd('http://agm.shutradhar.com.np/rc='.$token);
        Helper::sendEmail( $data->email, "Rejected", "your Form Has been Rejected due to ".$r->get('rmsg')."Please Update and Submit again 
        following the on clicking the link below <br/>".'http://agm.shutradhar.com.np/update/'.$token
    );

        $regNo =$data->reg_no;
       
        //UtilController::sendEmail($data->email,"Dear ".$data->full_name_capital."\n\nYour Registration Form with submission no ". $data->submission_no." has been Rejected. Kindly check your email and update your form.\n\n ICAN");
       // UtilController::sendSMS($data->mobile_no,"Dear ".$data->full_name_capital."\n\nYour Registration Form with submission no ". $data->submission_no." has been Rejected. Kindly check your email for further details.\n\n ICAN");
        
        }
        echo ("Forms Rejected With Message.");
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
        $data =  OrganizationRegistration::select('organization_registrations.*','organization_registrations.id as orgid',
        'provinces.*','districts.*','local_bodies.*')
        ->join('provinces','provinces.state_id','organization_registrations.province')
        ->join('districts','districts.dist_id','organization_registrations.district')
        ->join('local_bodies','local_bodies.id','organization_registrations.local')
        ->where('status',1)
        ->orderBy('organization_registrations.updated_at','desc')->get();
        return view('backend.reports.approved',compact('data'));
    }

    public function rejected()
    {
        $data =  OrganizationRegistration::select('organization_registrations.*','organization_registrations.id as orgid',
        'provinces.*','districts.*','local_bodies.*')
        ->join('provinces','provinces.state_id','organization_registrations.province')
        ->join('districts','districts.dist_id','organization_registrations.district')
        ->join('local_bodies','local_bodies.id','organization_registrations.local')
        ->where('status',2)
        ->orderBy('organization_registrations.updated_at','desc')->get();
        return view('backend.reports.rejected',compact('data'));
    }
}
