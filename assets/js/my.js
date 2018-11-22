$(document).ready(function() {
  $('.menu-bar').click(function() {
    $('.menu-side-overlay').addClass('menu-active');
    $('.menu-links ul li').addClass('animated');
    $('.menu-links ul li').addClass('slideInLeft');
    $('.logo, .header-text, .header-btn, .menu-bar span, .scroll').fadeOut(200);
  })
});

$(document).ready(function() {
  $('.close-menu-icon').click(function() {
    $('.menu-side-overlay').removeClass('menu-active');
    $('.menu-links ul li').removeClass('animated');
    $('.menu-links ul li').removeClass('slideInLeft');
    $('.logo, .header-text, .header-btn, .menu-bar span, .scroll').fadeIn(200);
  })
});



// login activation
$(document).ready(function() {
  $('.login-btn').click(function() {
    $('.login-target').addClass('login-active');
    $('.header-img, .login-link, #targrtLink, footer').fadeOut(200);
  })
});

$(document).ready(function() {
  $('#trigger-login').click(function() {
    $('.signup-target').removeClass('login-active');
    $('.login-target').addClass('login-active');
    $('.header-img, .login-link,  #targrtLink, footer').fadeOut(200);
  })
});

$(document).ready(function() {
  $('.close-login-icon').click(function() {
    $('.login-target').removeClass('login-active');
    $('.header-img, .login-link, #targrtLink, footer').fadeIn(200);
  })
});


// login activation
// signup activation
$(document).ready(function() {
  $('.signup-btn').click(function() {
    $('.signup-target').addClass('login-active');
    $('.header-img, .login-link, #targrtLink, footer').fadeOut(200);
  })
});
$(document).ready(function() {
  $('#trigger-signup').click(function() {
    $('.signup-target').addClass('login-active');
    $('.login-target').removeClass('login-active');
    $('.header-img, .login-link, #targrtLink, footer').fadeOut(200);
  })
});

$(document).ready(function() {
  $('.close-login-icon').click(function() {
    $('.signup-target').removeClass('login-active');
    $('.header-img, .login-link, #targrtLink, footer').fadeIn(200);
  })
});

// wishlist active
$(document).ready(function() {
  $('.wishlist').click(function() {
    $(this).toggleClass('added-to-wishlist');
  })
});
// wishlist active

$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 500) {
        $(".scroll").addClass("scroll-remove");
    }
    else{
      $(".scroll").removeClass("scroll-remove");
    }
});

// target links
function targrtLink() {
    var elmnt = document.getElementById("targrtLink");
    elmnt.scrollIntoView();
}
// target links

// full screen menu
$('#toggle').click(function() {
   $(this).toggleClass('active');
   $('#overlay').toggleClass('open');
  });

// full screen menu

// in view amimation
$(function () {
  $('.sample-product').onScreen({
    tolerance: 200,
    toggleClass: false,
    doIn: function () {
      $(this).addClass('in-view')
    },
    doOut: function () {
      $(this).removeClass('in-view')
    }
  });
});

$(function () {
  $('.promo-section').onScreen({
    tolerance: 200,
    toggleClass: false,
    doIn: function () {
      $(this).addClass('in-view')
    },
    doOut: function () {
      $(this).removeClass('in-view')
    }
  });
});
// in view amimation





// signup activation
// var typed = new Typed(".banner-text", {
//   strings: [
//     "the best selling 100% Natural Sex supplements",
//     "100% Natural, Herbal and Secure to Use"
//   ],
//   smartBackspace: true,
//   typeSpeed: 50,
//   backSpeed: 30,
//   backDelay: 500,
//   startDelay: 3000,
//   loop: false
// });


// products animation
$('.product-bg').each(function(i) {
setTimeout(function(){
$('.product-bg').eq(i).addClass('product-visible');
},200 * i)
});
// products animation

$(document).ready(function() {
  $('.red.label').click(function() {
    $(this).toggleClass('added');
  })
});


