pexels-library
==============

[![Build Status](https://img.shields.io/travis/com/webeweb/pexels-library/master.svg?style=flat-square)](https://travis-ci.com/webeweb/pexels-library)
[![Coverage Status](https://img.shields.io/coveralls/webeweb/pexels-library/master.svg?style=flat-square)](https://coveralls.io/github/webeweb/pexels-library?branch=master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/quality/g/webeweb/pexels-library/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/webeweb/pexels-library/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/webeweb/pexels-library.svg?style=flat-square)](https://packagist.org/packages/webeweb/pexels-library)
[![Latest Unstable Version](https://img.shields.io/packagist/vpre/webeweb/pexels-library.svg?style=flat-square)](https://packagist.org/packages/webeweb/pexels-library)
[![License](https://img.shields.io/packagist/l/webeweb/pexels-library.svg?style=flat-square)](https://packagist.org/packages/webeweb/pexels-library)
[![composer.lock](https://img.shields.io/badge/.lock-uncommited-important.svg?style=flat-square)](https://packagist.org/packages/webeweb/pexels-library)

Integrate Pexels API with your projects.

---

## Compatibility

[![PHP](https://img.shields.io/packagist/php-v/webeweb/pexels-library.svg?style=flat-square)](http://php.net)

---

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
$ composer require webeweb/pexels-library
```

This command requires you to have Composer installed globally, as explained in
the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the
Composer documentation.

---

## Usage

Read the [documentation](doc/index.md).

---

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash
$ git clone https://github.com/webeweb/pexels-library.git
$ cd pexels-library
$ composer install
```

Once all required libraries are installed then do:

```bash
$ vendor/bin/phpunit
```

> IMPORTANT NOTICE: To test the package with your API key, edit the
> `tests/Provider/APIProviderTest.php` file to find and replace "YOUR_API_KEY".

---

## License

`pexels-library` is released under the MIT License. See the bundled [LICENSE](LICENSE)
file for details.

Please note that the Pexels API is not free for use, see their
[API page](https://www.pexels.com/api/documentation/) for details on usage.
