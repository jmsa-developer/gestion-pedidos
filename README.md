<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template With Hexagonal Estructure</h1>
    <br>
</p>


DIRECTORY STRUCTURE
-------------------

      src/                                   contains the application source code
      src/Application/                       contains the services of the application
      src/Domain/                            contains the business logic of the application
      src/Infrastructure/                    contains the in and out of the application
      src/Infrastructure/assets/             contains assets definition
      src/Infrastructure/controllers/        contains Web controller classes
      src/Infrastructure/mail/               contains view files for e-mails
      src/Infrastructure/models/             contains model classes
      src/Infrastructure/views/              contains view files for the Web application
      config/                                contains application configurations
      runtime/                               contains files generated during runtime
      tests/                                 contains tests for the application
      vendor/                                contains dependent 3rd-party packages
      web/                                   contains the entry script and Web resources

REQUIREMENTS
------------

The requirement by this project template that your Web server supports PHP 7.4.


INSTALLATION
------------

### Install

Clone the repository

~~~
git clone https://github.com/jmsa-developer/gestion-pedidos.git
~~~

CONFIGURATION
-------------

### Database

Create database for development and testing 

Edit the file `config/db.php` and `config\test_db` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Install dependencies with Composer

    ```
    composer install  
    ```

**Note**
if you have problems with dependencies, try to update all dependencies with the following command
   ```
   composer update --with-all-dependencies
   ```
Apply migrations
   ```
   .\yii migrate
   ```

Start web server:

    ```
    .\yii serve
    ```

Now you should be able to access the application through the following URL:

~~~
http://localhost:8080/
~~~


CREDENTIALS
-----------

~~~
username: admin
password: admin
~~~


TESTING
-------

Tests are located in `tests` directory. They are developed
with PHPUnit

Tests can be executed by running

```
php .\vendor\bin\phpunit tests
```
