const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.js('resources/js/app.js', 'public/js')
    .webpackConfig(require('./webpack.config'));

    mix.webpackConfig({
        module: {
            rules: [
                {
                    test: /.scss/,
                    enforce: 'pre',
                    loader: 'import-glob-loader'
                }
            ]
        }
    })
    .sass('resources/sass/app.scss', 'public/css');



if (mix.inProduction()) {
    mix.version();
}