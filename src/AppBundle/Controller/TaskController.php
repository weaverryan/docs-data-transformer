<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends Controller
{
    /**
     * @Route("/task/new", name="task_new")
     */
    public function indexAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(new TaskType(), $task);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('task_edit', [
                'id' => $task->getId(),
            ]);
        }

        return $this->render('task/new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/task/{id}", name="task_edit")
     */
    public function editAction(Task $task, Request $request)
    {
        $form = $this->createForm(new TaskType(), $task);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('task_edit', [
                'id' => $task->getId(),
            ]);
        }

        return $this->render('task/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
