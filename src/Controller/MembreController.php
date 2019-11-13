<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Entity\Statut;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends AbstractController
{
    /**
     * @Route("/bureau-pieds-noirs", name="bureau")
     */

    public function show()
    {
        $liste_membres = $this->getDoctrine()
                         ->getManager()
                         ->getRepository(Membre::class)
                         ->getMemberWithStatus();

        return $this->render('pages/membres.html.twig', ['liste_membres'=>$liste_membres]);
    }
}
