<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', []);
    }
    /**
     * @Route("/showEvents", name="afficheEvents")
     */
    public function showEvents(){
        $repo = $this->getDoctrine()->getRepository(Event::class);
        $events = $repo->findAll();
        // dd($events);
        return $this->render('home/showEvents.html.twig',[
            'events' => $events
        ]);
    }
    /**
     * @Route("/addEvent", name="ajoutEvent")
     */
    public function addEvent(ObjectManager $objetManager, Request $requete){
        $event = new Event();
        $form = $this->createForm(EventType::class,$event);
        $form->handleRequest($requete);
        if($form->isSubmitted() && $form->isValid()){
            $objetManager->persist($event);
            $objetManager->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('home/addEvent.html.twig',[
            'formulaire' => $form->createView()
        ]);
    }
}
