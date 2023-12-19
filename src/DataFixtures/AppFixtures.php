<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Ville;
use App\Entity\Vol;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        function createFlyNumber(){
            $ABC = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $nbs = "0123456789";
            $flyNumber = '';
            $count = 0;
            while($count<6){
                if(strlen($flyNumber)<=1){
                    $newIndex = mt_rand(0, 25);
                    $str = $ABC;
                    
                }
                else{
                    $newIndex = mt_rand(0, 9);
                    $str = $nbs;
                }
                $newChar = substr($str, $newIndex, 1);
                $flyNumber .= $newChar;
                $count++;
            }
            return $flyNumber;
        }

        for($i=0; $i<20; $i++){
            $ville = new Ville();
            $nom = "Ville$i";
            $ville->setNom($nom);
            $manager->persist($ville);
        }
        $manager->flush();
        

        for($i=0; $i<20; $i++){

            $vol = new Vol();
            $vol->setNumeroVol();
            $depart = new \DateTime();
            $vol->setDepart($depart);
            $dureeVol = mt_rand(1, 24);
            $interval =  \DateInterval::createFromDateString("$dureeVol hours");
            $arrivee = date_add($depart, $interval);
            $vol->setArrivee($arrivee);

            $iDepart = mt_rand(0, 19);
            $villeDepart = new Ville();
            $villeDepart->setNom("Ville$iDepart");            
            $vol->setVilleDepart($villeDepart);

            $iArrivee = mt_rand(0, 19);
            $villeArrivee = new Ville();
            $villeArrivee->setNom("Ville$iArrivee");
            $vol->setVilleArrivee($villeArrivee);

            $prix = mt_rand(150, 2000);
            $vol->setPrix($prix);
            $redBool = mt_rand(0, 1);
            $reduction = boolval($redBool);
            $vol->setReduction($reduction);
            $nbPlaces = mt_rand(20, 200);
            $vol->setNbPlaces($nbPlaces);

            $manager->persist($vol);
        }
        $manager->flush();
    }
}
