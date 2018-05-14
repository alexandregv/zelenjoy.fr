$(document).ready(function(){
  var night = localStorage.getItem("night_mode");
  if (!night) localStorage.setItem("night_mode", "false");

  if (night == "true") {
    $("#toggle-class-style-btn").addClass("fa-toggle-on");
    $(".toggler").addClass("night-mode");
  }
  else {
    $("#toggle-class-style-btn").addClass("fa-toggle-off");
    $(".toggler").removeClass("night-mode");
  }

  $("#toggle-class-style-btn").click(function(){
    if (night == "true") {
      night = "false";
      $(".toggler").removeClass("night-mode");
      localStorage.setItem("night_mode", "false");

      $("#toggle-class-style-btn").addClass("fa-toggle-off");
      $("#toggle-class-style-btn").removeClass("fa-toggle-on");
    }
    else {
      night = "true";
      $(".toggler").addClass("night-mode");
      localStorage.setItem("night_mode", "true");

      $("#toggle-class-style-btn").addClass("fa-toggle-on");
      $("#toggle-class-style-btn").removeClass("fa-toggle-off");
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