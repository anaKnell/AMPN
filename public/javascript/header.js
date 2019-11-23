$(document).ready(function() {
    $(window).scroll(function() {
      if ($(document).scrollTop() <  ($('#header').height()- $('.navbar').height())) {
        $(".navbar").removeClass("bg-dark");
      } else {
        $(".navbar").addClass("bg-dark");

      }
    });
//
  });