<div id="menu1" class="mainscreenright" style="display:block;">
  <h2>View Handouts <a href="javascript:" onclick="hideDiv('menu1');"><i class="fa fa-close handoutsrightclose"></i></a>
  </h2>
  <div class="screenright">
    @foreach ($assets as $row)
    <a href="{{$row->ad_url}}" target="_blank"  data-id="{{$row->ad_id}}" class="assetTrack">
      <span>{{$row->ad_title}}</span>
     @if($row->ad_type == 'PDF') <i class="fa fa-file-pdf-o"></i> @endif
     @if($row->ad_type == 'VIDEO') <i class="fa fa-video-camera"></i> @endif
    </a>
    <hr>
    @endforeach
   
    {{--  <a href="https://www.expresscomputer.in/" target="_blank">
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-link"></i>
    </a>
    <hr>
    <a data-fancybox href="https://vimeo.com/event/250101" data-options='{"touch": false}'>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-video-camera"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>
    <hr>
    <a>
      <span>HPE Nimble Storage Deployment Considerations for Networking</span>
      <i class="fa fa-file-pdf-o"></i>
    </a>  --}}
  </div>
</div>