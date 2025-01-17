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
    .sass('resources/sass/app.scss', 'public/css')
    .webpackConfig({
        module: {
           rules: [
              {
                 test: /\.m?js$/, // Match JavaScript files
                 exclude: /node_modules\/(?!vue-toast-notification)/, // Exclude all node_modules except vue-toast-notification
                 use: {
                    loader: 'babel-loader',
                    options: {
                       presets: ['@babel/preset-env'],
                       plugins: ['@babel/plugin-proposal-optional-chaining']
                    }
                 }
              }
           ]
        }
     });

if (mix.inProduction()) {
    mix.version();
}