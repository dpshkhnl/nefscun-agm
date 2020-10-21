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
                       <td width="30px"><input type="checkbox" class="approve_class" name="sel_app[]" value="{{$dt->id}}" id="approve_class"></td>
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
               
                       <a target="_blank" href="{{ url('admin/show-form') }}/{{$dt->id}}">
                            
                            <span class="btn btn-primary  mt-2">Show</span>
                        </a>
               <br/>
               <br/>
               <button onclick=approveform({{$dt->id}}) class="btn btn-success mt-2 appbtn" style="width:60px" >Verify </button>
               <br/>
               <br/>
               <button onclick=rejectform({{$dt->id}}) class="btn btn-danger mt-2 1-reject" style="width:60px" >Reject </button>
              
               
            
           
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