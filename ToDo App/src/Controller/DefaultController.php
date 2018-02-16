<?php


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
