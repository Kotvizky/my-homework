<?php

/* table.twig */
class __TwigTemplate_8832ad6c0886c083307a0d2f78be371b434160414b4f073d46870404d1f76ed6 extends Twig_Template
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
        echo "<table class=\"table table-bordered\">
    <tr>
        ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["head"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cell"]) {
            // line 4
            echo "            <th>";
            echo twig_escape_filter($this->env, $context["cell"], "html", null, true);
            echo "</th>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cell'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 6
        echo "    </tr>
    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 8
            echo "        <tr>
            ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["row"]);
            foreach ($context['_seq'] as $context["_key"] => $context["cell"]) {
                // line 10
                echo "                <td>
                ";
                // line 11
                if (twig_get_attribute($this->env, $this->getSourceContext(), $context["cell"], "link", array())) {
                    // line 12
                    echo "                    ";
                    if (twig_get_attribute($this->env, $this->getSourceContext(), $context["cell"], "comment", array())) {
                        // line 13
                        echo "                         <a href=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["cell"], "link", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["cell"], "comment", array()), "html", null, true);
                        echo "</a>
                    ";
                    } else {
                        // line 15
                        echo "                        <ul>
                        ";
                        // line 16
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), $context["cell"], "link", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["linkItem"]) {
                            // line 17
                            echo "                            <li> <a href=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["linkItem"], "link", array()), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["linkItem"], "comment", array()), "html", null, true);
                            echo "</a> </li>
                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['linkItem'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 19
                        echo "                        </ul>
                    ";
                    }
                    // line 21
                    echo "                ";
                } elseif (twig_get_attribute($this->env, $this->getSourceContext(), $context["cell"], "img", array())) {
                    // line 22
                    echo "                        <div class=\"form-group\">
                            <img  width=\"200\" height=\"200\" src=\"";
                    // line 23
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["cell"], "img", array()), "html", null, true);
                    echo "\" alt=\"\">
                        </div>
                ";
                } else {
                    // line 26
                    echo "                   ";
                    echo twig_escape_filter($this->env, $context["cell"], "html", null, true);
                    echo "
                ";
                }
                // line 28
                echo "                </td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cell'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "</table>";
    }

    public function getTemplateName()
    {
        return "table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 32,  113 => 30,  106 => 28,  100 => 26,  94 => 23,  91 => 22,  88 => 21,  84 => 19,  73 => 17,  69 => 16,  66 => 15,  58 => 13,  55 => 12,  53 => 11,  50 => 10,  46 => 9,  43 => 8,  39 => 7,  36 => 6,  27 => 4,  23 => 3,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table.twig", "E:\\domains\\homeworks\\homework52\\app\\views\\table.twig");
    }
}
