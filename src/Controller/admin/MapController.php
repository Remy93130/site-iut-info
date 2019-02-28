<?php

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\IutLocation;
use Symfony\Component\HttpFoundation\Request;
use App\Form\IutLocationType;

class MapController extends AbstractController
{
    /**
     * @Route("/admin/map", name="map_index", methods="GET")
     * @param EntityManagerInterface $em
     */
    public function index(EntityManagerInterface $em): Response
    {
        $db = $em->getRepository(IutLocation::class);
        $points = $db->findAll();
        return $this->render("admin/map/index.html.twig", [
            'points' => $points,
        ]);
    }
    
    /**
     * @Route("/admin/map/new", name="map_new", methods="GET|POST")
     * @param Request $request
     */
    public function new(Request $request)
    {
        $point = new IutLocation();
        $form = $this->createForm(IutLocationType::class, $point);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($point);
            $em->flush();
            
            return $this->redirectToRoute("map_index");
        }
        
        return $this->render("admin/map/new.html.twig", [
            'point' => $point,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/admin/map/{id}", name="map_show", methods="GET")
     * @param IutLocation $point
     */
    public function show(IutLocation $point): Response
    {
        return $this->render("admin/map/show.html.twig", [
            'point' => $point,
        ]);
    }
    
    /**
     * @Route("/admin/map/{id}/edit", name="map_edit", methods="GET|POST")
     * @param Request $request
     * @param IutLocation $point
     */
    public function edit(Request $request, IutLocation $point)
    {
        $form = $this->createForm(IutLocationType::class, $point);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            return $this->redirectToRoute("map_index");
        }
        
        return $this->render("admin/map/edit.html.twig", [
            'point' => $point,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/admin/map/{id}", name="map_delete", methods="DELETE")
     * @param Request $request
     * @param IutLocation $offer
     */
    public function delete(Request $request, IutLocation $point)
    {
        if ($this->isCsrfTokenValid('delete'.$point->getId(), $request->request->get("_token"))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($point);
            $em->flush();
        }
        
        return $this->redirectToRoute("map_index");
    }
}

