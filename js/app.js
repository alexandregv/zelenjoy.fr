$(document).ready(function(){
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
});
