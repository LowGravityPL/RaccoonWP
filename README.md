![RaccoonWP logo](https://lowgravity.pl/raccoon-logo-scaled.png)
# RaccoonWP
Raccoon is a modern WordPress architecture stack which comes with a Starter Theme. 

The stack is based on Composer on the backend and NodeJs and Webpack on the frontend. 
This composition allows for quick, stable and efficient development using the tools which are state of the art in 2018.  

You should use it as your boilerplate to obtain optimal, stable architecture with performance and security in mind.

It is best suited for fresh projects though there is no problem in implementing it into existing ones.

### Documentation
Please find [the documentation on our github page](https://raccoonwp.lowgravity.pl)

### Features
- Architecture:
    - [PHP Composer](https://getcomposer.org/) support.
    - [WordPress](https://wordpress.org/) Core as a dependency.
    - Better directory structure and more secure than default WordPress install.
    - Environment-based configuration.
    - Support for [Wp-Cli](https://wp-cli.org/).
    - Proper project data management - for example by storing CPT configuration outside theme (when needed).
    - Ability to disable plugins per environment.  
    - [Coming soon] Multisite not tested yet! Though it should work without issues..
- Theme:
    - Customizable theme build process based on newest [Webpack 4.12](https://webpack.js.org/) with all its features
    like dead code elimination, bundle analysis, watch process and more.
    - Flexible CSS: Plain SASS by default / Bootstrap 4 / Foundation 5 / Bourbon/Neat or anything else (check [recipes section](https://raccoonwp.lowgravity.pl/recipes)).
    - Modern JS: all newest features like ES6, modules, spreads, destructuring objects and arrays etc.
    - NPM: node package manager allowing to import various 3rd party libraries into the project.
    - uses Twig (default) or Blade templating (or you can go old plain WordPress way).
    - Vue? React? We got you covered, check [recipes section](https://raccoonwp.lowgravity.pl/recipes).
    - [Gutenberg](https://wordpress.org/gutenberg/) support. 
    - [Under consideration] Child theme support.
    
    See our [recipes section](https://raccoonwp.lowgravity.pl/recipes) to see how to tweak the project to your needs.

### Current version
1.0.0-alpha

### License
[MIT](LICENSE.md) © [LowGravity.pl](https://lowgravity.pl)