<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Espece;
use App\Entity\Continent;

//use App\Form\EspeceType;
use Symfony\App\Form\ContinentType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('color')
            ->add('famille')
            ->add('poids')
            ->add('espece',EntityType::class,[
                'class' => Espece::class,
                'choice_label' => 'libelle'
            ])
            ->add('continents',EntityType::class,[
                'class' => Continent::class,
                'choice_label' => 'libelle',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false,
            ])
            //->add('espece', EspeceType::class)
            //->add('continent', ContinentType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
