<?php

namespace App\Controller;
use App\Service\CalDavService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends AbstractController
{
    private CalDavService $calDavService;

    public function __construct(CalDavService $calDavService)
    {
        $this->calDavService = $calDavService;
    }



    #[Route('/calendar-view', name: 'calendar_view')]
    public function viewCalendar(): Response
    {
        
        $url = 'https://crmt.scriptzenit.fr/apps/calendar/dayGridMonth/now';

        
        return $this->redirect($url);
    }

    #[Route("/calendars", name:"calendars")]
    public function listCalendars(): Response
    {
        try {
            $calendars = $this->calDavService->getCalendars();
            return $this->render('calendar/list.html.twig', [
                'calendars' => $calendars,
            ]);
        } catch (\Exception $e) {
            return new Response('Failed to fetch calendars: ' . $e->getMessage());
        }
    }

    #[Route('/create-event', name:"create_event")]
    public function createEvent(): Response
    {
        $eventData = [
            'uid' => 'event1',
            'ics' => "BEGIN:VCALENDAR\nVERSION:2.0\nBEGIN:VEVENT\nSUMMARY:Test Event\nEND:VEVENT\nEND:VCALENDAR",
        ];

        try {
            $this->calDavService->createEvent('/calendars/user/my_calendar', $eventData);
            return new Response('Event created successfully!');
        } catch (\Exception $e) {
            return new Response('Failed to create event: ' . $e->getMessage());
        }
    }
}