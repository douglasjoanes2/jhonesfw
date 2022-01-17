<?php

namespace Source\Controllers;

use Source\Http\Request;
use Source\Http\Response;

class MainController extends Controller
{
    public function index(Request $request, $params)
    {
        $response = new Response(200, $this->renderView("main.home"));
        return $response->sendResponse();
    }

    public function error(Request $request, $params)
    {
        $response = new Response($params["code"], $this->renderView("main.error"));
        return $response->sendResponse();
    }
}
