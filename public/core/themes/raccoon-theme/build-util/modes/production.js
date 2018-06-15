const webpack                   = require('webpack');
const {default: ImageminPlugin} = require('imagemin-webpack-plugin');

module.exports = env => {
	return {
		devtool:     'source-map',
		performance: {
			hints:        "warning", // enum
			maxAssetSize: 100000, // int (in bytes),
			assetFilter:  function (assetFilename) {
				// Function predicate that provides asset filenames
				return assetFilename.endsWith('.css') || assetFilename.endsWith('.js');
			}
		},
		plugins:     [
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
};