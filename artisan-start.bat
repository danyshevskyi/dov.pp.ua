@echo off
cd /d %~dp0

powershell -WindowStyle Hidden -Command "php artisan serve"

exit
