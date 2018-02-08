# Deploy steps

__Nuts & bolts__ 

```
git clone https://github.com/SterlingAr/kampai.git

composer install 

cp .env.example .env

```



__Create database and change connection data in .env__

```
php artisan vendor:publish –provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
php artisan migrate
php artisan db:seed
php artisan query:nodes
php artisan index:bars
php artisan key:generate
php artisan config:cache


```
__Eventually fix permissions of storage/ folder__
