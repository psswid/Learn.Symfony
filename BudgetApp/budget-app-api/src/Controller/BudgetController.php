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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class BudgetController extends Controller
{
    /**
     * @Route("/budget/", name = "get_budgets")
     */
    public function getBudgetsAction(Request $request){
        $response = new JsonResponse(array(
            'incomeStreams' => array(array(
                'key'       => 1,
                'name'      => 'Paycheck',
                'frequency' => 2,
                'amount'    => 2000,
            ),array(
                'key'       => 2,
                'name'      => 'Investment Income',
                'frequency' => 1,
                'amount'    => 200,
            ),array(
                'key'       => 3,
                'name'      => 'Consulting',
                'frequency' => 1,
                'amount'    => 1000,
            ),),
            'expenses'=> array(array(
                'key'       => 1,
                'name'      => 'Mortgage',
                'amount'    => -1000,
            ),array(
                'key'       => 2,
                'name'      => 'Phone',
                'amount'    => -120,
            ),array(
                'key'       => 3,
                'name'      => 'Internet',
                'amount'    => -60,
            )
            )));

        return $response;
    }
}