# Assignment
Create a new website, MyFavouriteAppliances.wow. 
On this website our users will be able to see a variety of home appliances, creating a wishlist of their favourite ones which can be shared with friends. 
The application will use another of our sites as a primary data source - AppliancesDelivered.ie. Our new site should contain products from both the small appliances 
(https://www.appliancesdelivered.ie/search/small-appliances?sort=price_desc) and dishwasher (https://www.appliancesdelivered.ie/dishwashers) categories on site. Users will be able to see the data for these products presented in a clean and attractive format, regardless of the device they're using to view the site. Users can order the data by title or price. 
When on the site, a user can create an account to save their favourite appliances to their wishlist. Their wishlist can then be shared with other friends. Their friends may not like the appliances the user has selected, so the user may also need to quickly remove items from their wishlist! 


# Environtment configuration
- Clone the repository from: https://github.com/damianestoyweb/web-crawler on your Homestead
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
 
