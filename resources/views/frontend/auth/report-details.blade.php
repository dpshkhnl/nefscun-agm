<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 20%;
  height:100%;
  margin-top:82px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 10px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 80%;
  border-left: none;
 
}
h5{
  color:red;
}
label{
  font-family:bold;
  color:black;
}
</style>

<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="image/png" href="../images/logo-favicon.jpg"/>
    <title>NEFSCUN</title>
</head>
<body>

<header class="site-header pt-2 pb-2">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <div class="mobile-top-contact float-right">
              <a class="btn btn-sm btn-outline-primary top-address-btn" target=_blank href="#" role="button"><i class="fas fa-map-marked-alt mr-2"></i>Login</a>
            </div>
            <div class="logo">
              <img src="../images/banner_logo.png" class="img-fluid" alt="Nefscun Logo">
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="top-details d-flex flex-column align-items-end">
              <div class="top-contact pb-2">
                <span class="top-phone mr-2"><i class="fas fa-phone-volume mr-1"></i>Call Us +977-1-4781963, 4780201</span>

             
              
                   
                    <a class="btn btn-sm btn-outline-primary top-address-btn" target=_blank  role="button"></i>Welcome, {{$coop->org_name}}</a>
            
                    <a class="btn btn-sm btn-outline-primary top-address-btn" href="{{url('printForm/'.$coop->id)}}" role="button"><i class="fas fa-unlock mr-2"></i>Profile</a>

                        <a class="btn btn-sm btn-outline-primary top-address-btn" href="{{ route('frontend.auth.logout') }}" role="button"><i class="fas fa-unlock mr-2"></i>Logout</a>

                  
              </div>
             
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

<div class="tab mt-10">
  <button class="tablinks" onclick="openCity(event, 'chairman')" id="id1">अध्यक्षको मन्तब्य </button>
  <button class="tablinks" onclick="openCity(event, 'sec')" id="id2" >महासचिवको प्रतिवेदन</button>
  <button class="tablinks" onclick="openCity(event, 'tresurer')" id="id3" >कोषाध्यक्षको प्रतिवेदन </button>
  <button class="tablinks" onclick="openCity(event, 'audit')" id="id4" >वार्षिक लेखा परीक्षण प्रतिवेदन </button>
  <button class="tablinks" onclick="openCity(event, 'auditsup')" id="id5" >लेखा सुपरीवेक्षण समितिको प्रतिवेदन </button>
</div>
<form method="POST" action="{{ route('frontend.saveComment') }}" enctype="multipart/form-data">
@csrf 
<input type="hidden" value="{{$coop->nefscun_mem_no}}" class="form-control required" id="nefscun_mem_no"  name="nefscun_mem_no" >
                    <input type="hidden" value="{{$coop->id}}" class="form-control required" id="register_id"  name="register_id" >
                    <input type="hidden" value="{{$details->reportid}}" class="form-control required" id="reportid"  name="reportid" >

<div id="chairman" class="tabcontent">
  <br/>
<h5>अध्यक्षको मन्तब्य </h5>
<br/>
 <iframe src="https://drive.google.com/file/d/1Q_uqxapFvHf3tm3rwP8mc5yZjuGKue4p/preview" 
  style="border:2px #rafdsyg solid;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="500px" width="1000px" allowfullscreen></iframe>
  
    <div class="col-md-12 row mt-2">
    <!-- <label for="chairmanComment">प्रतिवेदन उपर सुझाब तथा प्रतिकृया </label>
    <textarea class="form-control"  @if(!empty($comment->chairman_comment)) readonly @endif id="chairmanComment" name="chairmanComment" rows="3">{{$comment->chairman_comment ?? ''}}</textarea>
      -->
  <div class="col-md-9 mt-2">
  <!-- @if(empty($comment->chairman_comment))
  <button  type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
  @endif -->
  </div>
  <div class="col-md-3  mt-2 mb-2">
  <a class="btn btn-success align-right" target=_blank href="{{ url('showReports/2') }}">महासचिवको प्रतिवेदन</a>
</div>
 </div>
</div>

</div>

