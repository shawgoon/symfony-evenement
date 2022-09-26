<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegistrationType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserRegistrationController extends AbstractController
{
    /**
     * @Route("/user/registration", name="app_user_registration")
     */
    public function registration(ObjectManager $objectManager, Request $requete,
    UserPasswordEncoderInterface $userPasswordEncoderInterface): Response
    {
        $user = new User();
        $form = $this->createForm(UserRegistrationType::class,$user);
        $form->handleRequest($requete);
        if($form->isSubmitted() && $form->isValid()){
            $hash = $userPasswordEncoderInterface->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
            $objectManager->persist($user);
            $objectManager->flush();
            return $this->redirectToRoute('app_login');
        }
        return $this->render('user_registration/index.html.twig', [
            "formulaire" => $form->createView()
        ]);
    }
}
