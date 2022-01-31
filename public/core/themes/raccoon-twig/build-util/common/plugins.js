const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const Copy                 = require('copy-webpack-plugin');
const { WebpackManifestPlugin } = require('webpack-manifest-plugin');

const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const commonPaths     = require('./paths');
const copyGlobOptions = {
    dot:    true,
    ignore: ['**/.gitkeep'],
};

module.exports = {
    plugins: [
        new CleanWebpackPlugin({
            dry:     false,
            verbose: true,
        }),
        new Copy({
            patterns: [
                {
                    from:             'images/**/*',
                    to:               `${commonPaths.outputPath}/[path][name].[contenthash][ext]`,
                    globOptions:      copyGlobOptions,
                    noErrorOnMissing: true,
                },
                {
                    from:             'fonts/**/*',
                    to:               `${commonPaths.outputPath}/[path][name].[contenthash][ext]`,
                    globOptions:      copyGlobOptions,
                    noErrorOnMissing: true,
                },
                {
                    from:             'other/**/*',
                    to:               `${commonPaths.outputPath}/[path][name].[contenthash][ext]`,
                    globOptions:      copyGlobOptions,
                    noErrorOnMissing: true,
                }
            ]
        }),
        new WebpackManifestPlugin({
            fileName:   'assets-manifest.json',
            publicPath: 'dist/'
        }),
        new MiniCssExtractPlugin({
            filename: "[name].[contenthash].css",
        })
    ]
};
