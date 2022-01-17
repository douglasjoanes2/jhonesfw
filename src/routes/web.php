<?php

$router->get("/", "MainController@index", "home");
$router->get("/oops/[i:code]", "MainController@error", "error");

$router->any("/login", "LoginController@index", "login");
$router->any("/register", "RegisterController@index", "register");
$router->any("/forgot", "RegisterController@forgot", "forgot");