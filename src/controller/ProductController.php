<?php

namespace ProductExtender\Controller;

use Hook;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response;

class ProductController extends FrameworkBundleAdminController
{
  public function indexAction(Request $request){
    
    Hook::exec('displayDashboardToolbarTopMenu', ['controller' => 'ProductController']);

    return $this->render(
      "@Modules/productextender/views/templates/admin/newdefinition.html.twig",
      [
        "vuejspath" => '/modules/productextender/views/js/app.js',
        "vendorvuejspath" => '/modules/productextender/views/js/chunk-vendors.js',
        "aboutjspath" => '/modules/productextender/views/js/about.js'
      ]
    );
  }

}