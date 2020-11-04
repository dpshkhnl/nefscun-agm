<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>NEFSCUN</title>
    <link rel="stylesheet" href="style.css" />
    <style type="text/css">
@media print {
    #myPrntbtn {
        display :  none;
    }
}
</style>
  </head>
  <body>
    <div class="container m-b-10">
      <div class="row m-b-2">
        <div class="col-lg-10 col-md-10">
          <div class="text-center p-1">
            नेपाल बचत तथा ऋण केन्द्रीय सहकारी संघ लि.
          </div>

          <div class="text-center p-1">
            <b>२९ औं साधारण सभाको आधिकारिक प्रतिनिधि विवरण</b>
          </div>

          <div class="text-center p-1">
              फारम
          </div>
        </div>
        <div class="col-lg-2 col-md-2">
         
            <!-- <p>फोटो</p> -->
            <!-- <label for="#sanstha-logo">नोट: कृपया फोटोमा छुने गरी संस्थाको छाप प्रयाग गर्नुहोला</label> -->
           
                          <img  id="pp_photo" width="100px" height="100px" src="{{asset('images/photo/'.$orgUploads->photo)}}"> <br>
                       
            
        </div>
      </div>
      <section class="header">
        <div>
          <b>१. संघ/संस्थाको नाम:</b> <b>{{$orgRegister->org_name_np}}</b>
        </div>
        <div>
          <b>    &nbsp;
          &nbsp;
          
        
 नेफ्स्कून सदस्यता नं:</b> <b>{{$orgRegister->nefscun_mem_no}}</b>
        </div>
        <div>
          <b>२. ठेगाना : </b>
          <div class="p-2">
            <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                  <div class="col-sm">
                    प्रदेशः <b>{{$orgRegister->pradesh}}</b>
                  </div>
                  <div class="col-sm">
                    जिल्ला: <b>{{$orgRegister->dist_name_np}} </b>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
              <div class="row">
                  <div class="col-sm">
                  स्थानीय तह : <b>{{$orgRegister->name_np}} </b>
                  </div>
                  <div class="col-sm">
                  वडा नं.: <b>{{$orgRegister->ward}} </b>
                  </div>
                </div>
                
            </li>
            
              
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm">
                    फोन नं.: <b>{{$orgRegister->org_phone}}</b>
                  </div>
                  <div class="col-sm">
                    स्थायी लेखा नं.(PAN): <b>{{$orgRegister->panno}}</b>
                  </div>
                </div>
              </li>
              <li class="list-group-item">इमेल : <b>{{$orgRegister->email}}</b> </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm">
                    अध्यक्षको नाम : <b>{{$orgRegister->chairman_name}} </b> 
                  </div>
                  <div class="col-sm">
                    फोन नं. : <b>{{$orgRegister->chairman_no}} </b>
                  </div>
                </div>
              </li>

              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm">
                    व्यवस्थापकको नाम : <b>{{$orgRegister->managername}} </b>
                  </div>
                  <div class="col-sm">
                    फोन नं. : <b>{{$orgRegister->mobile_no}} </b>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div>
          <b>३. २९ औं साधारण सभामा सहभागिताका लागि आधिकारिक निर्णय:</b>
          <div>
            यस संघ/संस्थाको मिति <b>{{$orgRepresentive->decision_dt}} </b> गते बसेको सञ्चालक समिति/साधारण सभाको निर्णय अनुसार नेपाल बचत तथा ऋण केन्द्रीय सहकारी संघ लि. को २०७७ साल मंसिर ५ गते सम्पन्न हुने २९ औं साधारण सभामा प्रतिनिधित्व गर्न यस संघ/संस्थाको तर्फबाट तपसिलमा उल्लेखित व्यक्तिलाई मनोनयन गरी पठाईएको व्यहोरा अनुरोध छ ।
          </div>
        </div>
        
        <div>
          <b>४. प्रतिनिधिको विवरण:</b>
          <div class="p-2">
            <ul class="list-group">
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm">
                    नाम र थर: <b>{{$orgRepresentive->rep_name}} </b>
                  </div>
                  <div class="col-sm">
                    सदस्यता नं. <b>{{$orgRepresentive->memno}}</b>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm">
                    प्रदेशः <b>{{$orgRepresentive->pradesh}}</b>
                  </div>
                  <div class="col-sm">
                    जिल्ला: <b>{{$orgRepresentive->dist_name_np}}</b>
                  </div> 
                  <div class="col-sm">
                  स्थानीय तह: <b>{{$orgRepresentive->name_np}}</b>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm">
                    वडा नं. : <b>{{$orgRepresentive->ward}}</b>
                  </div>
                  <div class="col-sm">
                    पेशा : <b>{{$orgRepresentive->occupation}}</b>
                  </div>
                  <div class="col-sm">
                    शैक्षिक योग्यता :<b>{{$orgRepresentive->qualification}}</b>
                  </div>
                </div>
              </li>

              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm">
                    सम्पर्क फोन नं. : <b>{{$orgRepresentive->qualification}}</b>
                  </div>
                  <div class="col-sm">
                    ईमेल : <b>{{$orgRepresentive->email}}</b>
                  </div>
                </div>
              </li>
              <li class="list-group-item">संघ/संस्थामा निहित पद: <b>{{$orgRepresentive->post}}</b></li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm">
                    आफ्नो संघ/संस्थामा सदस्यता लिएको मिति: <b>{{$orgRepresentive->share_reg_dt}}</b>
                  </div>
                  <div class="col-sm">
                    दस्तखत नमूना: 
                    <img src="{{asset('images/rep_sign/'.$orgUploads->rep_sign)}}" width="125px" height="65px">
                  
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>     

        <div>
          <b>५. नेफ्स्कून प्रति तपाईको थप सल्लाह एवं सुझाव भए :</b>
          <div class="m-2">
            <textarea class="form-control" style="min-width: 100%" rows="4">
            </textarea>
          </div>
        </div>

        <div class="p-1 m-b-10">
          <div class="row">
            <div class="col-sm-8">
              <b>प्रतिनिधि मनोनयन गर्ने संघ/संस्थाको तर्फबाट प्रमाणित गर्नेको विवरण : </b>
              <div>दस्तखत : <img src="{{asset('images/chairman_sign/'.$orgUploads->chairman_sign)}}" width="125px" height="65px"></div>
              <div>नाम, थर : <b>{{$orgRegister->chairman_name}}</b> </div>
              <div>संघ/संस्थामा निहित पद : अध्यक्ष</div>
            </div>
            <div class="col-sm-4">
              <div class="border border-primary m-2 p-1 text-center" style="height: auto;">
              <img src="{{asset('images/org_stamp/'.$orgUploads->org_stamp)}}" width="100px" height="100px">
              </div>
            </div>
          </div>          
        </div>
      </section>
      <div class="text-center">
      <br/>
      <br/>
      <br/>
      <p>यो कम्प्युटर द्वारा जारी गरिएको कागजात हो। कुनै हस्ताक्षर आवश्यक छैन।</p>
      </div>
      <div class="float-right">
      <input id ="myPrntbtn" type="button" class="btn btn-primary" value="Print" onclick="window.print();" >

      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script type='text/javascript'>
 $(document).ready(function(){
    $('#printMe').click(function(){
    
     window.print();
});
});

</script>
  </body>
</html>