### Laravel test

#### Clone this repo
```
git clone https://github.com/samironbarai/laravel-api-sanctum.git
```

#### Install dependency
```
$ cd laravel-api-sanctum
$ composer install
```

#### Setup .env file
```
1. make a copy of .env.example and rename to .env

2. next generate the key
$ php artisan key:generate

3. put database credentials in .env file
4. Change QUEUE_CONNECTION sync to database
```

#### Migrate database
```
$ php artisan migrate
```

#### Create storage link
```
$ php artisan storage:link
```

#### Mail setup
```
visit at : https://mailtrap.io/
put mail credentials in .env file
```

#### Start server
```
$ php artisan serve
```

#### Start queue worker
```
$ php artisan queue:work
```

#### Test API
```
PUBLIC ROUTES
POST   /api/login
@body: email, password

POST   /api/register
@body: name, email, password, password_confirmation

PROTECTED ROUTES WITH Bearer token
POST   /api/send
@body: email, subject, body, attachments

GET   /api/list
```
