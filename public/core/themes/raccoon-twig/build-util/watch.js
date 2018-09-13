//Because why not?
const bannerManifest = `
========================================================================================
__________                                         __      ____________ 
\\______   \\_____    ____  ____  ____   ____   ____/  \\    /  \\______   \\
 |       _/\\__  \\ _/ ___\\/ ___\\/  _ \\ /  _ \\ /    \\   \\/\\/   /|     ___/
 |    |   \\ / __ \\\\  \\__\\  \\__(  <_> |  <_> )   |  \\        / |    |    
 |____|_  /(____  /\\___  >___  >____/ \\____/|___|  /\\__/\\  /  |____|    
        \\/      \\/     \\/    \\/                  \\/      \\/             
        
 Documentation, issues, contributions welcome at https://raccoonwp.lowgravity.pl
========================================================================================
`;
//Display our nice banner
console.log('\x1b[33m%s\x1b[0m', bannerManifest);

/** -------------------------------------------------------
 * Real code starts here
 */
const browserSync          = require('browser-sync').create();
const url                  = require('url');
const webpack              = require('webpack');
const webpackDevMiddleware = require('webpack-dev-middleware');
const webpackHotMiddleware = require('webpack-hot-middleware');
const webpackMerge         = require('webpack-merge');
const addDevEntries        = require('./helpers/addDevServerEntry');

//Load basic dev config
let webpackConfig = require('./webpack.config')({mode: 'development', isWatching: true});
const userConfig  = require('./helpers/userConfigProvider')();

//default watch config
const config = webpackMerge({
    bsHost:     'localhost',
    bsPort:     3000,
    bsOpen:     false,
    devUrl:     'https://raccoon.test',
    watchFiles: [
        //do not put JS in here!!
        'dist/**/*.css',
        'templates/**/*.php',
        'page-templates/**/*.php',
        'lib/**/*.php',
        '*.php',
        'app/templates/**/*.twig'
    ]
}, userConfig);

// Let's get ready to rumbleeeee

//add hot module for each entry
webpackConfig = addDevEntries(webpackConfig, {
    hot: true
});

//add hot module replacement plugin to the stack
webpackConfig.plugins.push(
    new webpack.HotModuleReplacementPlugin()
);

const bundler    = webpack(webpackConfig);
const middleware = [
    webpackDevMiddleware(bundler, {
        publicPath:  webpackConfig.output.publicPath,
        writeToDisk: true,
        hot:         true,
        stats:       {
            colors:  true,
            modules: false
        }
    }),
    webpackHotMiddleware(bundler)
];

if (url.parse(config.devUrl).protocol === 'https:') {
    process.env.NODE_TLS_REJECT_UNAUTHORIZED = 0;
}

browserSync.init({
    host:          config.bsHost,
    port:          config.bsPort,
    proxy:         config.devUrl,
    open:          config.bsOpen,
    injectChanges: false,
    files:         config.watchFiles,
    middleware:    middleware,
});
