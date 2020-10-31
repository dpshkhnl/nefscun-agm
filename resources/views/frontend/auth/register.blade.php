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
              <nav>
                  <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                  <li> <a class="nav-item nav-link @if($signupStep==0) active  @endif  ml-2" id="nav-general-tab" @if($signupStep == 0) data-toggle="tab" @endif href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">संस्था परिचय</a></li>
                  <li> <a class="nav-item nav-link @if($signupStep==1) active  @endif  ml-2" id="nav-rep-tab" @if($signupStep == 1) data-toggle="tab" @endif href="#nav-rep" role="tab" aria-controls="nav-rep" aria-selected="true">केन्द्रिय प्रतिनिधि </a></li>
                  <li> <a class="nav-item nav-link @if($signupStep==2) active  @endif ml-2" id="nav-upload-tab"  @if($signupStep == 2) data-toggle="tab" @endif href="#nav-upload" role="tab" aria-controls="nav-upload" aria-selected="false">अपलोड </a></li>
                  <li> <a class="nav-item nav-link @if($signupStep==3) active  @endif ml-2" id="nav-success-tab" @if($signupStep == 3) data-toggle="tab" @endif  href="#nav-success" role="tab" aria-controls="nav-success" aria-selected="false">Complete</a></li>

                  </ul>
                </nav> 
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade @if($signupStep==0) active show @endif" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                 <form class="application-form" name="firstform" id="firstform" method="POST" action="{{ route('frontend.saveBasic') }}" enctype="multipart/form-data">
            @csrf  
               
                    <div class="apply-registration-input mb-3"> 
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="memno" class="col-md-6">नेफ्स्कून सदस्यता नं:</label>
                        <div class="col-md-12">
                          <input type="number" value="{{$result->nefscun_mem_no}}" class="form-control required" id="nefscun_mem_no"  name="nefscun_mem_no" >
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email" class="col-md-12"> PAN नम्बर:</label>
                        <div class="col-md-12">
                     
                          <input type="number" class="form-control" min="000000000" max="9999999999" id="panno" name="panno">
                        </div>
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
                                                 <select id="province_id" name="province_id" class="form-control" required>
                                <option value="" selected>प्रदेश छान्नुहोस् </option>
                                @foreach($province as $pro)
                                <option value="{{$pro->state_id}}">{{$pro->name_np}}</option>
                                @endforeach
                            </select>
                                  </div>
                                  <div class="controls col-md-3">
                                                  <select id="dist_id" name="dist_id" class="form-control" required>
                                <option value="" selected>जिल्ला  छान्नुहोस् </option>
                            </select></div>

                            <div class="controls col-md-3">
                                                <select id="local_id" name="local_id" class="form-control" required>
                                <option value="" selected> न.पा./गा.पा  छान्नुहोस् </option>
                            </select></div>

                            <div class="controls col-md-3">
                            <input   type="number" min="1" max="40"  class="form-control " placeholder="वार्ड नं" id="ward" name="ward">

                                       </div>

                        
                                                </div>
                                                </div>
                     
                    
                                  
                            <div class="row">           
                                    
                      
                      <div class="form-group col-md-6">
                        <label for="email" class="col-md-12">संस्थाको फोन नम्बर:</label>
                        <div class="col-md-12">
                     
                          <input   type="text" class="form-control " id="org_phone" name="org_phone">
                        </div>
                      </div>
                     
                     

                      <div class="form-group col-md-6">
                        <label for="email" class="col-md-12">ईमेल:</label>
                        <div class="col-md-12">
                     
                          <input   type="email" class="form-control " id="email" name="email">
                        </div>
                      </div>
                      </div>
                      <div class="row">       
                     
                      <div class="form-group col-md-6">
                        <label for="email" class="col-md-12">व्यवस्थापकको नाम:</label>
                        <div class="col-md-12">
                     
                          <input   type="text" class="form-control " id="managername" name="managername">
                        </div>
                      </div>
                      <div class=" col-md-6">
                        <label for="mobile" class="col-md-12">व्यवस्थापकको मोबाईल नं:</label>
                        <div class="col-md-12">
                     
                          <input   type="number" class="form-control " id="mobile" name="mobile">
                        </div>
                      </div>

                     
                      </div>

                      <div class="row">       
                      <div class="form-group col-md-6">
                        <label for="email" class="col-md-12">अध्यक्षको नाम:</label>
                        <div class="col-md-12">
                     
                          <input   type="text" class="form-control " id="chairman_name" name="chairman_name">
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="email" class="col-md-12"> अध्यक्षको मोबाईल नं:</label>
                        <div class="col-md-12">
                     
                          <input   type="number" class="form-control " id="chairman_no" name="chairman_no">
                        </div>
                      </div>
                      </div>
                     

                      <div class="row">
                      <div class="form-group col-md-6">
                        <label for="password" class="col-md-6">पासवर्ड:</label>
                        <div class="col-md-12">
                     
                          <input  onkeyup="checkPass();"   type="password" class="form-control"  id="password" name="password">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="cnfpassword" class="col-md-12">पुनः पासवर्ड:</label>
                        <div class="col-md-12">
                     
                          <input  onkeyup="checkPass();"  type="password" class="form-control "  id="cnfpassword" name="cnfpassword">
                          <span id='message'></span>
                        </div>
                      </div>
                      </div>

                   
                  
