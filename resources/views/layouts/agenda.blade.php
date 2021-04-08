<div id="agenda" class="popmain2">
    <div class="popmainheading1">
        <span>Conference Sessions</span>
        <div class="tab1">
            <button class="tablinks active" onClick="openCity(event, 'tab16')">10 December, 2020</button>
        </div>
    </div>
    <div class="popmain1con1">

        @foreach ($agenda as $session)
        <div id="tab{{$session->as_id}}" class="tabcontent1" @if($session->as_id == 16) style="display: block;" @endif >

            {{--  {{dd($session)}} --}}
            @foreach ($session->individual_sessions as $row)
            <div class="popconfbox" id="session_{{$row->assm_id}}">
                <div class="popconfboxcol1">
                    @if($row->assm_status == 1 || $row->assm_status == 2)
                    <h6 class="countdown" id="{{$row->assm_id}}"
                        data-date="{{ date('M d, Y', strtotime($session->as_date)) }}"
                        data-time="{{ date('H:i:s', strtotime($row->assm_start_time)) }}"
                        data-end-time="{{ date('H:i:s', strtotime($row->assm_start_time)) }}"
                        data-title="{{$row->assm_title}}" data-url="{{ $row->login_url}}"><img src="images/clock.png"
                            alt=""></h6>
                    <a href="javascript:" class="live_link" style="display: none" id="live-{{$row->assm_id}}">Live
                        Now<i class="fa fa-video-camera"></i></a>
                    <a href="#" data-url="{{ $row->login_url}}" data-id="{{$row->assm_id}}"
                        data-date="{{ date('M d, Y', strtotime($session->as_date)) }}"
                        data-time="{{ date('h:i A', strtotime($row->assm_start_time)) }}"
                        class="joinNowLink join_link conboxbtn" id="join-{{$row->assm_id}}" data-timeLeft="10"
                        style="display: none;">Join Now</a>
                    @endif

                    @if($row->assm_url)
                    <a href="javascript:" onclick="video_tracking('{{$row->assm_url}}', 'ondemand', {{$row->assm_id}})"
                        class="join_link conboxbtn" id="join-{{$row->assm_id}}" data-timeLeft="10">Watch
                        Now</a>
                    @endif


                </div>
                <div class="popconfboxcol2">

                    <div class="popconfboxcol2main">
                        <div class="popconfboxcol2maincol1">
                            <h3>{{date('h:i A', strtotime($row->assm_start_time))}} -
                                {{date('h:i A', strtotime($row->assm_end_time))}}<span>{{$row->assm_title}}</span></h3>
                            @php
                            $speakerImgs = [];
                            @endphp

                            @if(!empty($row->speakers) && count($row->speakers) > 0)
                           

                                @foreach ($row->speakers as $sp)

                                <p><span>@if($sp->ap_id == '159') Emcee @else Speaker @endif: </span>
                                <p> <span>{{$sp->ap_name}}</span>
                                   @if($sp->ap_designation) , {{$sp->ap_designation}} @endif
                                    
                                   @if($sp->ap_company) , {{$sp->ap_company}} @endif
                                
                                </p>

                                @php
                                $speakerImgs[] = '<img src="'.$sp->ap_image.'" alt="" />';
                                @endphp
                                @endforeach
                            </p>
                            @endif


                            @if(!empty($row->moderator))
                            <p><span>Moderator: </span>

                                <p>
                                    <span>{{$row->moderator->ap_name}},</span> {{$row->moderator->ap_designation}},
                                    {{$row->moderator->ap_company}}</p>

                                @php
                                $speakerImgs[] = '<img src="'.$row->moderator->ap_image.'" alt="" />';
                                @endphp

                            </p>
                            @endif

                            @if(!empty($row->panelists) && count($row->panelists) > 0)
                            <p><span>Panelists: </span>

                                @foreach ($row->panelists as $sp)
                                <p> <span>{{$sp->ap_name}},</span> {{$sp->ap_designation}}, {{$sp->ap_company}}
                                </p>
                                @php
                                $speakerImgs[] = '<img src="'.$sp->ap_image.'" alt="" />';
                                @endphp
                                @endforeach
                            </p>
                            @endif
                        </div>
                        <div class="popconfboxcol2maincol2">
                            @foreach ($row->sponsors as $item)
                            <a href="{{ url('resources/'.$item->asp_slug)}}"><img src="{{$item->asp_logo}}" alt=""></a>
                            @endforeach
                        </div>
                        <div class="popconfboxcol2maincol3">
                            @foreach ($speakerImgs as $img)
                            {!! $img !!}
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

            @endforeach
        </div>

        @endforeach


    </div>
</div>