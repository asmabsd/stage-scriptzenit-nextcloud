<?php
namespace App\Service;

use Sabre\DAV\Client;
use Sabre\DAV\Exception;

class CalDavService
{
    private Client $client;

   /* public function __construct(string $baseUri, string $username, string $password)
    {
        $this->client = new Client([
            'base_uri' => $baseUri, 
            'userName' => $username,
            'password' => $password,
        ]);
    }*/

    public function getCalendars(): array
    {
        try {
            $calendars = $this->client->propFind('/', ['{urn:ietf:params:xml:ns:caldav}calendar-home-set'], 1);
            return $calendars;
        } catch (Exception $e) {
            throw new \RuntimeException('Error fetching calendars: ' . $e->getMessage());
        }
    }

    public function createEvent(string $calendarUrl, array $eventData): void
    {
        try {
            $this->client->request('PUT', $calendarUrl . '/' . $eventData['uid'] . '.ics', $eventData['ics']);
        } catch (Exception $e) {
            throw new \RuntimeException('Error creating event: ' . $e->getMessage());
        }
    }
}
 ?>