// google maps
var map;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {
      lat: 41.390205,
      lng: 2.154007
    },
    zoom: 12,
    styles: [
        {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
        {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
        {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
        {
          featureType: 'administrative.locality',
          elementType: 'labels.text.fill',
          stylers: [{color: '#978a19'}]
        },
        {
          featureType: 'poi',
          elementType: 'labels.text.fill',
          stylers: [{color: '#978a19'}]
        },
        {
          featureType: 'poi.park',
          elementType: 'geometry',
          stylers: [{color: '#263c3f'}]
        },
        {
          featureType: 'poi.park',
          elementType: 'labels.text.fill',
          stylers: [{color: '#6b9a76'}]
        },
        {
          featureType: 'road',
          elementType: 'geometry',
          stylers: [{color: '#38414e'}]
        },
        {
          featureType: 'road',
          elementType: 'geometry.stroke',
          stylers: [{color: '#212a37'}]
        },
        {
          featureType: 'road',
          elementType: 'labels.text.fill',
          stylers: [{color: '#9ca5b3'}]
        },
        {
          featureType: 'road.highway',
          elementType: 'geometry',
          stylers: [{color: '#b52127'}]
        },
        {
          featureType: 'road.highway',
          elementType: 'geometry.stroke',
          stylers: [{color: '#1f2835'}]
        },
        {
          featureType: 'road.highway',
          elementType: 'labels.text.fill',
          stylers: [{color: '#f3d19c'}]
        },
        {
          featureType: 'transit',
          elementType: 'geometry',
          stylers: [{color: '#2f3948'}]
        },
        {
          featureType: 'transit.station',
          elementType: 'labels.text.fill',
          stylers: [{color: '#978a19'}]
        },
        {
          featureType: 'water',
          elementType: 'geometry',
          stylers: [{color: '#17263c'}]
        },
        {
          featureType: 'water',
          elementType: 'labels.text.fill',
          stylers: [{color: '#515c6d'}]
        },
        {
          featureType: 'water',
          elementType: 'labels.text.stroke',
          stylers: [{color: '#17263c'}]
        }
      ]
  });

  var marker = new google.maps.Marker({
    position: {
      lat: 52.5200,
      lng: 13.4050
    },
    map: map,
    icon: 'assets/img/logo-map.png',
    title: 'Excalibur'
  });
  var InfoWindow = new google.maps.InfoWindow({
    content: '<h2></h2>'
  });

  marker.addListener('click', function () {
    InfoWindow.open(map, marker);
  })
}

// google maps


// 100% height scroll

function ScrollHandler(pageId) {
  var page = $('#' + pageId);
  if (page.length) {

    var pageStart = page.offset().top;
    var pageJump = false;


  function scrollToPage() {
    pageJump = true;
    $('html, body').animate({
      scrollTop: pageStart
    }, {
      duration: 50,
      complete: function() {
        pageJump = false;
      }
    });
  }
}
  window.addEventListener('wheel', function(event) {
    var viewStart = $(window).scrollTop();
    if (!pageJump) {
      var pageHeight = page.height();
      var pageStopPortion = pageHeight / 2;
      var viewHeight = $(window).height();

      var viewEnd = viewStart + viewHeight;
      var pageStartPart = viewEnd - pageStart;
      var pageEndPart = (pageStart + pageHeight) - viewStart;

      var canJumpDown = pageStartPart >= 0;
      var stopJumpDown = pageStartPart > pageStopPortion;

      var canJumpUp = pageEndPart >= 0;
      var stopJumpUp = pageEndPart > pageStopPortion;

      var scrollingForward = event.deltaY > 0;
      if (  ( scrollingForward && canJumpDown && !stopJumpDown)
      || (!scrollingForward && canJumpUp   && !stopJumpUp)) {
        event.preventDefault();
        scrollToPage();
      }
    } else {
      event.preventDefault();
    }
  });
}
// new ScrollHandler('header');
// new ScrollHandler('samp-pro');
// new ScrollHandler('promo-sec');
// new ScrollHandler('best-sell');
// new ScrollHandler('certi');
// new ScrollHandler('footer');

// 100% height scroll
