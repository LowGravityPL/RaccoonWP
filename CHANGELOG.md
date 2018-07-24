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