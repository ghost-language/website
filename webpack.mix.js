const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')
const MonacoEditorPlugin = require('monaco-editor-webpack-plugin')

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .version()
    .options({
        postCss: [
            tailwindcss('./tailwind.config.js'),
        ],
    })
    .webpackConfig({
        plugins: [
            new MonacoEditorPlugin({
                // https://github.com/Microsoft/monaco-editor-webpack-plugin#options
                // Include a subset of languages support
                // Some language extensions like typescript are so huge that may impact build performance
                // e.g. Build full languages support with webpack 4.0 takes over 80 seconds
                // Languages are loaded on demand at runtime
                languages: ['dart']
            })
        ]
    })
