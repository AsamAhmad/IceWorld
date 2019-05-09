<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 09/05/2019
 * Time: 13:09
 */

namespace App\Service\Twig;


use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GlaceTwigExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('isAllergenInIceCrean', function (object $allergenes, string $allergene) {

                foreach ($allergenes as $aller) {
                    return $aller->getName() === $allergene;
                    break;
                }

                return false;

            })
        ];
    }

}