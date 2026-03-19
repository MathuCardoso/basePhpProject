<?php

use App\controllers\HomeController;
use Core\router\Router;

Router::get('/', [HomeController::class, 'index']);

Router::get('/callable', function () {
	echo 'Callable funcionando!';
});

Router::get('/user/{nome}/{idade}', function ($params) {
	echo "Nome: {$params['nome']}<br>Idade: {$params['idade']}";
});

//COMO ENVIAR REQUISIÇÕES PUT E DELETE:
// <form action="" method="POST">
/* <?= put() ?> 
*/

//ou

// <form action="" method="POST">
/* <?= method(PUT) ?> */
//O mesmo se aplica para o método DELETE.