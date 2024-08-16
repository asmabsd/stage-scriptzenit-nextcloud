<?php
namespace App\Controller;




use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;

class ShareController extends AbstractController
{
    
      #Route("/share-file", name="share_file")
     
    public function shareFile(): Response
    {
        $httpClient = HttpClient::create();

        $url = 'http://127.0.0.1:8081/ocs/v1.php/apps/files_sharing/api/v1/shares';
        $response = $httpClient->request('POST', $url, [
            'headers' => [
                'OCS-APIREQUEST' => 'true',
                'Authorization' => 'Basic ' . base64_encode('username:password'),
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'body' => [
                'path' => '/path/to/file',
                'shareType' => 3,  // 3 = share with link
                'permissions' => 31,  // full permissions
                'expireDate' => '2024-12-31T23:59:59Z',
                'password' => 'password123',
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getContent();

        return new Response('Partage créé avec succès, code de réponse: ' . $statusCode);
    }
}

?>