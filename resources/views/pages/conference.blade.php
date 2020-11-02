@extends('auth.app')

@section('content')
@csrf


<div class="innermaincontain">

  <a data-fancybox href="video_tracking('https://player.vimeo.com/video/467649337?autoplay=1', 'ondemand', 54)" class="confrancebanner1"><img src="images/trs.png" alt=""></a>
  <a data-fancybox href="video_tracking('https://player.vimeo.com/video/467649337?autoplay=1', 'ondemand', 54)" class="confrancebanner2"><img src="images/trs.png" alt=""></a>

  <img src="https://img.ebpd.in/ec/website/backtowork/oct2020/confrance.jpg" alt="" class="rsinnerimg">

</div>

{{--  <div class="conzoomlink">Unable to view Live Video? <a href="#" target="_blank"> Click here to join this session on Zoom</a></div>  --}}
<a data-fancybox id="introvideo" href="https://player.vimeo.com/video/467649337?autoplay=1"></a>

@endsection

@section('js_after')
<script>
  window.jQuery(document).ready(function() {
		{{--  var box = $('#introvideo');
    $.fancybox.open(box);  --}}
     video_tracking('https://player.vimeo.com/video/467649337?autoplay=1', 'ondemand', 54);
   var event_id = $('#event_id').val();
   var login_url = $("#join-"+event_id).attr('data-url');
    $(".conzoomlink a").attr('href', login_url);
  });
  
</script>

@endsection