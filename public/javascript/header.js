$(document).ready(function() {
    $(window).scroll(function() {
      if ($(document).scrollTop() <  ($('#header').height()- 50)) {
        $(".navbar").removeClass("bg-dark");
      } else {
        $(".navbar").addClass("bg-dark");

      }
    });

  });