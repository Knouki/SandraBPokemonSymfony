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
            ->add('nom')
            ->add('id')
            ->add('idBadges', null, array(), 'entity', array(
                'class'    => 'SandraPokemonBundle:Badges',
                'property' => 'nom',
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idPositions')
            ->add('nom')
            ->add('id')
            ->add('idBadges', null, array('associated_property' => 'nom'), 'entity', array(
                'class'    => 'SandraPokemonBundle:Badges',
            ))
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
                    return $position->getX() . " " . $position->getY();
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
            ->add('idPositions')
            ->add('nom')
            ->add('id')
            ->add('idBadges', null, array('associated_property' => 'nom'), 'entity', array(
                'class'    => 'SandraPokemonBundle:Badges',
            ))
        ;
    }
}
