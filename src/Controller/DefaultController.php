<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 30/04/2019
 * Time: 10:44
 */

namespace App\Controller;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use App\Entity\Glace;
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
     * @Route("parfums", name="parfums_home",methods={"GET"})
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


    /*
        public function modal($id)
    {
        $modal = $this->getDoctrine()
            ->getRepository(Glace::class)
            ->findByLasted($id);

        return $this->render("default/parfums.html.twig",[
            "modal" => $modal
        ]);

    }
    */


    /**
     * @Route("boutiques", name="boutiques")
     *
     */

    public function boutiques()
    {
        return $this->render("default/boutiques.html.twig");
    }



    /**
     * @Route("allergenes", name="allergenes")
     *
     */

    public function allergenes()
    {
        return $this->render("default/allergenes.html.twig");
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
     * @Route("connexion", name="admin")
     *
     */

    public function connexion()
    {
        return $this->render("administrateur/connexion.html.twig");
    }


}

