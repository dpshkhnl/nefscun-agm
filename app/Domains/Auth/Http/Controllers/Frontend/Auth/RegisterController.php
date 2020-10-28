<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

use App\Domains\Auth\Models\Province;
use App\Domains\Auth\Models\District;
use App\Domains\Auth\Models\LocalBody;
use Illuminate\Support\Facades\Hash;

use App\Models\OrganizationRegistration;
use App\Models\OrganizationUpload;
use App\Models\OrganizationRepresentative;

use Illuminate\Http\Request;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * RegisterController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Where to redirect users after registration.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);
        $province = Province::get();
        $signupStep = 0;
        $orgRegister =  new OrganizationRegistration;
        return $this->showForm($signupStep,$orgRegister);
    }

    public function showForm($signupStep,$result){
        $province = Province::get();
        return view('frontend.auth.register',compact('province','signupStep','result'));
    }


    public function showReports(){
       
        return view('frontend.auth.report-details');
    }

   public function saveBasic(Request $request)
   {
        $orgRegister = new OrganizationRegistration;
        $orgRegister->nefscun_mem_no = $request->get('nefscun_mem_no');
        $orgRegister->org_name = $request->get('org_name');
        $orgRegister->org_name_np = $request->get('fullnamenp');
        $orgRegister->province = $request->get('province_id');
        $orgRegister->district = $request->get('dist_id');
        $orgRegister->local = $request->get('local_id');
        $orgRegister->ward = $request->get('ward');
        $orgRegister->mobile_no = $request->get('mobile');
        $orgRegister->panno = $request->get('panno');
        $orgRegister->org_phone = $request->get('org_phone');
        $orgRegister->managername = $request->get('managername');
        $orgRegister->chairman_name = $request->get('chairman_name');
        $orgRegister->chairman_no = $request->get('chairman_no');
        $orgRegister->email = $request->get('email');
        $orgRegister->password =  Hash::make($request->get('password'));
        $orgRegister->is_verified = 0;
        $orgRegister->status = 0;
        $orgRegister->ip= $request->ip();
        $orgRegister->save();
        return $this->showForm(1,$orgRegister);
   }

   public function saveRepresentative(Request $request)
   {

        $orgRep = new OrganizationRepresentative;
        $orgRep->nefscun_mem_no = $request->get('nefscun_mem_no');
        $orgRep->org_rep_id = $request->get('register_id');
        $orgRep->rep_name = $request->get('repname');
        $orgRep->occupation = $request->get('occupation');
        $orgRep->memno = $request->get('memno');
        $orgRep->dob = $request->get('dob');
        $orgRep->province = $request->get('province_id');
        $orgRep->district = $request->get('dist_id');
        $orgRep->local = $request->get('local_id');
        $orgRep->ward = $request->get('ward');
        $orgRep->mobile_no = $request->get('mobile');
        $orgRep->email = $request->get('email');
        $orgRep->qualification = $request->get('qualification');
        $orgRep->post = $request->get('post');
        $orgRep->share_reg_dt = $request->get('share_reg_dt');
        $orgRep->decision_dt = $request->get('decision_dt');
        $orgRep->ip= $request->ip();
        $orgRep->save();
        return $this->showForm(2,$orgRep);
   }

   public function saveUploadDoc(Request $request){

    $orgUpload = new OrganizationUpload;
   
    $orgUpload->nefscun_mem_no = $request->get('nefscun_mem_no');
    $orgUpload->org_reg_id = $request->get('register_id');
    $orgUpload->ip= $request->ip();
        if ($request->hasFile('rep_select')) {  //check the file present or not
        $images = $request->file('rep_select'); //get the file
        $size = $images->getSize();
        $names =  'rep_select-'.time().".".$images->getClientOriginalName();
        $destinationPaths = public_path('/images/rep_select/'); //public path folder dir
        $images->move($destinationPaths,$names);  //mve to destination you mentioned 
        $orgUpload->rep_select = $names; //
    }
    if ($request->hasFile('rep_sign')) {  //check the file present or not
        $images = $request->file('rep_sign'); //get the file
        $size = $images->getSize();
        $names =  'rep_sign-'.time().".".$images->getClientOriginalName();
        $destinationPaths = public_path('/images/rep_sign/'); //public path folder dir
        $images->move($destinationPaths,$names);  //mve to destination you mentioned 
        $orgUpload->rep_sign = $names; //
    }

    if ($request->hasFile('chairman_sign')) {  //check the file present or not
        $images = $request->file('chairman_sign'); //get the file
        $size = $images->getSize();
        $names =  'chairman_sign-'.time().".".$images->getClientOriginalName();
        $destinationPaths = public_path('/images/chairman_sign/'); //public path folder dir
        $images->move($destinationPaths,$names);  //mve to destination you mentioned 
        $orgUpload->chairman_sign = $names; //
    }
    if ($request->hasFile('audit_report')) {  //check the file present or not
        $images = $request->file('audit_report'); //get the file
        $size = $images->getSize();
        $names =  'audit_report-'.time().".".$images->getClientOriginalName();
        $destinationPaths = public_path('/images/audit_report/'); //public path folder dir
        $images->move($destinationPaths,$names);  //mve to destination you mentioned 
        $orgUpload->audit_report = $names; //
    }
    if ($request->hasFile('voucher')) {  //check the file present or not
        $images = $request->file('voucher'); //get the file
        $size = $images->getSize();
        $names =  'voucher-'.time().".".$images->getClientOriginalName();
        $destinationPaths = public_path('/images/voucher/'); //public path folder dir
        $images->move($destinationPaths,$names);  //mve to destination you mentioned 
        $orgUpload->voucher = $names; //
    }
    if ($request->hasFile('org_stamp')) {  //check the file present or not
        $images = $request->file('org_stamp'); //get the file
        $size = $images->getSize();
        $names =  'org_stamp-'.time().".".$images->getClientOriginalName();
        $destinationPaths = public_path('/images/org_stamp/'); //public path folder dir
        $images->move($destinationPaths,$names);  //mve to destination you mentioned 
        $orgUpload->org_stamp = $names; //
    }
    if ($request->hasFile('photo')) {  //check the file present or not
        $images = $request->file('photo'); //get the file
        $size = $images->getSize();
        $names =  'photo-'.time().".".$images->getClientOriginalName();
        $destinationPaths = public_path('/images/photo/'); //public path folder dir
        $images->move($destinationPaths,$names);  //mve to destination you mentioned 
        $orgUpload->photo = $names; //
    }
    $orgUpload->save();
    return $this->showForm(3,$orgUpload);
}
   
}
