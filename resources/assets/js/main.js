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