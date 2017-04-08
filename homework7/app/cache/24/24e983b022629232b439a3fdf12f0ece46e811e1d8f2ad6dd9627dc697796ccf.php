<?php

/* layout.twig */
class __TwigTemplate_498d94dfe9b7b818f7f39ef404750a80da8cadc88d7fd8d506e1d6e2717930bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'message' => array($this, 'block_message'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\"/>
    <title>";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["layout"] ?? null), "title", array()), "html", null, true);
        echo "</title>
    <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["layout"] ?? null), "homeDir", array()), "html", null, true);
        echo "assets/template/css/bootstrap.css\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["layout"] ?? null), "homeDir", array()), "html", null, true);
        echo "assets/template/css/bootstrap-theme.css\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["layout"] ?? null), "homeDir", array()), "html", null, true);
        echo "assets/template/css/hw52.css\"/>
</head>
<body>

";
        // line 12
        $this->loadTemplate("navbar.twig", "layout.twig", 12)->display($context);
        // line 13
        echo "
<div class=\"jumbotron\">
    <div class=\"container\">
        ";
        // line 16
        $this->displayBlock('title', $context, $blocks);
        // line 18
        echo "    </div>
</div>

<div class=\"container content\">
    ";
        // line 22
        $this->displayBlock('message', $context, $blocks);
        // line 24
        echo "    ";
        $this->displayBlock('content', $context, $blocks);
        // line 26
        echo "</div>

<div class=\"navbar-fixed-bottom row-fluid\">
    <div class=\"container\">
        &copy; 2017 Y.Kotvitskiy
    </div>
</div>


<script src=\"https://code.jquery.com/jquery-1.12.4.min.js\"></script>
<script src=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["layout"] ?? null), "homeDir", array()), "html", null, true);
        echo "assets/template/js/bootstrap.min.js\"></script>
<script src=\"";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["layout"] ?? null), "homeDir", array()), "html", null, true);
        echo "assets/template/js/main.js\"></script>
</body>
</html>";
    }

    // line 16
    public function block_title($context, array $blocks = array())
    {
        // line 17
        echo "        ";
    }

    // line 22
    public function block_message($context, array $blocks = array())
    {
        // line 23
        echo "    ";
    }

    // line 24
    public function block_content($context, array $blocks = array())
    {
        // line 25
        echo "    ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 25,  104 => 24,  100 => 23,  97 => 22,  93 => 17,  90 => 16,  83 => 37,  79 => 36,  67 => 26,  64 => 24,  62 => 22,  56 => 18,  54 => 16,  49 => 13,  47 => 12,  40 => 8,  36 => 7,  32 => 6,  28 => 5,  22 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layout.twig", "E:\\domains\\homeworks\\homework52\\app\\views\\layout.twig");
    }
}
