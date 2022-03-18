$(window).scroll(function() {
  parallax();
})

function parallax() {

  var wScroll = $(window).scrollTop()


  $('.animepara').css('background-position', 'center ' + (wScroll*0.75)+'px');

}
