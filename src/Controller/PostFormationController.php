<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostFormationController extends AbstractController
{
    /**
     * @Route("/apres-le-dut", name="post_formation")
     */
    public function postFormation(): Response
    {
        return $this->render('base/postFormation.html.twig');
    }
}
