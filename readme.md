# Nationals

[![Total Downloads][ico-downloads]][link-downloads]

Laravel Nationals provides a bundled database of countries and regions for Laravel 8-12 applications without requiring any external API calls.

## Installation

Via Composer

```bash
$ composer require 3assy2018/nationals
```

The package uses Laravel's package auto-discovery; no manual provider or alias registration is necessary.

## Usage

Run the artisan commands to migrate and seed the bundled data:

```
php artisan nationals:start
php artisan region:add *
```

`nationals:start` publishes the package migrations and seeds the countries table.
`region:add` seeds regions for all countries or for selected ones:

```
php artisan region:add --code=EG --code=US
```

The commands read from static JSON files shipped with the package, so seeding does not require a network connection.

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

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
[link-contributors]: ../../contributors
