<?php

use App\controller\HomeController;
use App\routing\Router;

Router::get('/', [HomeController::class, 'index']);

Router::get('/callable', function () {
	echo 'Callable funcionando!';
});

Router::get('/user/{nome}/{idade}', function ($params) {
	echo "Nome: {$params['nome']}<br>Idade: {$params['idade']}";
});
