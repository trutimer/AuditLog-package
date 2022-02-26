# Audit Log package

[![Latest Version](https://img.shields.io/github/release/trutimer/AuditLog-package?style=flat-square)](https://github.com/trutimer/AuditLog-package/releases)
[![Issues](https://img.shields.io/github/issues/trutimer/AuditLog-package?style=flat-square)](https://github.com/trutimer/AuditLog-package/issues)
[![License](https://poser.pugx.org/eddytim/auditlog/license.svg)](https://packagist.org/packages/eddytim/auditlog)

### Library for inserting and fetching audit logs easily and sending alert to user

## Installation

The Audit Log Service Provider can be installed via [Composer](http://getcomposer.org) by requiring the
`eddytim/auditlog` package and setting the `minimum-stability` to `dev` (required for Laravel 5) in your
project's `composer.json`.

```json
{
    "require": {
        "laravel/framework": "5.0.*",
        "eddytim/auditlog": "^1.0.0"
    },
    "minimum-stability": "dev"
}
```

or

Require this package with composer:
```
composer require eddytim/auditlog
```

Update your packages with ```composer update``` or install with ```composer install```.

## Migration
You need to run migration in order to prepare the table(s) needed for the logs. Run a migration:
``$ php artisan migrate``

## Configuration

To insert an email address to send alert, publish config.

```$ php artisan vendor:publish --provider="Eddytim\Auditlog\AuditLogServiceProvider"```

`config/audit.php`

```php
return [
    'send_email_to'   => '',
];
```
## Example Usage
### Default without alert on the log
```php
    $log = AuditLog::store([
            'event_status' => 'SUCCESS',
            'event_type' => 'Update',
            'user_id' => Auth::id(),
            'description' => 'Changing user name from (old value) to (new value)',
            'table_name' => null, // insert a table name if you will want to track affected table
            'row_id' => null // insert table row id if you will want to track specific affected record
        ]);
```

### With alert on the log
```php
// Make sure you have your mail configured and published the vendor so as to specify an email address
    $log = AuditLog::store([
            'event_status' => 'SUCCESS',
            'event_type' => 'Update',
            'user_id' => Auth::id(),
            'description' => 'Changing user name from (old value) to (new value)',
            'table_name' => null, // insert a table name if you will want to track affected table
            'row_id' => null // insert table row id if you will want to track specific affected record
        ], 'This is a message to alert you on the changes');
```
