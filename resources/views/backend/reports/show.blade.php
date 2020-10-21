<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Application for Registration for Virtual AGM</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/register.css">
    <script src="{{ url('js/nepali.datepicker.v3.min.js') }}" type="text/javascript"></script>
    <link href="{{ url('css/nepali.datepicker.v3.min.css') }}" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="/js/unicodeNepali.js"></script>
  </head>
  <body>
    <!-- Modal -->
    <div class="ican-application-form cap-1 py-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="logo d-flex justify-content-center">
              <a href="https://www.nefscun.org.np/"><img src="/images/banner_logo.png" alt="" class="logo img-fluid" /></a>
            </div>
            <div id="converter">  
  <div id='toolbar'> </div>
  <div id='editMe'> </div>
</div>
            <div class="application-form-title mt-2 mb-5 text-center">
                <div class="row">
                  <div class="col-12">
                    
                    <div class="col-12">
                    <h4>Application for Registration</h4>
                   
                  </div>
                  </div>
                </div>
              </div>

          
              <div class="ican-tabs mt-4">
             
               
                <div class="tab-pane fade @if($signupStep==0) active show @endif" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                  
               
                    <div class="apply-registration-input mb-3"> 
                    <div class="form-group">
                        <label for="memno" class="col-md-12">नेफ्स्कून सदस्यता नं:</label>
                        <div class="col-md-12">
                          <input type="number" value="{{$result->nefscun_mem_no}}" class="form-control required" id="nefscun_mem_no"  name="nefscun_mem_no" >
                        </div>
                      </div>
                      <div class="row">
                    
                      <div class="form-group col-md-6">
                        <label for="org_name" class="col-md-12">संस्थाको नाम (अंग्रेजीमा):</label>
                        <div class="col-md-12">
                          <input type="text" value="{{$result->org_name}}" class="form-control required" id="org_name"  name="org_name" style="text-transform: uppercase;">
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="fullname" class="col-md-12">संस्थाको नाम (युनिकोडमा)</label>
                        <div class="col-md-12">
                          <input type="text" value="{{$result->org_name_np}}" class="form-control convert-romanize required" id="fullnamenp"  name="fullnamenp" >
                        </div>
                      </div>

                      </div>

                      <div class="form-group col-md-12">
                      <label id="label-phone" for="phone" class="control-label">
                                             ठेगाना (प्रदेश, जिल्ला, स्थानिय तह, वार्ड नं)  
                                             </label> <i class="required-star">*</i> 
                                          
                          <div class="row">
                        <div class="controls col-md-3">
                        <input type="text" value="{{$result->province}}" class="form-control convert-romanize required" id="fullnamenp"  name="fullnamenp" >
                                  </div>
                                  <div class="controls col-md-3">
                                  <input type="text" value="{{$result->district}}" class="form-control convert-romanize required" id="fullnamenp"  name="fullnamenp" >

                                            </div>

                            <div class="controls col-md-3">
                            <input type="text" value="{{$result->local}}" class="form-control convert-romanize required" id="fullnamenp"  name="fullnamenp" >

                                             </div>

                            <div class="controls col-md-3">
                            <input   type="number" class="form-control" value="{{$result->ward}}" placeholder="वार्ड नं" id="ward" name="ward">

                                       </div>

                        
                                                </div>
                                                </div>
                     
                    
                                  
                            <div class="row">           
                                    
                      <div class=" col-md-6">
                        <label for="mobile" class="col-md-12">मोबाईल नं:</label>
                        <div class="col-md-12">
                     
                          <input   type="number" value="{{$result->mobile_no}}" class="form-control " id="mobile" name="mobile">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email" class="col-md-12">ईमेल:</label>
                        <div class="col-md-12">
                     
                          <input   type="email" value="{{$result->email}}"  class="form-control " id="email" name="email">
                        </div>
                      </div>
                      </div>
                      
                  

                   
                  
