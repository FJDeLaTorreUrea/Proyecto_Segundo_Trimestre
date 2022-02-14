<?php

namespace App\Form;

use App\Entity\Reserva;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('Fecha_Inicio')
            ->add('Fecha_Fin')
            ->add('Nombre')
            ->add('Apellidos')
            ->add('Telefono')
            ->add('Email')
            ->add('Fecha_Nacimiento')
            ->add('Direccion')
            ->add('Desayuno')
            ->add('Comida')
            ->add('Cena')
            ->add('Gim_Spa')
            ->add('Adultos')
            ->add('Menores')
            ->add('Nacionalidad')
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
