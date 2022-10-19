<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Event;
use App\Form\CategoryType;
use App\Form\EventType;
use Doctrine\Persistence\ManagerRegistry;
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
    public function index(ObjectManager $objetManager, Request $requete): Response
    {
        $catEvent = new Category();
        $form = $this->createForm(CategoryType::class,$catEvent);
        $form->handleRequest($requete);
        if($form->isSubmitted() && $form->isValid()){
            $objetManager->persist($catEvent);
            $objetManager->flush();
            return $this->redirectToRoute('app_catEvents');
        }
        return $this->render('home/index.html.twig', [
            'formulaire' => $form->createView(),
            'catEvent' => $catEvent,
        ]);
    }
    /**
     * @Route("/showEvents", name="app_afficheEvents")
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
     * @Route("/addEvent", name="app_ajoutEvent")
     */
    public function addEvent(ObjectManager $objetManager, Request $requete){
        $event = new Event();
        $form = $this->createForm(EventType::class,$event);
        $form->handleRequest($requete);
        if($form->isSubmitted() && $form->isValid()){
            $objetManager->persist($event);
            $objetManager->flush();
            return $this->redirectToRoute('app_afficheEvents');
        }
        return $this->render('home/addEvent.html.twig',[
            'formulaire' => $form->createView()
        ]);
    }
    /**
     * @Route("/catEvent/{id}",name="app_catEvents")
     */
    public function catEvents(ManagerRegistry $doctrine, $id){
        $om = $doctrine->getRepository(Category::class);
        $catEvents = $om->findEventByCategory($id);
        return $this->render("home/catEvent.html.twig",[
            'catEvents' => $catEvents,
        ]);
    }

}
