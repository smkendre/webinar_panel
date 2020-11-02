@extends('layouts.app')

@section('content')
<div class="loginbg">

  <div class="eclogo"><a href="#"><img src="images/eclogo.png" alt=""></a></div>

  <div class="datetime"><i>13</i>
    <h6><span>October 2020</span>10:00AM - 5:00PM</h6>
  </div>

  <div class="loginbox">
    <div class="loginboxlogo"><a href="#"><img src="images/btwlogo.png?1" alt=""></a></div>
    <form action="{{ route('userlogin') }}" method="post" id="loginFrm">
      @csrf
      <h3><i>LOGIN</i> <span>Not Registered? <a href="https://backtowork.expresscomputer.in/register.php"
            target="_blank">Register Now</a></span></h3>
      <h6>If you have already registered, please log in</h6>
      <label>Email Address</label>
      <input type="email" id="email" name="email" maxlength="128" value="{{app('request')->input('email')}}" required>
      <div class="group clearboth"><button type="submit">Login</button></div>
    </form>
  </div>

  <div class="idxrightcon">
    <h3>Speakers</h3>

    <ul class="nobullet headerslider">
      <li>
        <div class="group clearboth tac">
          <div class="idxspeakerbox idxspeakerboxheight">
            <img src="https://backtowork.expresscomputer.in/images/yashwanth.jpg" alt="">
            <h4>Yashwanth Kumar</h4>
            <p>Head of Analytics and Insight, Titan Company Limited</p>
          </div>
          <div class="idxspeakerbox idxspeakerboxheight">
            <img src="https://backtowork.expresscomputer.in/images/sharad.jpg" alt="">
            <h4>Sharad Kumar Agarwal</h4>
            <p>Head – IT,<br> JK Tyre & Industries Ltd</p>
          </div>
          <div class="idxspeakerbox idxspeakerboxheight">
            <img src="https://backtowork.expresscomputer.in/images/lomte.jpg" alt="">
            <h4>Jagdish Lomte</h4>
            <p>Vice President (IT) & CIO – BTG, Thermax Ltd</p>
          </div>
          <div class="idxspeakerbox idxspeakerboxheight">
            <img src="https://backtowork.expresscomputer.in/images/anantha.jpg" alt="">
            <h4>Anantha Sayana</h4>
            <p>Chief Digital Officer, <br>Larsen & Toubro</p>
          </div>
          <div class="idxspeakerbox idxspeakerboxheight">
            <img src="https://backtowork.expresscomputer.in/images/vijay.jpg" alt="">
            <h4>Vijay Sethi</h4>
            <p>CIO & CHRO,<br> Head Corporate Social Responsibility - Hero MotoCorp</p>
          </div>
          <div class="idxspeakerbox idxspeakerboxheight">
            <img src="https://backtowork.expresscomputer.in/images/keni.jpg" alt="">
            <h4>Deepak Keni</h4>
            <p>EVP - Special Projects & Enabler, Deepak Fertilisers And Petrochemicals Corporation</p>
          </div>
        </div>
      </li>
      <li>
        <div class="group clearboth tac">
          <div class="idxspeakerbox idxspeakerboxheight">
            <img src="https://backtowork.expresscomputer.in/images/gururaj.jpg" alt="">
            <h4>Gururaj Rao</h4>
            <p>VP & CIO,<br> Mahindra & Mahindra Financial Services Group</p>
          </div>
          <div class="idxspeakerbox idxspeakerboxheight">
            <img src="https://backtowork.expresscomputer.in/images/dhaval.jpg" alt="">
            <h4>Dhaval Mankad</h4>
            <p>Vice President, Information Technology, Havmor Ice Cream Pvt Ltd</p>
          </div>
          <div class="idxspeakerbox idxspeakerboxheight">
            <img src="https://backtowork.expresscomputer.in/images/dipu.jpg" alt="">
            <h4>Dipu KV</h4>
            <p>President - Operations, Communities & Customer Experience, Bajaj Allianz </p>
          </div>
          <div class="idxspeakerbox idxspeakerboxheight">
            <img src="https://backtowork.expresscomputer.in/images/anirudh.jpg" alt="">
            <h4>Anirudh Shrotriya</h4>
            <p>Managing Director, SHRO Systems</p>
          </div>
          <div class="idxspeakerbox idxspeakerboxheight">
            <img src="https://backtowork.expresscomputer.in/images/sriharsha.jpg" alt="">
            <h4>Sriharsha Narasimhan</h4>
            <p>Chief Technology Officer, Aruba, Hewlett Packard Enterprise India Pvt. Ltd.</p>
          </div>
        </div>
      </li>

    </ul>

  </div>


</div>
{{--  <div class="innercontainwrapper">
  <h2>Partners</h2>
  <div class="group clearboth tac">
    <div class="idxpartnersbox">
      <img src="https://backtowork.expresscomputer.in/images/aruba.gif" alt="">
    </div>
  </div>
</div>  --}}
<div id="loginpop" class="popmain1">
  <div class="fancybox_content">
    <h3>VIRTUAL CONFERENCE </h3>
    <h2>Back to Work</h2>
    <h4>will be live on</h4>
    <br>
    <h5>13<sup>th</sup> October 2020 | 10:00 AM IST </h5>
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
    <div class="btn1"><a href="https://backtowork.expresscomputer.in/register.php" target="_blank"
        title="Close">Register</a>
    </div>
    {{--  <button type="button" data-fancybox-close="" class="btn btn-default" title="Close">OK</button>  --}}
  </div>
</div>
@endsection

@section('customJs')
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script src="{{ asset('js/jquery.fancybox.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                    {{--  $.fancybox.open($("#loginpop"));  --}}
                    
                    $("#loginFrm")[0].submit();
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
@endsection