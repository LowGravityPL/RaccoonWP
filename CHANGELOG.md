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
