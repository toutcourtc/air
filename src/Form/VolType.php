<?php

namespace App\Form;

use App\Entity\Ville;
use App\Entity\Vol;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero_vol')
            ->add('depart')
            ->add('arrivee')
            ->add('prix')
            ->add('reduction')
            ->add('nb_places')
            ->add('ville_depart', EntityType::class, [
                'class' => Ville::class,
'choice_label' => 'nom',
            ])
            ->add('ville_arrivee', EntityType::class, [
                'class' => Ville::class,
'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vol::class,
        ]);
    }
}
