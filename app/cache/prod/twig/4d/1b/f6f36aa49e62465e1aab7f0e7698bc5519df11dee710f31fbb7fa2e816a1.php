<?php

/* AcmeCentralaBundle:Pages:list.html.twig */
class __TwigTemplate_4d1bf6f36aa49e62465e1aab7f0e7698bc5519df11dee710f31fbb7fa2e816a1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeCentralaBundle::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeCentralaBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <p><b>Search results for: ";
        echo twig_escape_filter($this->env, (isset($context["criteria"]) ? $context["criteria"] : null), "html", null, true);
        echo "</b></p>
   ";
        // line 5
        $context["n"] = 1;
        // line 6
        echo "  
   <form id=\"delete\" action=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("acme_centrala_delete");
        echo "\" method=\"post\">
       
   ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["veze"]) ? $context["veze"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 10
            echo "       <div class=\"vcard\"> 
           <p><b>";
            // line 11
            echo twig_escape_filter($this->env, (isset($context["n"]) ? $context["n"] : null), "html", null, true);
            echo ".</b></p>
       ";
            // line 12
            $context["e"] = (isset($context["item"]) ? $context["item"] : null);
            // line 13
            echo "     
       ";
            // line 14
            $context["n"] = ((isset($context["n"]) ? $context["n"] : null) + 1);
            // line 15
            echo "       ";
            $context["x"] = true;
            // line 16
            echo "       ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["e"]) ? $context["e"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 17
                echo "           ";
                if (((isset($context["x"]) ? $context["x"] : null) == true)) {
                    // line 18
                    echo "               <div class=\"vlasnik\">
            <p><b>Owner:</b>";
                    // line 19
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "veze"), "vlasnik"), "html", null, true);
                    echo " </p> 
            <p><b>Visibility:</b>";
                    // line 20
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "veze"), "vidljivost"), "html", null, true);
                    echo " </p> 
          
            
            <p><input type=\"checkbox\" name=\"box[]\" value=\"";
                    // line 23
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "veze"), "idveza"), "html", null, true);
                    echo "\"></p>
               </div>
             ";
                    // line 25
                    $context["x"] = false;
                    // line 26
                    echo "          
           ";
                }
                // line 28
                echo "           ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "  <table><tr><th>Vrsta polja</th><th>Podnaziv</th><th>Podnaziv 2</th><th>Sadrzaj polja</th></tr>
       ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["e"]) ? $context["e"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 31
                echo "        <tr><td>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "vrstapolja"), "html", null, true);
                echo "</td>
            <td>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "podnaziv"), "html", null, true);
                echo " </td>
            <td>";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "podnaziv2"), "html", null, true);
                echo " </td> 
            <td>";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "sadrzajpolja"), "html", null, true);
                echo " </td> </tr>
            
         
           ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "          </table>
           </div>
       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "        
</form>
       
";
    }

    public function getTemplateName()
    {
        return "AcmeCentralaBundle:Pages:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  83 => 13,  77 => 11,  70 => 33,  52 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  111 => 37,  107 => 36,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  246 => 90,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 41,  135 => 38,  131 => 52,  119 => 42,  108 => 30,  102 => 32,  71 => 19,  67 => 16,  63 => 15,  59 => 13,  47 => 9,  38 => 6,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  123 => 47,  121 => 33,  117 => 32,  115 => 43,  105 => 29,  91 => 15,  69 => 25,  62 => 14,  49 => 19,  87 => 14,  66 => 24,  55 => 15,  21 => 1,  101 => 32,  94 => 28,  89 => 20,  85 => 25,  79 => 18,  75 => 18,  72 => 17,  68 => 32,  56 => 26,  50 => 10,  98 => 31,  93 => 25,  88 => 23,  78 => 19,  46 => 9,  27 => 4,  40 => 8,  44 => 23,  35 => 18,  25 => 3,  31 => 4,  29 => 3,  26 => 6,  22 => 2,  43 => 8,  41 => 7,  32 => 4,  28 => 3,  24 => 3,  19 => 1,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 59,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 34,  122 => 43,  116 => 41,  112 => 31,  109 => 34,  106 => 33,  103 => 32,  99 => 28,  95 => 26,  92 => 21,  86 => 28,  82 => 20,  80 => 12,  73 => 19,  64 => 15,  60 => 27,  57 => 12,  54 => 10,  51 => 14,  48 => 24,  45 => 8,  42 => 7,  39 => 9,  36 => 5,  33 => 11,  30 => 7,);
    }
}
