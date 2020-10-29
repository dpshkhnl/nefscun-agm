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

                    <a class="btn btn-sm btn-outline-primary top-address-btn" href="printForm/1" role="button"><i class="fas fa-unlock mr-2"></i>Profile</a>

                        <a class="btn btn-sm btn-outline-primary top-address-btn" href="{{ route('frontend.auth.logout') }}" role="button"><i class="fas fa-unlock mr-2"></i>Logout</a>

                  
              </div>
             
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'chairman')" id="defaultOpen">अध्यक्षको प्रतिवेदन</button>
  <button class="tablinks" onclick="openCity(event, 'sec')">महासचिवको प्रतिवेदन</button>
  <button class="tablinks" onclick="openCity(event, 'tresurer')">कोषाध्यक्षको प्रतिवेदन </button>
  <button class="tablinks" onclick="openCity(event, 'audit')">ले.प. प्रतिवेदन </button>
</div>
<form method="POST" action="{{ route('frontend.saveComment') }}" enctype="multipart/form-data">
@csrf 
<input type="hidden" value="{{$coop->nefscun_mem_no}}" class="form-control required" id="nefscun_mem_no"  name="nefscun_mem_no" >
                    <input type="hidden" value="{{$coop->id}}" class="form-control required" id="register_id"  name="register_id" >

<div id="chairman" class="tabcontent">
  <br/>
<h5>अध्यक्षको प्रतिवेदन</h5>
<br/>
 <iframe src="https://drive.google.com/file/d/1Q_uqxapFvHf3tm3rwP8mc5yZjuGKue4p/preview" 
  style="border:2px #rafdsyg solid;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="500px" width="1000px" allowfullscreen></iframe>
  
    <div class="col-md-12 row mt-2">
    <label for="chairmanComment">प्रतिवेदन उपर सुझाब तथा प्रतिकृया </label>
    <textarea class="form-control" id="chairmanComment" name="chairmanComment" rows="3">{{$comment->chairman_comment ?? ''}}</textarea>
     
  <div class="col-md-9 mt-2">
  @if(empty($comment->chairman_comment))
  <button  type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
  @endif
  </div>
  <div class="col-md-3  mt-2 mb-2">
  <button class="btn btn-success align-right">महासचिवको प्रतिवेदन</button>
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
    <textarea class="form-control"  id="secComment" name="secComment" rows="3">{{$comment->sec_comment ?? ''}}</textarea>
     
    <div class="col-md-12 row mt-2">
  <div class="col-md-9 mt-2 mb-2">
  @if(empty($comment->sec_comment))
  <button  type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
  @endif
  </div>
  <div class="col-md-3 mt-2 mb-2">
  <button class="btn btn-success align-right">कोषाध्यक्षको प्रतिवेदन</button>
</div>
</div>
   
</div>

<div id="tresurer" class="tabcontent">
<br/>
<h5>कोषाध्यक्षको प्रतिवेदन </h5>
<br/>
<iframe src="https://drive.google.com/file/d/1Q_uqxapFvHf3tm3rwP8mc5yZjuGKue4p/preview" style="border:2px #rafdsyg solid;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="500px" width="1000px" allowfullscreen></iframe>
 
    <label for="tresComment">प्रतिवेदन उपर सुझाब तथा प्रतिकृया </label>
    <textarea class="form-control" name="tresComment" id="tresComment" rows="3">{{$comment->tres_comment ?? ''}}</textarea>
  
    <div class="col-md-12 row mt-2">
  <div class="col-md-9 mt-2 mb-2">
  @if(empty($comment->tres_comment))
  <button  type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
  @endif
  </div>
  <div class="col-md-3 mt-2 mb-2">
  <button class="btn btn-success align-right">ले.प. प्रतिवेदन</button>
</div>
   
</div>

<div id="audit" class="tabcontent">
<br/>
<h5>ले.प. प्रतिवेदन</h5>
<br/>
<iframe src="https://drive.google.com/file/d/1Q_uqxapFvHf3tm3rwP8mc5yZjuGKue4p/preview" style="border:2px #rafdsyg solid;" 
  name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="500px" width="1000px" allowfullscreen></iframe>

    <label for="auditComment">प्रतिवेदन उपर सुझाब तथा प्रतिकृया </label>
    <textarea class="form-control"  name="auditComment" id="auditComment" rows="3">{{$comment->audit_comment ?? ''}}</textarea>
     
    <div class="col-md-12 row mt-2">
  <div class="col-md-9 mt-2 mb-2">
  @if(empty($comment->audit_comment))
  <button  type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
  @endif
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
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 
