<?php

/* WebProfilerBundle:Collector:exception.css.twig */
class __TwigTemplate_f5fa833a0b2126b4935a475fe684c9e5a4a6248953dbd6d4126925bc6c05d467 extends Twig_Template
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
        echo ".sf-reset .traces {
    padding-bottom: 14px;
}
.sf-reset .traces li {
    font-size: 12px;
    color: #868686;
    padding: 5px 4px;
    list-style-type: decimal;
    margin-left: 20px;
    white-space: break-word;
}
.sf-reset #logs .traces li.error {
    font-style: normal;
    color: #AA3333;
    background: #f9ecec;
}
.sf-reset #logs .traces li.warning {
    font-style: normal;
    background: #ffcc00;
}
/* fix for Opera not liking empty <li> */
.sf-reset .traces li:after {
    content: \"\\00A0\";
}
.sf-reset .trace {
    border: 1px solid #D3D3D3;
    padding: 10px;
    overflow: auto;
    margin: 10px 0 20px;
}
.sf-reset .block-exception {
    border-radius: 16px;
    margin-bottom: 20px;
    background-color: #f6f6f6;
    border: 1px solid #dfdfdf;
    padding: 30px 28px;
    word-wrap: break-word;
    overflow: hidden;
}
.sf-reset .block-exception div {
    color: #313131;
    font-size: 10px;
}
.sf-reset .block-exception-detected .illustration-exception,
.sf-reset .block-exception-detected .text-exception {
    float: left;
}
.sf-reset .block-exception-detected .illustration-exception {
    width: 152px;
}
.sf-reset .block-exception-detected .text-exception {
    width: 670px;
    padding: 30px 44px 24px 46px;
    position: relative;
}
.sf-reset .text-exception .open-quote,
.sf-reset .text-exception .close-quote {
    position: absolute;
}
.sf-reset .open-quote {
    top: 0;
    left: 0;
}
.sf-reset .close-quote {
    bottom: 0;
    right: 50px;
}
.sf-reset .block-exception p {
    font-family: Arial, Helvetica, sans-serif;
}
.sf-reset .block-exception p a,
.sf-reset .block-exception p a:hover {
    color: #565656;
}
.sf-reset .logs h2 {
    float: left;
    width: 654px;
}
.sf-reset .error-count {
    float: right;
    width: 170px;
    text-align: right;
}
.sf-reset .error-count span {
    display: inline-block;
    background-color: #aacd4e;
    border-radius: 6px;
    padding: 4px;
    color: white;
    margin-right: 2px;
    font-size: 11px;
    font-weight: bold;
}
.sf-reset .toggle {
    vertical-align: middle;
}
.sf-reset .linked ul,
.sf-reset .linked li {
    display: inline;
}
.sf-reset #output-content {
    color: #000;
    font-size: 12px;
}
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:exception.css.twig";
    }

    public function getDebugInfo()
    {
        return array (  389 => 160,  386 => 159,  380 => 158,  378 => 157,  367 => 155,  363 => 153,  361 => 152,  358 => 151,  345 => 147,  343 => 146,  340 => 145,  334 => 141,  331 => 140,  326 => 138,  321 => 135,  307 => 128,  302 => 125,  296 => 121,  290 => 119,  288 => 118,  276 => 111,  265 => 105,  259 => 103,  255 => 101,  253 => 100,  248 => 97,  222 => 83,  216 => 79,  197 => 69,  194 => 68,  184 => 63,  178 => 59,  175 => 58,  170 => 56,  403 => 136,  401 => 135,  394 => 134,  391 => 133,  382 => 131,  377 => 129,  371 => 156,  359 => 123,  356 => 122,  353 => 149,  350 => 120,  347 => 119,  338 => 116,  333 => 115,  328 => 139,  324 => 112,  315 => 131,  313 => 110,  308 => 109,  293 => 120,  281 => 114,  274 => 110,  262 => 93,  249 => 92,  237 => 91,  234 => 90,  232 => 88,  213 => 78,  210 => 77,  207 => 76,  186 => 72,  180 => 70,  172 => 57,  161 => 58,  155 => 47,  152 => 46,  114 => 36,  191 => 67,  188 => 76,  185 => 75,  174 => 74,  167 => 71,  153 => 69,  134 => 39,  118 => 49,  113 => 48,  104 => 31,  110 => 22,  90 => 20,  84 => 29,  127 => 35,  97 => 41,  76 => 25,  58 => 14,  81 => 29,  34 => 5,  23 => 2,  20 => 1,  65 => 17,  53 => 11,  77 => 11,  70 => 15,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 141,  409 => 132,  407 => 138,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 128,  368 => 126,  365 => 125,  362 => 124,  360 => 109,  355 => 150,  341 => 117,  337 => 103,  322 => 101,  314 => 99,  312 => 130,  309 => 129,  305 => 108,  298 => 91,  294 => 90,  285 => 100,  283 => 115,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 93,  229 => 87,  220 => 70,  214 => 69,  177 => 69,  169 => 60,  140 => 55,  132 => 51,  128 => 42,  107 => 36,  61 => 17,  273 => 96,  269 => 107,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 89,  230 => 82,  227 => 86,  224 => 71,  221 => 80,  219 => 76,  217 => 75,  208 => 76,  204 => 75,  179 => 69,  159 => 57,  143 => 41,  135 => 46,  119 => 42,  102 => 24,  71 => 19,  67 => 20,  63 => 18,  59 => 16,  38 => 7,  201 => 74,  196 => 90,  183 => 71,  171 => 73,  166 => 54,  163 => 53,  158 => 79,  156 => 66,  151 => 63,  142 => 59,  138 => 47,  136 => 56,  121 => 50,  117 => 37,  105 => 25,  91 => 33,  62 => 14,  49 => 11,  87 => 34,  21 => 1,  94 => 21,  89 => 20,  85 => 32,  75 => 18,  68 => 53,  56 => 11,  93 => 25,  88 => 32,  78 => 19,  46 => 10,  27 => 3,  44 => 9,  25 => 35,  31 => 4,  26 => 9,  28 => 3,  24 => 3,  19 => 1,  79 => 18,  72 => 17,  69 => 25,  47 => 8,  40 => 6,  37 => 5,  22 => 2,  246 => 96,  157 => 56,  145 => 46,  139 => 63,  131 => 61,  123 => 59,  120 => 31,  115 => 43,  111 => 47,  108 => 33,  101 => 30,  98 => 38,  96 => 37,  83 => 33,  74 => 27,  66 => 24,  55 => 13,  52 => 12,  50 => 10,  43 => 12,  41 => 8,  35 => 6,  32 => 5,  29 => 3,  209 => 82,  203 => 73,  199 => 67,  193 => 73,  189 => 66,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 70,  162 => 57,  154 => 58,  149 => 51,  147 => 43,  144 => 42,  141 => 48,  133 => 45,  130 => 41,  125 => 41,  122 => 43,  116 => 41,  112 => 31,  109 => 27,  106 => 45,  103 => 32,  99 => 23,  95 => 27,  92 => 21,  86 => 28,  82 => 28,  80 => 27,  73 => 24,  64 => 23,  60 => 18,  57 => 12,  54 => 10,  51 => 13,  48 => 9,  45 => 9,  42 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
