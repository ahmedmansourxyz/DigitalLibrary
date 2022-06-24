# DigitalLibrary

## Installation requirements:
    1- PHP must be installed<br>
    2- MySQL version 8.0 has to be installed<br>
    3- Node.js must be installed -> https://nodejs.org/en/download/<br>
    4- PHP Composer must be installed <br>
    
    
## Enter these commands in the project directory:
yarn install<br>
composer require encore<br>
yarn encore dev –watch<br>
composer require symfony/orm-pack<br>
composer require --dev symfony/maker-bundle<br>
composer require symfony/runtime<br>
    
## MySQL Configuration:    
Set the root user password to “password”<br>
**or**<br>
Go to the .env file in the source code and change this line of code to your configuration:<br>
DATABASE_URL="mysql://root:password@127.0.0.1:3306/DigiLibDB?serverVersion=8.0&charset=utf8mb4"<br>
<br>
Then create a database called “DigiLibDB”<br>
<br>
## Database Migrations:
Before we migrate the database we should go to main folder of php. There should be a file as “php.ini”. Open it as text and these 2 lines has to be added to the end of the file:<br>
extension=php_pdo.dll<br>
extension=php_pdo_mysql.dll<br>
**Then run these two lines in the project directory:**
php bin/console doctrine:migrations:migrate	<br>
symfony console doctrine:fixtures:load<br>

## To start the server
symfony serve -d
