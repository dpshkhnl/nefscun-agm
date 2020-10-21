<?php

namespace App\Http\Controllers\Backend;

use App\Models\OrganizationRegistration;
use App\Http\Controllers\Controller;

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
        $data =  OrganizationRegistration::all();
        return view('backend.reports.registered',compact('data'));
    }

    public function approved()
    {
        $data =  OrganizationRegistration::all();
        return view('backend.reports.approved',compact('data'));
    }

    public function rejected()
    {
        $data =  OrganizationRegistration::all();
        return view('backend.reports.rejected',compact('data'));
    }
}
