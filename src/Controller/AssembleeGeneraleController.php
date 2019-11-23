<?php

namespace App\Controller;

use App\Entity\AssembleeGenerale;
use App\Form\AssembleeGeneraleType;
use App\Repository\AssembleeGeneraleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/assemblee-generale")
 */
class AssembleeGeneraleController extends AbstractController
{
    /**
     * @Route("/assemblee-generale", name="assemblee_generale_index", methods={"GET"})
     */

    public function index()
    {

        $liste_ag = $this->getDoctrine()
        ->getManager()
        ->getRepository(AssembleeGenerale::class)
        ->getAll();

        return $this->render('pages/assemblee_generale/index.html.twig', ['liste_ag'=>$liste_ag]);
    }

    /**
     * @Route("/new", name="assemblee_generale_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $assembleeGenerale = new AssembleeGenerale();
        $form = $this->createForm(AssembleeGeneraleType::class, $assembleeGenerale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($assembleeGenerale);
            $entityManager->flush();

            return $this->redirectToRoute('assemblee_generale_index');
        }

        return $this->render('pages/assemblee_generale/new.html.twig', [
            'assemblee_generale' => $assembleeGenerale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="assemblee_generale_show", methods={"GET"})
     */
    public function show(AssembleeGenerale $assembleeGenerale): Response
    {
        return $this->render('pages/assemblee_generale/show.html.twig', [
            'assemblee_generale' => $assembleeGenerale,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="assemblee_generale_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AssembleeGenerale $assembleeGenerale): Response
    {
        $form = $this->createForm(AssembleeGeneraleType::class, $assembleeGenerale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('assemblee_generale_index');
        }

        return $this->render('pages/assemblee_generale/edit.html.twig', [
            'assemblee_generale' => $assembleeGenerale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="assemblee_generale_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AssembleeGenerale $assembleeGenerale): Response
    {
        if ($this->isCsrfTokenValid('delete'.$assembleeGenerale->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($assembleeGenerale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('assemblee_generale_index');
    }
}
