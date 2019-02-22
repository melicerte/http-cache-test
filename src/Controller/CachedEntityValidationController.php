<?php

namespace App\Controller;

use App\Entity\CachedEntity;
use App\Entity\CachedEntityValidation;
use FOS\HttpCacheBundle\CacheManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CachedEntityValidationController extends AbstractController
{

    private $cacheManager;

    public function __construct(CacheManager $cacheManager)
    {
        $this->cacheManager = $cacheManager;
    }

    public function show(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('App:CachedEntity');

        $entity = $repository->findOneById($id);

        // replace this example code with whatever you need
        $response = $this->render('CachedEntity/show.html.twig', [
            'entity' => $entity
        ]);

        $response->setLastModified($entity->getUpdatedAt());
        $response->setPublic();

        return $response;
    }

    public function touch(Request $request, $id)
    {
        // Invalidate a route
        $this->cacheManager->invalidateRoute('app.cached_entity_validation', ['id' => $id])->flush();
        $this->cacheManager->invalidateRoute('app.cached_entity.list')->flush();

        // replace this example code with whatever you need
        return new Response('touched');
    }
}
