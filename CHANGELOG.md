2.8.2 [31st of January 2022]
- update minimum Node version in .nvmrc to `14.18`

2.8.1 [31st of January 2022]
- fix issue in watch mode

2.8 [31st of January 2022]
Massive update after 9 months of inactivity. Possible backward incompatibility.
- update WP Core to 5.9
- update other composer dependencies including new major version of extended CPTs
- bump up minimal PHP version to 7.4
- update NPM dependencies to newest version
- improve theme build image optimization process, copying assets process, introduce new assets loader
- remove Vue and its dependencies
- Update Raccoon Mu Framework (2.3) and Raccoon Core (2.7) to the newest versions

2.7 [11th of April 2021]
- update WP Core to 5.7
- update NPM dependencies in the theme
- build process improvements, adding proper css and image minification
- Update Raccoon Mu Framework (2.2.1) and Raccoon Core (2.6.1) to newest patch versions

2.6 [26th of January 2021]
- update composer dependencies like query-monitor, extended-cpts etc.
- bump up minimum php version to 7.3 as 7.2 is EOL
- bump up WP Core to 5.6
- Migrate webpack build process to webpack5 (needs observation)
- update npm dependencies to its newest version
- update RaccoonWP-Core to 2.6

2.5 [6th of November 2020]
- Replace unmaintained lkwdwrd/wp-muplugin-loader with boxuk/wp-muplugin-loader
- Add composer 2.x support
- Fix notice about undefined index DB_PREFIX
- Install QueryMonitor as dev dependency
- update RaccoonWP-Core to 2.5

2.4 [25th of August 2020]
- update RaccoonWP-Core to 2.4, add examples of how to use new features like common envs config
- update WP Core and other composer dependencies
- update NPM dependencies, postcss-loader comes with new API syntax so that had to be adjusted

2.3.4 [17th of August 2020]
- update composer dependencies - bump up WP Core to 5.5.x branch

2.3.3 [11th of August 2020]
- update composer dependencies
- bump up NPM dependencies
- change build process to use new syntax of webpack-merge

2.3.2 [3rd of July 2020]
- remove default body styles
- update composer dependencies, bump up WP Core to 5.4.2
- bump up NPM dependencies
- apply new configuration schema for the webpack copy plugin

2.3.1 [1st of May 2020]
- update composer dependencies, bump up WP Core to 5.4.x
- update raccoon-twig npm dependencies to newest versions
- Wrap acf-json require in if class exists check

2.3 [24th of March 2020]
- Move vlucas/phpdotenv to the RaccoonWP-Core package
- update extended CPTs package

2.2.1 [23rd of March 2020]
- add babel-preset-env configuration to build process
- add body classes to <body> tag in theme
- Update composer dependencies (mainly the minor Timber version)
- Update theme npm dependencies to newest version

2.2 [13th of February 2020]
- update WP Core to 5.3.2
- update Raccoon Core libraries to 2.1
- allow for customization of webroot (public) directory
- update composer dependencies to newest versions
- update theme npm dependencies to newest versions

2.1 [14th of November 2019]
- update WP Core to 5.3
- fix DefaultHelper issue in the site-framework when wordpress is installing
- change minimum required PHP version to 7.2

2.0 [13th of November 2019]
- initial release of new 2.0 version with more modular design in mind
- RaccoonWP Core and MU plugin framework became separate dependencies

1.9.1 [8th of November 2019]
- make the example Vue implementation more robust by ensuring the data from API exists.

1.9.0 [7th of November 2019]
- update WP Core to 5.2.4
- update Timber to 1.12
- update Node dependencies to most recent versions
- bump up theme version to 1.2.0
- various other minor dependency updates

1.8.0 [7th of November 2019]
- Add Vue.js example recent posts component

1.7.0 [18th of July 2019]
- update NPM dependencies including few major versions (broken backwards compatibility)
- add .browserlist porperty to package.json for babel/autoprefixer compatibility

1.6.6 [5th of July 2019]
- update Extended CPTs to 4.2.5

1.6.5 [19th of June 2019]
- update WP Core to 5.2.2
- update Timber to 1.10.0
- update phpdotenv to 3.4.0
- update Extended CPTs to 4.2.4

1.6.4 [23rd of May 2019]
- update WP Core to 5.2.1
- replace login_headertitle with login_headertext to fix deprecation warning

1.6.3 [22nd of May 2019]
- update NPM dependencies
- fix wp-cli path

1.6.2 [15th of May 2019]
- update WP Core to 5.2
- update Timber to 1.9.4
- update phpdotenv to 3.3.3

1.6.1 [25th of March 2019]
- update WP Core to 5.1.1
- update Timber to 1.9.2

1.6.0 [8th of March 2019]
- update WP Core to 5.1
- update Timber to 1.9.1
- update NPM dependencies and apply changes to build process
- add support for WP_SITEURL environment variable

1.5.1 [4th of February 2019]
- update Timber to 1.8.4
- update NPM dependencies to newest versions
- update WP Core to 5.0.3

1.5.0 [25th of December 2018]
- update WP Core to 5.0.2 (with gutenberg)
- update Timber to 1.8.3
- update NPM dependencies to newest versions

1.4.1 [25th of September 2018]
- fix login logo path

1.4.0 [12th of September 2018]
- fix ACF Json sync functionality

1.3.0 [10th of September 2018]
- fix build process public path for assets.

1.2.1 [10th of September 2018]
- fix build process demanding babel-core 7.x

1.2.0 [4th of September 2018]
- update npm dependencies
- change wordpress installation path from `public/wordpress` to `public/wp`
- update WP Core to 4.9.8

1.1.0 [2nd of August 2018]
- fix .env.sample default data
- change default environments' config files
- fix column sizing in theme, cleanup class names and add equal height for flex grid

1.0.0  [24th of July 2018]
- bumped up minimum PHP version to 7.1.3 due to the fact that 7.0 php will reach end of support by the end of 2018
- updated npm dependencies, bumped up supported webpack to 4.16
- updated WP core to 4.9.7
- added docker support (see separate repository [https://github.com/LowGravityPL/raccoon-docker](https://github.com/LowGravityPL/raccoon-docker))
- added basic sidebar for single post views
- small bugfixes and enhancements

1.0.0-RC1 [21st of June 2018]
- update autoprefixer
- remove Gutenberg from composer dependencies
- ensure that copied assets land in assets-manifest.json file, that required a change of webpack manifest plugin

1.0.0-beta [18th of June 2018]
- Added a lot of documentation
- Modified watch mode for theme
- Parametrize production build
- Added bundle analyze task which is very helpful in checking what is going to be shipped to production.
- Added basic header template

1.0.0-alpha1 [17th of June 2018]
- Introduce data helper classes
- Update NPM dependencies for theme
- Renamed class methods to follow camelCase
- Renamed raccoon-theme to raccoon-twig to make it compatible in other
variants of theme coming in the future
- Move theme translations file to app/translations and update make-pot file

1.0.0-alpha [15th of June 2018]
- initial release
