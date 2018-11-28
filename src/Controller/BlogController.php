<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Offer;

class BlogController extends AbstractController
{
    /**
     * @Route("/offres", name="offers")
     */
    public function index(ObjectManager $manager): Response
    {
        $data = $manager->getRepository(Offer::class);
        $stages = $data->findAllByTypeName("Stage");
        $alternances = $data->findAllByTypeName("Alternance");
        
        return $this->render('blog/index.html.twig', [
            "stages" => $stages,
            "alternances" => $alternances
        ]);
    }

    /**
     * @Route(
     *     "/offres/{idOffer}",
     *     name="specific_offer",
     *     requirements={"idOffer"="\d+"}
     * )
     */
    public function seeOffer(int $idOffer, ObjectManager $manager) : Response
    {
        $data = $manager->getRepository(Offer::class);
        $offer = $data->find($idOffer);

        return $this->render('blog/offer.html.twig', [
            "offer" => $offer
        ]);
    }
}
