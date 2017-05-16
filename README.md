# User Profile
Small laravel project to show some CRUD operations on an user
- Show user details
- Modify an user
- Upload a picture
- Delete an user

## Installation
```
# Clone
$ git clone https://github.com/tblancog/crud

# Enter project
$ cd crud
```

## Configuration
Rename env.example file to .env and change mysql database settings:
```
DB_CONNECTION=mysql
DB_HOST= <your_host>
DB_PORT=3306
DB_DATABASE= <your_database_name>
DB_USERNAME= <database_username>
DB_PASSWORD= <database_password>
```

```
# Install composer dependencies
$ composer install

# Migrate and seed the database, it will populate with 10 user records
$ php artisan migrate:refresh --seed

# Start the server
$ php artisan serve
```

## Usage
Just use a tool like Postman to make REST API calls, or use curl in your terminal
The examples above will be using curl.

### List users
```
curl --request GET \
  --url http://localhost:8000/api/user \
  --header 'cache-control: no-cache' \
  --header 'content-type: application/x-www-form-urlencoded' \
```
### Show user
```
curl --request PUT \
  --url http://localhost:8000/api/user/5 \
  --header 'cache-control: no-cache' \
  --header 'content-type: application/json' \
  --data '{\n  "name": "My Name",\n  "email": "username@email.com"\n}'
```

### Delete user
```
curl --request DELETE \
  --url http://localhost:8000/api/user/2 \
  --header 'cache-control: no-cache'
```

### Upload an image
```
curl --request POST \
  --url http://localhost:8000/api/user/10/upload \
  --header 'cache-control: no-cache' \
  --header 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' \
  --form 'image=@my-profile-image.png'
```

## Running Tests
```
$ ./vendor/bin/phpunit
```
