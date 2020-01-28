<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Cms;
use Engine\DI\DI;

// Конструкция для работы с иключениями
try {
    // Dependency injection - записую в переменную di экземаляр класса DI
    $di = new DI();

    $services = require __DIR__ . '/Config/Service.php';

    // инициализация сервисов
    foreach ($services as $service)
    {
        $provider = new $service($di);
        $provider->init();
    }

    // добавляем все зависимости di контейнера и они сразу попадут в нашу CMS
    $cms = new Cms($di);
    $cms->run();

} catch (\ErrorException $e) {
    echo $e->getMessage();
}