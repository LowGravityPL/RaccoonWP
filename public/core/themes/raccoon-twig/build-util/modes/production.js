const webpack                = require('webpack');
const userConfig             = require('../helpers/userConfigProvider')();
const CssMinimizerPlugin     = require('css-minimizer-webpack-plugin');
const ImageMinimizerPlugin   = require('image-minimizer-webpack-plugin');
const {extendDefaultPlugins} = require("svgo");

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
            new ImageMinimizerPlugin({
                concurrency: 3,
                minimizer: {
                    implementation: ImageMinimizerPlugin.imageminMinify,
                    options : {
                        // Lossless optimization with custom option
                        // Feel free to experiment with options for better result for you
                        plugins: [
                            ['gifsicle', {interlaced: true}],
                            ['mozjpeg', {quality: 80}],
                            ['optipng', {optimizationLevel: 5}],
                            [
                                "svgo",
                                {
                                    plugins: [
                                        {
                                            name: "preset-default",
                                            params: {
                                                overrides: {
                                                    removeViewBox: false,
                                                    addAttributesToSVGElement: {
                                                        params: {
                                                            attributes: [
                                                                { xmlns: "http://www.w3.org/2000/svg" },
                                                            ],
                                                        },
                                                    },
                                                },
                                            },
                                        },
                                    ],
                                },
                            ],
                        ],
                    }
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
