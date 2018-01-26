<?php
/**
 * Created by PhpStorm.
 * User: Stef
 * Date: 18.01.2018
 * Time: 14:50
 */

namespace App\Controller;

use App\Entity\Budget;
use App\Entity\IncomeStream;
use App\Entity\Expense;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class BudgetController extends Controller
{
    /**
     * @Route("/budget/", name = "save_budget", methods = "POST")
     *
     */
    public function saveBudgetAction(Request $request){

        $postBody = array();
        if ($content = $request->getContent()){
            $postBody = json_decode($content, true);
        }



        $budget = new Budget();


        $incomeStreams = array_map(function($incomeStream) use ($budget) {
            return new IncomeStream(
                $incomeStream['amount'],
                $incomeStream['name'],
                $incomeStream['frequency'],
                $budget
            );
        }, $postBody['incomeStreams']);

        $expenses = array_map(function($expense) use ($budget) {
            return new Expense(
                $expense['amount'],
                $expense['name'],
                $budget
            );
        }, $postBody['expenses']);

        $budget->setIncomeStreams($incomeStreams);
        $budget->setExpenses($expenses);

        $em = $this->getDoctrine()->getManager();
        $em->persist($budget);
        $em->flush();

        return new JsonResponse(array(
            "status" => "success",
            "budget" => array(
                "id" => $budget->getId()
            ),
        ));
    }

curl http://localhost:8000/budget/
-v -u <admin>:<admin>
-H "Content-Type: application/json"
-H "Accept: application/json"
--data-binary @/Ampps/www/stef.host/LearnSymfony/BudgetApp/budget-app-api/request.json -X POST

    /**
     * @Route("/budget/", name = "get_budgets", methods = "GET")
     */
    public function getBudgetsAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $budgets = $em->getRepository('App:Budget');
        /** @var Budget $budget */
        $budget = $budgets -> find(1);

        $incomeStreams = array_map(function(IncomeStream $incomeStream){
            return array(
                'key'       => $incomeStream->getId(),
                'name'      => $incomeStream->getName(),
                'frequency' => $incomeStream->getFrequency(),
                'amount'    => $incomeStream->getAmount()
            );
        }, $budget->getIncomeStreams());

        $expenses = array_map(function(Expense $expense){
            return array(
                'key'       => $expense->getId(),
                'name'      => $expense->getName(),
                'amount'    => $expense->getAmount()
            );
        }, $budget->getExpenses());

        $response = new JsonResponse(array(
            "incomeStreams" => $incomeStreams,
            "expenses" => $expenses
        ));



        return $response;
    }
}