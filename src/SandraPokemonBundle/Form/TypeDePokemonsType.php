<?php

namespace SandraPokemonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeDePokemonsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('attaque')
            ->add('attaqueSpe')
            ->add('defence')
            ->add('defenceSpe')
            ->add('vitesse')
            ->add('pv')
            ->add('idZones')
            ->add('idTypes')
            ->add('idTypePokemonsEvolution')
            ->add('idTypePok')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SandraPokemonBundle\Entity\TypeDePokemons'
        ));
    }
}
