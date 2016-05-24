<?php

namespace SandraPokemonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SandraPokemonBundle\Entity\Pokemons;
use SandraPokemonBundle\Form\PokemonsType;

/**
 * Pokemons controller.
 *
 * @Route("/pokemons")
 */
class PokemonsController extends Controller
{
    /**
     * Lists all Pokemons entities.
     *
     * @Route("/", name="pokemons_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dresseurId = 1;

        $pokemons = $em->getRepository('SandraPokemonBundle:Pokemons')->createQueryBuilder('p')
        ->where('p.idDresseur is not NULL')
        ->andWhere('p.idDresseur = :dresseur')
        ->setParameter('dresseur', $dresseurId)
        ->getQuery()
        ->getResult();

        return $this->render('@SandraPokemon/pokemons/index.html.twig', array(
            'pokemons' => $pokemons,
        ));
    }

    /**
     * Creates a new Pokemons entity.
     *
     * @Route("/new", name="pokemons_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pokemon = new Pokemons();
        $form = $this->createForm('SandraPokemonBundle\Form\PokemonsType', $pokemon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pokemon);
            $em->flush();

            return $this->redirectToRoute('pokemons_show', array('id' => $pokemon->getId()));
        }

        return $this->render('pokemons/new.html.twig', array(
            'pokemon' => $pokemon,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pokemons entity.
     *
     * @Route("/{id}", name="pokemons_show")
     * @Method("GET")
     */
    public function showAction(Pokemons $pokemon)
    {
        return $this->render('pokemons/show.html.twig', array(
            'pokemon' => $pokemon,
        ));
    }
}
