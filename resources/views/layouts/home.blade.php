@extends('layouts.app')

@section('content')


<div class="loginbg">

  <div class="eclogo"><a href="{{url('/')}}"><img src="images/eh-logo1.png" alt=""></a></div>

  <div class="datetime"><i>10</i>
    <h6><span>December 2020</span>1:30PM - 6:00PM</h6>
  </div>

  <div class="loginbox">
    <div class="loginboxlogo"><a href="{{url('/')}}"><img src="images/agilent.png" alt=""></a></div>
    <form action="{{ route('userlogin') }}" method="post" id="loginFrm">
      @csrf
      <h3><i>LOGIN</i> <span>Not Registered? <a
            href="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/register.php"
            target="_blank">Register Now</a></span></h3>
      <h6>If you have already registered, please log in</h6>
      <label>Email Address</label>
      <input type="email" id="email" name="email" maxlength="128" value="{{app('request')->input('email')}}" required>
      <div class="group clearboth"><button type="submit">Login</button></div>
    </form>
  </div>

  <div class="idxrightcon">
    <h3>Speakers</h3>
    <ul class="nobullet">
      <li>
            <div class="group clearboth tac">
                <div class="idxspeakerbox idxspeakerboxheight">
                    <img src="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/images/nilangan.jpg" alt="">
                    <h4>Dr. Nilanjan Guha</h4>
                    <p>Ph.D., BDM- Academia & Research, Agilent Technologies</p>
                </div><div class="idxspeakerbox idxspeakerboxheight">
                    <img src="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/images/saurabh.jpg" alt="">
                    <h4>Saurabh Nagpal</h4>
      <p>Application Engineer - Spectroscopy, Agilent Technologies</p>
                </div><div class="idxspeakerbox idxspeakerboxheight">
                    <img src="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/images/anuj.jpg" alt="">
                    <h4>Dr. Anuj Gupta</h4>
      <p>Application Engineer, Diagnostics & Genomics, Agilent Technologies</p>
                </div><div class="idxspeakerbox idxspeakerboxheight">
                    <img src="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/images/deepak.jpg" alt="">
                    <h4>Dr. S A Deepak</h4>
      <p>Application Engineer – Seahorse Products, Agilent Technologies</p>
                </div><div class="idxspeakerbox idxspeakerboxheight">
                    <img src="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/images/ghosh.jpg" alt="">
                    <h4>Dr. Arkasubhra Ghosh</h4>
      <p>Director, GROW Research Laboratory</p>
                </div><div class="idxspeakerbox idxspeakerboxheight">
                    <img src="https://lp.expresshealthcare.in/virtualconference/agilent/omnicsevent/images/gerald.jpg" alt="">
                    <h4>Dr. Gerald Larrouy Maumus</h4>
      <p>Senior Lecturer in Molecular Microbiology, MRC-Centre Molecular Biology and Infection (CMBI), Imperial College London, United Kingdom</p>
                </div>
            </div>
        </li>
        
    </ul>
    
</div>


</div>
<div id="loginpop" class="popmain1">
  <div class="fancybox_content">
    <h3>VIRTUAL Event </h3>
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
                    {{--  $("#loginFrm")[0].submit();  --}}
                    $.fancybox.open($("#loginpop"));
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