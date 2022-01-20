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

\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>Document</title>
\t\t<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"/favicon-32x32.png\">
\t\t<!-- styles -->
\t\t<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css\">
\t\t<link rel=\"stylesheet\" href=\"/assets/css/bootstrap.css\">
\t\t<link rel=\"stylesheet\" href=\"/assets/css/main.css\">
\t\t<!-- scripts -->
\t\t<script src=\"/assets/js/jquery.min.js\"></script>
\t\t<script src=\"/assets/js/pace.min.js\"></script>
\t</head>

\t<body class=\"loading\">
\t\t<div class=\"ajax_load\"></div>

\t\t<!-- navbar -->
\t\t<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
\t\t\t<div class=\"container px-5\">
\t\t\t\t<a class=\"navbar-brand\" href=\"/\">Jhones Framework</a>
\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t</button>
\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
\t\t\t\t\t<ul class=\"navbar-nav ms-auto mb-2 mb-lg-0\">
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/auth/login\">Login</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/auth/register\">Cadastro</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</nav>
\t\t<!-- end navbar -->

\t\t";
        // line 43
        $this->displayBlock("content", $context, $blocks);
        echo "

\t\t<!-- footer -->
\t\t<footer class=\"py-5\">
\t\t\t<div class=\"container px-5\">
\t\t\t\t<p class=\"m-0\">&copy; Copyright 2022 - Desenvolvido por: Douglas S Joanes</p>
\t\t\t</div>
\t\t</footer>
\t\t<!-- end footer -->

\t\t<!-- scripts -->
\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js\"></script>
\t</body>

</html>
";
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
        return array (  81 => 43,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_layout.html", "C:\\wamp64\\www\\jhones_fw\\resources\\views\\_layout.html");
    }
}
