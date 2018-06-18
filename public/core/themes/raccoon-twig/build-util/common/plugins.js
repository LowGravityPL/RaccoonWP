const Clean    = require('clean-webpack-plugin');
const Copy     = require('copy-webpack-plugin');
const Manifest = require('webpack-assets-manifest');

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
        new Manifest({
            output: 'assets-manifest.json',
            customize(entry, original, manifest, asset) {
                if (manifest.isMerging) {
                    // Do something
                }

                if (entry.key.toLowerCase().endsWith('.map')) {
                    return false;
                }

                // You can directly modify key/value on the `entry` argument
                // or you can return a new object that has key and/or value properties.
                // If either the key or value is missing, the defaults will be used.
                //
                // The key should be a string and the value can be anything that can be JSON stringified.
                // If something else (or nothing) is returned, the manifest will add the entry normally.
                return {
                    key:   `assets/${entry.key}`,
                    value: `dist/${entry.value}`,
                };
            },
        }),
        new MiniCssExtractPlugin({
            filename: "[name].[contenthash].css",
        }),
    ]
};