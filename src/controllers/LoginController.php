<?php

namespace Source\Controllers;

use Source\Http\Request;
use Source\Http\Response;

class LoginController extends Controller
{
    public function index(Request $request, $params)
    {
        $data = filter_var_array($request->getPostVars(), FILTER_SANITIZE_STRIPPED);
        
        switch ("") {
            case "loginPost":
                echo "login post";
                break;
            default:
                $response = new Response(200, $this->renderView("auth.login"));
                return $response->sendResponse();
                break;
        }
    }
}
