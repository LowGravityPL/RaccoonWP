module.exports = {

    //--------------------------
    //Watch process configuration
    //--------------------------
    bsHost:     'localhost', //BrowserSync host
    bsPort:     3000, //BrowserSync port
    bsOpen:     false, //open BrowserSync on watch process start?
    devUrl:     'https://raccoon.test', //URL to be proxied, that's your application local url
    watchFiles: [
        //do not put JS in here!! Webpack dev server will handle it.
        'dist/**/*.css',
        'templates/**/*.php',
        'page-templates/**/*.php',
        'lib/**/*.php',
        '*.php',
        'app/templates/**/*.twig'
    ], //which files should be watch by browsersync process

    //--------------------------
    // Production Build process configuration
    //--------------------------
    productionBuild: {
        //performance hints
        enablePerformanceHints: true, //should we enable performance hints on production builds
        maxAssetSize:           1000000, //size in bytes after we should display a warning

        //source maps
        enableSourceMaps: true
    }
};
