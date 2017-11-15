# Forum-Advanced
This is built on Laravel Framework 5.5. This was built for demonstrate purpose.

## Installation

Clone the repository-
```
https://github.com/MirShaon/Blog-laravel.git
```

Then cd into the folder with this command-
```
cd Blog-laravel
```

Then do a composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `blog` and then do a database migration using this command-
```
php artisan migrate
```


```
php artisan db:seed
```


At last generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```



Then go to `http://localhost:8000` from your browser and see the app.



## Ask a question?

If you have any query please contact at mosraki@gmail.com

## Screenshot

![Forum Page](/screenshots/1.png)
![Forum Page](/screenshots/2.png)
![Forum ](/screenshots/3.PNG)
![Forum](/screenshots/4.png)
![Forum](/screenshots/5.png)
![Forum](/screenshots/6.png)
![Home page](/screenshots/home.png)
![Register Page](/screenshots/register.png)


