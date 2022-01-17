<?php

namespace Source\Http;

use AltoRouter;

class Router extends AltoRouter
{
    use RouterGroup;

    /**
     * @var Router
     */
    protected static $instance;
    
    /**
     * Singleton instance.
     *
     * @return Router
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Adiciona um rota do tipo GET.
     *
     * @param  string $route
     * @param  mixed $target
     * @param  string $name
     * @return void
     */
    public function get($route, $target, $name = null)
    {
        $this->map("GET", $route, $target, $name);
    }

    /**
     * Adiciona um rota do tipo POST.
     *
     * @param  string $route
     * @param  mixed $target
     * @param  string $name
     * @return void
     */
    public function post($route, $target, $name = null)
    {
        $this->map("POST", $route, $target, $name);
    }

    /**
     * Adiciona uma rota genérica.
     *
     * @param  string $route
     * @param  mixed $target
     * @param  string $name
     * @return void
     */
    public function any($route, $target, $name = null)
    {
        $this->map("GET|POST|PUT|DELETE", $route, $target, $name);
    }

    /**
     * Adiciona uma rota.
     *
     * @param  string $method
     * @param  string $route
     * @param  mixed $target
     * @param  string $name
     * @return void
     */
    public function map($method, $route, $target, $name = null, $middlewares = [])
    {
        $attributes = null;
        if ($this->hasGroupStack()) {
            $attributes = $this->mergeWithLastGroup([]);
        }

        if (isset($attributes) && is_array($attributes)) {
            if (isset($attributes["prefix"])) {
                $route = "/" . trim($attributes["prefix"], "/") . $route;
            }

            if (!empty($name) && isset($attributes["as"])) {
                $name = trim($attributes["as"], ".") . "." . trim($name, ".");
            }

            if (isset($attributes["namespace"]) && is_string($target)) {
                $target = trim($attributes["namespace"], "\\") . "\\" . $target;
            }
        }

        parent::map($method, $route, $target, $name);
    }
}
