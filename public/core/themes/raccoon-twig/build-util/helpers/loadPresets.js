//@See https://github.com/TheLarkInn/webpack-workshop-2018/blob/feature/0700-custom-loaders/build-utils/loadPresets.js

const { merge } = require("webpack-merge");

const applyPresets = (env = {presets: []}) => {
    const presets = env.presets || [];
    /** @type {string[]} */
    const mergedPresets = [].concat(...[presets]);
    const mergedConfigs = mergedPresets.map(presetName =>
        require(`../presets/webpack.${presetName}`)(env)
    );

    return merge({}, ...mergedConfigs);
};

module.exports = applyPresets;
