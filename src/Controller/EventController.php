<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index(): Response
    {
        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
        ]);
    }


    #[Route('/create-nextcloud-event', name: 'create_nextcloud_event')]
    public function createEvent(): Response
    {
        // Obtenir la date et l'heure actuelles
        $currentDateTime = new \DateTime();

        // Définir l'heure de début comme maintenant
        $startTimestamp = $currentDateTime->getTimestamp();

        // Définir l'heure de fin une heure plus tard
        $endTimestamp = $currentDateTime->modify('+1 hour')->getTimestamp();

        // Construire l'URL pour créer un nouvel événement dans Nextcloud
        $url = sprintf(
            'https://crmt.scriptzenit.fr/apps/calendar/listMonth/now/new/sidebar/0/%d/%d',
            $startTimestamp,
            $endTimestamp
        );

        // Rediriger vers l'URL de création d'événement dans Nextcloud
        return $this->redirect($url);
    }
}
