<?php 
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Sabre\DAV\Client;

class FileController extends AbstractController
{
    
     #Route("/list-files", name="list_files")
     
    public function listFiles(): Response
    {
        // Configuration du client WebDAV
        $client = new Client([
            'baseUri' => 'https://crmt.scriptzenit.fr/remote.php/dav/',
            'userName' => 'admin',   // Remplacez par le nom d'utilisateur Nextcloud
            'password' => 'sciptzenit123',   // Remplacez par le mot de passe Nextcloud
        ]);

        try {
            // Liste des fichiers dans le répertoire de base
            $result = $client->propFind('/', ['{http://owncloud.org/ns}permissions'], 1);
        } catch (\Exception $e) {
            return new Response('Erreur lors de l\'accès aux fichiers : ' . $e->getMessage());
        }

        // Traitement des fichiers (affichage ou autre)
        return $this->render('file/list.html.twig', [
            'files' => $result,
        ]);
    }
}
?>