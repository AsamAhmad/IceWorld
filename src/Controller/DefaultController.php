<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 30/04/2019
 * Time: 10:44
 */

namespace App\Controller;


use App\Entity\Administrateur;
use App\Entity\Allergenes;
use App\Entity\Glace;
use App\Entity\Newsletter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{


    /**
     * @Route("/", name="accueil")
     * page d'Accueil
     */
    public function index()
    {
        return $this->render("default/index.html.twig");
    }

    /**
     * @Route("parfums", name="parfums_home")
     */
    public function parfums()
    {
        $glaces = $this->getDoctrine()
            ->getRepository(Glace::class)
            ->findAll();

        return $this->render("default/parfums.html.twig", [
            "glaces" => $glaces
        ]);
    }

    /**
     * @Route("boutiques", name="boutiques")
     */
    public function boutiques()
    {
        return $this->render("default/boutiques.html.twig");
    }

    /**
     * @Route("/allergenes", name="allergenes")
     *
     */
    public function allergenes()
    {

        $allergenes = $this->getDoctrine()
            ->getRepository(Allergenes::class)
            ->findAll();

        $glaces = $this->getDoctrine()
            ->getRepository(Glace::class)
            ->findAll();

        return $this->render("default/allergenes.html.twig", [
            "glaces" => $glaces,
            "allergenes" => $allergenes
        ]);
    }

    /**
     * @Route("ateliers", name="ateliers")
     *
     */

    public function ateliers()
    {
        return $this->render("default/ateliers.html.twig");
    }

    /**
     * @Route("dashboard", name="dash")
     *
     */

    public function dashboard ()
    {
        $glaces = $this->getDoctrine()
            ->getRepository(Glace::class)
            ->findAll();

        return $this->render("dashboardd/panneaux.html.twig", [
            "glaces" => $glaces
        ]);

    }



    /**
     * @Route("connexion", name="admin")
     *
     */

    public function connexion ()
    {
        # Création d'un administrateur

        $connexion = new Administrateur();
        $connexion->setNom("France");
        $connexion->setPassword("");
        $connexion->setEmail("hugo@technews.com");

        # Le rentrer dans la base de donnée
        $em = $this->getDoctrine()->getManager(); // Permet de récupérer le EntityManager de Doctrine
        $em->persist($connexion); // J'enregistre dans ma base le
        $em->flush(); // J'execute le tout.

        # Retourner une réponse à la vue
        return $this->render("administrateur/connexion.html.twig");
    }



    public function AddInNewsletter ()
    {
        # Création d'une personne rentrant son email (Membre du site)

        $newsletter = new Newsletter();
        $newsletter->setEmail("hugo@news.com");

        # Le rentrer dans la base de donnée

        $em = $this->getDoctrine()->getManager(); // Permet de récupérer le EntityManager de Doctrine
        $em->persist($newsletter); // J'enregistre dans ma base la catégorie
        $em->flush(); // J'execute le tout.

        # Retourner une réponse à la vue
        return $this->render("administrateur/connexion.html.twig");

    }

    /**
     * @Route("dashboard", name="dash")
     *
     */

    public function dashboard ()
    {
        return $this->render("dashboardd/panneaux.html.twig");
    }


    public function AddInNewsletter ($newsletter)
    {
        # Création d'une personne rentrant son email (Membre du site)

        $membre = new Newsletter();
        $membre->setEmail("hugo@technews.com");

        # Le rentrer dans la base de donnée

        $em = $this->getDoctrine()->getManager(); // Permet de récupérer le EntityManager de Doctrine
        $em->persist($newsletter); // J'enregistre dans ma base la catégorie
        $em->flush(); // J'execute le tout.

        # Retourner une réponse à la vue
        return $this->render("default/ateliers.html.twig");
    }






}

