<?php
/**
 * Created by PhpStorm.
 * User: Stef
 * Date: 18.01.2018
 * Time: 14:50
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing;

class DefaultController extends Controller
{
    /*
     * @Route("/", name = "homepage")
     */
    public function indexAction(Request $request){
        return $this->render('base.html.twig');
    }
}