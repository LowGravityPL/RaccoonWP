module.exports = {

    //--------------------------
    //Watch process configuration
    //--------------------------
    bsHost:     'localhost', //browsersync host
    bsPort:     3000, //browsersync port
    bsOpen:     false, //open browsersync on watch process start?
    devUrl:     'https://raccoon.test', //URL to be proxied, thats your application local url
    watchFiles: [
        //do not put JS in here!! Webpack dev server will handle it.
        'dist/**/*.css',
        'templates/**/*.php',
        'page-templates/**/*.php',
        'lib/**/*.php',
        '*.php'
    ] //which files should be watch by browsersync process
};