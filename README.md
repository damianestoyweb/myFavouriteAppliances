# Environtment configuration
- Clone the repository from: https://github.com/damianestoyweb/myFavouriteAppliances on your Homestead
- Map in your host file the following fake url:
```
192.168.10.10	myfavouriteappliances.wow 
```
# Before starting application
-Execute<br/>
```php
php artisan products:get
```
This command executes the crawler responsible of webscraping, after do the job, with the resulting data, the products table in database is filled to be consulted from the application.

# Start the application
-Go to http://myfavouriteappliances.wow<br/>
Test assignment functionalities.

#Daily products update
-For application to be updated, a job has been created to be executed everyday at 02:00 am, causing 0 impact on the application behaviour.
```php
php artisan products:update
```
 