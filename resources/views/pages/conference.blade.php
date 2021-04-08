@extends('auth.app')

@section('content')
@csrf


<div class="group clearboth">
  <div class="mainscreenleft">
    <div class="toplogowrapper">
      <div class="toplogocol1"><span>Exclusively Sponsored by</span><a href="#"><img src="images/agilent1.png"
            alt=""></a></div>
      <div class="toplogocol2"><img src="images/toplogo-line.gif" alt=""></div>
      <div class="toplogocol3">
        <div class="topvideolive" style="display: none">
          <div class="topvideoliveicon">
            <div class="circle--outer"></div>
            <div class="circle--inner"></div>
          </div>
          <a>Live Now</a>
        </div>
      </div>
      <div class="toplogocol2"><img src="images/toplogo-line.gif" alt=""></div>
      <div class="toplogocol4 livesessiontitle">Omics and its relevance in<span>understanding disease mechanisms</span>
      </div>
    </div>

    <div class="mainscreenvideo">
      {{--  <iframe src="https://vimeo.com/event/522199/embed/48dea1a8a0" frameborder="0" allow="autoplay; fullscreen"
        allowfullscreen></iframe>  --}}
      <iframe src="https://player.vimeo.com/video/489804289?autoplay=1" frameborder="0" allow="autoplay; fullscreen"
        allowfullscreen></iframe>
    </div>

    {{--  <div class="zoomnotreglink">Unable to view the video? <a href="#">Join this webinar on Zoom</a></div>  --}}
  </div>

  @include('layouts.handouts')
  {{--  @include('layouts.chat')  --}}


</div>
@endsection