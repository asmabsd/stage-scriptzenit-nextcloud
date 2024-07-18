<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyController extends AbstractController
{


    #[Route('/cloud', name: 'cloud')]
    
    public function listFiles(): Response
    {
        
        $nextcloudDir = '/var/www/html/nextcloud'; // Assurez-vous que ce chemin est correct pour votre configuration spécifique

        // Lire la liste des fichiers
        $files = scandir($nextcloudDir);
        
        // Afficher la liste des fichiers
        foreach ($files as $file) {
            echo $file . "\n";
        }}
}
