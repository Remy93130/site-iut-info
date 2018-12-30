<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Testimony;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;

class TestimonyBlogController extends AbstractController
{
    /**
     * @Route("/temoignages", name="testimonies")
     */
    public function index(ObjectManager $manager): Response
    {
        $data = $manager->getRepository(Testimony::class);
        $testimonies = $data->findAll();

        return $this->render('testimony_blog/index.html.twig', [
            "testimonies" => $testimonies
        ]);
    }
    
    /**
     * @Route("/temoignages/{idTestimony}", name="specific_testimony", methods="GET")
     * @ParamConverter("testimony", options={"mapping": {"idTestimony" : "id"}})
     */
    public function seeTestimony(MarkdownParserInterface $parser, Testimony $testimony, ObjectManager $manager): Response
    {
        $text = $testimony->getContent();
        $testimony->setContent($parser->transformMarkdown($text));
        return $this->render("testimony_blog/testimony.html.twig", [
            "testimony" => $testimony
        ]);
    }
}
