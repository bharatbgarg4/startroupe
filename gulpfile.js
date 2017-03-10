process.env.DISABLE_NOTIFIER = true;

var elixir = require('laravel-elixir');
//Rating includes
// '../../../vendor/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js',

elixir(function(mix) {
	mix.sass('app.scss')
	.scripts([
		'../../../vendor/bower_components/jquery/dist/jquery.min.js',
		'../../../vendor/bower_components/jquery-ui/jquery-ui.min.js',
		'../../../vendor/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
		'main.js',
		'owl.carousel.js'
		])
	.version(['css/app.css','js/all.js']);
});