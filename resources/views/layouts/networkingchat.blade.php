<div class="boothchat">
  <h3>NETWORK WITH ATTENDEES</h3>
  <div class="boothchatbox">

    <div id="container1">
      <div id="chat-window1">
        @csrf
        <input type="hidden" id="user-name" value="{{ session()->get('username') }}">
        <input type="hidden" id="user-refer" value="{{ session()->get('userid') }}">
        <input type="hidden" id="channel-public1"
          value="{{ $channel ?? 'CH21c82f31c02d49cba1206c165ec672db' }}">

        <div id="message-list1" class="row disconnected">

        </div>

        <div id="typing-row1" class="row disconnected">
          <p id="typing-placeholder1"></p>
        </div>

        <div id="input-div1" class="row">
          <textarea id="input-text1" placeholder="Your message"></textarea>
          <button type="submit" id="sendBootMessage">Send</button>
        </div>
      </div>
    </div>

    <script type="text/html" id="message-template1">
      <div class="row no-margin chatboxmain2">
        <div class="row no-margin message-info-row" style="">
          <div class="col-md-8 left-align">
            <p data-content="username" class="message-username"></p>
          </div>
          <div class="col-md-4 right-align"><span data-content="date" class="message-date"></span></div>
        </div>
        <div class="row no-margin message-content-row">
          <div style="" class="col-md-12">
            <p data-content="body" class="message-body"></p>
          </div>
        </div>
      </div>
    </script>

    <script type="text/html" id="channel-template1">
      <div class="col-md-12">
        <p class="channel-element" data-content="channelName"></p>
      </div>
    </script>
    <script type="text/html" id="member-notification-template1">
      <p class="member-status" data-content="status"></p>
    </script>

  </div>
</div>
