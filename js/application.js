$(document).ready(function(){

  $(".entry-header").fadeIn( 800, function() {
  });

  function isElementInViewport(elem) {
      var $elem = $(elem);

      // Get the scroll position of the page.
      var scrollElem = ((navigator.userAgent.toLowerCase().indexOf('webkit') != -1) ? 'body' : 'html');
      var viewportTop = $(scrollElem).scrollTop();
      var viewportBottom = viewportTop + $(window).height();

      // Get the position of the element on the page.
      var elemTop = Math.round( $elem.offset().top );
      var elemBottom = elemTop + $elem.height();

      return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
  }

  // Check if it's time to start the animation.
  function checkAnimation() {
      var $elem = $('.post-meta');

      // If the animation has already been started
      if ($elem.hasClass('start')) return;

		  
      if (isElementInViewport($elem)) {
        // Start the animation
        $elem.addClass('start');
      }
  }

  // Capture scroll events
  $(window).scroll(function(){
      checkAnimation();
  });

  $('.scroll-down').click(function(event) {
      // Preventing default action of the event
      event.preventDefault();
      // Getting the height of the document
      var n = $(window).height();
      console.log("hi");
      $('html, body').animate({ scrollTop: n }, 1000);
  //                                       |    |
  //                                       |    --- duration (milliseconds) 
  //                                       ---- distance from the top
  });
});
