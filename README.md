ติดตั้ง https://www.apachefriends.org/xampp-files/8.1.2/xampp-windows-x64-8.1.2-0-VS16-installer.exe <br>
https://getcomposer.org/Composer-Setup.exe <br>
เปิด command line
แล้วรัน composer global update<br>
ทำการ start Apache และ MySql <br>
<br>
นำโฟลเดอร์ test ไปไว้ใน xammp/htdoc
สร้าง database ชื่อ test
ไปเปลี่ยน ชื่อไฟล์ .env.example ในโฟลเดอร์ test เป็น .env<br>
ไปยังโฟลเดอร์ test เปิด command แล้ว run <br>
composer global require laravel/installer <br>
php artisan key:generate<br>
php artisan migrate และ php artisan serve <br>
