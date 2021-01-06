Oyindonesia-PHP
===============


[Oyindonesia](https://github.com/reactmore) :heart: PHP!

This is the Unofficial PHP wrapper/library for Oyindonesia Payment API, that is compatible with Composer. Visit [https://api-docs.oyindonesia.com/](https://api-docs.oyindonesia.com/) for more information about the product and see documentation at [https://api-docs.oyindonesia.com/](https://api-docs.oyindonesia.com/) for more technical details.

## 1. Installation

### 1.a Composer Installation

If you are using [Composer](https://getcomposer.org), you can install via composer CLI:

```
composer require reactmore/oyindonesia-php
```

**or**

add this require line to your `composer.json` file:

```json
{
    "require": {
        "reactmore/oyindonesia-php": "*"
    }
}
```

and run `composer install` on your terminal.

## 2. Use

### 1.Set Configuration and Use Get

```php
// load vendor 
require_once "vendor/autoload.php";


// load Configurations
$params = [
    'apikey' => 'api_key_here',
    'username' => 'username_here',
    'production' => false,
];

\Oyindonesia\Config::Configurations($params);

 /**
  * Send GET request to Check Balance
  */
$result = \Oyindonesia\Accountinquiry::balance();

echo '<pre>';
var_dump($result);
echo '</pre>';
```
### 2.Set Configuration and Use Post
```php
// load vendor 
require_once "vendor/autoload.php";

// load Configurations
$params = [
    'apikey' => 'api_key_here',
    'username' => 'username_here',
    'production' => false,
];

\Oyindonesia\Config::Configurations($params);

$data = array(
"bank_code" => "014",
"account_number" => "1239812390"
);
$result = \Oyindonesia\Accountinquiry::getAccountinquiry($data);

echo '<pre>';
var_dump($result);
echo '</pre>';
```

## 3. Method

### Configure the client
For the request params and responses please refer https://api-docs.oyindonesia.com/

```php
$params = [
    'apikey' => 'api_key_here',
    'username' => 'username_here',
    'production' => false,
];

Config::Configurations($params);
```

### Methods

Get account details
```php
Accountinquiry::getAccountinquiry($params)
```
Get account balance
```php
Accountinquiry::balance()
```
ON PROGRESS