</div>
                    <div class="button-group" role="group" aria-label="button">
                    
                      <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary align-right">Next</button>
                      <!-- <button type="button" class="btn btn-secondary">Cancel</button> -->
                    </div>
                    <div class="modal" tabindex="-1" role="dialog" id="modal-box2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enter Your OTP :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        OTP has been sent to your mobile number.
        <input type="number" id="otp" name="otp_code" class="form-control">
      </div>
      <div class="modal-footer">
          <button type="button" id="validate" name="validate" class="btn btn-primary" >Verify</button>
        
      </div>
    </div>
  </div>
</div>

                    </form> 
                  </div>

                  <div class="tab-pane fade @if($signupStep==1) active show @endif" id="nav-rep" role="tabpanel" aria-labelledby="nav-rep-tab">
                 <form class="application-form" name="firstform" id="firstform" method="POST" action="{{ route('frontend.saveRepresentative') }}" enctype="multipart/form-data">
            @csrf  
               
                    <div class="apply-registration-input mb-3"> 
                    <input type="hidden" value="{{$result->nefscun_mem_no}}" class="form-control required" id="nefscun_mem_no"  name="nefscun_mem_no" >
                    <input type="hidden" value="{{$result->id}}" class="form-control required" id="register_id"  name="register_id" >

                      <div class="row">
                    
                      <div class="form-group col-md-6">
                        <label for="repname" class="col-md-12">नाम</label>
                        <div class="col-md-12">
                          <input type="text" class="form-control required" id="repname" required  name="repname" >
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="fullname" class="col-md-12">जन्म मिति :</label>
                        <div class="col-md-12">
                          <input type="text" class="form-control required" id="dob" required name="dob">
                        </div>
                      </div>

                    

                      </div>

                      <div class="row">
                    
                      <div class="form-group col-md-6">
                        <label for="repname" class="col-md-12">पेशा</label>
                        <div class="col-md-12">
                          <input type="text" class="form-control required" id="occupation" required  name="occupation" >
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="fullname" class="col-md-12">साकोसको सदस्यता नम्बर :</label>
                        <div class="col-md-12">
                          <input type="text" class="form-control required" required id="memno"  name="memno">
                        </div>
                      </div>

                    

                      </div>

                      <div class="form-group col-md-12">
                      <label id="label-phone" for="phone" class="control-label">
                                             ठेगाना (प्रदेश, जिल्ला, स्थानिय तह, वार्ड नं)  
                                             </label> <i class="required-star">*</i> 
                                          
                          <div class="row">
                        <div class="controls col-md-3">
                                                 <select name="province_id" class="form-control" required>
                                <option value="" selected>प्रदेश छान्नुहोस् </option>
                                @foreach($province as $pro)
                                <option value="{{$pro->state_id}}">{{$pro->name_np}}</option>
                                @endforeach
                            </select>
                                  </div>
                                  <div class="controls col-md-3">
                                                  <select name="dist_id" class="form-control" required>
                                <option value="" selected>जिल्ला  छान्नुहोस् </option>
                            </select></div>

                            <div class="controls col-md-3">
                                                <select name="local_id" class="form-control" required>
                                <option value="" selected> न.पा./गा.पा  छान्नुहोस् </option>
                            </select></div>

                            <div class="controls col-md-3">
                            <input   type="number" class="form-control" required placeholder="वार्ड नं" id="ward" name="ward">

                                       </div>

                        
                                                </div>
                                                </div>
                     
                    
                                  
                            <div class="row">           
                                    
                      <div class=" col-md-6">
                        <label for="mobile" class="col-md-12">मोबाईल नं:</label>
                        <div class="col-md-12">
                     
                          <input   type="number" required class="form-control " id="mobile" name="mobile">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email" class="col-md-12">ईमेल:</label>
                        <div class="col-md-12">
                     
                          <input   type="email" required class="form-control " id="email" name="email">
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="form-group col-md-6">
                        <label for="password" class="col-md-6">योग्यता :</label>
                        <div class="col-md-12">
                     
                          <input   type="text" required class="form-control"  id="qualification" name="qualification">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="cnfpassword" class="col-md-12">पद :</label>
                        <div class="col-md-12">
                     
                          <input   type="text" required class="form-control "  id="post" name="post">
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="form-group col-md-6">
                        <label for="password" class="col-md-6">सेयर सदश्य लिएको मिति  :</label>
                        <div class="col-md-12">
                     
                          <input   type="text" required class="form-control"  id="share_reg_dt" name="share_reg_dt">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="cnfpassword"  class="col-md-12">संचालक समिति को निर्णय मिति  :</label>
                        <div class="col-md-12">
                     
                          <input required  type="text" class="form-control "  id="decision_dt" name="decision_dt">
                        </div>
                      </div>
                      </div>
                  
