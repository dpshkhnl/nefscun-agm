<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Domains\Auth\Models\Province;
use App\Domains\Auth\Models\District;
use App\Domains\Auth\Models\LocalBody;
use Illuminate\Http\Request;


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
        return view('frontend.index');
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
