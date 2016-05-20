<?php

namespace SandraPokemonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surnom')
            ->add('niveau')
            ->add('capture', 'date')
            ->add('idDresseur')
            ->add('idTypePokemons')
            ->add('idAttaques4')
            ->add('idAttaques3')
            ->add('idAttaques2')
            ->add('idAttaques1')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SandraPokemonBundle\Entity\Pokemons'
        ));
    }
}
