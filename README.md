# vicitech CMS

Đầu tiên hãy thêm package slugable
https://github.com/cviebrock/eloquent-sluggable
Và Intervention/Image
http://image.intervention.io/getting_started/installation

Cài đăt package VICITECH CMS
composer require vicitech/vici-cms:dev-master
thêm đoạn code sau vào config/app.php
VICITECH\ViciCMS\VicitechServiceProvider::class,
chạy lệnh :php artisan vendor:publish
chạy migrate
php artisan migrate
sau đó vào http://localhost:8000/admin/product và hưởng thụ ^^


