const commonPaths          = require('./paths');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = isWatching => {

    const jsRules = {
        test:    /\.js$/,
        exclude: /node_modules/,
        use: [{
            loader: 'babel-loader',
            options: {
                presets: ['@babel/preset-env'],
            },
        }],
    };

    const scssRules = {
        test: /\.s?[ac]ss$/,
        //include: /node_modules/
        use:  [
            {
                loader: isWatching ? 'style-loader' : MiniCssExtractPlugin.loader
            },
            {
                loader: 'css-loader',
            },
            {
                loader:  'postcss-loader',
                options: {
                    postcssOptions: {
                        config: `${commonPaths.rootPath}/build-util/common`
                    }
                }
            },
            {
                loader: 'sass-loader'
            }
        ],
    };

    const internalAssetsRules = {
        test: /\.(eot|woff2|woff|ttf|svg|gif|png|jpe?g|ico)$/,
        include: commonPaths.sourcePath,
        type: 'asset',//file for over 8kb, url for less
        generator: {
            filename: '[path][name][ext][query]'
        }
    };

    const externalAssetsRules = {
        test:    /\.(eot|woff2|woff|ttf|svg|gif|png|jpe?g|ico)$/,
        include: /node_modules/,
        type: 'asset', //file for over 8kb, url for less
        generator: {
            filename: 'vendor/[name][contenthash][ext][query]'
        }
    };

    return {
        module: {
            rules: [
                jsRules,
                scssRules,
                internalAssetsRules,
                externalAssetsRules
            ]
        }
    };
}
