<?php

namespace Source\Controllers;

use Twig\Environment;
use Twig\TwigFunction;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{
    /**
     * @var App
     */
    protected $app;

    /**
     * __construct
     *
     * @param App $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Renderiza uma página HTML.
     *
     * @param  string $name
     * @param  array $vars
     * @return string
     */
    public function renderView($name, $vars = [])
    {
        $loader = new FilesystemLoader(dirname(__DIR__, 2) . "/resources/views/");
        $twig = new Environment($loader, [
            "cache" => dirname(__DIR__, 2) . "/resources/tmp/",
            "auto_reload" => true
        ]);

        $twig->registerUndefinedFunctionCallback(function ($name) {
            if (function_exists($name)) {
                return new TwigFunction($name, function () use ($name) {
                    return call_user_func_array($name, func_get_args());
                });
            }
        });

        $name = str_replace(".", "/", $name) . ".html";
        return $twig->render($name, $vars);
    }

    /**
     * Renderiza uma resposta JSON.
     *
     * @param  mixed $content
     * @return JSON
     */
    public function renderJson($content)
    {
        return json_encode($content);
    }

    /**
     * Renderiza uma resposta JSON.
     *
     * @param  string $msg
     * @param  string $type
     * @return JSON
     */
    public function renderJsonMessage($msg, $type = "success")
    {
        return $this->renderJson([
            "message" => [
                "type" => $type,
                "msg" => $msg
            ]
        ]);
    }
}
