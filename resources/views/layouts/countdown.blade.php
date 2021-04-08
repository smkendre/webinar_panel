<!doctype html>
<html lang="en">
<head>
<title>Omics and its relevance in understanding disease mechanisms</title>
<meta name="description" content="India is going through one of the toughest economic and humanitarian challenges due to the Covid 19 crisis.">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, minimal-ui" />

<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" type="image/png" href="favicon.png">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.min.css" type="text/css" media="screen" />


<link href="css/jquery.bxslider.css" rel="stylesheet" type="text/css" />
<link href="css/common-text.css" rel="stylesheet" type="text/css" />
<link href="css/common-layout.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/resrponsive.css">

</head>
<body>
	
    
    <div class="loader"></div>
    
    
    <div class="loginbg">
    	
        <div class="eclogo"><a href="index.html"><img src="images/eh-logo1.png" alt="" ></a></div>
        
        <div class="datetime"><i>10</i><h6><span>December 2020</span>1:30PM - 5:25PM</h6></div>
        
        
        
        <div class="loginbox">
            <div class="countboxcon">
                <a href="index.html"><img src="images/agilent.png" alt="" class="countdownboxlogo"></a>
                <h3>Omics and its relevance in understanding disease mechanisms</h3>
                <h5>December 10, 2020 @ 1:30PM IST</h5>
                <h6>This session hasn't started yet. <span>You will be redirected to the room once the session begins.</span></h6>
                <div class="idxcount">
                    <ul class="nobullet">
                        <li><span id="days"></span>days</li>
                        <li><span id="hours"></span>Hours</li>
                        <li><span id="minutes"></span>Minutes</li>
                        <li><span id="seconds"></span>Seconds</li>
                    </ul>
                </div>
                <div class="tac"><h4><span>{{session()->get('username')}}</span>{{session()->get('useremail')}}</h4></div>
                <p class="tac"><i>If you are not redirected automatically,<span>click on the below button to enter the session</span></i></p>
                {{-- <div class="btn1 tac"><a href="#">Enter Room</a></div> --}}
            </div>
        </div>
        
        <div class="countdownvideo">
            <h3>Preview Video</h3>
            <iframe src="https://player.vimeo.com/video/488926366?autoplay=1&loop=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
        
        
    </div>
    
    
    
    <div class="mainfooter">
        <div class="mainfooterleft"><a href="https://www.expresshealthcare.in" target="_blank"><img src="images/eh-logo.png" alt="" ></a> &copy; 2020 - The Indian Express Pvt. Ltd. All Rights Reserved. <span>|</span> <a href="https://www.expresshealthcare.in/privacy-policy/" target="_blank">Privacy Policy</a></div>
        <div class="mainfooterright">
            <a href="https://www.facebook.com/ExpPharma" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://www.linkedin.com/showcase/express-pharmaworld/" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="https://twitter.com/ExpPharma" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.instagram.com/expresspharmaonline/" target="_blank"><i class="fa fa-instagram"></i></a>
        </div>
    </div>

    
    
    
<script type="text/javascript" src="https://s.ebpd.in/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://s.ebpd.in/ajax-1.9.0.min.js"></script>
<script type="text/javascript" src="https://s.ebpd.in/source-tracking.js"></script>

<script src="js/jquery.balance.js" type="text/javascript"></script>
<script type="text/javascript">
	$(window).load(function() {
		$('.idxspeakerboxheight').balance() ;
	});
</script>

<script src="js/jquery.bxslider.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
	  if($(window).width() < 10500){
		  $('.headerslider').bxSlider({
			infiniteLoop:true,
			auto:true,
			pager:true,
			controls:false,
			  oneToOneTouch:true,
				pause: 7000,
				touchEnabled: true,
		 });
	  }
	});
</script>


<script type="text/javascript">
		const second = 1000,
	      minute = second * 60,
	      hour = minute * 60,
	      day = hour * 24; 
		 let countDown = new Date('December 10, 2020 13:30:00').getTime(),
	    x = setInterval(function() {
	
	      let now = new Date().getTime(),
	          distance = countDown - now;
	
	      document.getElementById('days').innerText = Math.floor(distance / (day)),
	        document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
	        document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
	        document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
	      
	      //do something later when date is reached
	      if (distance < 0) {
	       window.location.href = 'conference';
	      }
	
	    }, second)
</script>





<script type="text/javascript">
	$(window).load(function() {
		$(".loader").fadeOut("slow");
	})
</script>

</body>
</html>
