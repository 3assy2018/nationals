# nationals

[![Total Downloads][ico-downloads]][link-downloads]

Laravel Nationals is an out of the box package for Laravel Framework Developers to solve the problem of finding all countries and regions around the world easily to be used in various ways.
## Installation

Via Composer

``` bash
$ composer require 3assy2018/nationals:dev-master
```

## Usage

Laravel Nationals is used to fetch all countries and regions from all over the world to be used in maps and form inputs and other purposes.

First of all and after installing the package import your service provider to config/app.php in providers array:

```
    Ixudra\Curl\CurlServiceProvider::class,
    m3assy\nationals\nationalsServiceProvider::class,
    //
```

and in alias array you have to add the following line:


```
    'Curl' => Ixudra\Curl\Facades\Curl::class,
```

After adding your service providers, from your cmd check the list of your artisan commands by this command:

```
    php artisan list
```

You will find two new commands that are supposed to be used in our package which are:

```
    php artisan nationals:start
    php artisan region:add
```

The package is simplified in these two commands:

```
    php artisan nationals:start
```

This command must be used firstly before anything.
1- It imports migrations and migrate your database with two new tables called: countries, regions.
2- It seeds the table of countries with records of all countries around the world (230 Country).

Then you can add regions to your database by two ways:

1- Importing all regions around the world:

```
    php artisan region:add *
```

this operation may take several minutes depending on your internet connection

2- Importing regions for specific country or countries:

```
    php artisan region add --code=[Country Code]
    // you can get country code by searching for its name on google or wikipedia).
```

Note: if you wrote a command like this:

```
    php artisan region:add * --code=[Country Code]
```

this will add all the regions so don't use the asterisk if you don't need all regions.

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.


## Contributing

This package is based on API called Battuta so thanks for the API creator.

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/m3assy/nationals.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/m3assy/nationals.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/m3assy/nationals/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/3assy2018/nationals
[link-downloads]: https://packagist.org/packages/3assy2018/nationals
[link-travis]: https://travis-ci.org/3assy2018/nationals
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/3assy2018
[link-contributors]: ../../contributors]