</div>
                    <div class="button-group" role="group" aria-label="button">
                      <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary">Save</button>
                      <!-- <button type="button" class="btn btn-secondary">Cancel</button> -->
                    </div>
                    </form> 
                  </div>
                  
                  
                  <div class="tab-pane fade @if($signupStep==2) active show @endif" id="nav-upload"  role="tabpanel" aria-labelledby="nav-academic">
                    <div class="ican-uploads">
                      <div class="row">
                        <div class="col-12">
                          <form class="application-form" name="uploadform" id="uploadform" method="POST" action="{{ route('frontend.saveUploadDoc') }}" enctype="multipart/form-data">
                              @csrf 
                              <input type="hidden" value="{{$result->nefscun_mem_no}}" class="form-control required" id="nefscun_mem_no"  name="nefscun_mem_no" >
                    <input type="hidden" value="{{$result->org_rep_id}}" class="form-control required" id="register_id"  name="register_id" >
                    
                    <div class="p-y-1">
                      <div class="row col-md-12">
                      <div class="row m-b-1">
    <div class="col-sm-6 offset-sm-3">
      <button type="button" class="btn btn-success btn-block" onclick="document.getElementById('org_stamp').click()">संस्थाको छाप</button>
      <div class="form-group inputDnD">
        <label class="sr-only" for="inputFile">File Upload</label>
        <input type="file"required  class="form-control-file text-success font-weight-bold" id="org_stamp" name="org_stamp" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file">
     
      </div>
    </div>
