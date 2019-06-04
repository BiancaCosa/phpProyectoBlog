<?php

namespace App;


class RouterManager{
    public function dispatch(string $requestMEthod, string $requestUri, \FastRoute\Dispatcher $dispatcher)
    {
        $route = $dispatcher->dispatch($requestMethod, $requestUri);
        switch($route[0]){
            case \FastRoute\Dispatcher::NOT_FOUND:
                header("HTTP/1.0 404 Not Found");
                echo "<h1>NOT FOUND</h1>";
                break;
        
        case \FastRoute\Dispatcher::FOUND:
            $data =$route[1];
            $controller = $data[1];
            $method= $data[1];
            $objController = new $controller();
            $objController->$method();
            break;

        case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            header("HTTP/1.0 405 Method Not Allowed");
            echo "<h1>METHOD NOT ALLOWED</h1>";
            break;
        }

    }
}