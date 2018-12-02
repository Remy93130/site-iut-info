<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\IutLocation;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('base/index.html.twig');
    }

    /**
     * @Route("/carte", name="map")
     */
    public function mapIUT(): Response
    {
        return $this->render('base/map.html.twig');
    }
    
    /**
     * @Route("/api/getMap", name="mapLocation")
     */
    public function getMapFormation(ObjectManager $manager): Response
    {
        $data = $manager->getRepository(IutLocation::class);
        $locations = $data->findAll();
        return $this->json($locations);
    }

    /**
     * @Route("/liens-utiles", name="usefull_link")
     */
    public function usefullLink(): Response
    {
        return $this->render('base/usefullLink.html.twig');
    }

    /**
     * @Route("/partenaires", name="partnership")
     */
    public function partnership(): Response
    {
        return $this->render('base/partnership.html.twig');
    }
}
