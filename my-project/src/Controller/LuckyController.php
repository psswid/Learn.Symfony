<?php
/**
 * Created by PhpStorm.
 * User: Stef
 * Date: 18.01.2018
 * Time: 12:08
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{max}", name="app_lucky_number")
     */
    public function number($max)
    {
        $number = mt_rand(0, $max);

        return $this->render('lucky/number.html.twig', array(
            'number'=>$number,
        ));
    }
}