<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 30/04/2019
 * Time: 10:44
 */

namespace App\Controller;


use App\Entity\Administrateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdministrateurController extends AbstractController
{

    public function connexion ()
    {
        /*
        #Creation d'un administrateur unique(Admin)

        $admin = new Administrateur();
        $admin->setNom('IceMan');
        $admin->setPassword('test');
        $admin->setEmail('ice@ice.fr');
        $admin->setRoles (['ROLE_ADMIN']);

        $em = $this->getDoctrine()->getManager();// Permet récuperer le EntityManager de DOCTRINE
        $em->persist($admin); // J'enregistre dans la BDD
        $em->flush(); // j'execute le tout

        $form = null;
        if($form->isSubmitted() && $form->isValid()) {

            $this->addflash('notice',
                'Bravo mon ami, votre article est en ligne !');

            #5.Redirection
            return $this->render('ateliers');
            return $this->redirectToRoute('ateliers');
        }*/


    }

}