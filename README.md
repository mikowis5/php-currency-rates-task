# [Rest API] Currency buy rates

![image](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

## Features

* Rest API which allows user to get average buy rate for given currency between input dates

## Requirements

* PHP 7.3 or higher
* Composer for installation

## Dependencies
* `bramus/router` used for routing
* `rakit/validation` used for request validation
* `guzzlehttp/guzzle` used to handle http requests to NBP Api

## Quick Start

#### Installation

After downloading project files, run composer installation command within root directory:
```
composer install
```

#### Starting application in dev mode

After composer finishes installing all required dependencies, start local server from `/public` directory:

```
cd public
php -S localhost:8000
```

## Available endpoints


### `[GET] /{currency}/{startDate}/{endDate}/`

Returns calculated average buy rate based on data from the National Bank of
Poland.

Params:
#### `currency` - supported currencies: USD, EUR, CHF, GBP.
#### `startDate`, `endDate` - days range to calculate average buy rates. Boundary days are included. Supported format is: YYYY-MM-DD.

***
<font size="1">Author: M. Wiśniewski <mikowis5@gmail.com></font>