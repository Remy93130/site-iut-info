<?php

namespace App\Controller\admin;

use App\Entity\PressReview;
use App\Form\PressReviewType;
use App\Repository\PressReviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/press-review")
 */
class PressReviewController extends AbstractController
{
    /**
     * @Route("/", name="press_review_index", methods={"GET"})
     */
    public function index(PressReviewRepository $pressReviewRepository): Response
    {
        return $this->render('admin/press_review/index.html.twig', [
            'press_reviews' => $pressReviewRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="press_review_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pressReview = new PressReview();
        $form = $this->createForm(PressReviewType::class, $pressReview);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pressReview);
            $entityManager->flush();

            return $this->redirectToRoute('press_review_index');
        }

        return $this->render('admin/press_review/new.html.twig', [
            'press_review' => $pressReview,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="press_review_show", methods={"GET"})
     */
    public function show(PressReview $pressReview): Response
    {
        return $this->render('admin/press_review/show.html.twig', [
            'press_review' => $pressReview,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="press_review_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PressReview $pressReview): Response
    {
        $form = $this->createForm(PressReviewType::class, $pressReview);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('press_review_index', [
                'id' => $pressReview->getId(),
            ]);
        }

        return $this->render('admin/press_review/edit.html.twig', [
            'press_review' => $pressReview,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="press_review_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PressReview $pressReview): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pressReview->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pressReview);
            $entityManager->flush();
        }

        return $this->redirectToRoute('press_review_index');
    }
}
