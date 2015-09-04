# CakePHP 3 Loaded

A preloaded cakephp 3 application designed to get up and running quicker. Preinstalled with great plugins for auth, user action tracking and search. This is just the start. [Read the blog post](http://www.justinatack.com/blog/2015/cakephp-3-with-tinyauth-blame/).

## Loaded with
1. Ceeram/Blame
2. Dereuromark/TinyAuth
3. CakeDC/Search

## Installation

1. Download [cakephp-loaded](https://bitbucket.org/justinatack/cakephp3-loaded)
2. Run `composer update --prefer-dist`.
3. Create a new app.php file in the config directory. Just copy app.default.php and change the default datasource settings to match your setup.
4. Run 'bin/cake migrations migrate'.

You should now be able to visit the path to where you installed the app and see
the setup traffic lights.

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your application.
