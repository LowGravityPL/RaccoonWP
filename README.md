![RaccoonWP logo](https://lowgravity.pl/raccoon-head-scaled-small.png)
# RaccoonWP
**This is 1.4.0 release. If you find any issues let us know**

Raccoon is a modern architecture stack and a starter theme for [WordPress](https://wordpress.org/). 

The stack is based on Composer on the backend. NodeJs with Webpack are used on the frontend. 
This composition allows for quick and efficient development using the tools which are **state of the art in 2018.**  

You should use it as your boilerplate/starter kit to obtain **optimal architecture with performance, extensibility and security** in mind.

Raccoon is best suited for fresh projects (but there is no problem in implementing it into existing ones with some effort).

### Documentation
Please find [the documentation on our github page](https://raccoonwp.lowgravity.pl)

### Status
![Version](https://img.shields.io/badge/Version-1.4.0-green.svg)
![PHP from Packagist](https://img.shields.io/packagist/php-v/lowgravitypl/raccoonwp.svg)
[![License](https://poser.pugx.org/lowgravitypl/raccoonwp/license)](https://packagist.org/packages/lowgravitypl/raccoonwp)

Packagist:

[![Latest Stable Version](https://poser.pugx.org/lowgravitypl/raccoonwp/v/stable)](https://packagist.org/packages/lowgravitypl/raccoonwp)
[![Latest Unstable Version](https://poser.pugx.org/lowgravitypl/raccoonwp/v/unstable)](https://packagist.org/packages/lowgravitypl/raccoonwp)
[![composer.lock](https://poser.pugx.org/lowgravitypl/raccoonwp/composerlock)](https://packagist.org/packages/lowgravitypl/raccoonwp)
### Features
- Architecture:
    - [PHP Composer](https://getcomposer.org/) support.
    - [WordPress](https://wordpress.org/) Core as a dependency.
    - Full [Docker](https://github.com/LowGravityPL/raccoon-docker) image for your local development
    - Support for [Wp-Cli](https://wp-cli.org/).
    - Better directory structure and more secure than default WordPress install.
    - Environment-based configuration.
    - Proper project data management.
    - Ability to disable plugins per environment.  
    - Internationalization built in from the beginning.    
    - [Coming soon] MultiSite not tested yet! Though it should work without issues.
    - [On the roadmap] Unit tests
    - [On the roadmap] E2E tests
    - [On the roadmap] Progressive Web App and Service Worker 
- Theme:
    - Customizable theme build process based on newest [Webpack 4.17](https://webpack.js.org/) with all its features
    like dead code elimination, bundle analysis, watch process and more.
    - Flexible CSS: Plain SASS by default / Bootstrap 4 / Foundation 5 / Bourbon/Neat or anything else (check [recipes section](https://raccoonwp.lowgravity.pl/recipes)).
    - Modern JS: all newest features like ES6, modules, spreads, destructuring objects and arrays etc.
    - NPM: node package manager allowing to import various 3rd party libraries into the project.
    - uses Twig (default) or Blade templating (or you can go old plain WordPress way).
    - Vue? React? We got you covered, check [recipes section](https://raccoonwp.lowgravity.pl/recipes).
    - [Gutenberg](https://wordpress.org/gutenberg/) support. 
    - [On the roadmap] Child theme support.
    
    See our [recipes section](https://raccoonwp.lowgravity.pl/recipes) to see how to tweak the project to your needs.

### License
[MIT](LICENSE.md) © [LowGravity.pl](https://lowgravity.pl)

### Contributors
- [Kamil Grzegorczyk](https://kamilgrzegorczyk.com)
- [Lucas Grzegorczyk](https://github.com/furai)
- artwork by [Izabela Grzegorczyk](https://www.behance.net/IzaGrzegorczyk)
