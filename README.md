## Overview

A custom Laravel Nova field to handle phone numbers. This field automatically formats phone numbers as the user types, supports country-based formatting, and allows international formatting.

## Installation

Install the package via Composer:
```shell
composer require bocanhcam/phone
```

## Usage

### Usage
Add the phone field to your Nova resource:

```php
\Bocanhcam\NovaPhone\Phone::make(__('Phone'), 'phone')
```

### Specify the country and display format
By default, the field uses the US as the country and national formatting.

Override the default format like below.

```php
\Bocanhcam\NovaPhone\Phone::make(__('Phone'), 'phone')
    ->country('JP') // Format for Japan
    ->international() // Display as international number
```

### Powered by `libphonenumber-js`
For more details on libphonenumber-js, check out their [documentation](https://gitlab.com/catamphetamine/libphonenumber-js).

## License
This package is open-sourced software licensed under the [MIT license](https://opensource.org/license/MIT).
