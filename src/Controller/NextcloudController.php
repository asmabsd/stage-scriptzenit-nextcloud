<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
class NextcloudController extends AbstractController
{
    #[Route('/nextcloud', name: 'app_nextcloud')]
    public function index(): Response
    {
        return $this->render('nextcloud/index.html.twig', [
            'controller_name' => 'NextcloudController',
        ]);
    }

   /* public function nextcloudLogin(): RedirectResponse
    {
        $nextcloudUrl = 'http://127.0.0.1:8081';
        return $this->redirect($nextcloudUrl);
    }*/
    public function nextcloudLogin(): RedirectResponse
    {
        $nextcloudUrl = 'https://crmt.scriptzenit.fr/index.php?d=1';
        return $this->redirect($nextcloudUrl);
    }

}
