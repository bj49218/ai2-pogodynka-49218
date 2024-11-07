<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('celsius',null,[
        'attr' =>[
            'placeholder'=>'Enter temperature',
        ],
    ])
            ->add('cloudcover',ChoiceType::class,[
                'choices' =>[
                    'Very Cloudy' => 'Very Cloudy',
                    'Cloudy'=> 'Cloudy',
                    'Partly Cloudy'=> 'Partly Cloudy',
                    'No Clouds'=> 'No Clouds',
                ],
            ])
            ->add('humidity',null,[
                'attr' =>[
                    'placeholder'=>'Enter humidity',
                ],
            ])
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'city',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
