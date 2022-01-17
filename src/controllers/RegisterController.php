<?php

namespace Source\Controllers;

use Source\Database\Entities\User;
use Source\Http\Request;
use Source\Http\Response;

class RegisterController extends Controller
{
    public function index()
    {
        $response = new Response(200, $this->renderView("auth.register"));
        return $response->sendResponse();
    }

    public function registerPost(Request $request, $params)
    {
        $data = filter_var_array($request->getPostVars(), FILTER_SANITIZE_STRIPPED);

        if (in_array("", $data)) {
            $response = new Response(200, $this->renderJsonMessage(
                "Preencha os campos necessários",
                "danger"
            ));
            return $response->sendResponse();
        }

        $user         = new User();
        $user->name   = $data["name"];
        $user->email  = $data["email"];
        $user->passwd = $data["passwd"];

        if (!$user->save()) {
            $response = new Response(200, $this->renderJsonMessage(
                $user->error()->getMessage(),
                "danger"
            ));
            return $response->sendResponse();
        }

        $response = new Response(200, $this->renderJson([
            "redirect" => [
                "url" => "/register?created_account=true"
            ]
        ]));
        return $response->sendResponse();
    }
}
