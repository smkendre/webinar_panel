$ (function(){

    var socket = io('https://dev.expressbpd.in/chats');
    // var socket = io('http://localhost:3000/chats');
    // console.log(socket.id);
    // const { username = "Rakesh", room = "home" } = Qs.parse(location.search, {
    //     ignoreQueryPrefix:true
    // });
    // var username = $('#user').val();
    var noChat = 0; //setting 0 if all chats histroy is not loaded. 1 if all chats loaded.
    var msgCount = 0; //counting total number of messages displayed.
    var oldInitDone = 0; //it is 0 when old-chats-init is not executed and 1 if executed.
    var roomId;//variable for setting room.
    var toUser = 'Networking-Networking';
    const chatMessages = document.getElementById('chatMessages');
    const username = document.getElementById("name").value;
    const useremail = document.getElementById("email").value;
    const screenright1 = document.querySelector('.attendechatmainbox');
    //passing data on connection.
    socket.on('connect',function(){
        console.log('Socket.io Connected');
        // console.log(username);

        socket.emit('set-user-data', { room: username, type: 'onload' } );
        // setTimeout(function() { alert(username+" logged In"); }, 500);
    
        socket.on('broadcast',function(data) {
          
        });
  
    });//end of connect event.

    var currentRoom = "Networking-Networking";
    var reverseRoom = "Networking-Networking";
    socket.emit('set-room',{name1:currentRoom,name2:reverseRoom});

    $(document).on("click", "#chatAccept", function() {
      
      var fromName = $(this).attr("onclick");
      var room = $('#name').val();

      socket.emit('set-user-data', { username: fromName, room: room, type: 'invite' } );
      // console.log(script);
    });

    socket.on("chataccepted", (data) => {
      socket.emit('set-user-data', { room: username, type: 'onload' } );
    });
  
    //receiving onlineStack.
    socket.on('onlineStack',function(stack){
      console.log(stack);
      $('#list').empty();
      $('#list').append($('<button id="ubtn" class="btn btn-danger btn-block btn-lg" value="Networking"></button>').text("Networking with Attendees").css({"font-size":"18px"}));
      $('#list').append($('<button id="ubtn" class="btn btn-danger btn-block btn-lg" value="Helpdesk"></button>').text("Technical Helpdesk").css({"font-size":"18px"}));
      var totalOnline = 0;
      for (var user in stack) {

        //setting txt1. shows users button.
        if(user == username){
            var txt1 = $(`<h6><span><button disabled>${user}</button></span></h6>`);
        }
        else {
          var txt1 = $(`<h6><span><button id="ubtn" value="${user}">${user}</button></span></h6>`);
        }
        
        $('#list').append(txt1);
      }//end of for.
      $('#scrl1').scrollTop($('#scrl1').prop("scrollHeight"));
    }); //end of receiving onlineStack event.
  
    //on button click function.
    $(document).on("click","#ubtn",function() {
      console.log($(this).val());
      //empty messages.
      $('#chatMessages').empty();
      msgCount = 0;
      $('#typing').text("");
      noChat = 0;
      oldInitDone = 0;
  
      //assigning friends name to whom messages will send,(in case of group its value is Group).
      // toUser = $(this).text();
      toUser = $(this).val();
  
      //showing and hiding relevant information.
      $('#frndName').text($(this).text());
      $('#initMsg').hide();
      $('#chatForm').show(); //showing chat form.
      $('#sendBtn').hide(); //hiding send button to prevent sending of empty messages.
  
      //assigning two names for room. which helps in one-to-one and also group chat.
      if(toUser == "Group") {
        var currentRoom = "Group-Group";
        var reverseRoom = "Group-Group";

      } else if(toUser == "Networking") {
        var currentRoom = "Networking-Networking";
        var reverseRoom = "Networking-Networking";

      } else if(toUser == "Helpdesk") {
        var currentRoom = "Helpdesk-Helpdesk";
        var reverseRoom = "Helpdesk-Helpdesk";

      } else{
        var currentRoom = username+"-"+toUser;
        var reverseRoom = toUser+"-"+username;
      }
  
      //event to set room and join.
      socket.emit('set-room',{name1:currentRoom,name2:reverseRoom});
  
    }); //end of on button click event.
    
    //event for setting roomId.
    socket.on('set-room',function(room){
      //empty messages.
      $('#messages').empty();
      $('#typing').text("");
      msgCount = 0;
      noChat = 0;
      oldInitDone = 0;
      //assigning room id to roomId variable. which helps in one-to-one and group chat.
      roomId = room;
      console.log("roomId : "+roomId);
      //event to get chat history on button click or as room is set.
      socket.emit('old-chats-init',{room:roomId,username:username,msgCount:msgCount});
  
    }); //end of set-room event.
  
    //on scroll load more old-chats.
    $('#scrl2').scroll(function(){
  
      if($('#scrl2').scrollTop() == 0 && noChat == 0 && oldInitDone == 1){
        $('#loading').show();
        socket.emit('old-chats',{room:roomId,username:username,msgCount:msgCount});
      }
  
    }); // end of scroll event.
  
    //listening old-chats event.
    socket.on('old-chats',function(data){
      console.log(data.result);
      if(data.room == roomId){
        oldInitDone = 1; //setting value to implies that old-chats first event is done.
        if(data.result.length != 0){
          $('#noChat').hide(); //hiding no more chats message.
          for (var i = 0;i < data.result.length;i++) {
            //styling of chat message.
            var chatDate = moment(data.result[i].createdOn).format("DD-MMM-YY, hh:mm A");
            const div = document.createElement('div');
            if( data.result[i].msgFrom == username ) {
                div.classList.add('attendechatbox2');
            } else {
                div.classList.add('attendechatbox1');
            }
            div.innerHTML = `<h6>${data.result[i].msgFrom} <span>${chatDate}</span></h6>
            <p>
                ${data.result[i].msg}
            </p>`;

            // chatMessages.appendChild(`<span> Networking </span>`);
            chatMessages.appendChild(div);          
            screenright1.scrollTop = screenright1.scrollHeight;
            msgCount++;
  
          }//end of for.
          console.log(msgCount);
        }
        else {
          $('#noChat').show(); //displaying no more chats message.
          noChat = 1; //to prevent unnecessary scroll event.
        }
        //hiding loading bar.
        $('#loading').hide();
  
        //setting scrollbar position while first 5 chats loads.
        if(msgCount <= 5){
          $('#scrl2').scrollTop($('#scrl2').prop("scrollHeight"));
        }
      }//end of outer if.
  
    }); // end of listening old-chats event.
  
    // keyup handler.
    $('#myMsg').keyup(function(){
      if($('#myMsg').val()){
        $('#sendBtn').show(); //showing send button.
        socket.emit('typing');
      }
      else{
        $('#sendBtn').hide(); //hiding send button to prevent sending empty messages.
      }
    }); //end of keyup handler.
  
    //receiving typing message.
    socket.on('typing',function(msg){
      var setTime;
      //clearing previous setTimeout function.
      clearTimeout(setTime);
      //showing typing message.
      $('#typing').text(msg);
      //showing typing message only for few seconds.
      setTime = setTimeout(function(){
        $('#typing').text("");
      },3500);
    }); //end of typing event.
  
    //sending message.
    $('#chat-form').submit(function(){
      socket.emit('chat-msg', {msg:$('#myMsg').val(),msgTo:toUser,date:Date.now()});
      $('#myMsg').val("");
      $('#sendBtn').hide();
      return false;
    }); //end of sending message.
  
    //receiving messages.
    socket.on('chat-msg',function(data){
        console.log(data);
      //styling of chat message.
      var chatDate = moment(data.date).format("DD-MMM-YY, hh:mm A");
      const div = document.createElement('div');
      if( data.msgFrom == username ) {
          div.classList.add('attendechatbox2');
      } else {
          div.classList.add('attendechatbox1');
      }

      div.innerHTML = `<h6>${data.msgFrom} <span>${chatDate}</span></h6>
      <p> ${data.msg} </p>`;

      document.querySelector('#chatMessages').appendChild(div);
      screenright1.scrollTop = screenright1.scrollHeight;
      // console.log("screenright1 scroll");      

        msgCount++;
        console.log(msgCount);
        $('#typing').text("");
        $('#scrl2').scrollTop($('#scrl2').prop("scrollHeight"));
    }); //end of receiving messages.
  
    //on disconnect event.
    //passing data on connection.
    socket.on('disconnect',function(){
  
      //showing and hiding relevant information.
      $('#list').empty();
      $('#messages').empty();
      $('#typing').text("");
      // $('#frndName').text("Disconnected..");
      $('#loading').hide();
      $('#noChat').hide();
      $('#initMsg').show().text("...Please, Refresh Your Page...");
      $('#chatForm').hide();
      msgCount = 0;
      noChat = 0;
    });//end of connect event.

    socket.on("reconnect", (reason) => {
      console.log(`reconnect: ${reason}`);
    
      socket.emit('set-user-data', { room: username, type: 'onload' } );
    
    });
  
  });//end of function.
  