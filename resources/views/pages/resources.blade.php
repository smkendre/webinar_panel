@extends('auth.app')

@section('content')
@csrf
     
<div class="innermaincontain">
  <a data-fancybox="" data-src="#resourceassets" data-options="{&quot;touch&quot;: false}" href="javascript:;" class="resourcebanner1"><img src="images/trs.png" alt=""></a>
  <a data-fancybox="" data-src="#resourcevideo" data-options="{&quot;touch&quot;: false}" href="javascript:;" class="resourcebanner2"><img src="images/trs.png" alt=""></a>
  
  <img src="https://img.ebpd.in/ec/website/backtowork/oct2020/resource.jpg" alt="" class="rsinnerimg" >
  
</div>
<div id="resourceassets" class="popmain1">
  <div class="popmainheading">Resource Assets</div>
  <div class="popmain1con1">
  </div>
  </div>

  <div id="resourcevideo" class="popmain1">
    <div class="popmainheading">Resource Videos</div>
     <div class="popmain1con1">
    </div>
    </div>
@endsection