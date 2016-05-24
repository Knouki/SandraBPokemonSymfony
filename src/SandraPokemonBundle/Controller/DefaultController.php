<?php

namespace SandraPokemonBundle\Controller;

use SandraPokemonBundle\Entity\TypeDePokemons;
use SandraPokemonBundle\Form\TypeDePokemonsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('SandraPokemonBundle:Default:index.html.twig');
    }

    /**
     * @Route("/sql")
     */
    public function sqlAction()
    {
        return $this->render('SandraPokemonBundle:default:sql.html.twig');
    }

    /**
     * @Route("/creation")
     */
    public function creationAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pokemon = new TypeDePokemons();
        $pokemonForm = $this->createForm(TypeDePokemonsType::class, $pokemon);

        $zones = $em->getRepository('SandraPokemonBundle:Zones')->findAll();
        $types = $em->getRepository('SandraPokemonBundle:Types')->findAll();

        return $this->render('SandraPokemonBundle:default:creation.html.twig', array(
            'pokemon' => $pokemon,
            'pokemonForm' => $pokemonForm->createView(),
            'zones' => $zones,
            'types' => $types
        ));
    }

}
