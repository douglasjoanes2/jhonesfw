<?php

/**
 * Define o fuso horário padrão para funções de data e hora.
 */
date_default_timezone_set("America/Sao_Paulo");

/**
 * Carrega o autoload do composer.
 */
require "../vendor/autoload.php";

/**
 * Carrega as variáveis de ambiente.
 */
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/**
 * Inicializa a aplicação.
 */
(new Source\App())->run();