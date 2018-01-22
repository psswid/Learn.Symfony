<?php
/**
 * Created by PhpStorm.
 * User: Stef
 * Date: 18.01.2018
 * Time: 14:50
 */

namespace App\Controller;

use App\Entity\Todo;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ToDoController extends Controller
{
    /**
     * @Route("/todos", name = "todo_list")
     */
    public function listAction(Request $request){
        $todos = $this->getDoctrine()
            ->getRepository('App:Todo')
            ->findAll();

        return $this->render('/ToDo/ToDo.html.twig', array(
            'todos' => $todos
        ));
    }
    /**
    * @Route("/todo/create", name = "todo_create")
    */
    public function createAction(Request $request){
        $todo = new Todo();

        $form = $this->createFormBuilder($todo)
            ->add('name',        TextType::class,     array('attr'=>    array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            ->add('category',    TextType::class,     array('attr'=>    array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            ->add('description', TextareaType::class, array('attr'=>    array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            ->add('priority',    ChoiceType::class,   array('choices'=> array('Low'=>'Low', 'Normal'=>'Normal', 'High'=>'High'),'attr'=>array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            ->add('due_date',    DateTimeType::class, array('attr'=>    array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            ->add('save',        SubmitType::class,   array('label' => 'Create Task', 'attr'=>array('class' => 'btn btn-primary', 'style'=>'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //Get data
            $name =         $form['name']->getData();
            $category =     $form['category']->getData();
            $description =  $form['description']->getData();
            $priority =     $form['priority']->getData();
            $due_date =     $form['due_date']->getData();
            $now =          new\DateTime('now');

            //Set data
            $todo->setName($name);
            $todo->setCategory($category);
            $todo->setDescription($description);
            $todo->setPriority($priority);
            $todo->setDueDate($due_date);
            $todo->setCreateDate($now);

            $em = $this->getDoctrine()->getManager();

            $em->persist($todo);
            $em->flush();

            $this->addFlash(
                'notice',
                'Todo added'
            );

            return $this->redirectToRoute('todo_list');
        }

        return $this->render('/ToDo/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
    * @Route("/todo/edit/{id}", name = "todo_edit")
    */
    public function editAction($id, Request $request){

        $todo = $this->getDoctrine()
            ->getRepository('App:Todo')
            ->find($id);

        $now = new\DateTime('now');

        $todo->setName($todo->getName());
        $todo->setCategory($todo->getCategory());
        $todo->setDescription($todo->getDescription());
        $todo->setPriority($todo->getPriority());
        $todo->setDueDate($todo->getDueDate());
        $todo->setCreateDate($now);

        $form = $this->createFormBuilder($todo)
            ->add('name',        TextType::class,     array('attr'=>    array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            ->add('category',    TextType::class,     array('attr'=>    array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            ->add('description', TextareaType::class, array('attr'=>    array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            ->add('priority',    ChoiceType::class,   array('choices'=> array('Low'=>'Low', 'Normal'=>'Normal', 'High'=>'High'),'attr'=>array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            ->add('due_date',    DateTimeType::class, array('attr'=>    array('class' => 'form-control', 'style'=>'margin-bottom:15px')))
            ->add('save',        SubmitType::class,   array('label' => 'Update Task', 'attr'=>array('class' => 'btn btn-primary', 'style'=>'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //Get data
            $name =         $form['name']->getData();
            $category =     $form['category']->getData();
            $description =  $form['description']->getData();
            $priority =     $form['priority']->getData();
            $due_date =     $form['due_date']->getData();



            $em = $this->getDoctrine()->getManager();
            $todo=$em->getRepository('App:Todo')->find($id);

            //Set data
            $todo->setName($name);
            $todo->setCategory($category);
            $todo->setDescription($description);
            $todo->setPriority($priority);
            $todo->setDueDate($due_date);
            $todo->setCreateDate($now);


            $em->flush();

            $this->addFlash(
                'notice',
                'Todo edited'
            );

            return $this->redirectToRoute('todo_list');
        }

        return $this->render('/ToDo/edit.html.twig', array(
            'todo' => $todo,
            'form' => $form->createView()
        ));
    }
    /**
    * @Route("/todo/details/{id}", name = "todo_details")
    */
    public function detailsAction($id){

        $todo = $this->getDoctrine()
            ->getRepository('App:Todo')
            ->find($id);

        return $this->render('/ToDo/details.html.twig', array(
            'todo' => $todo
        ));
    }

    /**
     * @Route("/todo/delete/{id}", name = "todo_delete")
     */
    public function deleteAction($id){

        $em = $this->getDoctrine()->getManager();
        $todo=$em->getRepository('App:Todo')->find($id);

        $em->remove($todo);
        $em->flush();

        $this->addFlash(
            'notice',
            'Todo removed'
        );

        return $this->redirectToRoute('todo_list');
    }
}