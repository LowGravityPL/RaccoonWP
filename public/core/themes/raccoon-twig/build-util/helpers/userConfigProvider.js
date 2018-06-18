//load user config file.
let userConfig = {};

try {
    userConfig = require('../user.config.js');
    console.log('--- Loading user configuration. ---');
} catch (err) {
    console.log('\nUser configuration not found. Running with default parameters.');
    console.log('You can provide your configuration by defining user.config.js file next to webpack configuration.\n');
}

function getUserConfig() {
    return userConfig;
}

module.exports = getUserConfig;