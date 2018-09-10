const webpackMerge = require('webpack-merge');
const modeConfig   = mode => require(`./modes/${mode}`)(mode);

//common configuration
const commonPaths   = require('./common/paths');
const commonModules = isWatching => require('./common/modules')(isWatching);
const commonPlugins = require('./common/plugins');
const presetConfig = require("./helpers/loadPresets");


module.exports = ({mode, presets, isWatching} = {mode: "production", presets: [], isWatching: false}) => {

    let config = {
        mode,
        context:   commonPaths.sourcePath,
        stats:     'normal',
        entry:     {
            'app': [
                './scripts/app.js',
                './styles/app.scss'
            ]
        },
        output:    {
            publicPath: '/core/themes/raccoon-twig/dist/',
            path:       commonPaths.outputPath,
            filename:   '[name].[hash].js',
        },
        externals: {
            jquery: 'jQuery',
        },
    };

    return webpackMerge(
        config,
        commonModules(isWatching),
        commonPlugins,
        modeConfig(mode),
        presetConfig({ mode, presets })
    );
};
