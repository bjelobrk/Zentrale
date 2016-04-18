<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // acme_centrala_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_acme_centrala_homepage;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'acme_centrala_homepage');
            }

            return array (  '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::indexAction',  '_route' => 'acme_centrala_homepage',);
        }
        not_acme_centrala_homepage:

        if (0 === strpos($pathinfo, '/insert')) {
            // acme_centrala_insert
            if ($pathinfo === '/insert') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_acme_centrala_insert;
                }

                return array (  '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::insertAction',  '_route' => 'acme_centrala_insert',);
            }
            not_acme_centrala_insert:

            // acme_centrala_insertforma
            if ($pathinfo === '/insertforma') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_acme_centrala_insertforma;
                }

                return array (  '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::insertformaAction',  '_route' => 'acme_centrala_insertforma',);
            }
            not_acme_centrala_insertforma:

        }

        // acme_centrala_upload
        if ($pathinfo === '/upload') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_acme_centrala_upload;
            }

            return array (  '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::uploadAction',  '_route' => 'acme_centrala_upload',);
        }
        not_acme_centrala_upload:

        // acme_centrala_export
        if ($pathinfo === '/export') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_acme_centrala_export;
            }

            return array (  '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::exportAction',  '_route' => 'acme_centrala_export',);
        }
        not_acme_centrala_export:

        // acme_centrala_list
        if ($pathinfo === '/list') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_acme_centrala_list;
            }

            return array (  '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::listAction',  '_route' => 'acme_centrala_list',);
        }
        not_acme_centrala_list:

        if (0 === strpos($pathinfo, '/search')) {
            // acme_centrala_searchform
            if ($pathinfo === '/searchform') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_acme_centrala_searchform;
                }

                return array (  '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::searchformAction',  '_route' => 'acme_centrala_searchform',);
            }
            not_acme_centrala_searchform:

            // acme_centrala_search
            if ($pathinfo === '/search') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_acme_centrala_search;
                }

                return array (  '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::searchAction',  '_route' => 'acme_centrala_search',);
            }
            not_acme_centrala_search:

        }

        // acme_centrala_delete
        if ($pathinfo === '/delete') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_acme_centrala_delete;
            }

            return array (  '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::deleteAction',  '_route' => 'acme_centrala_delete',);
        }
        not_acme_centrala_delete:

        // acme_centrala_ajax
        if ($pathinfo === '/ajax') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_acme_centrala_ajax;
            }

            return array (  '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::ajaxAction',  '_route' => 'acme_centrala_ajax',);
        }
        not_acme_centrala_ajax:

        // acme_centrala_search1
        if (preg_match('#^/(?P<criteria>[^/]++)/search1$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_acme_centrala_search1;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_centrala_search1')), array (  '_controller' => 'Acme\\CentralaBundle\\Controller\\GlavniController::search1Action',));
        }
        not_acme_centrala_search1:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
