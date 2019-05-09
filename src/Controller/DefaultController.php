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






}

