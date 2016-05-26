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

    mix.sass('app.scss');

    mix.styles(['vendor/normalize.css', 'app.css' ], null, 'public/css');

    mix.version('public/css/all.css');


    //mix.version('public/css/all.css');
    // mix.sass('app.scss', 'resources/css');
    //
    // mix.styles([
    //    'libs/bootstrap.min.css',
    //     'app.css',
    //     'libs/select2.min.css'
    // ]);
    //
    // mix.scripts([
    //     'libs/jquery-1.12.4.js',
    //     'libs/select2.min.js'
    // ]);

    //mix.sass('app.scss').coffee(['module.coffee']);

    // mix.styles([
    //     'vendor/normalize.css',
    //     'app.css'
    // ], null, 'public/css');

    //mix.phpUnit(); //got an error here. php unit test failed.

    //mix.version('public/css/all.css');
});