</div>
  
  <div class="row m-b-1">
    <div class="col-sm-6 offset-sm-3">
      <button type="button" class="btn btn-danger btn-block" onclick="document.getElementById('photo').click()">प्रतिनिधिको फोटो</button>
      <div class="form-group inputDnD">
        <label class="sr-only" for="photo">File Upload</label>
        <input type="file" required class="form-control-file text-danger font-weight-bold" id="photo" name="photo" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file">
      </div>
    </div>
  </div>

  <div class="row m-b-1">
    <div class="col-sm-6 offset-sm-3">
      <button type="button" class="btn btn-primary btn-block" onclick="document.getElementById('rep_sign').click()">प्रतिनिधिको दस्तखत</button>
      <div class="form-group inputDnD">
        <label class="sr-only" for="rep_sign">File Upload</label>
        <input type="file"  required class="form-control-file text-primary font-weight-bold" id="rep_sign" name="rep_sign" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file">
      </div>
    </div>
  </div>

  <div class="row m-b-1">
    <div class="col-sm-6 offset-sm-3">
      <button type="button" class="btn btn-success btn-block" onclick="document.getElementById('chairman_sign').click()">अध्यक्षको दस्तखत</button>
      <div class="form-group inputDnD">
        <label class="sr-only" for="chairman_sign">File Upload</label>
        <input type="file" required class="form-control-file text-success font-weight-bold" id="chairman_sign" name="chairman_sign" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file">
      </div>
    </div>
  </div>

  <div class="row m-b-1">
    <div class="col-sm-6 offset-sm-3">
      <button type="button" class="btn btn-danger btn-block" onclick="document.getElementById('rep_select').click()">प्रतिनिधि छनौट निर्णय</button>
      <div class="form-group inputDnD">
        <label class="sr-only" for="rep_select">File Upload</label>
        <input type="file" required class="form-control-file text-danger font-weight-bold" id="rep_select" name="rep_select" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file">
      </div>
    </div>
  </div>
   
   
    <div class="row m-b-1">
    <div class="col-sm-6 offset-sm-3">
      <button type="button" class="btn btn-primary btn-block" onclick="document.getElementById('voucher').click()">नविकरण भौचर अपलोड</button>
      <div class="form-group inputDnD">
        <label class="sr-only" for="voucher">File Upload</label>
        <input type="file" required class="form-control-file text-primary font-weight-bold" id="voucher" name="voucher" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file">
      </div>
    </div>
  </div>

  <div class="row m-b-1">
    <div class="col-sm-6 offset-sm-3">
      <button type="button" class="btn btn-success btn-block" onclick="document.getElementById('save_voucher').click()">नियमित बचतको भौचर अपलोड</button>
      <div class="form-group inputDnD">
        <label class="sr-only" for="save_voucher">File Upload</label>
        <input type="file" multiple class="form-control-file text-success font-weight-bold" id="save_voucher" name="save_voucher" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file">
      </div>
    </div>
  </div>

  <div class="row m-b-1">
    <div class="col-sm-6 offset-sm-3">
      <button type="button" class="btn btn-danger btn-block" onclick="document.getElementById('audit_report').click()">अडिट रिपोर्ट</button>
      <div class="form-group inputDnD">
        <label class="sr-only" for="audit_report">File Upload</label>
        <input type="file" class="form-control-file text-danger font-weight-bold" id="audit_report" name="audit_report"  onchange="readUrl(this)" data-title="Drag and drop a file">
      </div>
    </div>
  </div>
    
 
</div>
</div>
               
                              
                          <div class="button-group" role="group" aria-label="button">
                            <button type="submit" class="btn btn-primary">Save</button>
                
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade @if($signupStep==3) active show @endif" id="nav-success"  role="tabpanel" aria-labelledby="nav-success">
                    <div class="ican-uploads">
                      <div class="row">
                        <div class="col-12">
                          Thank you!! Your Request Has been submitted.
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
    function checkPass(){
   
       
         if ($('#password').val() == $('#cnfpassword').val()) {

          $('#message').html('Matched').css('color', 'green');
          $( "#btnSubmit" ).prop( "disabled", false );

          
        }else{
           
          $('#message').html('Not Matched').css('color', 'red');
          $( "#btnSubmit" ).prop( "disabled", true );

        }
}

