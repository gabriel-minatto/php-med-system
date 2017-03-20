# Simple PHP-CRUD Application

### You Will Need Installed

* PHP
* MySQL
* Apache2

## For Ubuntu/Debian

### Apache2
    apt-get update
    apt-get install -y apache2
    a2enmod rewrite
    update-rc.d apache2 enable
    service apache2 reload
### MySQL
    apt-get update
    apt-get -y install mysql-client mysql-server
    
Then, you need import to your mysql-server a db-dump located in the folder "db_dump" inside the project to finish your database configuration.
### PHP
    add-apt-repository -y ppa:ondrej/php5-oldstable
    apt-get update
    apt-get -y install php5 php5-mysql curl libcurl3 libcurl3-dev php5-curl
    service apache2 reload

After that, put the "php-med-system" folder inside the "/var/www/html" (if your apache2 still remains in the default's) and access the page typing "localhost/crud-simples-php" at your host machine.

## For Windows

The best way to code simulating a LAMP environment on Windows is installing the [XAMPP](https://www.apachefriends.org/pt_br/index.html)
application.

After that, put the "php-med-system" folder inside the "xampp/htdocs" folder (if your XAMPP still remains in the default's) and access the page typing "localhost/php-med-system" at your host machine.