<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Testimony;

class TestimonyBlogController extends AbstractController
{
    /**
     * @Route("/temoignages", name="testimony_blog")
     */
    public function index(ObjectManager $manager)
    {
        $data = $manager->getRepository(Testimony::class);
        $testimonies = $data->findAll();
        foreach ($testimonies as $testimony) {
            if (!null == $image = $testimony->getPicture()) {
                $testimony->setPicture(base64_encode(stream_get_contents($image)));
            } else {
                $testimony->setPicture(null);
            }
        }
        return $this->render('testimony_blog/index.html.twig', [
            "testimonies" => $testimonies
        ]);
    }
}
