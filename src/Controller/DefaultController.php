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
            "glaces" => $glaces,

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
        $glaces = $this->getDoctrine()
            ->getRepository(Glace::class)
            ->findAll();

        $allergenes = $this->getDoctrine()
            ->getRepository(Allergenes::class)
            ->findAll() ;



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
     * @Route("footer.", name="footernewsletter")
     * Génération d'un nouvel abonné
     */
    public function AddInNewsletter ()
    {
        # Création d'une personne rentrant son email (Membre du site)

        $newsletter = new Newsletter();
        $repository = $this->getDoctrine()
            ->getRepository(Newsletter::class);

        # Le rentrer dans la base de donnée

        $em = $this->getDoctrine()->getManager(); // Permet de récupérer le EntityManager de Doctrine
        $em->persist($newsletter); // J'enregistre dans ma base la catégorie
        $em->flush(); // J'execute le tout.

        # Retourner une réponse à la vue
        return $this->render("administrateur/connexion.html.twig");

    }


    /**
     * @Route("dashboard", name="dashindex")
     *Page d'Accueil
     */

    public function dashboard ()
    {
        $glaces = $this->getDoctrine()
            ->getRepository(Glace::class)
            ->findAll();

        $newletters = $this->getDoctrine()
            ->getRepository(Newsletter::class)
            ->findAll();

        $allergenes = $this->getDoctrine()
            ->getRepository(Allergenes::class)
            ->findAll();


        return $this->render("dashboard/indexdashboard.html.twig", [
            "glaces" => $glaces,
            "newsletters" => $newletters,
            "allergenes" => $allergenes,
        ]);

    }



    /**
     * @Route("dashboard/allergenes", name="dashallergenes")
     *
     */

    public function dashboardallergene ()
    {
        $glaces = $this->getDoctrine()
            ->getRepository(Glace::class)
            ->findAll();

        $allergenes = $this->getDoctrine()
            ->getRepository(Allergenes::class)
            ->findAll();

        return $this->render("dashboard/allergenes-dashboard.html.twig", [
            "allergenes" => $allergenes,
            "glaces" => $glaces,
        ]);

    }

    /**
     * @Route("dashboard/produits", name="gestion_des_produits")
     * Gestion des Produits
     */


    public function dashboardproduits()

    {
        $glaces = $this->getDoctrine()
            ->getRepository(Glace::class)
            ->findAll();

        return $this->render("dashboard/produits-dashboard.html.twig", [
            "glaces" => $glaces
        ]);
    }

    /**
     * @Route("dashboard/newsletter", name="gestion_de_la_newsletter")
     * Gestion de la Newsletter
     */


    public function newsletter()

    {
        $newletters = $this->getDoctrine()
            ->getRepository(Newsletter::class)
            ->findAll();

        return $this->render("dashboard/newsletter-dashboard.html.twig", [
            "newsletters" => $newletters
        ]);

    }


}

