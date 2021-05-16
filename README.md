# Laravel Exceptions

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

A package to help handling exceptions which may occur in your application.

## Installation

This package supports Laravel 7 and 8 but requires **at least** PHP 7.4. 

Via Composer

``` bash
$ composer require egeatech/laravel-exceptions
```

## Usage

During the implementation of the business logic of your application, if you wish to throw an exception
simply create a new class extending `EgeaTech\LaravelExceptions\Exceptions\ApplicationException`.

After that, create a new translation file inside your `resources/lang/en/exceptions` folder:
the file must be the snake case version of the exception class name. Keep in mind that at least the 
English form is required.

Now that we're all set, the base exception class will take care of logging the exception in English given 
its translation key, leaving to the user the choice to return a translated version of the error to the client
or, otherwise, return only the exception key for further processes or custom error messages to be displayed. 

## Change log

Please see the [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Egea Tecnologie Informatiche][link-author]
- [Marco Guidolin](mailto:m.guidolin@egeatech.com)

## License

The software is licensed under MIT. Please see the [LICENSE](LICENSE.md) file for more information.

[ico-version]: https://img.shields.io/packagist/v/egeatech/laravel-exceptions.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/egeatech/laravel-exceptions.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/egeatech/laravel-exceptions
[link-downloads]: https://packagist.org/packages/egeatech/laravel-exceptions
[link-travis]: https://travis-ci.org/egeatech/laravel-exceptions
[link-author]: https://egeatech.com
