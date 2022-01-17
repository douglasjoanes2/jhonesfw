<?php

namespace Source;

use Source\Http\Router;
use Source\Http\Request;

class App
{
    /**
     * @var Router
     */
    protected $router;
    
    /**
     * @var string
     */
    protected $routeName = "";

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var string
     */
    protected $error;

    /**
     * @const int
     */
    protected const BAD_REQUEST = 400;

    /**
     * @const int
     */
    protected const NOT_FOUND = 404;

    /**
     * @const int
     */
    protected const METHOD_NOT_ALLOWED = 405;

    /**
     * __construct
     */
    public function __construct()
    {
        $this->router  = Router::getInstance();
        $this->request = new Request();
    }

    /**
     * Fornece as rotas da aplicação.
     *
     * @return void
     */
    private function RoutesProvider()
    {
        $this->router->group([
            "namespace" => "Source\\Controllers"
        ], function ($router) {
            require "../src/routes/web.php";
        });
    }

    /**
     * Gerencia os recursos da aplicação.
     *
     * @return bool
     */
    private function dispath()
    {
        if (($match = $this->router->match())) {
            extract($match);

            $this->routeName = $match["name"];

            if (is_callable($target)) {
                call_user_func_array($target, [$this->request, $params]);
                return true;
            } elseif (is_string($target)) {

                if (!!strpos($target, "@") !== false) {
                    list($controller, $action) = explode("@", $target, 2);

                    $rc = new \ReflectionClass($controller);
                    if ($rc->isInstantiable() && $rc->hasMethod($action)) {
                        call_user_func_array([new $controller($this), $action], [$this->request, $params]);
                        return true;
                    }
                    $this->error = self::METHOD_NOT_ALLOWED;
                    return false;
                }
            }
            $this->error = self::BAD_REQUEST;
            return false;
        }
        $this->error = self::NOT_FOUND;
        return false;
    }

    /**
     * Executa a aplicação.
     *
     * @return void
     */
    public function run()
    {
        $this->RoutesProvider();

        if (!$this->dispath()) {
            header("location: " . $this->router->generate("error", ["code" => $this->error]));
            exit;
        }
    }
}
