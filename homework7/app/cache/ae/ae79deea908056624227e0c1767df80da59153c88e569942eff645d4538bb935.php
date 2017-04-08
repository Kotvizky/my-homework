<?php

/* base_view.twig */
class __TwigTemplate_24073582983e5af7a94514d64829eb21007d3c68ef4a9259f66649de0e7034f0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "base_view.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'message' => array($this, 'block_message'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        // line 5
        echo "<h1>";
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h1>
";
    }

    // line 8
    public function block_message($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        if (($context["message"] ?? null)) {
            // line 10
            echo "        <div class=\"alert alert-warning\">
            ";
            // line 11
            echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
            echo "
        </div>
    ";
        }
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        echo ($context["content"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "base_view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 18,  57 => 17,  49 => 11,  46 => 10,  43 => 9,  40 => 8,  33 => 5,  30 => 4,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base_view.twig", "E:\\domains\\homeworks\\homework52\\app\\views\\base_view.twig");
    }
}
