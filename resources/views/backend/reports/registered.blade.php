@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

    <x-backend.card>
        <x-slot name="header">
         Registered List
        </x-slot>
    
        <x-slot name="body">
        
        <div class="row">
        <div class=" form-group">
                    <label class="required">&nbsp</label>
                    <button class="btn btn-success mt-4" id="approve-btn">Verify</button>
                
                </div>
                <div class="form-group">
                <label class="required">&nbsp</label>
                <button class="btn btn-danger mt-4 " id="reject-btn">Reject</button>
                
                </div>
                </div>
        <div class="table-responsive">
                <table class="table table-head-fixed table-bordered text-nowrap" id="data-table">
                    <thead>
                        <tr>

                            <th width="30px"><input type="checkbox" class="check" id="check_all"></th>
                            <th>Mem No.</th>
                            <th>Name</th>
                            <th>Name Np</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <!-- <th>Rep. Select</th>
                            <th>Rep Sign</th>
                            <th>Chairman Sign</th>
                            <th>Audit Report</th> -->
                            <th>Registered Date</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-nowrap">
                       @foreach($data as $dt)
                      <tr>
                       <td width="30px"><input type="checkbox" class="check" id="check_all"></td>
                       <td>{{$dt->nefscun_mem_no}}</td>
                       <td>{{$dt->org_name}}</td>
                       <td>{{$dt->org_name_np}}</td>
                       <td>{{$dt->province}},{{$dt->district}},{{$dt->local}},{{$dt->ward}}</td>
                       <td>{{$dt->email}}</td>
                       <td>{{$dt->mobile_no}}</td>
                       <!-- <td>{{$dt->nefscun_mem_no}}</td>
                       <td>{{$dt->nefscun_mem_no}}</td>
                       <td>{{$dt->nefscun_mem_no}}</td>
                       <td>{{$dt->nefscun_mem_no}}</td> -->
                       <td>{{$dt->created_at}}</td>
                       <td>
               
               <a href="#" style="width:60px"  class='btn btn-primary'>View </a>
               <br/>
               <br/>
              
               <button class='btn btn-success appbtn' style="width:60px" data-id="{{$dt['id']}}">Verify </button>
               <br/>
              <br/>
               <button class='btn btn-danger 1-reject' style="width:60px" data-id="{{$dt['id']}}">Reject </button>
           
   </td>
                       </tr>
                       @endforeach
                       
                    </tbody>
                </table>
                </div>
        </x-slot>
    </x-backend.card>
@endsection
