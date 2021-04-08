
        <div class="tabmenubottom">
            @if(Request::segment(1) == 'survey') 
            <a  href="{{ url('conference') }}">
             <img src="images/panel-icon5.png" alt="">
                <span>Conference</span>
            </a>
            @endif
            <a data-fancybox data-src="#viewpresenters" data-options='{"touch": false}' href="javascript:;">
                <img src="images/panel-icon1.png" alt="">
                <span>View Presenters</span>
            </a>
            <a data-fancybox data-src="#agenda" data-options='{"touch": false}' href="javascript:;">
                <img src="images/panel-icon8.png" alt="">
                <span>Agenda</span>
            </a>
            {{--  <a data-fancybox data-src="#askaquestion" data-options='{"touch": false}' href="javascript:;">
                <img src="images/panel-icon2.png" alt="">
                <span>Ask a Question</span>
            </a>  --}}
            @if(Request::segment(1) == 'conference') 
            <a onclick="toggleVisibility('menu1');">
                <img src="images/panel-icon3.png" alt="">
                <span>View Handouts</span>
            </a>
            @endif
            <a data-fancybox data-src="#requestameeting" data-options='{"touch": false}' href="javascript:;">
                <img src="images/panel-icon4.png" alt="">
                <span>Request a Meeting</span>
            </a>
            <a  href="{{ url('survey') }}">
            	<img src="images/panel-icon10.png" alt="" >
                <span>Survey</span>
            </a>
            {{--  <a onclick="toggleVisibility('menu2');">
                <img src="images/panel-icon5.png" alt="">
                <span>Attendee Chat</span>
            </a>  --}}
           
        </div>
