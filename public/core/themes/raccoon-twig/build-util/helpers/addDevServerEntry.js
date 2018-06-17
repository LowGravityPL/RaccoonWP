/*
* Adds dev server entries to webpack config
* Loosely Based on https://github.com/webpack/webpack-dev-server/blob/master/lib/util/addDevServerEntrypoints.js
*/

module.exports = (webpackConfig, devServerOptions) => {
	const devClient = [`${require.resolve('webpack-hot-middleware/client')}?reload=true`];

	if (devServerOptions.hotOnly) {
		devClient.push(require.resolve('webpack/hot/only-dev-server'));
	} else if (devServerOptions.hot) {
		devClient.push(require.resolve('webpack/hot/dev-server'));
	}

	const prependDevClient = (entry) => {
		if (typeof entry === 'function') {
			return () => Promise.resolve(entry()).then(prependDevClient);
		}
		if (typeof entry === 'object' && !Array.isArray(entry)) {
			const entryClone = {};
			Object.keys(entry).forEach((key) => {
				entryClone[key] = devClient.concat(entry[key]);
			});
			return entryClone;
		}
		return devClient.concat(entry);
	};

	[].concat(webpackConfig).forEach((wpOpt) => {
		wpOpt.entry = prependDevClient(wpOpt.entry || './src');
	});

	return webpackConfig;
}
