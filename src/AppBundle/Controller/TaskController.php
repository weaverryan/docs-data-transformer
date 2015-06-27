<?php

namespace AppBundle\Controller;

use AppBundle\Form\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends Controller
{
    /**
     * @Route("/task/new", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new TaskType());

        $form->handleRequest($request);
        if ($form->isValid()) {
            // just dump the Task object
            dump($form->getData());die;
        }

        return $this->render('task/new.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
