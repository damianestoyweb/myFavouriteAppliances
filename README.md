# Environtment configuration
- Clone the repository from: https://github.com/damianestoyweb/myFavouriteAppliances on your Homestead
- Map in your host file the following fake url:
```
192.168.10.10	myfavouriteappliances.wow 
```
# Before starting application
- Rename .env.example to .env
- Run<br/>
```php
composer install
```

```php
npm or yarn install
```

```php
npm run dev
```
For scss and js code to be compiled

# Database setup
- Execute<br/>
```php
php artisan migrate
```

```php
composer dump-autoload
```

```php
php artisan db:seed
```
To populate database.<br/>

Now you have two users to test the application:<br/>
```
german@square1.io	12345 
```
And<br/>
```
luci@square1.io 	12345 
```

- Finally, execute<br/>
```php
php artisan products:get
```
This command triggers the crawler for data retriving through webscraping.

# Start the application
- Go to http://myfavouriteappliances.wow<br/>
Test assignment functionalities.

# Daily products update
- For application to be updated, a job has been created to be executed everyday at 02:00 am, causing 0 impact on the application behaviour.
```php
php artisan products:update
```
 