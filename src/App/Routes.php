<?php

declare(strict_types=1);

// auth admin dan staff
$app->get('/', 'App\Controller\HomeController:index');
$app->post('/login', 'App\Controller\AuthController:login');
$app->post('/register', 'App\Controller\AuthController:register');
$app->get('/tes', 'App\Controller\TestController:index');

$app->get('/animal', 'App\Controller\AnimalController:index');
$app->post('/animal', 'App\Controller\AnimalController:store');
$app->put('/animal/{id}', 'App\Controller\AnimalController:update');
$app->delete('/animal/{id}', 'App\Controller\AnimalController:destroy');

$app->get('/category', 'App\Controller\CategoryController:index');
$app->post('/category', 'App\Controller\CategoryController:store');
$app->put('/category/{id}', 'App\Controller\CategoryController:update');
$app->delete('/category/{id}', 'App\Controller\CategoryController:destroy');

$app->get('/ac', 'App\Controller\AnimalCategoryController:index');
$app->post('/ac', 'App\Controller\AnimalCategoryController:store');
$app->put('/ac/{id}', 'App\Controller\AnimalCategoryController:update');
$app->delete('/ac/{id}', 'App\Controller\AnimalCategoryController:destroy');
