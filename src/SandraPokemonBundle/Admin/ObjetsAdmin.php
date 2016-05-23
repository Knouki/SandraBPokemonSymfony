<?php

namespace SandraPokemonBundle\Admin;

use Doctrine\ORM\EntityRepository;
use SandraPokemonBundle\SandraPokemonBundle;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ObjetsAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('quantite')
            ->add('id')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nom')
            ->add('quantite')
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
            ->add('idNonjoueur', EntityType::class, array(
                'class' => 'SandraPokemonBundle\Entity\Npc',
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('n');

                    return $qb;
                },
                'choice_label' => function ($npc) {
                    return $npc->getNom();
                },
                'required'          => false,
            ))
            ->add('nom')
            ->add('quantite')
            ->add('idTypeobjet', 'entity', array(
                'class' => 'SandraPokemonBundle:TypeObjet',
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
            ->add('nom')
            ->add('quantite')
            ->add('id')
        ;
    }
}
