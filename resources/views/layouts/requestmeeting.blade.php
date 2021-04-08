<div id="requestameeting" class="popmain1" style="display: none;">
  <div class="popmainheading">Request Meeting</div>
  <div class="popmain1con1">
    <div class="popupformmain1">
      <div class="requestmeetingmain">
        <h2><span>Appointment with </span>
          <select name="sponsor" id="sponsor">
            <option value="agielnt">Agilent</option>
            {{--  <option value="Microsoft">Microsoft</option>
            <option value="AWS">AWS</option>
            <option value="Dell">Dell</option>
            <option value="HPE">HPE</option>
            <option value="Cyberark">Cyberark</option>  --}}
          </select>
        </h2>
        <h6><i class="fa fa-clock-o"></i> 30 minutes</h6>
        <h3>Select a Date &amp; Time (Note: All times are in Indian Standard Time (IST) +5:30GMT)</h3>
        <input id="datetimepicker3" type="text" style="display: none;">
        <div class="btnWrapper">
          <button type="submit" data-fancybox data-src="#requestameetingform" onclick="$.fancybox.close()"
            data-options='{"touch": false}' name="submit">Next</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="requestameetingform" class="popmain1">
  <div class="popmainheading">Request Meeting</div>
  <div class="popmain1con1">
    <div class="popupformmain1">
      <form id="meetingFrm" name="meetingFrm" method="POST" action="" role="form">
        @csrf
        <h6>You are requesting a 30 minutes meeting with <span>Agilent</span> on <span id="selected_date"></span> at
          <span id="selected_time"></span> IST.</h6>
        <h6><span>Agilent</span> will contact you on <span><a href="#">{{session()->get('useremail')}}</a></span> or
          call
          you on
          <span>{{session()->get('userphone')}}</span> to confirm this meeting. In case you would like to add any
          additional contact details
          please provide the same in the message box below, along with any additional information like meeting agenda.
        </h6>
        <div class="popupformmain1box">
          <label>Messagee</label>
          <textarea rows="5" cols="2" id="msg" name="msg" placeholder="Type message here..."></textarea>
          <input type="hidden" name="sdate" id="sdate" value="" />
          <input type="hidden" name="stime" id="stime" value="" />
        </div>
        <div class="btnWrapper">
          <button type="button" data-fancybox data-src="#requestameeting" onclick="$.fancybox.close()"
            data-options='{"touch": false}' name="submit">Back</button>
          <button type="submit" id="submit" name="submit" class="button">Send</button>
        </div>

      </form>
    </div>
  </div>
</div>
@section('js_after')
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datetimepicker3').datetimepicker({
      format:'d.m.Y H:i:s',
      inline:true,
      lang:'ru',
      startDate: "today",
      minTime:'8:00',
      maxTime:'21:00',
      onChangeDateTime:function(dp,$input){
        var dNow = new Date(dp);
        var hours = dNow.getHours();
        var minutes =  dNow.getMinutes();

        if (hours < 10) hours = "0" + hours;
        if (minutes < 10) minutes = "0" + minutes;

        var selected_date = dNow.getDate() + '-' + (dNow.getMonth()+1)  + '-' + dNow.getFullYear();
        var selected_time = hours + ':' + minutes;

        $("#selected_date").text(selected_date);
        $("#selected_time").text(selected_time);
        $("#sdate").val(selected_date);
        $("#stime").val(selected_time); 
       
      }
    });

    $("#meetingFrm").validate({
      rules:{
        msg:{required: true}
      },
      messages:{
        msg:{required: "Please enter message"}
      },
      submitHandler: function(form) {            

        $.ajax({
          url: 'request-meeting',
          data:{msg: $("#msg").val(), _token: $("input[name='_token']").val(), sdate: $("#sdate").val(), stime: $("#stime").val(), sponsor: $("#sponsor").val() },
          type: 'post',
          dataType: 'json',
          success: function(response){
            if(response.status == 200){
              $.fancybox.close();
              $("#successMsg label").text("Request send successfully");
              $.fancybox.open($("#messagePopup"));
            }else{
              $.fancybox.open($("#resigterpopup"));
            }
          }
        });

        return false;
     
        // if($("#email").val() == 'viraj.mehta@indianexpress.com')
        //$("#loginFrm")[0].submit();
        //else
        // $.fancybox.open($("#loginpop").html());
      }
    });
  });
</script>
@endsection