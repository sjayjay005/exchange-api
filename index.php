<?php

/**
 * exchange API V1
 *
 * @author    sjayjay005
 * @link      https://github.com/sjayjay005
 *
 */

require __DIR__ . '/vendor/autoload.php';

use App\Lib\App;
use App\Lib\Router;
use App\Lib\Request;
use App\Lib\Response;
use App\Controller\Home;
use App\Model\Currencies;

Currencies::load();

Router::get('/', function () {
    (new Home())->indexAction();
});

Router::get('/currency', function (Request $req, Response $res) {
    $res->toJSON(Currencies::all());
});

Router::post('/currency', function (Request $req, Response $res) {
    $currency = Currencies::add($req->getJSON());
    $res->status(201)->toJSON($currency);
});

Router::get('/currency/([0-9]*)', function (Request $req, Response $res) {
    $currency = Currencies::findById($req->params[0]);
    if ($currency) {
        $res->toJSON($currency);
    } else {
        $res->status(404)->toJSON(['error' => "Not Found"]);
    }
});

App::run();