</div>
                 

               
                    <div class="apply-registration-input mb-3"> 
                    <h5>प्रतिनिधि</h5>
                      <div class="row">
                    
                      <div class="form-group col-md-6">
                        <label for="repname" class="col-md-12">नाम</label>
                        <div class="col-md-12">
                          <input type="text" value="{{$result->rep_name}}" class="form-control required" id="repname"  name="repname" >
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="fullname" class="col-md-12">जन्म मिति :</label>
                        <div class="col-md-12">
                          <input type="text" value="{{$result->dob}}" class="form-control required" id="dob"  name="dob">
                        </div>
                      </div>

                    

                      </div>

                      <div class="form-group col-md-12">
                      <label id="label-phone" for="phone" class="control-label">
                                             ठेगाना (प्रदेश, जिल्ला, स्थानिय तह, वार्ड नं)  
                                             </label> <i class="required-star">*</i> 
                                          
                          <div class="row">
                        <div class="controls col-md-3">
                        <input type="text" value="{{$result->province}}" class="form-control convert-romanize required" id="fullnamenp"  name="fullnamenp" >

                                  </div>
                                  <div class="controls col-md-3">
                                  <input type="text" value="{{$result->district}}" class="form-control convert-romanize required" id="fullnamenp"  name="fullnamenp" >

                                                 </div>

                            <div class="controls col-md-3">
                            <input type="text" value="{{$result->local}}" class="form-control convert-romanize required" id="fullnamenp"  name="fullnamenp" >

                                                </div>

                            <div class="controls col-md-3">
                            <input  value="{{$result->ward}}" type="number" class="form-control " placeholder="वार्ड नं" id="ward" name="ward">

                                       </div>

                        
                                                </div>
                                                </div>
                     
                    
                                  
                            <div class="row">           
                                    
                      <div class=" col-md-6">
                        <label for="mobile" class="col-md-12">मोबाईल नं:</label>
                        <div class="col-md-12">
                     
                          <input value="{{$result->mobile_no}}"  type="number" class="form-control " id="mobile" name="mobile">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email" class="col-md-12">ईमेल:</label>
                        <div class="col-md-12">
                     
                          <input  value="{{$result->email}}" type="email" class="form-control " id="email" name="email">
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="form-group col-md-6">
                        <label for="password" class="col-md-6">योग्यता :</label>
                        <div class="col-md-12">
                     
                          <input value="{{$result->qualification}}"  type="text" class="form-control"  id="qualification" name="qualification">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="cnfpassword" class="col-md-12">पद :</label>
                        <div class="col-md-12">
                     
                          <input value="{{$result->post}}"  type="text" class="form-control "  id="post" name="post">
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="form-group col-md-6">
                        <label for="password" class="col-md-6">सेयर सदश्य लिएको मिति  :</label>
                        <div class="col-md-12">
                     
                          <input value="{{$result->share_reg_dt}}"  type="text" class="form-control"  id="share_reg_dt" name="share_reg_dt">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="cnfpassword" class="col-md-12">संचालक समिति को निर्णय मिति  :</label>
                        <div class="col-md-12">
                     
                          <input value="{{$result->decision_dt}}"  type="text" class="form-control "  id="decision_dt" name="decision_dt">
                        </div>
                      </div>
                      </div>
                  
