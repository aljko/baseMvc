<?php

$routeParts = explode('/', ltrim($_SERVER['REQUEST_URI'], '/') ?: Home);
$controller = 'App\Controller\\' . ucfirst($routeParts[0] ?? '') . 'Controller';
$method = $routeParts[1] ?? '';
$vars = array_slice($routeParts, 2);

echo '<pre>'; var_dump($routeParts); echo '</pre>';
echo '------------------------------------------';
echo '<p>$controller : '.$controller.'</p>';
echo '<p>$method : '.$method.'</p>';
echo '<p>$vars : '.$vars.'</p>';


if (class_exists($controller) && method_exists(new $controller(), $method)) {
    echo call_user_func_array([new $controller(), $method], $vars);
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 - Page not found';
    exit();
}

