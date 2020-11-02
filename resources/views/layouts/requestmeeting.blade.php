<div id="requestameeting" class="popmain1" style="display: none;">
  <div class="popmainheading">Request Meeting</div>
  <div class="popmain1con1">
    <div class="popupformmain1">
      <div class="requestmeetingmain">
        <h2><span>Appointment with </span>
          <select>
            <option value="Oracle">Oracle</option>
            <option value="Microsoft">Microsoft</option>
            <option value="AWS">AWS</option>
            <option value="Dell">Dell</option>
            <option value="HPE">HPE</option>
            <option value="Cyberark">Cyberark</option>
          </select>
        </h2>
        <h6><i class="fa fa-clock-o"></i> 30 minutes</h6>
        <h3>Select a Date &amp; Time</h3>
        <input id="datetimepicker3" type="text" style="display: none;">
       
        <button type="submit" id="submit" name="submit">Submit</button>
      </div>
    </div>
  </div>
</div>

@section('js_after')
<script type="text/javascript" src="js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
  jQuery('#datetimepicker3').datetimepicker({
		format:'d.m.Y H:i',
		inline:true,
		lang:'ru'
	});

</script>
@endsection