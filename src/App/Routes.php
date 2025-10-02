<?php

declare(strict_types=1);

// auth admin dan staff
$app->get('/', 'App\Controller\HomeController:index');
$app->post('/login', 'App\Controller\AuthController:login');
$app->post('/register', 'App\Controller\AuthController:register');
$app->get('/tes', 'App\Controller\TestController:index');
$app->get('/hewan', 'App\Controller\HewanController:index');