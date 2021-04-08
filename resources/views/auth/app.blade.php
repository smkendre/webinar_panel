<!doctype html>
<html lang="en">

<head>
  <title>Omics and its relevance in understanding disease mechanisms</title>
  <meta name="description"
    content="India is going through one of the toughest economic and humanitarian challenges due to the Covid 19 crisis.">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, minimal-ui" />

  <link rel="shortcut icon" href="favicon.ico">
  <link rel="icon" type="image/png" href="favicon.png">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.min.css"
    type="text/css" media="screen" />

  <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.min.css') }}" type="text/css" media="screen" />
  <link href="{{ asset('css/common-text.css?2') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/common-layout.css?9') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/resrponsive.css?3') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css?1') }}">

  <script>
    var JS_URL = "{{ url('/') }}/";
  </script>
</head>

<body>

  <div class="loader"></div>



  <div class=" @if(Request::segment(1) == 'survey') mainscreensurvay @else mainscreen @endif ">

    <div class="maintopbg">
      <div class="maintopcol1"><a href="{{ url('conference') }}"><span>organised by</span><img src="images/eh-logo.png" alt=""></a></div>
      <div class="maintopcol2">
        <h1><span>Welcome to</span>Express Webcast Theatre</h1>
      </div>
      <div class="innertopmenubg">
        <a class="toprightlink"><i class="fa fa-cog"></i></a>
        <div class="toprightlinkshow">
          <ul class="nobullet">
            <li><a data-fancybox data-src="#editpopup" data-options='{"touch": false}' href="javascript:;">Edit
                Profile</a></li>
            <li><a data-fancybox data-src="#viewpopup" data-options='{"touch": false}' href="javascript:;">View
                Profile</a></li>
            <li><a href="{{ url('logout') }}">Logout</a></li>
          </ul>
        </div>
      </div>
      {{-- <div class="attendingbox"><a data-fancybox data-src="#nowattending" data-options='{"touch": false}'
          href="javascript:;">Now Attending : <u id="livecount">0</U></a></div> --}}

    </div>
    @yield('content')
    @include('layouts.menu')
    <div class="mainfooter">
      <div class="mainfooterleft"><a href="https://www.expresshealthcare.in" target="_blank"><img
            src="images/eh-logo.png" alt=""></a> &copy; 2020 - The Indian Express Pvt. Ltd. All Rights
        Reserved. <span>|</span> <a href="https://www.expresshealthcare.in/privacy-policy/" target="_blank">Privacy
          Policy</a></div>
      <div class="mainfooterright">
        <a href="https://www.facebook.com/ExpPharma" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="https://www.linkedin.com/showcase/express-pharmaworld/" target="_blank"><i
            class="fa fa-linkedin"></i></a>
        <a href="https://twitter.com/ExpPharma" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.instagram.com/expresspharmaonline/" target="_blank"><i class="fa fa-instagram"></i></a>
      </div>
    </div>

  </div>


  @include('layouts.profile')
  @include('layouts.agenda')

  @include('layouts.requestmeeting')
  @include('layouts.nowattending')
  @include('layouts.speakers')
  @include('layouts.askquestion')
  @include('layouts.poll')
  @include('layouts.message')

  <div id="messagePopup" class="popmain3">
    <div class="popmainheading">Message</div>
    <div class="popmain1con1">
      <div class="popupformmain1">
        <p id="successMsg"><label></label></p>
      </div>
    </div>
  </div>

  <input type="hidden" name="name" id="name" value="{{session()->get('username')}}" />
  <input type="hidden" name="user_id" id="user_id" value="{{session()->get('daid')}}" />
  <input type="hidden" name="email" id="email" value="{{session()->get('useremail')}}" />
  <input type="hidden" name="job_title" id="job_title" value="{{session()->get('job_title')}}" />
  <input type="hidden" name="company" id="company" value="{{session()->get('company')}}" />
  <input type="hidden" name="page" id="page" value="{{Request::segment(1)}}" />
  <input type="hidden" name="event_id" id="event_id"
    value="{{ (isset($_COOKIE['event_id'])) ? $_COOKIE['event_id']: ""}}" />

  <script type="text/javascript" src="https://s.ebpd.in/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="https://s.ebpd.in/ajax-1.9.0.min.js"></script>
  <script type="text/javascript" src="https://s.ebpd.in/source-tracking.js"></script>
  <script type="text/javascript" src="{{ asset('js/script.js?3') }}"></script>

  <script type="text/javascript" src="js/jquery.datetimepicker.full.min.js"></script>
  <script type="text/javascript">
    jQuery('#datetimepicker3').datetimepicker({
            format:'d.m.Y H:i',
            inline:true,
            lang:'ru'
        });

  </script>
  <script src="js/jquery.balance.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(window).load(function() {
		$('.idxspeakerboxheight').balance() ;
  });
  var divs = ["menu1", "menu2", "menu3", "menu4", "menu5"];
		var visibleDivId = null;
		function toggleVisibility(divId) {
		  if(visibleDivId === divId) {
		  } else {
			visibleDivId = divId;
		  }
		  hideNonVisibleDivs();
		}
		function hideNonVisibleDivs() {
		  var i, divId, div;
		  for(i = 0; i < divs.length; i++) {
			divId = divs[i];
			div = document.getElementById(divId);
			if(visibleDivId === divId) {
			  div.style.display = "block";
			} else {
			  div.style.display = "none";
			}
		  }
		}
  function hideDiv(id){
    $("#" + id).hide();
  }
  </script>


  <script type="text/javascript">
    $(document).ready(function(){
	  $(".toprightlink").click(function(){
		$(".toprightlinkshow").toggle();
	  });
	});
  </script>

  <script type="text/javascript" src="js/jquery.fancybox.min.js"></script>

  <script type="text/javascript">
    function sendmessage(id, name, email){

            document.getElementById("to_id").value = id;
            document.getElementById("to_email").value = email;
            document.getElementById("receiver_name").value = name;

            document.getElementById('lblName').innerHTML = "Sending Message to " + name;
        }
        function openCity(evt, cityName) {
	  var i, tabcontent1, tablinks;
	  tabcontent1 = document.getElementsByClassName("tabcontent1");
	  for (i = 0; i < tabcontent1.length; i++) {
		tabcontent1[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
  </script>
  <script type="text/javascript">
    $(window).load(function() {
		$(".loader").fadeOut("slow");
    });
 
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qs/6.9.2/qs.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
  <script type="text/javascript" src="https://dev.expressbpd.in/socket.io/socket.io.js"></script>
  <script type="text/javascript" src="{{ asset('js/main.js?9') }}"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
       
           
        $("#qsansFrm").validate({
          rules:{
            question:{required: true}
          },
          messages:{
            question:{required: "Please enter question"}
          },
          submitHandler: function(form) {            
    
            $.ajax({
              url: 'ask-question',
              data:{question: $("#question").val(), _token: $("input[name='_token']").val()},
              type: 'post',
              dataType: 'json',
              success: function(response){
                if(response.status == 200){
                  $.fancybox.close();
                  $("#successMsg label").text("Question submitted successfully");
                  $.fancybox.open($("#messagePopup"));
                }else{
                 // $.fancybox.open($("#resigterpopup"));
                }
              }
            });
    
            return false;
         
          }
        });

        $("#meetingFrm").validate({
            rules:{
              msg:{required: true}
            },
            messages:{
              msg:{required: "Please enter message"}
            },
            submitHandler: function(form) {            
      
              $.ajax({
                url: 'request-meeting',
                data:{msg: $("#msg").val(), _token: $("input[name='_token']").val(), sdate: $("#sdate").val(), stime: $("#stime").val(), sponsor: $("#sponsor").val() },
                type: 'post',
                dataType: 'json',
                success: function(response){
                  if(response.status == 200){
                    $.fancybox.close();
                    $("#successMsg label").text("Request send successfully");
                    $.fancybox.open($("#messagePopup"));
                  }else{
                    $.fancybox.open($("#resigterpopup"));
                  }
                }
              });
      
              return false;
           
              // if($("#email").val() == 'viraj.mehta@indianexpress.com')
              //$("#loginFrm")[0].submit();
              //else
              // $.fancybox.open($("#loginpop").html());
            }
          });

          $("#agilent_survey").validate( {
            onfocusout: function(element) {
              errorLabelContainer: '#ErrorIsBppStandard',
                     this.element(element);
            },
            rules: {
              name: {
                required: true,
                maxlength: 100
              },
              cname: {
                required: true,
                maxlength: 250
              },
              email: {
                required: true,
                email: true,
                maxlength: 250
              },
              objectives: {
                required: true,
              },
              'session_useful[]': {
                required: true,
              },
              'area_research[]':{
                required: true,
              },
              technologies: {
                required: true,
              },
              instruments: {
                required: true,
              },
              rd_developing:{
                required: true,
              },
              'chk_interested[]': {
                required: true,
              },
              rd_timeframe:{
                required: true,
              },
              rd_software: {
                required: true,
              },
        
            },
            messages: {
                name: {
                  required: "Please enter Name",
                  maxlength: "Last Name cannot be greater than 150 characters"
                },
                cname: {
                  required: "Please enter Company Name",
                  maxlength: "Company Name cannot be greater than 250 characters"
                },
                email: {
                  required: "Please enter Official Email Id",
                  email: "Please enter valid Official Email Id",
                  maxlength: "Email Id should not be greater than 250 characters"
                },
                objectives: {
                  required: "Please Select Question 1",
                },
                'session_useful[]': {
                  required: "Please Select Question 2",
                },
                'area_research[]':{
                    required: "Please Select Question 3",
              },
              technologies: {
                  required: "Please Select Question 4",
                },
                instruments: {
                  required: "Please Select Question 5",
                },
                rd_developing:{
                    required: "Please Select Question 6",
              },
                'chk_interested[]': {
                  required: "Please Select Question 7",
                },
                rd_timeframe:{
                    required: "Please Select Question 8",
              },
              rd_software: {
                  required: "Please Select Question 9",
                },
            },
        
            submitHandler: function (form) {
        
              $("#submit").html('Submitting...');
              $("#submit").attr("disabled", true);
        
                // AJAX code to submit form.
                $.ajax({
                  type: "POST",
                  dataType: 'json',        
                  url: JS_URL+"survey_response",
                  data: $(form).serialize(),
                    success: function(response) {
                    
                    if(response.status == 200){
                      $("#successMsg label").text("Thank you for your response. Survey response added successfully");
                      $.fancybox.open($("#messagePopup"));

                      setTimeout(function(){ 
                        window.location.href = JS_URL+'conference';

                       }, 3000);
                    } else {
                      $("#successMsg label").text(response.msg);
                      $.fancybox.open($("#messagePopup"));
                    }
        
                  }
                });
                return false;
            }
          });


      });
  </script>
  @yield('js_after')

</body>

</html>