sfphp.org
=========

The code that will be what runs sfphp.org


Install
-------

```
git clone git@github.com:sfphp/sfphp.org
cd sfphp.org
php -r "readfile('https://getcomposer.org/installer');" | php
./composer.phar install
cp config/autoload/local.php.dist config/autoload/local.php
```