<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Domains\Auth\Models\Province;
use App\Domains\Auth\Models\District;
use App\Domains\Auth\Models\LocalBody;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\OrganizationRegistration;


/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        
       $coop =  Session::get('user');
        if(!$coop)
        return view('frontend.index');
        else{
            return view('frontend.logged_index',compact('coop'));
        }
       
    }
    public function indexNew($rc)
    {
       // dd($rc);
        $orgReg  =  OrganizationRegistration::where('token',$rc)->first();
        //dd($orgReg);
        if($orgReg){
            if($orgReg->status==2){
                $signupStep= 2;
                $province = Province::get();
                $result = $orgReg;
                return view('frontend.auth.register',compact('province','signupStep','result'));
            }
        }

       $coop =  Session::get('user');
        if(!$coop)
        return view('frontend.index');
        else{
            return view('frontend.logged_index',compact('coop'));
        }
       
    }

    public function getDistrict(Request $request) {
      
        $district = District::where('state_id',$request->state_id)->get();
          
         return $district;
        //
    }
    
    public function getLocal(Request $request) {
      
        $local = LocalBody::where('dist_id',$request->dist_id)->get();
          // dd($district);
         return $local;
        //
    }
}
