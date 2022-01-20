<?php

/**
 * Rotas principais
 */
$router->get("/", "MainController@index", "home");
$router->get("/oops/[i:code]", "MainController@error", "error");

/**
 * Rotas de autenticação
 */
$router->group([
    "namespace" => "\\Source\\Controllers\\Auth",
    "prefix"    => "auth",
    "as"        => "auth"
], function ($router) {
    $router->get("/login", "LoginController@index", "login");
    $router->post("/login", "LoginController@loginPost");

    $router->get("/register", "RegisterController@index", "register");
    $router->post("/register", "RegisterController@registerPost");

    $router->get("/forgot", "ForgotController@index", "forgot");
    $router->post("/forgot", "ForgotController@forgotPost");
});
