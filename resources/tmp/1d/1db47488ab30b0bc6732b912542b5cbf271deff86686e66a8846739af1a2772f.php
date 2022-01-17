<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* _layout.html */
class __TwigTemplate_2d85b3ed6c5b34aa9478d541544a36710211f8f5312a623bdc4ecb24e7248ff0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pt-br\">

<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Document</title>
    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"/favicon-32x32.png\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/main.css\">
    <script src=\"/assets/js/jquery.js\"></script>
</head>

<body class=\"loading\">
<div class=\"ajax_load\"></div>

    <!-- navbar -->
    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
        <div class=\"container px-5\">
            <a class=\"navbar-brand\" href=\"/\">Jhones Framework</a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\"
                data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\"
                aria-label=\"Toggle navigation\"><span class=\"navbar-toggler-icon\"></span></button>
            <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
                <ul class=\"navbar-nav ms-auto mb-2 mb-lg-0\">
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"/login\">Login</a></li>
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"/register\">Cadastro</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    ";
        // line 36
        $this->displayBlock("content", $context, $blocks);
        echo "

    <!-- footer -->
    <footer class=\"py-5\">
        <div class=\"container px-5\">
            <p class=\"m-0\">&copy; Copyright 2022 - Desenvolvido por: Douglas S Joanes</p>
        </div>
    </footer>
    <!-- end footer -->

    <!-- scripts -->
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js\"></script>
</body>

</html>";
    }

    public function getTemplateName()
    {
        return "_layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 36,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_layout.html", "C:\\wamp64\\www\\jhones_fw\\resources\\views\\_layout.html");
    }
}
