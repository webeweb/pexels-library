pexels-library
==============

[![Github actions workflow status](https://img.shields.io/github/actions/workflow/status/webeweb/pexels-library/build.yml?style=for-the-badge&color2088FF&logo=github)](https://github.com/webeweb/pexels-library/actions)
[![Coveralls](https://img.shields.io/coveralls/github/webeweb/pexels-library/master.svg?style=for-the-badge&color=3F5767&logo=coveralls)](https://coveralls.io/github/webeweb/pexels-library?branch=master)
[![Packagist version](https://img.shields.io/packagist/v/webeweb/pexels-library.svg?style=for-the-badge&color=F28D1A&logo=packagist)](https://packagist.org/packages/webeweb/pexels-library)
[![Packagist license](https://img.shields.io/packagist/l/webeweb/pexels-library.svg?style=for-the-badge&colorF28D1A&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHN0cm9rZT0iI0ZGRiIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIHN0cm9rZS13aWR0aD0iMiIgZD0ibTMgNiAzIDFtMCAwLTMgOWE1LjAwMiA1LjAwMiAwIDAgMCA2LjAwMSAwTTYgN2wzIDlNNiA3bDYtMm02IDIgMy0xbS0zIDEtMyA5YTUuMDAyIDUuMDAyIDAgMCAwIDYuMDAxIDBNMTggN2wzIDltLTMtOS02LTJtMC0ydjJtMCAxNlY1bTAgMTZIOW0zIDBoMyIvPjwvc3ZnPg==)](./LICENSE)

Integrate Pexels API with your projects.

If you like this package, pay me a beer (or a coffee)
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-003087.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)

## Compatibility

[![PHP](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2Fwebeweb%2Fpexels-library%2Fmaster%2Fcomposer.json&query=%24.require.php&style=for-the-badge&color=777BB4&logo=php&label=PHP)](http://php.net)

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
composer require webeweb/pexels-library
```

This command requires you to have Composer installed globally, as explained in
the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the
Composer documentation.

## Usage

Read the [documentation](doc/index.md). You can also consult or execute sample
scripts into dev folder.

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash
git clone https://github.com/webeweb/pexels-library.git
cd pexels-library
composer install
```

Once all required libraries are installed then do:

```bash
vendor/bin/phpunit
```

> IMPORTANT NOTICE: To test the package with your API key, pastes it into a
> `.token` file at the root of this package.

## License

`pexels-library` is released under the MIT License. See the bundled [LICENSE](LICENSE)
file for details.

Please note that the Pexels API is not free for use, see their
[API page](https://www.pexels.com/api/documentation/) for details on usage.

## Donate

If you like this work, please consider donating at
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-003087.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)
