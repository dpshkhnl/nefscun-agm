<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizationRegistration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


/**
 * Class LoginController.
 */
class UserLoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function logout()
    {
        Session::put('user', null);
        return redirect()->route('frontend.index');
    }

    public function validate_user(Request $request)
    {
        $orgRegister = OrganizationRegistration::where('nefscun_mem_no',$request->get('email'))
        ->where('status',1)
        //->where('password',Hash::make($request->get('password')))
        ->first();
        if(!$orgRegister){
                        return redirect()->route('frontend.auth.login')->withFlashDanger('No User Found');

        }else
        {
            if( Hash::check($request->get('password'), $orgRegister->password)){
                
             if($orgRegister->status!=1)
            {
                return redirect()->route('frontend.auth.login')->withFlashDanger('Your application is under review. Please wait for NEFSCUN official mail for login.');
            }
            Session::put('user', $orgRegister);
            return redirect()->route('frontend.index');
        }else
        {
            return redirect()->route('frontend.auth.login')->withFlashDanger('Incorrect Credentials.');
        }
        }
           

       
    }
}
