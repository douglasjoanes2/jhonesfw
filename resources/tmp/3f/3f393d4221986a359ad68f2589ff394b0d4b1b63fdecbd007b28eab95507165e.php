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

/* main/home.html */
class __TwigTemplate_646914cbd7cdafd5d51de71f472803ccf93c1561f436eeab5914d59df19ca522 extends Template
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
        $this->parent = $this->loadTemplate("_layout.html", "main/home.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "\t<!-- header -->
\t<header class=\"py-5\">
\t\t<div class=\"container px-5\">
\t\t\t<div class=\"row gx-5 justify-content-center\">
\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t<div class=\"text-center my-5\">
\t\t\t\t\t\t<h1 class=\"fw-bolder mb-2\">Jhones Framework</h1>
\t\t\t\t\t\t<p class=\"mb-4\">Estrutura base para acelerar o desenvolvimento de meus
\t\t\t\t\t\t\t                            pequenos projetos.</p>
\t\t\t\t\t\t<div class=\"d-grid gap-3 d-sm-flex justify-content-sm-center\">
\t\t\t\t\t\t\t<a class=\"btn btn-primary px-4\" href=\"#\">Código fonte no github</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</header>
\t<!-- end header -->
";
    }

    public function getTemplateName()
    {
        return "main/home.html";
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
        return new Source("", "main/home.html", "C:\\wamp64\\www\\jhones_fw\\resources\\views\\main\\home.html");
    }
}
