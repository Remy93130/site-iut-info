<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $items = [];
        $names = ["Didier", "Paul", "Albert"];
        $usages = ["Webdev", "Project Manager", "Designer"];
        $numbers = [4, 5, 2];

        for ($i = 0; $i < 3; $i++) {
            array_push($items, [
                $names[$i],
                $usages[$i],
                $numbers[$i],
            ]);
        }

        return $this->render('base/index.html.twig', [
            'controller_name' => 'BaseController',
            'items' => $items,
        ]);
    }
}
