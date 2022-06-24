# DigitalLibrary

##Installation requirements:
    1- PHP must be installed
    2- MySQL version 8.0 has to be installed
    3- Node.js must be installed -> https://nodejs.org/en/download/
    4- PHP Composer must be installed 
    
    
##Enter these commands in the project directory:
yarn install
composer require encore
yarn encore dev –watch
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
composer require symfony/runtime
    
##MySQL Configuration:    
Set the root user password to “password”
**or**
Go to the .env file in the source code and change this line of code to your configuration:
DATABASE_URL="mysql://root:password@127.0.0.1:3306/DigiLibDB?serverVersion=8.0&charset=utf8mb4"

Then create a database called “DigiLibDB”

##Database Migrations:
Before we migrate the database we should go to main folder of php. There should be a file as “php.ini”. Open it as text and these 2 lines has to be added to the end of the file:
extension=php_pdo.dll
extension=php_pdo_mysql.dll
**Then run these two lines in the project directory:**
php bin/console doctrine:migrations:migrate	
symfony console doctrine:fixtures:load

##To start the server
symfony serve -d
