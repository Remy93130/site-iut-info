<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;

class BlogController extends AbstractController
{
    /**
     * @Route("/offres", name="offers")
     */
    public function index(ObjectManager $manager): Response
    {
        return $this->render('blog/index.html.twig');
    }
}
