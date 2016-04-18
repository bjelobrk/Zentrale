<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'acme_centrala_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::indexAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'acme_centrala_insert' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::insertAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/insert',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'acme_centrala_insertforma' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::insertformaAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/insertforma',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'acme_centrala_upload' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::uploadAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/upload',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'acme_centrala_export' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::exportAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/export',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'acme_centrala_list' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::listAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/list',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'acme_centrala_searchform' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::searchformAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/searchform',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'acme_centrala_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::searchAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'acme_centrala_delete' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::deleteAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'acme_centrala_ajax' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::ajaxAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/ajax',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'acme_centrala_search1' => array (  0 =>   array (    0 => 'criteria',  ),  1 =>   array (    '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::search1Action',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search1',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'criteria',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