function readUrl(input) {
  
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = (e) => {
      let imgData = e.target.result;
      let imgName = input.files[0].name;
      input.setAttribute("data-title", imgName);
      console.log(e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }

}
    $(document).ready(function(){

      $('#btnSubmit').click(function(e){
           
           e.preventDefault();
            var msg = "";
          
            var nefscun_mem_no = $("input[name='nefscun_mem_no']").val();
            var panno = $("input[name='panno']").val();
            var email = $("input[name='email']").val();
            var org_name = $("input[name='org_name']").val();
             var fullnamenp = $("input[name='fullnamenp']").val();
            var province_id = $("select[name='province_id']").val();
            var dist_id = $("select[name='dist_id']").val();
            var local_id = $("select[name='local_id']").val();
            var ward = $("input[name='ward']").val();
            var org_phone = $("input[name='org_phone']").val();
            var managername = $("input[name='managername']").val();
            var mobile = $("input[name='mobile']").val();
            var chairman_name = $("input[name='chairman_name']").val();
            var chairman_no = $("input[name='chairman_no']").val();
            var password = $("input[name='password']").val();

            if(nefscun_mem_no.length == 0 )
            msg+="नेफ्स्कून सदस्यता नं भरनुहोस \n";
            if(panno.length != 9 )
            msg+="Valid PAN नम्बर भरनुहोस \n";
            if(org_name.length == 0 )
            msg+="संस्थाको नाम (अंग्रेजीमा) भरनुहोस \n";
            if(fullnamenp.length == 0 )
            msg+="संस्थाको नाम (युनिकोडमा) भरनुहोस \n";
            if(province_id.length == 0 )
            msg+="प्रदेश छान्नुहोस् \n";
            if(dist_id.length == 0 )
            msg+="जिल्ला  छान्नुहोस् \n";
            if(local_id.length == 0 )
            msg+="स्थानिय तह छान्नुहोस् \n";
            if(ward.length == 0 )
            msg+="वार्ड नं भरनुहोस \n";
            if(org_phone.length == 0 )
            msg+="संस्थाको फोन नम्बर भरनुहोस \n";
            if(email.length == 0 )
            msg+="संस्थाको ईमेल भरनुहोस \n";
            if(managername.length == 0 )
            msg+="व्यवस्थापकको नाम भरनुहोस \n";
            if(mobile.length != 10 )
            msg+="व्यवस्थापकको मोबाईल नं भरनुहोस \n";
            if(chairman_name.length == 0 )
            msg+="अध्यक्षको नाम भरनुहोस \n";
            if(chairman_no.length != 10 )
            msg+="अध्यक्षको मोबाईल नं भरनुहोस \n";
            if(password.length == 0 )
            msg+="पासवर्ड भरनुहोस \n";

            
          if(msg){
            alert(msg);
            return;
          }

           var contact = $("input[name='mobile']").val();
           var email = $("input[name='email']").val();
          var _token = $("input[name='_token']").val();
           $.ajax({
          url: "{!! url('generate_otp') !!}",
          type: 'POST',
          data: {phone: contact,email: email, _token: _token},
        });
          $('#modal-box2').modal();
         
          $("#modal-box2 button[name='validate']").on('click', function(){
          var otp_code = $("input[name='otp_code']").val();
        
          var contact = $("input[name='mobile']").val();
          var _token = $("input[name='_token']").val();
          $.ajax({
          url: "{!! url('check_otp') !!}",
          type: 'POST',
          data: {phone: contact, otp: otp_code, _token: _token},
          success: function(result){
            if(result.status == 1){
              // var text = '<p>OTP Verified. <br> <strong>Please Wait. Your Form is being Submitted.</strong></p>';
              // $('#modal-box2 .modal-body').append(text);
              $('#firstform').unbind('submit').submit();
           } else
           {
                var text = '<p>Invalid OTP. <br> <strong>Please input the correct OTP sent in your phone.</strong></p>';
              $('#modal-box2 .modal-body').append(text);
           }
          }
        }); 
         
        });

      });
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
 