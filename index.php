<?php

require __DIR__ . '/vendor/autoload.php';

use App\Lib\App;
use App\Lib\Router;
use App\Lib\Request;
use App\Lib\Response;

Router::get('/', function () {
    echo 'Hello API Exchange';
});

Router::get('/currency/([0-9]*)', function (Request $req, Response $res) {
    $res->toJSON([
        'currency' =>  ['id' => $req->params[0]],
        'status' => 'ok'
    ]);
});

App::run();