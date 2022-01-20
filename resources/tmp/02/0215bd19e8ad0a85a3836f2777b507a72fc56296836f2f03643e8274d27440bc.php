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

/* auth/register.html */
class __TwigTemplate_e079f1da12db3c9e2087c7eff0c5c4d1a9c0bf24e2ac2fb268dc8d8105069222 extends Template
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
        $this->parent = $this->loadTemplate("_layout.html", "auth/register.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "\t<div class=\"py-5\">
\t\t<div class=\"content\">
\t\t\t<div class=\"mx-auto bg-white p-4\" style=\"max-width: 24.5rem;\">
\t\t\t\t<form action=\"\" method=\"post\" class=\"mx-auto\">
\t\t\t\t\t<div class=\"text-center mb-4\">
\t\t\t\t\t\t<h3 class=\"fw-bolder\">Crie sua conta</h3>
\t\t\t\t\t\t<p>Cadastre-se rapidamente para ter acesso ao conteúdo.</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t<label for=\"name\" class=\"form-label\">Nome completo <span>*</span></label>
\t\t\t\t\t\t<input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t<label for=\"email\" class=\"form-label\">E-mail <span>*</span></label>
\t\t\t\t\t\t<input type=\"email\" name=\"email\" id=\"email\" class=\"form-control\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t<a href=\"#\" class=\"reveal float-end\">mostrar senha</a>
\t\t\t\t\t\t<label for=\"passwd\" class=\"form-label\">Senha <span>*</span></label>
\t\t\t\t\t\t<input type=\"password\" name=\"passwd\" id=\"passwd\" class=\"form-control pwd\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"mb-3 d-grid\">
\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">Cadastrar</button>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>

\t<script>
\t\t\$(\".reveal\").mousedown(function() {
\t\t\t\$(\".pwd\").replaceWith(\$('.pwd').clone().attr('type', 'text'));
\t\t})
\t\t.mouseup(function() {
\t\t\t\$(\".pwd\").replaceWith(\$('.pwd').clone().attr('type', 'password'));
\t\t})
\t\t.mouseout(function() {
\t\t\t\$(\".pwd\").replaceWith(\$('.pwd').clone().attr('type', 'password'));
\t\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "auth/register.html";
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
        return new Source("", "auth/register.html", "C:\\wamp64\\www\\jhones_fw\\resources\\views\\auth\\register.html");
    }
}
