// Check if the device is a mobile device
function isMobileDevice() {
  return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
}

// Handle the parallax effect for mobile devices
function handleParallaxForMobile() {
  var parallaxElement = document.querySelector('.parallax');
  var contentBelowElement = document.querySelector('.section_banner');
  var navigationBar = document.getElementById('myTopnav');
  var navigationBarHeight = navigationBar.offsetHeight;
  var lastScrollPosition = 0;

  window.addEventListener('scroll', handleParallax);

  function handleParallax() {
    var scrollPosition = window.pageYOffset;
    var parallaxOffset = (scrollPosition - parallaxElement.offsetTop) * 0.4;

    if (scrollPosition >= parallaxElement.offsetTop) {
      parallaxElement.style.transform = 'translateY(' + parallaxOffset + 'px)';
      contentBelowElement.style.transform = 'translateY(' + -parallaxOffset + 'px)';
    } else {
      parallaxElement.style.transform = 'translateY(0)';
      contentBelowElement.style.transform = 'translateY(0)';
    }

    // Handle navigation bar transformation
    if (scrollPosition >= parallaxElement.offsetTop) {
      navigationBar.style.transform = 'translateY(0)';
    } else {
      navigationBar.style.transform = 'translateY(-' + navigationBarHeight + 'px)';
    }

    // Reset navigation bar transformation on scroll direction change
    if (scrollPosition < lastScrollPosition) {
      navigationBar.style.transform = 'translateY(0)';
    }

    lastScrollPosition = scrollPosition;
  }

  // Apply the CSS for media queries
  var mq280 = window.matchMedia("(max-width: 280px)");
  var mq539 = window.matchMedia("(max-width: 539px)");
  var mq768 = window.matchMedia("(max-width: 768px)");
  var mq1024 = window.matchMedia("(max-width: 1024px)");

  function applyCSSForMediaQueries() {
    if (mq280.matches || mq539.matches || mq768.matches || mq1024.matches) {
      navigationBar.style.transition = 'transform 0.3s ease';
      navigationBar.style.transform = 'translateY(0)';
    } else {
      navigationBar.style.transition = '';
      navigationBar.style.transform = '';
    }
  }

  // Apply the CSS initially and on window resize
  applyCSSForMediaQueries();
  window.addEventListener('resize', applyCSSForMediaQueries);
}

// Apply parallax effect for each media query on mobile devices
if (isMobileDevice()) {
  if (window.matchMedia("(max-width: 280px)").matches) {
    handleParallaxForMobile();
  }

  if (window.matchMedia("(max-width: 539px)").matches) {
    handleParallaxForMobile();
  }

  if (window.matchMedia("(max-width: 768px)").matches) {
    handleParallaxForMobile();
  }

  if (window.matchMedia("(max-width: 1024px)").matches) {
    handleParallaxForMobile();
  }
}
