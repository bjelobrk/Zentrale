<?php

/* AcmeCentralaBundle:Pages:input.html.twig */
class __TwigTemplate_3048c681879d24281c64f5113fa53610e477aa60336ef9796023eee914c60b59 extends Twig_Template
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
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
    ";
        // line 6
        echo "
    ";
        // line 8
        echo "    <ul id=\"email-fields-list\" data-prototype=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "sadrzaj_polja"), "vars"), "prototype"), 'widget'));
        echo "\">
            
        ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "sadrzaj_polja"));
        foreach ($context['_seq'] as $context["_key"] => $context["emailField"]) {
            // line 11
            echo "        <li>
            ";
            // line 12
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["emailField"]) ? $context["emailField"] : null), 'errors');
            echo "
            ";
            // line 13
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["emailField"]) ? $context["emailField"] : null), 'widget');
            echo "
        </li>
        
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['emailField'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "    </ul>

    <a href=\"#\" id=\"add-another-email\">Add another email</a>

    
    
    
    ";
        // line 25
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "

<script type=\"text/javascript\">
    // keep track of how many email fields have been rendered
    var emailCount = '";
        // line 29
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "sadrzaj_polja")), "html", null, true);
        echo "';

    jQuery(document).ready(function() {
        jQuery('#add-another-email').click(function() {
            var emailList = jQuery('#email-fields-list');
            // grab the prototype template
            var newWidget = emailList.attr('data-prototype');
            // replace the \"__name__\" used in the id and name of the prototype
            // with a number that's unique to your emails
            // end name attribute looks like name=\"contact[emails][2]\"
            newWidget = newWidget.replace(/__name__/g, emailCount);
            emailCount++;

            // create a new list element and add it to the list
            var newLi = jQuery('<li></li>').html(newWidget);
            newLi.appendTo(jQuery('#email-fields-list'));

            return false;
        });
    })
</script>
";
    }

    public function getTemplateName()
    {
        return "AcmeCentralaBundle:Pages:input.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 29,  74 => 25,  34 => 5,  23 => 2,  20 => 1,  65 => 17,  53 => 11,  83 => 29,  77 => 11,  70 => 22,  52 => 43,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  111 => 37,  107 => 36,  61 => 49,  273 => 96,  269 => 94,  254 => 92,  246 => 90,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 41,  135 => 38,  131 => 52,  119 => 42,  108 => 30,  102 => 32,  71 => 19,  67 => 16,  63 => 15,  59 => 13,  47 => 41,  38 => 8,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  123 => 47,  121 => 33,  117 => 32,  115 => 43,  105 => 42,  91 => 15,  69 => 25,  62 => 14,  49 => 19,  87 => 14,  66 => 24,  55 => 13,  21 => 1,  101 => 32,  94 => 28,  89 => 20,  85 => 25,  79 => 18,  75 => 18,  72 => 17,  68 => 53,  56 => 26,  50 => 10,  98 => 38,  93 => 25,  88 => 31,  78 => 27,  46 => 9,  27 => 4,  40 => 8,  44 => 10,  35 => 6,  25 => 3,  31 => 4,  29 => 3,  26 => 6,  22 => 2,  43 => 8,  41 => 7,  32 => 4,  28 => 3,  24 => 3,  19 => 1,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 59,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 34,  122 => 43,  116 => 41,  112 => 31,  109 => 34,  106 => 33,  103 => 32,  99 => 28,  95 => 26,  92 => 21,  86 => 28,  82 => 20,  80 => 12,  73 => 19,  64 => 15,  60 => 18,  57 => 12,  54 => 10,  51 => 12,  48 => 11,  45 => 8,  42 => 39,  39 => 9,  36 => 6,  33 => 11,  30 => 7,);
    }
}
