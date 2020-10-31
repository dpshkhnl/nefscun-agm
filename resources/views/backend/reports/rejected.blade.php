@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

    <x-backend.card>
        <x-slot name="header">
         Rejected List
        </x-slot>
    
        <x-slot name="body">
        
       
        <div class="table-responsive">
                <table class="table table-head-fixed table-bordered text-nowrap" id="data-table">
                    <thead>
                        <tr>

                            <th width="30px"><input type="checkbox" class="check" id="check_all"></th>
                            <th>Mem No.</th>
                            <th>Name</th>
                           
                            <th>Address</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                          
                            <th>Registered Date</th>
                            <th>Rejected By</th>
                            <th>Rejected For</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-nowrap">
                       @foreach($data as $dt)
                      <tr>
                       <td width="30px"><input type="checkbox" class="check" id="check_all"></td>
                       <td>{{$dt->nefscun_mem_no}}</td>
                       <td>{{$dt->org_name}}</td>
                       <td>{{$dt->name_np}},{{$dt->ward}} <br/>{{$dt->dist_name_np}}</td>
                       <td>{{$dt->email}}</td>
                       <td>{{$dt->mobile_no}}</td>
                     
                       <td>{{$dt->created_at}}</td>
                       <td>{{$dt->updated_by}}</td>
                       <td>{{$dt->message}}</td>
                       <td>
                       <a target="_blank" href="{{url('printForm/'.$dt->orgid)}}">
                            
                            <span class="btn btn-primary  mt-2">Show</span>
                        </a>
              
              
   </td>
                       </tr>
                       @endforeach
                       
                    </tbody>
                </table>
                </div>
        </x-slot>
    </x-backend.card>
@endsection
