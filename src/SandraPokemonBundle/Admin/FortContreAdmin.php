<?php

namespace SandraPokemonBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FortContreAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idTypes')
            ->add('idTypes1')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idTypes')
            ->add('idTypes1')
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
            ->add('idTypes', EntityType::class, array(
                'class' => 'SandraPokemonBundle\Entity\Types',
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('t');

                    return $qb;
                },
                'choice_label' => function ($types) {
                    return $types->getNom();
                },
            ))
            ->add('idTypes1', EntityType::class, array(
                'class' => 'SandraPokemonBundle\Entity\Types',
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('t');

                    return $qb;
                },
                'choice_label' => function ($types) {
                    return $types->getNom();
                },
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('idTypes')
            ->add('idTypes1')
        ;
    }
}
