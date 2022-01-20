<?php

namespace Source\Controllers\Auth;

use Source\Controllers\Controller;
use Source\Database\Entities\User;
use Source\Http\Request;
use Source\Http\Response;
use Source\Http\Router;

class RegisterController extends Controller
{
    /**
     * Exibe a tela de cadastro
     *
     * @return string
     */
    public function index()
    {
        $response = new Response(200, $this->renderView("auth.register"));
        return $response->sendResponse();
    }

    /**
     * Processa as requisições do tipo POST
     *
     * @param  Request $request
     * @param  array $params
     * @return mixed
     */
    public function registerPost(Request $request, $params)
    {
        $data = filter_var_array($request->getPostVars(), FILTER_SANITIZE_STRIPPED);

        if (in_array("", $data)) {
            echo $this->renderJsonMessage(
                "Preencha os campos necessários",
                "danger"
            );
            return;
        }

        $user         = new User();
        $user->name   = $data["name"];
        $user->email  = $data["email"];
        $user->passwd = $data["passwd"];

        if (!$user->save()) {
            echo  $this->renderJsonMessage(
                $user->error()->getMessage(),
                "danger"
            );
            return;
        }

        echo $this->renderJson([
            "redirect" => Router::getInstance()->generate("auth.register")
        ]);
        return;
    }
}
