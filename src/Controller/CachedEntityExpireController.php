<?php

namespace App\Controller;

use App\Entity\CachedEntityExpire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CachedEntityExpireController extends AbstractController
{

    public function show(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('App:CachedEntity');

        $entity = $repository->findOneById($id);

        return $this->render('CachedEntity/show.html.twig', [
            'entity' => $entity
        ]);
    }
}
