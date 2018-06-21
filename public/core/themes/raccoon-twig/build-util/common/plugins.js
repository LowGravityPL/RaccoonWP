const Clean          = require('clean-webpack-plugin');
const Copy           = require('copy-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');

const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const commonPaths = require('./paths');

module.exports = {
    plugins: [
        new Clean(
            ['dist'],
            commonPaths.rootPath
        ),
        new Copy([
            {
                from:    'images/**/*',
                to:      `${commonPaths.outputPath}`
            },
            {
                from:    'fonts/**/*',
                to:      `${commonPaths.outputPath}`
            },
            {
                from:    '/other/**/*',
                to:      `${commonPaths.outputPath}`
            }
        ], {
            copyUnmodified: true,
            context: `${commonPaths.sourcePath}`,
            debug: 'debug'
        }),
        new ManifestPlugin({
            fileName: 'assets-manifest.json',
            publicPath: 'dist/'
        }),
        new MiniCssExtractPlugin({
            filename: "[name].[contenthash].css",
        }),
    ]
};