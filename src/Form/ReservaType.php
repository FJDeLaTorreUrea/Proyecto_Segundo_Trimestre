<?php

namespace App\Form;

use App\Entity\Reserva;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ReservaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('Fecha_Inicio', DateType::class,[
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'calendar'],
            ])
            ->add('Fecha_Fin', DateType::class,[
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'calendar'],
            ])
            ->add('Desayuno')
            ->add('Comida')
            ->add('Cena')
            ->add('Gim_Spa')
            ->add('Adultos')
            ->add('Menores')
            ->add('Habitacion')
            //->add('Fecha_Reserva')
            //->add('Precio_Final')
            //->add('Usuario')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reserva::class,
        ]);
    }
}
