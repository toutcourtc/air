<?php

namespace App\Entity;

use App\Repository\VolRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: VolRepository::class)]
#[Broadcast]
class Vol
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    private ?string $numero_vol = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $depart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $arrivee = null;

    #[ORM\ManyToOne(inversedBy: 'vols')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ville $ville_depart = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ville $ville_arrivee = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?float $reduction = null;

    #[ORM\Column]
    private ?int $nb_places = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroVol(): ?string
    {
        return $this->numero_vol;
    }

    public function setNumeroVol(string $nVol): static
    {
        $this->numero_vol = $this->createFlyNumber();

        return $this;
    }

    public function getDepart(): ?\DateTimeInterface
    {
        return $this->depart;
    }

    public function setDepart(\DateTimeInterface $depart): static
    {
        $this->depart = $depart;

        return $this;
    }

    public function getArrivee(): ?\DateTimeInterface
    {
        return $this->arrivee;
    }

    public function setArrivee(\DateTimeInterface $arrivee): static
    {
        $this->arrivee = $arrivee;

        return $this;
    }

    public function getVilleDepart(): ?Ville
    {
        return $this->ville_depart;
    }

    public function setVilleDepart(?Ville $ville_depart): static
    {
        $this->ville_depart = $ville_depart;

        return $this;
    }

    public function getVilleArrivee(): ?Ville
    {
        return $this->ville_arrivee;
    }

    public function setVilleArrivee(?Ville $ville_arrivee): static
    {
        $this->ville_arrivee = $ville_arrivee;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getReduction(): ?float
    {
        return $this->reduction;
    }

    public function setReduction(float $reduction): static
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nb_places;
    }

    public function setNbPlaces(int $nb_places): static
    {
        $this->nb_places = $nb_places;

        return $this;
    }

    private function createFlyNumber(){
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
            $newChar = $str[$newIndex];
            $flyNumber .= $newChar;
            $count++;
        }
        return $flyNumber;
    }

    public function __toString(){
        return $this->numero_vol;
    }
}
