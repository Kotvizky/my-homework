<?php

/* form.twig */
class __TwigTemplate_8bacdae51cfe58713f653a4d6050d0b77342f9e874035082073073df9b043a6e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"form-container\">
    <form class=\"form-horizontal\"
         ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["attributes"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 4
            echo "            ";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\"
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 6
        echo "        >
        ";
        // line 7
        if ((($context["imageLink"] ?? null) != "")) {
            // line 8
            echo "            <div class=\"form-group\">
                <img src=\"";
            // line 9
            echo twig_escape_filter($this->env, ($context["imageLink"] ?? null), "html", null, true);
            echo "\" alt=\"\">
            </div>
        ";
        }
        // line 12
        echo "

    ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 15
            echo "            ";
            if (twig_in_filter(twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "type", array()), array(0 => "text", 1 => "password", 2 => "date"))) {
                // line 16
                echo "                <div class=\"form-group\">
                    <label for=\"";
                // line 17
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "name", array()), "html", null, true);
                echo "\" class=\"col-sm-2 control-label\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "label", array()), "html", null, true);
                echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"";
                // line 19
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "type", array()), "html", null, true);
                echo "\" name=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "name", array()), "html", null, true);
                echo "\" class=\"form-control\"
                               id=\"";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "name", array()), "html", null, true);
                echo "\" value = \"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "value", array()), "html", null, true);
                echo "\" placeholder=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "placeholder", array()), "html", null, true);
                echo "\">
                    </div>
                </div>
            ";
            }
            // line 24
            echo "            ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "type", array()) == "textarea")) {
                // line 25
                echo "                <div class=\"form-group\">
                    <label for=\"descr\" class=\"col-sm-2 control-label\">";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "label", array()), "html", null, true);
                echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea rows=\"3\" cols=\"45\" name = \"";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "name", array()), "html", null, true);
                echo "\" class=\"form-control\"
                                  id=\"";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "name", array()), "html");
                echo "\"
                                  placeholder=\"";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "placeholder", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "value", array()), "html", null, true);
                echo "</textarea>
                    </div>
                </div>
            ";
            }
            // line 34
            echo "            ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "type", array()) == "file")) {
                // line 35
                echo "                <div class=\"form-group\">
                    <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"3000000\">
                    <input type=\"file\" name = \"userFile\" hidden>
                </div>
            ";
            }
            // line 40
            echo "            ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "type", array()) == "reCaptcha")) {
                // line 41
                echo "                <div class=\"form-group\">
                    <div class=\"g-recaptcha\" data-sitekey=";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "siteKey", array()), "html", null, true);
                echo " ></div>
                    <script type=\"text/javascript\"
                            src=\"https://www.google.com/recaptcha/api.js?hl=";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "lang", array()), "html", null, true);
                echo "\">
                    </script>
                </div>
            ";
            }
            // line 48
            echo "        ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "type", array()) == "label")) {
                // line 49
                echo "            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" >";
                // line 50
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "label", array()), "html", null, true);
                echo "</label>
                <div class=\"col-sm-10\">
                    ";
                // line 52
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "value", array()), "html", null, true);
                echo "
                </div>
            </div>
        ";
            }
            // line 56
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "
        <div class=\"form-group\">
            <div class=\"col-sm-offset-2 col-sm-10\">
                <button type=\"submit\" class=\"btn btn-default\">
                ";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["button"] ?? null), "text", array()), "html", null, true);
        echo "</button>
                ";
        // line 62
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["button"] ?? null), "questionLinkText", array())) {
            // line 63
            echo "                <br><br>
                ";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["button"] ?? null), "question", array()), "html", null, true);
            echo " <a href=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["button"] ?? null), "questionLink", array()), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["button"] ?? null), "questionLinkText", array()), "html", null, true);
            echo "</a>
                ";
        }
        // line 66
        echo "            </div>
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 66,  185 => 64,  182 => 63,  180 => 62,  176 => 61,  170 => 57,  164 => 56,  157 => 52,  152 => 50,  149 => 49,  146 => 48,  139 => 44,  134 => 42,  131 => 41,  128 => 40,  121 => 35,  118 => 34,  109 => 30,  105 => 29,  101 => 28,  96 => 26,  93 => 25,  90 => 24,  79 => 20,  73 => 19,  66 => 17,  63 => 16,  60 => 15,  56 => 14,  52 => 12,  46 => 9,  43 => 8,  41 => 7,  38 => 6,  27 => 4,  23 => 3,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "form.twig", "E:\\domains\\homeworks\\homework52\\app\\views\\form.twig");
    }
}
