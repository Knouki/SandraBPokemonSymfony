<?php

namespace SandraPokemonBundle\Controller;

use SandraPokemonBundle\Entity\TypeDePokemons;
use SandraPokemonBundle\Form\SqlType;
use SandraPokemonBundle\Form\TypeDePokemonsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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
    public function sqlAction(Request $request)
    {
        $sqlForm = $this->createForm(SqlType::class);

        if ($request) {
            var_dump($sqlForm->get("sql"));
        }

        return $this->render('SandraPokemonBundle:default:sql.html.twig', array(
        'sqlForm' => $sqlForm->createView(),
    ));

    }

    /**
     * @Route("/creation")
     */
    public function creationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $pokemon = new TypeDePokemons();
        $pokemonForm = $this->createForm(TypeDePokemonsType::class, $pokemon);

        $zones = $em->getRepository('SandraPokemonBundle:Zones')->findAll();
        $types = $em->getRepository('SandraPokemonBundle:Types')->findAll();

        $pokemonForm->handleRequest($request);

        if ($pokemonForm->isSubmitted() && $pokemonForm->isValid()) {
            $em->flush();

            return $this->redirectToRoute('sandra_pokemon_default_index');
        }


        return $this->render('SandraPokemonBundle:default:creation.html.twig', array(
            'pokemon' => $pokemon,
            'pokemonForm' => $pokemonForm->createView(),
            'zones' => $zones,
            'types' => $types
        ));
    }

}
