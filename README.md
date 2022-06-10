<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Getting Started 

```sh
    git clone https://github.com/Arifpay-net/Laravel-sample
    cd ./Laravel-sample
```

Assuming you already installed composer and <= php8.1. run composer install

```sh
    composer install
```

## Usage 

Change `your-api-key` with your test key you created in your dashboard. [Arifpay Dashboard](https://dashboard.arifpay.net/app/api)

```php routes/api.php
... 
Route::get('/test/create', function (Request $request) {
    $arifpay = new Arifpay('your-api-key');
...
});

// and

Route::get('/test/fetch/{id}', function (Request $request) {
    $arifpay = new Arifpay('your-api-key');
 ...
});

```

## Start server

```sh

php artisan serve

```

We have provided the test collection in postman. you can [Try it now](https://documenter.getpostman.com/view/11254016/Uz5MGZbf).

The `create` route will create a test session and returns a `session id` and a `payment url`. you can then pass this id to `fetch` route and you will get the session object you created. you can also check out go to the `payment url` with browser of your choice and you will get the checkout page.

Feel free to tweak and test this sample to get familiarly with our API. And submit an issue on [github](https://github.com/Arifpay-net/laravel/issues) if you face any problem.


## More Information

- [REST API Version](https://developer.arifpay.net/docs/checkout/overview)
- [Mobile SDK](https://developer.arifpay.net/docs/clientSDK/overview)
- [Node JS](https://developer.arifpay.net/docs/nodejs/overview)
- [Laravel](https://developer.arifpay.net/docs/laravel/overview)
- [Change Log](https://developer.arifpay.net/docs/laravel/changelog)
