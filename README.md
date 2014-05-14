# AspectMock strange error

I got a strange error below:
> PHP Fatal error:  Uncaught exception 'Exception' with message 'File "COREPATH/classes/error.php" does not contain class "Fuel\Core\Error"' in /mnt/fuelphp/fuel/core/classes/autoloader.php:395

It is very strange, because COREPATH/classes/error.php (=fuel/core/classes/error.php) contains class "Fuel\Core\Error".

The error occurs:
* CentOS 6.5(64bit) + PHP 5.5(ius)

The error does not occur:
* OS X 10.8 + MAMP 3.0.5
* Ubuntu 12.04(64bit) + PHP 5.4.21-1+debphp.org~precise+1

## How to reproduce

~~~
$ git clone --recursive https://github.com/kenjis/AspectMock-Strange-Error.git
$ cd AspectMock-Strange-Error
$ php composer.phar install
$ fuel/vendor/bin/phpunit -c fuel/app/phpunit.xml --group=AspectMock --debug
~~~

## How to reproduce with Vagrant 

Requires Vagrant and VirtualBox.

~~~
$ git clone --recursive https://github.com/kenjis/AspectMock-Strange-Error.git
$ cd AspectMock-Strange-Error
$ php composer.phar install
$ git clone --recursive https://github.com/kenjis/vagrant-fuelphp-centos6.git
$ cd vagrant-fuelphp-centos6
$ vagrant up
$ vagrant ssh
~~~

~~~
Welcome to your Vagrant-built virtual machine.
[vagrant@localhost ~]$ cd fuelphp/
[vagrant@localhost fuelphp]$ fuel/vendor/bin/phpunit -c fuel/app/phpunit.xml --group=AspectMock --debug
PHP Fatal error:  Uncaught exception 'Exception' with message 'File "COREPATH/classes/error.php" does not contain class "Fuel\Core\Error"' in /mnt/fuelphp/fuel/core/classes/autoloader.php:395
Stack trace:
#0 /mnt/fuelphp/fuel/core/classes/autoloader.php(236): Fuel\Core\Autoloader::init_class('Fuel\\Cooe\\EEror', '/mnt/fuelphp/fu...')
#1 [internal function]: Fuel\Core\Autoloader::load('Fuel\\Cooe\\EEror')
#2 [internal function]: spl_autoload_call('Fuel\\Cooe\\EEror')
#3 /mnt/fuelphp/fuel/core/classes/autoloader.php(247): class_alias('Fuel\\Cooe\\EEror', 'Error')
#4 [internal function]: Fuel\Core\Autoloader::load('Error')
#5 /mnt/fuelphp/fuel/core/bootstrap.php(73): spl_autoload_call('Error')
#6 [internal function]: PHPUnit_Util_Fileloader::{closure}()
#7 {main}
  thrown in /mnt/fuelphp/fuel/core/classes/autoloader.php on line 395
PHP Stack trace:
PHP   1. {main}() /mnt/fuelphp/fuel/vendor/phpunit/phpunit/composer/bin/phpunit:0
PHP   2. PHPUnit_TextUI_Command::main() /mnt/fuelphp/fuel/vendor/phpunit/phpunit/composer/bin/phpunit:63
PHP   3. PHPUnit_TextUI_Command->run() /mnt/fuelphp/fuel/vendor/phpunit/phpunit/PHPUnit/TextUI/Command.php:129
PHPUnit 3.7.37 by Sebastian Bergmann.

Configuration read from /mnt/fuelphp/fuel/app/phpunit.xml


Starting test 'AspectMock_Test::test'.
.

Time: 2.17 seconds, Memory: 16.50Mb

OK (1 test, 1 assertion)

Fatal error: Uncaught exception 'Exception' with message 'File "COREPATH/classes/error.php" does not contain class "Fuel\Core\Error"' in /mnt/fuelphp/fuel/core/classes/autoloader.php on line 395

Call Stack:
    0.0004     225408   1. {main}() /mnt/fuelphp/fuel/vendor/phpunit/phpunit/composer/bin/phpunit:0
    0.0386     601200   2. PHPUnit_TextUI_Command::main() /mnt/fuelphp/fuel/vendor/phpunit/phpunit/composer/bin/phpunit:63
    0.0387     601824   3. PHPUnit_TextUI_Command->run() /mnt/fuelphp/fuel/vendor/phpunit/phpunit/PHPUnit/TextUI/Command.php:129

Exception: File "COREPATH/classes/error.php" does not contain class "Fuel\Core\Error" in /mnt/fuelphp/fuel/core/classes/autoloader.php on line 395

Call Stack:
    0.0004     225408   1. {main}() /mnt/fuelphp/fuel/vendor/phpunit/phpunit/composer/bin/phpunit:0
    0.0386     601200   2. PHPUnit_TextUI_Command::main() /mnt/fuelphp/fuel/vendor/phpunit/phpunit/composer/bin/phpunit:63
    0.0387     601824   3. PHPUnit_TextUI_Command->run() /mnt/fuelphp/fuel/vendor/phpunit/phpunit/PHPUnit/TextUI/Command.php:129
    2.1713   16697552   4. PHPUnit_Util_Fileloader::{closure:/mnt/fuelphp/fuel/core/bootstrap.php:40-74}() /mnt/fuelphp/fuel/core/bootstrap.php:0
    2.1715   16698384   5. spl_autoload_call() /mnt/fuelphp/fuel/core/bootstrap.php:73
    2.1715   16698416   6. Fuel\Core\Autoloader::load() /mnt/fuelphp/fuel/core/bootstrap.php:0
    2.1725   16699760   7. class_alias() /mnt/fuelphp/fuel/core/classes/autoloader.php:247
    2.1725   16700040   8. spl_autoload_call() /mnt/fuelphp/fuel/core/classes/autoloader.php:247
    2.1725   16700088   9. Fuel\Core\Autoloader::load() /mnt/fuelphp/fuel/core/classes/autoloader.php:0
    2.1726   16700488  10. Fuel\Core\Autoloader::init_class() /mnt/fuelphp/fuel/core/classes/autoloader.php:236
~~~

