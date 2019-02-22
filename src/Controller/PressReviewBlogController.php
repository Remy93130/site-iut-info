<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PressReviewRepository;
use Symfony\Component\HttpFoundation\Response;

class PressReviewBlogController extends AbstractController
{
    /**
     * @Route("/revues/", name="press_review_blog")
     */
    public function index(PressReviewRepository $rep): Response
    {
        return $this->render('press_review_blog/index.html.twig', [
            'reviews' => $rep->findAll(),
        ]);
    }
}
