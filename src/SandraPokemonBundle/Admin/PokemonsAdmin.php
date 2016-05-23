<?php

namespace SandraPokemonBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PokemonsAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('surnom')
            ->add('niveau')
            ->add('capture')
            ->add('idPokemons')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('surnom')
            ->add('niveau')
            ->add('capture')
            ->add('idPokemons')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('surnom')
            ->add('niveau')
            ->add('capture')
            ->add('idDresseur', 'entity', array(
                'class' => 'SandraPokemonBundle:Dresseurs',
                'property' => 'nom',
            ))
            ->add('idTypePokemons', 'entity', array(
                'class' => 'SandraPokemonBundle:TypeDePokemons',
                'property' => 'nom',
            ))
            ->add('idAttaques1', 'entity', array(
                'class' => 'SandraPokemonBundle:Attaques',
                'property' => 'nom',
            ))
            ->add('idAttaques2', 'entity', array(
                'class' => 'SandraPokemonBundle:Attaques',
                'property' => 'nom',
            ))
            ->add('idAttaques3', 'entity', array(
                'class' => 'SandraPokemonBundle:Attaques',
                'property' => 'nom',
            ))
            ->add('idAttaques4', 'entity', array(
                'class' => 'SandraPokemonBundle:Attaques',
                'property' => 'nom',
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('surnom')
            ->add('niveau')
            ->add('capture')
            ->add('idPokemons')
        ;
    }
}
