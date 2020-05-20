<?php

namespace App\Form;

use App\Entity\FosUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FosUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('username_canonice')
            ->add('email')
            ->add('email_canonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('last_login')
            ->add('confirmation_token')
            ->add('password_requeste')
            ->add('roles')
            ->add('last_activity')
            ->add('tel_nr')
            ->add('mobile_nr')
            ->add('first_name')
            ->add('insertion_name')
            ->add('last_name')
            ->add('adress')
            ->add('zip')
            ->add('city')
            ->add('country')
            ->add('functioneel')
            ->add('organisation_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FosUser::class,
        ]);
    }
}
