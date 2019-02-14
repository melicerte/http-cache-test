<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        $stagiaires = ['Damien', 'Simon'];

        return $this->render('index/index.html.twig', [
            'stagiaires' => $stagiaires,
        ]);
    }
}
