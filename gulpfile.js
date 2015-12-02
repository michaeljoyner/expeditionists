var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .sass('fapp.scss')
        .browserify('main.js')
        .browserify('front.js')
        //.scripts([
        //    'vendor/tiny.editor.js'
        //], 'public/js/app.js')
        .version(['css/app.css', 'js/app.js', 'css/fapp.css']);
});
