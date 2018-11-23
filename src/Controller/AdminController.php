<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/", name="admin")
     */
    public function index(ObjectManager $manager): Response
    {
        return $this->render('admin/index.html.twig');
    }
}
