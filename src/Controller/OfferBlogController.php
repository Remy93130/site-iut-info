<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Entity\Offer;

class OfferBlogController extends AbstractController
{
    /**
     * @Route("/offres", name="offers")
     */
    public function index(ObjectManager $manager): Response
    {
        $data = $manager->getRepository(Offer::class);
        $stages = $data->findAllByTypeName("Stage");
        $alternances = $data->findAllByTypeName("Alternance");
        
        return $this->render('offer_blog/index.html.twig', [
            "stages" => $stages,
            "alternances" => $alternances
        ]);
    }

    /**
     * @Route("/offres/{idOffer}", name="specific_offer", methods="GET")
     * @ParamConverter("offer", options={"mapping": {"idOffer" : "id"}})
     */
    public function seeOffer(Offer $offer, ObjectManager $manager): Response
    {
        return $this->render('offer_blog/offer.html.twig', [
            "offer" => $offer
        ]);
    }
}
