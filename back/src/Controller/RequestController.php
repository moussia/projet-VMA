<?php
// back/src/Controller/RequestController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Requests;

class RequestController extends AbstractController {

    /**
     * @Route("/request/new")
     */
    public function createAction(Request $request) {

        $req = new Request();

        $form = $this->createFormBuilder($req)
            ->add('hours', IntegerType::class)
            ->add('description', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Créer'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $articles = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($articles);
            $em->flush();

            echo 'Envoyé';
        }

        return $this->render('articles/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}