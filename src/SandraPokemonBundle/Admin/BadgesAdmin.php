<?php

namespace SandraPokemonBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BadgesAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('idBadges')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nom')
            ->add('idBadges')
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
            ->add('nom')
            ->add('idDresseurMaitre', EntityType::class, array(
                'class' => 'SandraPokemonBundle\Entity\Dresseurs',
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('d');

                    return $qb;
                },
                'choice_label' => function ($dresseurs) {
                    return $dresseurs->getNom();
                },
                'required'          => false,
            ))
            ->add('idZones', EntityType::class, array(
            'class' => 'SandraPokemonBundle\Entity\Zones',
            'query_builder' => function (EntityRepository $er) {
                $qb = $er->createQueryBuilder('z');

                return $qb;
            },
            'choice_label' => function ($zones) {
                return $zones->getNom();
            },
            'required'          => false,
        ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('nom')
            ->add('idBadges')
        ;
    }
}
