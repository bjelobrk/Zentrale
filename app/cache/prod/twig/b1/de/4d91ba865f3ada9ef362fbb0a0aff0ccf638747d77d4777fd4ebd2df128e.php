<?php

/* AcmeCentralaBundle:Pages:insertforma.html.twig */
class __TwigTemplate_b1de4d91ba865f3ada9ef362fbb0a0aff0ccf638747d77d4777fd4ebd2df128e extends Twig_Template
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
        echo "<form action=\"";
        echo $this->env->getExtension('routing')->getPath("acme_centrala_insert");
        echo "\" method=\"post\" >
    <label>Vlasnik kontakta </label>
    <input type=\"text\" name=\"vlasnik\"><br>
    <label>Vidljivost: </label>
    <select name=\"vidljivost\">
        <option value=\"Public\">Public</option>
        <option value=\"Private\">Private</option>
    </select><br>
    <label>Name </label><br>
    <input type=\"text\" name=\"ime\" placeholder=\"Ime\"><br>
    <label>Surname </label><br>
    <input type=\"text\" name=\"prezime\" placeholder=\"Prezime\"><br>
     <label>Company </label><br>
    <input type=\"text\" name=\"company\" placeholder=\"Company\"><br>
    <label>Title </label><br>
    <input type=\"text\" name=\"title\" placeholder=\"Title\"><br>
       <label>PHONE </label><br>
    <input type=\"text\" name=\"tel[]\" placeholder=\"Phone\">
    <select class=\"podnaziv\" name=\"podnaziv[]\">
        <option value=\"CELL\">MOBILE</option>
            <option value=\"WORK\">WORK</option>
              <option value=\"HOME\">HOME</option>
                <option value=\"WORK_FAX\">WORK FAX</option>
                  <option value=\"HOME_FAX\">HOME FAX</option>
                    <option value=\"OTHER\">OTHER</option>
                      <option value=\"CUSTOM\">CUSTOM</option>
    </select>
    <div class=\"telefoni\"></div>
    <button class=\"dugme\">Add new</button><br>
     <label>EMAIL </label><br>
    <input type=\"text\" name=\"email[]\" placeholder=\"Email\">
    <select class=\"podnazive\" name=\"podnazive[]\">
         <option value=\"HOME\">HOME</option>
            <option value=\"WORK\">WORK</option>
                <option value=\"OTHER\">OTHER</option>
                    <option value=\"CUSTOM\">CUSTOM</option>
    </select>
    <div class=\"mejlovi\"></div>
    <button class=\"dugme2\">Add new</button><br>
   
    <label>ADDRESS </label><br>
    <input type=\"text\" name=\"address[]\" placeholder=\"Address\">
    <select class=\"podnaziva\" name=\"podnaziva[]\">
         <option value=\"HOME\">HOME</option>
            <option value=\"WORK\">WORK</option>
                <option value=\"OTHER\">OTHER</option>
                    <option value=\"CUSTOM\">CUSTOM</option>
    </select>
    <div class=\"adrese\"></div>
    <button class=\"dugme3\">Add new</button><br>
    
     <label>SPECIAL DATES </label><br>
    <input type=\"text\" name=\"dates[]\" placeholder=\"Date\">
    <select class=\"podnazivs\" name=\"podnazivd[]\">
         <option value=\"BIRTHDAY\">BIRTHDAY</option>
            <option value=\"ANNIVERSARY\">ANNIVERSARY</option>
                <option value=\"OTHER\">OTHER</option>
                    <option value=\"CUSTOM\">CUSTOM</option>
    </select>
    <div class=\"dates\"></div>
    <button class=\"dugme4\">Add new</button><br>
    <input name = \"submit\" type=\"submit\" value=\"Submit\">
 </form>
";
    }

    public function getTemplateName()
    {
        return "AcmeCentralaBundle:Pages:insertforma.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  23 => 2,  20 => 1,  65 => 20,  53 => 11,  83 => 29,  77 => 11,  70 => 22,  52 => 43,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  111 => 37,  107 => 36,  61 => 49,  273 => 96,  269 => 94,  254 => 92,  246 => 90,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 41,  135 => 38,  131 => 52,  119 => 42,  108 => 30,  102 => 32,  71 => 19,  67 => 16,  63 => 15,  59 => 13,  47 => 41,  38 => 37,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  123 => 47,  121 => 33,  117 => 32,  115 => 43,  105 => 42,  91 => 15,  69 => 25,  62 => 14,  49 => 19,  87 => 14,  66 => 24,  55 => 15,  21 => 1,  101 => 32,  94 => 28,  89 => 20,  85 => 25,  79 => 18,  75 => 18,  72 => 17,  68 => 53,  56 => 26,  50 => 10,  98 => 38,  93 => 25,  88 => 31,  78 => 27,  46 => 9,  27 => 4,  40 => 8,  44 => 23,  35 => 18,  25 => 3,  31 => 4,  29 => 3,  26 => 6,  22 => 2,  43 => 8,  41 => 7,  32 => 4,  28 => 3,  24 => 3,  19 => 1,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 59,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 34,  122 => 43,  116 => 41,  112 => 31,  109 => 34,  106 => 33,  103 => 32,  99 => 28,  95 => 26,  92 => 21,  86 => 28,  82 => 20,  80 => 12,  73 => 19,  64 => 15,  60 => 18,  57 => 12,  54 => 10,  51 => 14,  48 => 24,  45 => 8,  42 => 39,  39 => 9,  36 => 6,  33 => 11,  30 => 7,);
    }
}
