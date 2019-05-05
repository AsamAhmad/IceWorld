<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 02/05/2019
 * Time: 11:48
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
/**
 * @Route("accueil-dashboard", name="accueil-dashboard")
 * Page D'accueil
 */

    public function index()

    {
        return $this->render("dashboard/accueil-dashboard.html.twig");
    }



/**
 * @Route("produits", name="gestion des produits")
 * Gestion des Produits
 */


    public function produits()

    {
        return $this->render("dashboard/produits.html.twig");
    }








}
