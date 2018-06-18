const webpack     = require('webpack');
const commonPaths = require('../common/paths');

module.exports = env => {

    const devPlugins = [
        new webpack.DefinePlugin({
            PRODUCTION: JSON.stringify(false),
        })
    ];

    return {
        devtool: 'cheap-eval-source-map',
        plugins: devPlugins
    };
};