$(document).ready(function() {
  $(".indi-sec").click(function () {
    $(".indi-sec").removeClass("active");
    $(this).addClass("active");
  });
});

// account swap
$(document).ready(function () {
  $('#signin').click(function () {
    $('#full-signin').show(300);
    $('#full-login').hide(300);
  })
});
$(document).ready(function () {
  $('#login').click(function () {
    $('#full-login').show(300);
    $('#full-signin').hide(300);
  })
});

function openSlideMenu(){
  document.getElementById('side-menu').style.right = '0px';
}

function closeSlideMenu(){
  document.getElementById('side-menu').style.right = '-250px';
}
$('.open-slide').click(function() {
  $('.side-nav a').addClass('add-box-shadow');
});
$('.btn-close').click(function() {
  $('.side-nav a').removeClass('add-box-shadow');
});
// account swap
// $('.table-btn').click(function(){
//   $('.expand-table').toggleClass('showing');
//   $('.plus-minus').toggleClass('minus');
// });

// $(document).ready(function() {
// $(".table-btn").click(function () {
//     $(".expand-table").removeClass("showing");
//     $(this).addClass("showing");
// });
// });

// $(document).ready(function() {
//   $(".table-btn").click(function () {
//     if(!$(this).hasClass('showing'))
//     {
//       $(".table-btn.showing").removeClass("showing");
//       $(this).addClass("showing");
//     }
//   });
// });
