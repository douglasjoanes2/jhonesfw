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

/* auth/login.html */
class __TwigTemplate_d2af1dd017a7700bdbad26df2d03939212f19e2e0610a2a0d22923c7eefebe16 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "_layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout.html", "auth/login.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "\t<div class=\"py-5\">
\t\t<div class=\"content px-5\">
\t\t\t<div class=\"mx-auto bg-white p-4\" style=\"max-width: 24.5rem;\">
\t\t\t\t<form action=\"\" method=\"post\">
\t\t\t\t\t<div class=\"text-center mb-4\">
\t\t\t\t\t\t<h3 class=\"fw-bolder\">Acesse sua conta</h3>
\t\t\t\t\t\t<p>Olá! Identifique-se para acessar sua conta.</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t<label for=\"email\" class=\"form-label\">E-mail <span>*</span></label>
\t\t\t\t\t\t<input type=\"email\" name=\"email\" id=\"email\" class=\"form-control\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t<a href=\"#\" class=\"float-end\">esqueceu a senha?</a>
\t\t\t\t\t\t<label for=\"passwd\" class=\"form-label\">Senha <span>*</span></label>
\t\t\t\t\t\t<input type=\"password\" name=\"passwd\" id=\"passwd\" class=\"form-control\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t<div class=\"form-check\">
\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"remember\" id=\"remember\" class=\"form-check-input\">
\t\t\t\t\t\t\t<label for=\"remember\" class=\"form-check-label\">Mantenha-me conectado.</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"mb-3 d-grid\">
\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">Entrar</button>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "auth/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "auth/login.html", "C:\\wamp64\\www\\jhones_fw\\resources\\views\\auth\\login.html");
    }
}
