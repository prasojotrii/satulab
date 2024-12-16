@echo off
:loop
cd C:\xampp\php
php C:\xampp\htdocs\satulab\send_notif_email.php
timeout /t 5 /nobreak
goto loop
