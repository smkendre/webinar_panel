<!doctype html>
<html lang="en">

<head>
    <title>Back To Work</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, minimal-ui" />
    <meta name="description" content="Back To Work">
    <meta name="keywords" content="Back To Work">
    <meta charset="utf-8">

    <link rel="shortcut icon" href="{{ url ('favicon.ico?1') }}">
    <link rel="icon" type="image/png" href="{{ url('favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.min.css"
        type="text/css" media="screen" />
    <link href="css/jquery.bxslider.css?1" rel="stylesheet" type="text/css" />
    <link href="css/common-text.css?2" rel="stylesheet" type="text/css" />
    <link href="css/common-layout.css?4" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/resrponsive.css?1">
    <link rel="stylesheet" type="text/css" href="css/style.css?1">
</head>

<body>


    <div class="loader"></div>

@yield('content')

    <div class="mainfooter">
        <div class="mainfooterleft">&copy; 2020 - The Indian Express Pvt. Ltd. All Rights Reserved. <span>|</span> <a
                href="https://www.expresscomputer.in/privacy-policy/" target="_blank">Privacy Policy</a></div>
        <div class="mainfooterright">
            <a href="https://www.facebook.com/ExpressComputerOnline/" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://www.linkedin.com/showcase/express-computer/" target="_blank"><i
                    class="fa fa-linkedin"></i></a>
            <a href="https://twitter.com/ExpComputer" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.instagram.com/expresscomputeronline/" target="_blank"><i
                    class="fa fa-instagram"></i></a>
        </div>
    </div>
    <script type="text/javascript" src="https://s.ebpd.in/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://s.ebpd.in/ajax-1.9.0.min.js"></script>
    <script type="text/javascript" src="https://s.ebpd.in/source-tracking.js"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js')}}"></script>
    <script src="js/jquery.balance.js" type="text/javascript"></script>
    <script src="js/jquery.bxslider.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(window).load(function() {
        $('.idxspeakerboxheight').balance() ;
        $(".loader").fadeOut("slow");
    });

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


    @yield('customJs')



</body>

</html>