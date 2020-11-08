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
                    @if($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.register.approve'))

                    <button class="btn btn-success mt-4" id="approve-btn">Verify</button>
                @endif
                </div>
                @if($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.register.reject'))

                <div class="form-group">
                <label class="required">&nbsp</label>
                <button class="btn btn-danger mt-4 " id="reject-btn">Reject</button>
                
                </div>
                @endif
                </div>
        <div class="table-responsive">
                <table class="table table-head-fixed table-bordered text-nowrap" id="data-table">
                    <thead>
                        <tr>

                            <th width="30px"><input type="checkbox" class="check" id="check_all"></th>
                            <th> नेफ्स्कून <br/>सदस्यता नम्बर</th>
                            <th>संस्थाको नाम</th>
                            <th>ठेगाना</th>
                            <th>प्रतिनिधिको नाम</th>
                            <th> संस्थाको छाप</th>
                            <th> प्रतिनिधि छनौट निर्णय</th>
                           
                            <th> नविकरणको भौचर</th>
                            <th> नियमित बचतको भौचर</th>
                            <th>Registered Date</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-nowrap">

                       @foreach($data as $dt)
                      <tr>

                       <td width="30px"><input type="checkbox" class="approve_class" name="sel_app[]" value="{{$dt->id}}" id="approve_class"></td>
                       <td>{{$dt->nefscun_mem_no}}</td>
                       <td>{{$dt->org_name}}</td>
                       <td>{{$dt->name_np}},{{$dt->ward}} <br/>{{$dt->dist_name_np}}</td>
                       
                       <td>{{$dt->rep_name}}</td>
                       <td><img src="{{ asset('images/org_stamp/'.$dt->org_stamp) }}"></td>
                       <td><img src="{{ asset('images/rep_select/'.$dt->rep_select) }}"></td>
                       <td><img src="{{ asset('images/save_voucher/'.$dt->save_voucher) }}"></td>

                       <td><img src="{{ asset('images/voucher/'.$dt->voucher) }}"></td>
                      
                    
                       <td>{{$dt->created_at}}</td>
                       <td>
               
                       <a target="_blank" href="{{url('printForm/'.$dt->orgid)}}">
                            
                            <span class="btn btn-primary  mt-2">Show</span>
                        </a>
               <br/>
               <br/>
               @if($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.register.approve'))
               <button onclick=approveform({{$dt->orgid}}) class="btn btn-success mt-2 appbtn" style="width:60px" >Verify </button>
               @endif
               <br/>
               <br/>
               @if($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.register.reject'))
               <button onclick=rejectform({{$dt->orgid}}) class="btn btn-danger mt-2 1-reject" style="width:60px" >Reject </button>
               @endif
               
            
           
   </td>
                       </tr>
                       @endforeach
                       
                    </tbody>
                </table>
                </div>
        </x-slot>
    </x-backend.card>
    <div class="modal"  tabindex="-1" style="padding-right: 17px;" role="dialog">	
  <div class="modal-dialog" role="document">	
    <div class="modal-content">	
      <div class="modal-header">	
        <h5 class="modal-title">Enter Message to Reject Forms</h5>	
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	
          <span aria-hidden="true">&times;</span>	
        </button>	
      </div>	
      <div class="modal-body">	
      <input type="hidden" name="rejectid" id="rejectid"/>
    <textarea name="reject_msg" class="form-control"></textarea>	
      </div>	
      <div class="modal-footer">	
        <button class="btn btn-danger" id="reject-btn2">Procced to Form Reject</button>	
        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>	
      </div>	
    </div>	
  </div>	
</div>
@endsection
@section('scripts')



<script>
    $(document).ready(function() {
        $('.table').DataTable({
           dom: 'Blfrtip',
            "lengthMenu": [[10, 25, 50], [10, 25, 50]],
            buttons: [
                {
                    extend: 'excel',
                    className: 'btn btn-warning'
                }
            ]
        });
    });
</script>

<script>
function approveform(id){
  if(confirm("Are you sure you want to approve the form?") == false) {
              return false;
          }
    var url = "{{ url('admin/approve-form') }}/"+id;
      $.ajax({
        url: url,
        method: 'get',
        success: function(result){
              alert(result);
              window.location.reload(false); 
          }});
}
function rejectform(id){
  
    $('#rejectid').val(id);
  $('.modal').modal();
}


 
    $(document).ready(function() {

        
    
    $('#reject-btn2').on('click',function(e){
        e.preventDefault();
        if($('textarea[name="reject_msg"]').val() == ''){
            alert('Please Enter a Message to Reject Forms.');
        } else{
        var sel_app = $('input[name="sel_app[]"]:checked').map(function(){ 
                    return this.value; 
                }).get();
                if (sel_app === undefined || sel_app.length == 0) {
                    sel_app.push($('#rejectid').val());

                }
            
        //var jsonString = JSON.stringify(sel_app);
        var _token = $("input[name='_token']").val();
        var rmsg = $('textarea[name="reject_msg"]').val();
        var url = "{{ url('admin/reject_form') }}";
        $.ajax({
          url: url,
          type: "POST",
          data: {'sel_app[]': sel_app, rmsg: rmsg, _token: _token},
          success: function(result){
            $('.approve_class').each(function(){
                this.checked = false;
            });
            $('.modal').modal('hide');
            window.location.reload(false); 
            alert('Registration Forms has been Rejected.');
          }
            });
    }
    });

    $('#check_all').on('click',function(){
        if(this.checked){
            $('.approve_class').each(function(){
                this.checked = true;
            });
        }else{
             $('.approve_class').each(function(){
                this.checked = false;
            });
        }
    });
    
    $("#reject-btn").on("click", function(e) {
        e.preventDefault();
        if($('.approve_class:checked').length == 0){
            $('.modal').hide();
            alert('No Form Selected.');
        } else{
  $('.modal').modal();
}
});
});   

$('#approve-btn').on('click',function(e){
    e.preventDefault();
        if(confirm("Are you sure you want to approve the form?") == false) {
                return false;
            }
        if($('.approve_class:checked').length == 0){
            alert('No Form Selected.');
        } else{
        var sel_app = $('input[name="sel_app[]"]:checked').map(function(){ 
                    return this.value; 
                }).get();
        //var jsonString = JSON.stringify(sel_app);
        var _token = $("input[name='_token']").val();
        var url = "{{ url('admin/check_form') }}";
        $.ajax({
          url: url,
          type: "POST",
          data: {'sel_app[]': sel_app, _token: _token},
          success: function(result){
            window.location.reload(false); 
            alert('Registrations Forms has been Approved.');
          }
            });
    }
    });
    


</script>
    @endsection