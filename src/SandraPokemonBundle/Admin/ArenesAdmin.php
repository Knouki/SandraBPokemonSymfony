<?php

namespace SandraPokemonBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArenesAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idBadges')
            ->add('idPositions')
            ->add('nom')
            ->add('id')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idBadges')
            ->add('idPositions')
            ->add('nom')
            ->add('id')
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
            ->add('idBadges', EntityType::class, array(
        'class' => 'SandraPokemonBundle\Entity\Badges',
        'query_builder' => function (EntityRepository $er) {
            $qb = $er->createQueryBuilder('b');

            return $qb;
        },
        'choice_label' => function ($badges) {
            return $badges->getNom();
        },
            ))
            ->add('idPositions', EntityType::class, array(
                'class' => 'SandraPokemonBundle\Entity\Positions',
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('p');

                    return $qb;
                },
                'choice_label' => function ($position) {
                    return $position->getIdPositions();
                },
            ))
            ->add('nom')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('idBadges')
            ->add('idPositions')
            ->add('nom')
            ->add('id')
        ;
    }
}
