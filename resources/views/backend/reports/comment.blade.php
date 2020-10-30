@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

    <x-backend.card>
        <x-slot name="header">
         Comments 
        </x-slot>
    
        <x-slot name="body">
        
       
        <div class="table-responsive">
                <table class="table table-head-fixed table-bordered text-nowrap" id="data-table">
                    <thead>
                        <tr>
                     
                           
                            <th> नेफ्स्कून <br/>सदस्यता नम्बर</th>
                            <th>संस्थाको नाम</th>
                            <th>ठेगाना</th>
                            <th>प्रतिनिधिको नाम</th>
                            <th>अध्यक्षको प्रतिवेदन उपर सुझाव</th>
                            <th>महासचिवको प्रतिवेदन उपर सुझाव</th>
                            
                            <th>कोषाध्यक्षको प्रतिवेदन उपर सुझाव</th>
                            <th>ले.प. प्रतिवेदन उपर सुझाव</th>
                          
                            
                        </tr>
                    </thead>
                    <tbody class="text-nowrap">
                       @foreach($data as $dt)
                      <tr>
                       
                       <td>{{$dt->nefscun_mem_no}}</td>
                       <td>{{$dt->org_name}}</td>
                       <td>{{$dt->name_np}},{{$dt->ward}} <br/>{{$dt->dist_name_np}}</td>
                       
                       <td>{{$dt->rep_name}}</td>
                       <td>{{$dt->chairman_comment}}</td>
                       <td>{{$dt->sec_comment}}</td>
                       <td>{{$dt->tres_comment}}</td>
                       <td>{{$dt->audit_comment}}</td>
                       
                       
                       </tr>
                       @endforeach
                       
                    </tbody>
                </table>
                </div>
        </x-slot>
    </x-backend.card>
@endsection
