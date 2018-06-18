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
        '*.php'
    ] //which files should be watch by BrowserSync process
};