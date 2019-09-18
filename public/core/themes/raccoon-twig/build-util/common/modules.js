const commonPaths          = require('./paths');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = isWatching => {

    const jsRules = {
        test:    /\.js$/,
        exclude: /node_modules/,
        loader:  'babel-loader',
        options: {
            babelrc: true,
        }
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
                    config: {
                        path: `${commonPaths.rootPath}/build-util/common`
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
        use:  {
            loader:  'file-loader',
            options: {
                name:     '[path][name].[ext]',
                emitFile: true,
            }
        }
    };

    const externalAssetsRules = {
        test:    /\.(eot|woff2|woff|ttf|svg|gif|png|jpe?g|ico)$/,
        include: /node_modules/,
        use:     {
            loader:  'file-loader',
            options: {
                name:       '[path][name].[ext]',
                outputPath: 'vendor/',
                emitFile:   true,
            }
        }
    };

    const  vueRules = {
        test: /\.vue$/,
        exclude: /node_modules/,
        loader: 'vue-loader'
    };

    return {
        module: {
            rules: [
                jsRules,
                scssRules,
                internalAssetsRules,
                externalAssetsRules,
                vueRules
            ]
        }
    };
}
