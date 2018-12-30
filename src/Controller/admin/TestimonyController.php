<?php

namespace App\Controller\admin;

use App\Entity\Testimony;
use App\Form\TestimonyType;
use App\Repository\TestimonyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/testimony")
 */
class TestimonyController extends AbstractController
{
    /**
     * @Route("/", name="testimony_index", methods="GET")
     */
    public function index(TestimonyRepository $testimonyRepository): Response
    {
        return $this->render('admin/testimony/index.html.twig', ['testimonies' => $testimonyRepository->findAll()]);
    }

    /**
     * @Route("/new", name="testimony_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $testimony = new Testimony();
        $form = $this->createForm(TestimonyType::class, $testimony);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($testimony);
            $em->flush();

            return $this->redirectToRoute('testimony_index');
        }

        return $this->render('admin/testimony/new.html.twig', [
            'testimony' => $testimony,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="testimony_show", methods="GET")
     */
    public function show(Testimony $testimony): Response
    {
        return $this->render('admin/testimony/show.html.twig', ['testimony' => $testimony]);
    }

    /**
     * @Route("/{id}/edit", name="testimony_edit", methods="GET|POST")
     */
    public function edit(Request $request, Testimony $testimony): Response
    {
        $form = $this->createForm(TestimonyType::class, $testimony);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('testimony_edit', ['id' => $testimony->getId()]);
        }

        return $this->render('admin/testimony/edit.html.twig', [
            'testimony' => $testimony,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="testimony_delete", methods="DELETE")
     */
    public function delete(Request $request, Testimony $testimony): Response
    {
        if ($this->isCsrfTokenValid('delete'.$testimony->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($testimony);
            $em->flush();
        }

        return $this->redirectToRoute('admin/testimony_index');
    }
}
