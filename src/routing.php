<?php

$routeParts = explode('/', ltrim($_SERVER['REQUEST_URI'], '/') ?: Home);
$controller = 'App\\Controller\\' . ucfirst($routeParts[0] ?? '') . 'Controller';
$method = $routeParts[1] ?? '';
$vars = array_slice($routeParts, 2);

if (class_exists('HomeController')){
    echo "exist";
}else{
    echo "no exist";
};

if (class_exists($controller) && method_exists(new $controller(), $method)) {
    echo (new $controller())->$method(...$vars);
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 - Page not found';
    exit();
}

