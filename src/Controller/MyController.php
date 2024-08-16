<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;


class MyController extends AbstractController

{

     // #[Route('/calendar', name: 'app_calendar')]
   #[Route("/nextcloud-login", name:"nextcloud_login")]
     
    public function nextcloudLogin(): RedirectResponse
    {
        // Redirige vers la page de connexion Nextcloud
        $nextcloudUrl = 'http://127.0.0.1:8081';
        return $this->redirect($nextcloudUrl);
    }

}
?>


