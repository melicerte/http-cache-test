<?php

namespace App\Controller;

use App\Entity\CachedEntityValidation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CachedEntityValidationController extends AbstractController
{

    public function show(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('App:CachedEntity');

        $entity = $repository->findOneById($id);

        // replace this example code with whatever you need
        return $this->render('CachedEntity/show.html.twig', [
            'entity' => $entity
        ]);
    }

    public function touch(Request $request, $id)
    {
        $cacheManager = $this->get('fos_http_cache.cache_manager');

        // Invalidate a route
        $cacheManager->invalidateRoute('app.cached_entity_validation', array('id' => $id))->flush();

        // replace this example code with whatever you need
        return new Response('touched');
    }
}
