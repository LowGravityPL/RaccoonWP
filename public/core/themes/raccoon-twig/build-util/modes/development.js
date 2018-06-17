const webpack     = require('webpack');
const commonPaths = require('../common/paths');

// const WebpackBundleAnalyzer = require("webpack-bundle-analyzer").BundleAnalyzerPlugin;

module.exports = env => {

	const devPlugins = [
		new webpack.DefinePlugin({
			PRODUCTION: JSON.stringify(false),
		}),
		// new WebpackBundleAnalyzer(),
	];

	return {
		devtool: 'cheap-eval-source-map',
		plugins: devPlugins
	};
};