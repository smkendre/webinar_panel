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
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	
    
    <div class="loader"></div>
    
    
    <div class="loginbg">
    	
        <div class="eclogo"><a href="index.html"><img src="images/eh-logo1.png" alt="" ></a></div>
        
        <div class="datetime"><i>10</i><h6><span>December 2020</span>1:30PM - 6:00PM</h6></div>
        
        <div class="loginbox">
        	<div class="loginboxlogo"><a href="index.html"><img src="images/agilent.png" alt="" ></a></div>
            <form action="{{ route('userlogin') }}" method="POST" id="loginFrm">
                @csrf
                <h3><i>LOGIN</i> <span>Not Registered? <a href="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/register.php" target="_blank">Register Now</a></span></h3>
                <h6>If you have already registered, please log in</h6>
                <label>Email Address</label>
                <input type="email" id="email" name="email" maxlength="128" value="" required>
                <div class="group clearboth"><button type="submit" >Login</button></div>
            </form>
        </div>
        
        <div class="idxrightcon">
            <h3>Speakers</h3>
            <ul class="nobullet">
            	<li>
                    <div class="group clearboth tac">
                        <div class="idxspeakerbox idxspeakerboxheight">
                            <img src="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/images/nilangan.jpg" alt="">
                            <h4>Dr. Nilanjan Guha</h4>
                            <p>Ph.D., BDM- Academia & Research, Agilent Technologies</p>
                        </div><div class="idxspeakerbox idxspeakerboxheight">
                            <img src="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/images/saurabh.jpg" alt="">
                            <h4>Saurabh Nagpal</h4>
							<p>Application Engineer - Spectroscopy, Agilent Technologies</p>
                        </div><div class="idxspeakerbox idxspeakerboxheight">
                            <img src="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/images/anuj.jpg" alt="">
                            <h4>Dr. Anuj Gupta</h4>
							<p>Application Engineer, Diagnostics & Genomics, Agilent Technologies</p>
                        </div><div class="idxspeakerbox idxspeakerboxheight">
                            <img src="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/images/deepak.jpg" alt="">
                            <h4>Dr. S A Deepak</h4>
							<p>Application Engineer – Seahorse Products, Agilent Technologies</p>
                        </div><div class="idxspeakerbox idxspeakerboxheight">
                            <img src="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/images/ghosh.jpg" alt="">
                            <h4>Dr. Arkasubhra Ghosh</h4>
							<p>Director, GROW Research Laboratory</p>
                        </div>
                    </div>
                </li>
                
            </ul>
            
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

    <div id="loginpop" class="popmain1">
        <div class="fancybox_content">
          <h3>VIRTUAL Event </h3>
          <h2>Omics and its relevance in <br>
            understanding disease mechanisms</h2>
          <h4>will be live on</h4>
          <br>
          <h5>10<sup>th</sup> December 2020 | 10:00 AM IST </h5>
          <br>
          <div class="btn1"><a href="javascript:" data-fancybox-close="" title="Close">OK</a>
          </div>
          {{--  <button type="button" data-fancybox-close="" class="btn btn-default" title="Close">OK</button>  --}}
        </div>
      </div>
      <div id="resigterpopup" class="popmain1">
        <div class="fancybox_content">
      
          <h5>You have not registered for this event </h5>
          <br>
          <div class="btn1"><a href="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/register.php" target="_blank"
              title="Close">Register</a>
          </div>
          {{--  <button type="button" data-fancybox-close="" class="btn btn-default" title="Close">OK</button>  --}}
        </div>
      </div>    
    
    
<script type="text/javascript" src="https://s.ebpd.in/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://s.ebpd.in/ajax-1.9.0.min.js"></script>
<script type="text/javascript" src="https://s.ebpd.in/source-tracking.js"></script>
<script src="{{ url('js/jquery.fancybox.min.js') }}" type="text/javascript"></script>
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

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
          //openCity(event, 'tue2');

          $('button').attr('disabled',false);
          // login page validation
          $("#loginFrm").validate({
            rules: {
              email: { required: true, email: true },
            },
            messages: {
              email: {
                required: "Please enter your email address",
                email: "Please enter valid email address"
              },
            },
          submitHandler: function(form) {            

              $.ajax({
                url: 'ajaxlogin',
                data:{email: $("#email").val(), _token: $("input[name='_token']").val() },
                type: 'post',
                dataType: 'json',
                success: function(response){
                  if(response.status == 200){
                    {{--  $("#loginFrm")[0].submit();  --}}
                    $.fancybox.open($("#loginpop"));
                  }else{
                    $.fancybox.open($("#resigterpopup"));
                  }
                }
              });

              return false;
             //$("#loginFrm")[0].submit();
             // $("#divLoading").show();

            

              // if($("#email").val() == 'viraj.mehta@indianexpress.com')
              //$("#loginFrm")[0].submit();
              //else
              // $.fancybox.open($("#loginpop").html());
            }
          });
        });



        <?php /*if( app('request')->input('email') != '') { ?>
          $("#loginFrm")[0].submit();
          <?php }*/ ?>




</script>
<script type="text/javascript">
	$(window).load(function() {
		$(".loader").fadeOut("slow");
	})
</script>

</body>
</html>
