// $('.barratings').barrating({
// 	theme: 'fontawesome-stars'
// });

// $('.barrating').barrating({
// 	theme: 'fontawesome-stars',
// 	readonly:true
// });

$( ".notification" ).fadeOut( 10000, function() {
});

$( ".dropli" ).hover(
	function() {
		$(this).children(".dropul").stop().slideDown(500);
	},
	function(){
		$(this).children(".dropul").stop().slideUp(500);
	});

$( ".dropul" ).hover(
	function() {
		$(this).stop().slideDown(500);
	},
	function(){
		$(this).stop().slideUp(500);
	});

$("#EditProfile").click(function(){
	$("#EditProfileForm").show();
	$("#ChangePassword").show();
	$("#EditProfile").hide();
	$("#ChangePasswordForm").hide();
});

$("#ChangePassword").click(function(){
	$("#ChangePasswordForm").show();
	$("#ChangePassword").hide();
	$("#EditProfile").show();
	$("#EditProfileForm").hide();
});

$(".canceledit").click(function(){
	$("#ChangePasswordForm").hide();
	$("#ChangePassword").show();
	$("#EditProfile").show();
	$("#EditProfileForm").hide();
});

$( "#datepicker" ).datepicker({ dateFormat: 'd M, yy' });

$("#artist").click(function(){
	$('.regmodal').show();
	$('#regtxt').html('AS ARTIST');
	$('.ci').show();
	$('#typeHolder').val('0');
});

$("#bussiness").click(function(){
	$('.regmodal').show();
	$('#regtxt').html('AS BUSSINESS');
	$('.ci').hide();
	$('#typeHolder').val('1');
});


$(".close").click(function(){
	$('.regmodal').hide();
});

$(".folioImage").click(function(){
	var url=$(this).attr('src');
	$(".waterImage").attr('src',url);
	$(".river").show();
});


$(".river").click(function(){
	$('.river').hide();
});

$(".btn-images").click(function(){
	$('.images').show();
	$('.videos').hide();
});

$(".btn-videos").click(function(){
	$('.videos').show();
	$('.images').hide();
});

$(document).ready(function(){
	var w = window.innerWidth;var h = window.innerHeight;
	console.log(w,h);
	    $(".coming-page").css({"position" : "relative","height" : h,"color" : "#fff","width" : "w"});
	    $(".coming-inner").css({"position" : "relative","height" : h/2,"color" : "#fff","width" : "100%"});



	});

// $(document).ready(function() {
//       switch (window.location.pathname) {
//         case '':
//         case '/views/pages/index-blade.php':
//             $('body').addClass('home')
//       }
//   });

  $(document).ready(function() {
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      autoplay: true,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 3,
          nav: false
        },
        1000: {
          items: 4,
          nav: true,
          loop: true,
          margin: 20
        }
      }
    });
    $('.owl-carousel1').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      autoplay: true,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 3,
          nav: false
        },
        1000: {
          items: 4,
          nav: true,
          loop: true,
          margin: 20
        }
      }
    });
    $('.owl-carousel2').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      autoplay: true,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 3,
          nav: false
        },
        1000: {
          items: 4,
          nav: true,
          loop: true,
          margin: 20
        }
      }
    });
    $('.owl-carousel3').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      autoplay: true,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 3,
          nav: false
        },
        1000: {
          items: 4,
          nav: true,
          loop: true,
          margin: 20
        }
      }
    });
  });
