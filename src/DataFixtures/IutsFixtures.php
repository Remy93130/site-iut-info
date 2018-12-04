<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\IutLocation;

class IutsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $locations = [
            "Bayonne", "Bordeaux", "La Rochelle", "Nantes", "Vannes", "Lannion", "Caen", "Le Havre", "Calais", "Lille",
            "Lens", "Amien", "Reims", "Metz", "St Die", "Nancy", "Strasbourg", "Orleans", "Belfort", "Dijon", "Limoges",
            "Lyon", "Clermont-Ferrand", "Le Puy", "Grenoble", "Valence", "Rodez", "Toulouse", "Aix en Provence",
            "Montpelier", "Nice", "Blagnac", "Arles", "Annecy", "Laval", "Maubeuge", "Fontainebleau", "Orsay",
            "Velizy", "Paris 5", "Montreuil", "Villetaneuse", "Marne la Vallee"
        ];
        
        $lon = [
            "43.477762", "44.791246", "46.141837", "47.223153", "47.644399", "48.758299", "49.211999", "49.516135",
            "50.950735", "50.613141", "50.437623", "49.870932", "49.240781", "49.12029", "48.290039", "48.682855",
            "48.579035", "47.843591", "47.643524", "47.31102", "45.835641", "46.215365", "45.762018", "45.039845",
            "45.191801", "44.915729", "44.360246", "43.570774", "43.514636", "43.635378", "43.687685", "43.649119",
            "43.672397", "45.920663", "48.085759", "50.276575", "48.62705", "48.711629", "48.78186", "48.841665",
            "48.862463", "48.956009", "48.837015"
        ];
        
        $lat = [
            "-1.508621", "-0.609401", "-1.151782", "-1.544586", "-2.776766", "-3.451866", "-0.369627", "0.162461",
            "1.883344", "3.138344", "2.809546", "2.264166", "4.061792", "6.163778", "6.942219", "6.161137",
            "7.768019", "1.925187", "6.840096", "5.068491", "1.230974", "5.24153", "3.108729", "3.880644", "5.717049",
            "4.915653", "2.57583", "1.464753", "5.4512", "3.850724", "7.227459", "1.374802", "4.639728", "6.153388",
            "-0.757084", "3.983792", "2.560719", "2.170526", "2.218232", "2.268366", "2.46418", "2.342333", "2.584719"
        ];
        
        for ($i = 0; $i < count($locations); $i++) {
            $content = "IUT de " . $locations[$i];
            $iut = new IutLocation();
            $iut
                ->setContent($content)
                ->setLat($lat[$i])
                ->setLon($lon[$i]);
            $manager->persist($iut);
        }

        $manager->flush();
    }
}