<div id="sec" class="tabcontent">
<br/>
<h5>महासचिवको प्रतिवेदन</h5>
<br/>
<iframe src="https://drive.google.com/file/d/1Q_uqxapFvHf3tm3rwP8mc5yZjuGKue4p/preview" style="border:2px #rafdsyg solid;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="500px" width="1000px" allowfullscreen></iframe>
 
    <label for="secComment">प्रतिवेदन उपर सुझाब तथा प्रतिकृया </label>
    <textarea class="form-control" @if(!empty($comment->sec_comment)) readonly @endif  id="secComment" name="secComment" rows="3">{{$comment->sec_comment ?? ''}}</textarea>
     
    <div class="col-md-12 row mt-2">
  <div class="col-md-9 mt-2 mb-2">
  @if(empty($comment->sec_comment))
  <button  type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
  @endif
  </div>
  <div class="col-md-3 mt-2 mb-2">
  <a class="btn btn-success align-right" target=_blank href="{{ url('showReports/3') }}">कोषाध्यक्षको प्रतिवेदन</a>

</div>
</div>
   
</div>

<div id="tresurer" class="tabcontent">
<br/>
<h5>कोषाध्यक्षको प्रतिवेदन </h5>
<br/>
<iframe src="https://drive.google.com/file/d/1Q_uqxapFvHf3tm3rwP8mc5yZjuGKue4p/preview" style="border:2px #rafdsyg solid;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="500px" width="1000px" allowfullscreen></iframe>
 
    प्रतिवेदन उपर सुझाब तथा प्रतिकृया 
    <textarea class="form-control" @if(!empty($comment->tres_comment)) readonly @endif name="tresComment" id="tresComment" rows="3">{{$comment->tres_comment ?? ''}}</textarea>
  
    <div class="col-md-12 row mt-2">
  <div class="col-md-9 mt-2 mb-2">
  @if(empty($comment->tres_comment))
  <button  type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
  @endif
  </div>
  <div class="col-md-3 mt-2 mb-2">
  <a class="btn btn-success align-right" target=_blank href="{{ url('showReports/4') }}"> वार्षिक लेखा परीक्षण प्रतिवेदन</a>

  </div>
</div>
   
</div>
   
<div id="audit" class="tabcontent">
<br/>
<h5> वार्षिक लेखा परीक्षण प्रतिवेदन</h5>
<br/>
<iframe src="https://drive.google.com/file/d/1Q_uqxapFvHf3tm3rwP8mc5yZjuGKue4p/preview" style="border:2px #rafdsyg solid;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="500px" width="1000px" allowfullscreen></iframe>
 
    <label for="auditComment">प्रतिवेदन उपर सुझाब तथा प्रतिकृया </label>
    <textarea class="form-control" @if(!empty($comment->audit_comment)) readonly @endif  name="auditComment" id="auditComment" rows="3">{{$comment->audit_comment ?? ''}}</textarea>
     
    <div class="col-md-12 row mt-2">
  <div class="col-md-9 mt-2 mb-2">
  @if(empty($comment->audit_comment))
  <button  type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
  @endif
  </div>
  <div class="col-md-3 mt-2 mb-2">
  <a class="btn btn-success align-right" target=_blank href="{{ url('showReports/5') }}">लेखा सुपरीवेक्षण समितिको प्रतिवेदन</a>

  </div>
</div>
</div>

<div id="auditsup" class="tabcontent">
<br/>
<h5>लेखा सुपरीवेक्षण समितिको प्रतिवेदन</h5>
<br/>
<iframe src="https://drive.google.com/file/d/1Q_uqxapFvHf3tm3rwP8mc5yZjuGKue4p/preview" style="border:2px #rafdsyg solid;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="500px" width="1000px" allowfullscreen></iframe>
 
    <label for="auditComment">प्रतिवेदन उपर सुझाब तथा प्रतिकृया </label>
    <textarea class="form-control"  @if(!empty($comment->chairman_comment)) readonly @endif id="chairmanComment" name="chairmanComment" rows="3">{{$comment->chairman_comment ?? ''}}</textarea>
     
    <div class="col-md-12 row mt-2">
  <div class="col-md-9 mt-2 mb-2">
  @if(empty($comment->chairman_comment))
  <button  type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
  @endif
  </div>
</div>
</div>
</form>
</div>


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  var reportid = 0;
  if(cityName=='chairman')
  reportid = 1;
  else if (cityName=='sec')
  reportid = 2;
  else if (cityName=='tresurer')
  reportid = 3;
  else if (cityName=='audit')
  reportid = 4;
  document.getElementById('reportid').value = reportid;

  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById('id'+{{$details->reportid}}).click();
</script>
   
</body>
</html> 
