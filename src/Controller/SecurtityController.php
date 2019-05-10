<?php

namespace App\Controller;

use App\Entity\Administrateur;
use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurtityController extends AbstractController
{

    /** @Route("/inscription" , name="security_registration", methods={"GET", "POST"}))*/

    public function registration(Request $request, ObjectManager $manager,UserPasswordEncoderInterface $encoder){

        $user = new Administrateur();
        $form = $this->createForm(RegistrationType::class , $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            # 3. Sauvegarde en BDD
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('security_login');
        }
        return $this->render('administrateur/registration.html.twig', [
            'form' => $form->createView()

        ]);
    }

    /** @Route("/connexion" , name="security_login")*/

    public function login(){
/*
        $form = $this->;
        $form->handleRequest($request);

        if ($form->isValid()) {

            return $this->redirectToRoute('dashindex');
        }
 */
        return $this->render('administrateur/connexion.html.twig');
    }

    /** @Route("/deconnexion" , name="security_logout")*/

    public function logout() {}
}
