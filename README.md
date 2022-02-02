ติดตั้ง(ถ้าไม่มี) xampp https://www.apachefriends.org/xampp-files/8.1.2/xampp-windows-x64-8.1.2-0-VS16-installer.exe <br>
composer https://getcomposer.org/Composer-Setup.exe <br>
node.js https://nodejs.org/dist/v16.13.2/node-v16.13.2-x64.msi <br>
<br>
เปิด command line
แล้วรัน composer global update และ composer global require laravel/installer<br>
เปิด xampp ทำการ start Apache และ MySql  <br>
<br>
นำโฟลเดอร์ test ไปไว้ใน xampp/htdoc
สร้าง database ชื่อ test
ไปเปลี่ยน ชื่อไฟล์ .env.example ในโฟลเดอร์ test เป็น .env<br>
ไปยังโฟลเดอร์ test เปิด command แล้ว run <br>
composer update --no-scripts <br>
php artisan key:generate<br>
php artisan migrate และ php artisan serve <br>
