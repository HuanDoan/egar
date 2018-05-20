# Cài đặt server
App Egar lấy dữ liệu, thêm, xóa, sửa thông qua API (Restful API) với cơ sở dữ liệu là MySQL. Vì vậy cần phải build một server để thực hiện query data rồi trả về cho app.
Nền tảng server: PHP > 7.1.3, laravel 5.5 trở lên

## Guideline
- Cài đặt [xampp](https://www.apachefriends.org/download.html).
- Cài đặt [composer](https://getcomposer.org/), cái này giống như npm, nhưng là dành cho PHP.
- Thiết lập virtual host:
	Mở file httpd-vhosts.conf, mặc định nằm trong thư mục: C:\Xampp\apache\conf\extra\httpd-vhosts.conf
	Thêm vào cuối file:
```
<VirtualHost *:80>
	ServerName egarserver
    DocumentRoot "D:/Working/Project/egar/egar/egar-server"
    <Directory "D:/Working/Project/egar/egar/egar-server">

        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
		Require all granted
    </Directory>
</VirtualHost>
```
Trong đó: 
* **ServerName**: Là đường dẫn thay thế cho localhost, thích đặt gì đặt
*  **DocumentRoot** và Directory là nơi chứa source code (thư mục chứa file index.php)

Sau khi làm xong các bước trên, vào sửa file host của win:
C:\Windows\System32\drivers\etc\host
(nên copy file host ra đâu đó rồi mới sửa, sau đó save và copy đè vào lại)
thêm dòng
```
127.0.0.1 egarserver
```

> Nhớ thay cái *egarserver* bằng cái **ServerName** đặt mới nãy nha

Restart lại xampp là chạy được rồi.
À quên, còn phải import database nữa chớ.

Truy cập vào link:
http://localhost/phpmyadmin
Tạo 1 database với tên là egardb

cd vào thư mục egar-server, run:
```
php artisan migrate
php artisan db:seed --class=UserRoleTable
php artisan db:seed --class=UserTableSeeder
```

Sau đó vào lại phpmyadmin kiểm tra database.

### Add appications to Oauth2 Passport

Sau khi migrate database, tạo client cho oauth2.
Chạy 
```
php artisan passport:client --password
```
Nhập tên cho client. Ví dụ: Mobile app; Sau khi chạy xong xuất hiện clientID và client secrect, đây là thông tin xác thực cho API