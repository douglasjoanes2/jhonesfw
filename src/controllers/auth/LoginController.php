<?php

namespace Source\Controllers\Auth;

use Source\Controllers\Controller;
use Source\Database\Entities\User;
use Source\Http\Request;
use Source\Http\Response;
use Source\Http\Router;

class LoginController extends Controller
{
    public function index()
    {
        $response = new Response(200, $this->renderView("auth.login"));
        return $response->sendResponse();
    }

    public function loginPost(Request $request, $params)
    {
        $data   = filter_var_array($request->getPostVars(), FILTER_SANITIZE_STRIPPED);
        $email  = filter_var($data["email"], FILTER_VALIDATE_EMAIL);
        $passwd = filter_var($data["passwd"], FILTER_DEFAULT);

        if (!$email || !$passwd) {
            echo $this->renderJsonMessage(
                "Preencha os campos necessários", 
                "danger"
            );
            return;
        }

        $user = (new User())->findByEmail($email);
        if (empty($user) || !password_verify($passwd, $user->passwd)) {
            echo $this->renderJsonMessage(
                "Usuário e/ou senha inválidos", 
                "danger"
            );
            return;
        }

        $_SESSION["user"] = [
            "id"    => $user->id,
            "name"  => $user->name,
            "email" => $user->email
        ];

        echo $this->renderJson([
            "redirect" => Router::getInstance()->generate("user.dashboard")
        ]);
        return;
    }
}