</div>
                   
                  </div>
                  
                  
                   <div class="ican-uploads">
                      <div class="row">
                        <div class="col-12">
                          
                              
                          <div class="ican-uploads-inner mb-4">
                            <div class="row">
                              <div class="col-12 col-md-3">
                                <div class="avatar-upload-wrap">
                                  <h6 class="mb-3">प्रतिनिधि छनौट निर्णय</h6>
                                  <div class="avatar-upload">
                                   
                                    <div class="avatar-preview">
                                    <img height="100px" width="100px" src="{{ asset('/images/rep_select/'.$result['rep_select']) }}">
                                    </div>
                                  </div>
                                 
                                </div>
                              </div>

                              <div class="col-12 col-md-3">
                                <div class="signature-of-applicant mb-3">
                                  <h6 class="mb-3">प्रतिनिधिको दस्तखत</h6>
                                    <div class="signature-of-applicant-inner">
                                      <div class="signature-of-applicant-wrap">
                                        <div class="signature-upload-wrap mb-1">
                                            <div class="signature-upload">
                                             
                                              <div class="signature-preview">
                                              <img height="100px" width="100px" src="{{ asset('/images/rep_sign/'.$result['rep_sign']) }}">

                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                              

                              <div class="col-12 col-md-3">
                                <div class="signature-of-applicant mb-3">
                                  <h6 class="mb-3"> अध्यक्षको दस्तखत</h6>
                                    <div class="signature-of-applicant-inner">
                                      <div class="signature-of-applicant-wrap">
                                        <div class="signature-upload-wrap mb-1">
                                            <div class="signature-upload">
                                             
                                              <div class="signature-preview">
                                              <img height="100px" width="100px" src="{{ asset('/images/chairman_sign/'.$result['chairman_sign']) }}">

                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                              <div class="col-12 col-md-3">
                                <div class="citizen-passport">
                                 <label class="mr-3">अडिट रिपोर्ट</label>
                                 <div class="citizen-passport-wrap">
                                   <div class="citizen-passport-upload-wrap mb-1">
                                       <div class="citizen-passport-upload">
                                         
                                         <div class="citizen-passport-preview">
                                         <img height="100px" width="100px" src="{{ asset('/images/audit_report/'.$result['audit_report']) }}">

                                         </div>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                              </div>
                            </div>
                          </div>
                         
                      </div>
                    </div>
                  </div>

               
            
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript"  src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script type='text/javascript'>
    $(document).ready(function(){
      $('body').on('keypress', '.convert-romanize', function (event) {
	return setUnicode(event,this);
});
  
var mainInput = document.getElementById("dob");
var decision_dt = document.getElementById("decision_dt");
var share_reg_dt = document.getElementById("share_reg_dt");
      mainInput.nepaliDatePicker();
      decision_dt.nepaliDatePicker();
      share_reg_dt.nepaliDatePicker();

 $("select[name='province_id']").change(function(){
    var province_id = $(this).children("option:selected").val();
        var url = "{!! route('frontend.getDistrict') !!}";
       
        $.ajax({
          url: url,
           beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
          type: "POST",
          data: {state_id: province_id,  _token: "{{ csrf_token() }}"},
          success: function(result){
                    var obj = result.length;
                    //alert(obj);
                    var text = '<option value="">जिल्ला  छान्नुहोस्</option>';
                    for(i=0;i<obj;i++){
                        var html = '<option value="'+result[i].dist_id+'">'+result[i].dist_name_np+'</option>';
                        text = text + html;
                    }
                    $("select[name='dist_id']").children('option').remove();
                    $("select[name='dist_id']").append(text);
                    $('#no-exam').hide();
                
              
    }
});
            
        });
         $("select[name='dist_id']").change(function(){
    var dist_id = $(this).children("option:selected").val();
        var url = "{!! route('frontend.getLocal') !!}";
        $.ajax({
          url: url,
           beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
          type: "POST",
          data: {dist_id: dist_id,  _token: "{{ csrf_token() }}"},
          success: function(result){
                    var obj = result.length;
                    //alert(obj);
                    var text = '<option value=""> न.पा./गा.प  छान्नुहोस्</option>';
                    for(i=0;i<obj;i++){
                        var html = '<option value="'+result[i].id+'">'+result[i].name_np+'</option>';
                        text = text + html;
                    }
                    $("select[name='local_id']").children('option').remove();
                    $("select[name='local_id']").append(text);
                    $('#no-exam').hide();
                
              
    }
});
            
        });
    });
 


    

   </script>
   
  </body>
</html>
 