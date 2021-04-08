<div id="viewpresenters" class="popmain1">
    <div class="popmainheading">View Presenters</div>
    <div class="popmain1con1">
        <div class="popupformmain1">
            @foreach ($speakers as $sp)
            <div class="presentersbox">
                <div class="presentersboxcol1"><img src="{{$sp->ap_image}}" alt=""></div>
                <div class="presentersboxcol2">
                    <h3>{{$sp->ap_name}}</h3>
                    <h6>{{$sp->ap_designation}} – {{$sp->ap_company}}
                    </h6>
                    {!! $sp->ap_description !!}
                </div>
            </div>
            <hr>
            @endforeach

        </div>
    </div>
</div>