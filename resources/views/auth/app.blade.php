<!doctype html>
<html lang="en">

<head>
    <title>Back to Work</title>
    <meta name="description" content="">

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
    <link href="{{ asset('css/common-text.css?1') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/common-layout.css?5') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/resrponsive.css?2') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chatbox.css?14') }}">

    <script>
        var JS_URL = "{{ url('/') }}/";
    </script>
</head>

<body>

    <div class="loader"><span></span></div>


    <div class="mainscreen {{ Request::segment(1) }}bg">

        <div class="maintopbg">
            <div class="maintopcol1"><a href="conference"><img src="images/ec-logo.png" alt=""></a></div>
            <div class="maintopcol2">
                <h1><span>Virtual Conference</span>Back to Work</h1>
            </div>
            <div class="innertopmenubg">
                <a class="toprightlink"><i class="fa fa-cog"></i></a>
                <div class="toprightlinkshow">
                    <ul class="nobullet">
                        <li><a data-fancybox data-src="#editpopup" data-options='{"touch": false}'
                                href="javascript:;">Edit Profile</a></li>
                        <li><a data-fancybox data-src="#viewpopup" data-options='{"touch": false}'
                                href="javascript:;">View Profile</a></li>
                        <li><a href="{{ url('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="attendingbox">
                <a data-fancybox data-src="#totalattending" data-options='{"touch": false}' href="javascript:;">Total
                    Attending : <u id="totalcount">0</U></a>
                <a data-fancybox data-src="#nowattending" data-options='{"touch": false}' href="javascript:;">Now
                    Attending : <u id="livecount">0</U></a>
                <a data-fancybox data-src="#pageattending" data-options='{"touch": false}' href="javascript:;">This
                    Location :
                    <u id="pagecount">0</u></a></div>

        </div>

        @yield('content')

        @include('layouts.menu')
        @include('layouts.agenda')
        @include('layouts.profile')
        @include('layouts.requestmeeting')

        <div class="mainfooter">
            <div class="mainfooterleft"><a href="https://www.expresscomputer.in/" target="_blank"><img
                        src="images/eclogo.png" alt=""></a> &copy; 2020 - The Indian Express Pvt. Ltd. All Rights
                Reserved. <span>|</span> <a href="https://www.expresscomputer.in/privacy-policy/"
                    target="_blank">Privacy Policy</a></div>
            <div class="mainfooterright">
                <a href="https://www.facebook.com/ExpressComputerOnline/" target="_blank"><i
                        class="fa fa-facebook"></i></a>
                <a href="https://www.linkedin.com/showcase/express-computer/" target="_blank"><i
                        class="fa fa-linkedin"></i></a>
                <a href="https://twitter.com/ExpComputer" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.instagram.com/expresscomputeronline/" target="_blank"><i
                        class="fa fa-instagram"></i></a>
            </div>
        </div>

    </div>

    @include('layouts.chat')


    <div id="nowattending" class="popmain1">
        <div class="popmainheading">Now Attending</div>
        <div class="popmain1con1">
            <div class="popupformmain1" id="user-list">

            </div>
        </div>
    </div>

    <div id="totalattending" class="popmain1">
        <div class="popmainheading">Total Attending</div>
        <div class="popmain1con1">
            <div class="popupformmain1" id="total-user-list">

            </div>
        </div>
    </div>

    <div id="pageattending" class="popmain1">
        <div class="popmainheading">This Location Users</div>
        <div class="popmain1con1">
            <div class="popupformmain1" id="users-page">

            </div>
        </div>
    </div>

    <div id="HirenMistry" class="popmain3">
        <div class="popmainheading">Send Message</div>
        <div class="popmain1con1">
            <div class="popupformmain1">
                <form id="sndFrm" name="sndFrm" method="POST" action="{{ route('emailconnect') }}" role="form">
                    @csrf
                    <input type="hidden" id="to_id" name="to_id" value="" />
                    <input type="hidden" id="to_email" name="email" value="" />
                    <input type="hidden" id="receiver_name" name="receiver_name" value="" />
                    <label id="lblName"></label>
                    <div class="popupformmain1box">
                        <label>Subject</label>
                        <input type="text" maxlength="128" name="subject" id="subject" placeholder="Enter your Subject"
                            required>
                    </div>
                    <div class="popupformmain1box">
                        <label>Message</label>
                        <textarea rows="5" cols="2" id="message" name="message"
                            placeholder="Type message here..."></textarea>
                    </div>
                    <button type="submit" id="send" name="send" class="button">Send</button>
                </form>
            </div>
        </div>
    </div>

    <div id="announsmessage" class="popmain3">
        <div class="popmainheading">Announcement Message</div>
        <div class="popmain1con1">
            <div class="popupformmain1">
                <p class="tac"><label></label></p>
                <p class="desc" style="text-align: center">is live now</p>
                <br>
                <div class="btn2 actionBtn " style="text-align: center"><a href="{{url('conference')}}">Join Now</a></div>
            </div>
        </div>
        <button type="button" data-fancybox-close="" class="fancybox-button fancybox-close-small"
            title="Close"></button>
    </div>

    <div id="Hirenvideomsg" class="popmain3">
        <div class="popmainheading">Chat Invitation</div>
        <div class="popmain1con1">
            <div class="popupformmain1">
                <p class="tac"><label><span>Hiren Mistry</span><br>Is inviting you to have a private chat with
                        him.</label></p>
                <br>
                <div class="btn2 tac"><a href="#">Accept</a> <a href="#">Decline</a></div>
            </div>
        </div>
    </div>

    <input type="hidden" name="name" id="name" value="{{session()->get('username')}}" />
    <input type="hidden" name="user_id" id="user_id" value="{{session()->get('daid')}}" />
    <input type="hidden" name="email" id="email" value="{{session()->get('useremail')}}" />
    <input type="hidden" name="job_title" id="job_title" value="{{session()->get('job_title')}}" />
    <input type="hidden" name="company" id="company" value="{{session()->get('company')}}" />
    <input type="hidden" name="page" id="page" value="{{Request::segment(1)}}" />
    <input type="hidden" name="event_id" id="event_id" value="{{ (isset($_COOKIE['event_id'])) ? $_COOKIE['event_id']: ""}}" />

    <script type="text/javascript" src="https://s.ebpd.in/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://s.ebpd.in/ajax-1.9.0.min.js"></script>
    <script type="text/javascript" src="https://s.ebpd.in/source-tracking.js"></script>
    <script type="text/javascript" src="{{ asset('js/script.js?12') }}"></script>

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
        $(document).ready(function() {
            {{--  $.fancybox.open($("#nowattending").html());  --}}
		$("[data-fancybox]").fancybox({
			{{--  afterClose: function () {
				$.fn.fullpage.setMouseWheelScrolling(true);
			},
			afterShow : function() {
				$.fn.fullpage.setMouseWheelScrolling(false);
			}  --}}
		});
	});
	$(document).ready(function() {
		$(".fancybox").fancybox({
			{{--  afterClose: function () {
				$.fn.fullpage.setMouseWheelScrolling(true);
			},
			afterShow : function() {
				$.fn.fullpage.setMouseWheelScrolling(false);
			}  --}}
		});
	});

    </script>
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
	})
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qs/6.9.2/qs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script type="text/javascript" src="https://dev.expressbpd.in/socket.io/socket.io.js"></script>
    <!-- <script type="text/javascript" src="http://localhost:3000/socket.io/socket.io.js"></script> -->
    <script type="text/javascript" src="{{ asset('js/chat.js?a4') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js?a36') }}"></script>

    @yield('js_after')

</body>

</html>
