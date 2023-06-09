## About Kapi


## Installation
```shell
composer require trykapi/kapi-php
```

## Usage

```php
$kapi = new KapiClient([
    'api_key' => 'YOUR_API_KEY',
]);

// list of users
$users = $kapi->users->index([
    'filter' => [
        'first_name' => 'Alexander',
    ],
    'sort' => '-first_name',
]);

//get user by id
$user = $kapi->users->show(1, [
    'include' => 'invitationStatus'
]);


use Kapi\KapiSdk\Exception\ValidationException;

try {
    $result = $kapi->users->store([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@trykapi.com',
    ]);
} catch (ValidationException $e) {
    $errors = $e->getData();
}


```
