<?php

namespace App\Test;

use App\Lib\Router;

use function Eloquent\Phony\stub;

describe("App\\Lib\\Router", function () {
    describe("->get", function () {

        it("match regex and execute the callback", function () {
            // Mock Request
            $_SERVER['REQUEST_METHOD'] = 'GET';
            $_SERVER['REQUEST_URI'] = '/currency';

            $stub = stub(function () { });
            Router::get('/currency', $stub);

            $stub->called();
        });


        it("shouldn't execute the callback if not GET request method", function () {
            // Mock Request
            $_SERVER['REQUEST_METHOD'] = 'POST';
            $_SERVER['REQUEST_URI'] = '/currency';

            $stub = stub(function () { });
            Router::get('/currency', $stub);

            expect($stub->checkCalled())->to->be->null();
        });

        it("match regex and get params", function () {
            // Mock Request
            $_SERVER['REQUEST_METHOD'] = 'GET';
            $_SERVER['REQUEST_URI'] = '/currency/12';

            $stub = stub(function ($req) { });
            Router::get('/currency/([0-9]*)', $stub);

            $stub->called();
            $req = $stub->firstCall()->argument();
            expect($req->params[0])->to->be->equal("12");
        });
    });

    describe("->post", function () {

        it("match regex and execute the callback", function () {
            // Mock Request
            $_SERVER['REQUEST_METHOD'] = 'POST';
            $_SERVER['REQUEST_URI'] = '/currency';

            $stub = stub(function () { });
            Router::post('/currency', $stub);

            $stub->called();
        });

        it("shouldn't execute the callback if not POST request method", function () {
            // Mock Request
            $_SERVER['REQUEST_METHOD'] = 'GET';
            $_SERVER['REQUEST_URI'] = '/currency';

            $stub = stub(function () { });
            Router::post('/currency', $stub);

            expect($stub->checkCalled())->to->be->null();
        });
    });
});