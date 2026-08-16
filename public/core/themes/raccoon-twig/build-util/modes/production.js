const webpack                = require('webpack');
const userConfig             = require('../helpers/userConfigProvider')();
const CssMinimizerPlugin     = require('css-minimizer-webpack-plugin');
const ImageMinimizerPlugin   = require('image-minimizer-webpack-plugin');

module.exports = env => {

    let prodConfig = {
        devtool: 'source-map',
        optimization: {
            chunkIds: 'size',
            moduleIds: 'size',
            mangleExports: 'size',
            removeEmptyChunks:true,
            minimize: true,
            minimizer: [
                '...',
                new CssMinimizerPlugin({
                    parallel: true,
                    minimizerOptions: {
                        preset: [
                            'default',
                            {
                                discardComments: { removeAll: true },
                            },
                        ],
                    }
                }),
            ]
        },
        plugins: [
            new webpack.DefinePlugin({
                PRODUCTION: JSON.stringify(true),
            }),
            // Raster image compression via sharp (fast, no native imagemin
            // binaries). Ported from the broadbandnow theme build.
            new ImageMinimizerPlugin({
                test: /\.(jpe?g|png|gif|webp|avif|tiff)$/i,
                minimizer: {
                    implementation: ImageMinimizerPlugin.sharpMinify,
                    options: {
                        encodeOptions: {
                            jpeg: { quality: 72, mozjpeg: true },
                            png: { quality: 72, effort: 5 }, // effort: 5 balances speed vs compression (default: 7)
                            webp: { quality: 70 },
                            avif: { cqLevel: 33 },
                        },
                    },
                },
            }),
            new ImageMinimizerPlugin({
                test: /\.svg$/i,
                minimizer: {
                    implementation: ImageMinimizerPlugin.svgoMinify,
                    options: {
                        encodeOptions: { multipass: true, plugins: ['preset-default'] },
                    },
                },
            }),
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
