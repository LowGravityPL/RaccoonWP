const webpack                   = require('webpack');
const {default: ImageminPlugin} = require('imagemin-webpack-plugin');
const userConfig                = require('../helpers/userConfigProvider')();

module.exports = env => {

    let prodConfig = {
        devtool: 'source-map',
        plugins: [
            new webpack.DefinePlugin({
                PRODUCTION: JSON.stringify(true),
            }),
            new ImageminPlugin({
                test:     /\.(jpe?g|png|gif|svg)$/i,
                optipng:  {optimizationLevel: 7},
                gifsicle: {optimizationLevel: 3},
                pngquant: {quality: '65-90', speed: 4},
                svgo:     {removeUnknownsAndDefaults: false, cleanupIDs: false}
            })
        ]
    };

    if (userConfig.productionBuild) {
        if (userConfig.productionBuild.enablePerformanceHints) {
            prodConfig.performance = {
                hints:        "warning", // enum
                maxAssetSize: userConfig.productionBuild.maxAssetSize ? userConfig.productionBuild.maxAssetSize : 100000 , // int (in bytes),
                assetFilter:  function (assetFilename) {
                    // Function predicate that provides asset filenames
                    return assetFilename.endsWith('.css') || assetFilename.endsWith('.js');
                }
            };
        }

        if (userConfig.productionBuild.enableSourceMaps === false) {
            prodConfig.devtool = 'none';
        }
    }

    return prodConfig;
};