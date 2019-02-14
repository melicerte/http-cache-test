<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CachedEntityController extends AbstractController
{

    public function list(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('App:CachedEntity');

        $entities = $repository->findAll();

        // replace this example code with whatever you need
        return $this->render('CachedEntity/list.html.twig', [
            'entities' => $entities
        ]);
    }
}
