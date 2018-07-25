$(document).ready(function(){
  function reloadChat() {
    window.location.reload();
  }

  $('#snapchat').click(function () {
    $('#toggle-snap-name').toggle('slow');
  });

  // NIGHT MODE:
  var night = localStorage.getItem("night_mode");
  if (!night) localStorage.setItem("night_mode", "false");

  if (night == "true") {
    $("#night-btn-toggle").addClass("fa-toggle-on");
    $(".toggler").addClass("night-mode");
    document.getElementById("chat_embed").src = "https://www.twitch.tv/embed/zelenjoy/chat?darkpopout";
  }
  else {
    $("#night-btn-toggle").addClass("fa-toggle-off");
    $(".toggler").removeClass("night-mode");
    document.getElementById("chat_embed").src = "https://www.twitch.tv/embed/zelenjoy/chat";
  }

  $("#night-btn").click(function(){
    if (night == "true") {
      night = "false";
      localStorage.setItem("night_mode", "false");

      document.getElementById("chat_embed").src = "https://www.twitch.tv/embed/zelenjoy/chat";
      $(".toggler").removeClass("night-mode");

      $("#night-btn-toggle").addClass("fa-toggle-off");
      $("#night-btn-toggle").removeClass("fa-toggle-on");
    }
    else {
      night = "true";
      localStorage.setItem("night_mode", "true");

      document.getElementById("chat_embed").src = "https://www.twitch.tv/embed/zelenjoy/chat?darkpopout";
      $(".toggler").addClass("night-mode");

      $("#night-btn-toggle").addClass("fa-toggle-on");
      $("#night-btn-toggle").removeClass("fa-toggle-off");
    }
  });

  // CHAT MODE:
  var chat_mode = localStorage.getItem("chat_mode");
  if (!chat_mode) localStorage.setItem("chat_mode", "right");

  if (chat_mode == "left") {
    $("#chat-btn-toggle").addClass("fa-toggle-off");
    $(".toggler").addClass("chat-left");
  }
  else {
    $("#chat-btn-toggle").addClass("fa-toggle-on");
    $(".toggler").removeClass("chat-left");
  }

  $("#chat-btn").click(function(){
    if (chat_mode == "left") {
      chat_mode = "right";
      localStorage.setItem("chat_mode", "right");

      $(".toggler").removeClass("chat-left");

      $("#chat-btn-toggle").addClass("fa-toggle-on");
      $("#chat-btn-toggle").removeClass("fa-toggle-off");

      reloadChat();
    }
    else {
      chat_mode = "left";
      localStorage.setItem("chat_mode", "left");

      $(".toggler").addClass("chat-left");

      $("#chat-btn-toggle").addClass("fa-toggle-off");
      $("#chat-btn-toggle").removeClass("fa-toggle-on");

      reloadChat();
    }
  });
  /*
  var chat_mode = localStorage.getItem("chat_mode");
  if(!chat_mode) localStorage.setItem("chat_mode", "right");

  if(chat_mode == "left"){
    $('.toggler').addClass("chat-left");
    $('#chat-btn-toggle').addClass('fa-toggle-off');
    $('#chat-btn-toggle').removeClass('fa-toggle-on');
  }
  else{
    $('.toggler').addClass("chat-right");
    $('#chat-btn-toggle').addClass('fa-toggle-on');
    $('#chat-btn-toggle').removeClass('fa-toggle-off');
  }


  var state = false;

  $('#slider-btn').click(function() {
    if(chat_mode == "left") {
      $('#slider').animate({"margin-left": (state ? "-" : "+") + "=" + $('#slider').css('width')});
    }
    else {
      $('#slider').animate({"margin-right": (state ? "-" : "+") + "=" + $('#slider').css('width')});
    }
    state = !state;
  });

  $('#chat-btn-toggle').click(function() {
    $('.toggler').toggleClass("chat-right chat-left");

    if (chat_mode == "left"){
      localStorage.setItem("chat_mode", "right");
      chat_mode = "right";
    }
    else {
      localStorage.setItem("chat_mode", "left");
      chat_mode = "left";
    }
  });*/
  // MINI PLAYER MODE:
  var mplayer = localStorage.getItem("mplayer_mode");
  if (!mplayer) localStorage.setItem("mplayer_mode", "false");

  if (mplayer == "true") { 
    $(".frame-stream-mini-player").addClass("show");
    $("#mplayer-btn-toggle").addClass("fa-toggle-on");
  }
  else {
    $(".frame-stream-mini-player").addClass("hide");
    $("#mplayer-btn-toggle").addClass("fa-toggle-off");
  }

  $("#mplayer-btn-toggle").click(function(){
    if (mplayer == "true") {
      mplayer = "false";
      localStorage.setItem("mplayer_mode", "false");

      $(".frame-stream-mini-player").addClass("hide");
      $(".frame-stream-mini-player").removeClass("show");

      $("#mplayer-btn-toggle").addClass("fa-toggle-off");
      $("#mplayer-btn-toggle").removeClass("fa-toggle-on");
    }
    else {
      mplayer = "true";
      localStorage.setItem("mplayer_mode", "true");

      $(".frame-stream-mini-player").addClass("show");
      $(".frame-stream-mini-player").removeClass("hide");

      $("#mplayer-btn-toggle").addClass("fa-toggle-on");
      $("#mplayer-btn-toggle").removeClass("fa-toggle-off");
    }
  });

  // THEATER MODE:
  var theater = sessionStorage.getItem("theater_mode");
  if (!theater) sessionStorage.setItem("theater_mode", "false");

  $("#toggle-class-theater-btn").click( function(){
    if (theater == "true") {
      theater = "false";
      $(".toggler").removeClass("theater-mode");
      sessionStorage.setItem("theater_mode", "false");

      $("#style-theater").addClass("fa-expand");
      $("#style-theater").removeClass("fa-compress");
    }
    else {
      theater = "true";
      $(".toggler").addClass("theater-mode");
      sessionStorage.setItem("theater_mode", "true");

      $("#style-theater").addClass("fa-compress");
      $("#style-theater").removeClass("fa-expand");
    }
  });


  var panelState = false;

  $('#slider-btn').click(function() {
    var chat = localStorage.getItem("chat_mode");
    if (chat == "left") {
      $('#slider').animate({'margin-left': (panelState ? "-":"+")+"="+$('#slider').css('width')});
      panelState = !panelState;
    } else{
      $('#slider').animate({'margin-right': (panelState ? "-":"+")+"="+$('#slider').css('width')});
      panelState = !panelState;
    }
  });

});

