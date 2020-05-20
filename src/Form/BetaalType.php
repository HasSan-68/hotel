<?php

namespace App\Form;

use App\Entity\Betaal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BetaalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('soort')
            ->add('creditcardnr')
            ->add('betaaldate')
            ->add('user_id')
            ->add('reservering')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Betaal::class,
        ]);
    }
}
