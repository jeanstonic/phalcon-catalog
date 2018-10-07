<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

// Определяем некоторые константы с абсолютными путями
// для использования с локальными ресурасами
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

// Регистрируем автозагрузчик
$loader = new Loader();

$loader->registerDirs(
    [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
    ]
);

$loader->register();

// Создаём контейнер DI
$di = new FactoryDefault();

// астраиваем компонент представлений
$di->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        return $view;
    }
);

// Setup a base URI
$di->set(
    'url',
    function () {
        $url = new UrlProvider();
        $url->setBaseUri('//localhost/phalcon-catalog/');
        return $url;
    }
);

$di['db'] = function() {
    return new DbAdapter(array(
        "host"     => "localhost",
        "username" => "root",
        "password" => "",
        "dbname"   => "ph1"
    ));
};


$application = new Application($di);

try {
    // Handle the request
    $response = $application->handle();

    $response->send();
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
} 
