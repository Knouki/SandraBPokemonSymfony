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

        $pokemons = $em->getRepository('SandraPokemonBundle:Pokemons')->findAll();

        return $this->render('pokemons/index.html.twig', array(
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
        $deleteForm = $this->createDeleteForm($pokemon);

        return $this->render('pokemons/show.html.twig', array(
            'pokemon' => $pokemon,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pokemons entity.
     *
     * @Route("/{id}/edit", name="pokemons_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pokemons $pokemon)
    {
        $deleteForm = $this->createDeleteForm($pokemon);
        $editForm = $this->createForm('SandraPokemonBundle\Form\PokemonsType', $pokemon);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pokemon);
            $em->flush();

            return $this->redirectToRoute('pokemons_edit', array('id' => $pokemon->getId()));
        }

        return $this->render('pokemons/edit.html.twig', array(
            'pokemon' => $pokemon,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Pokemons entity.
     *
     * @Route("/{id}", name="pokemons_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pokemons $pokemon)
    {
        $form = $this->createDeleteForm($pokemon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pokemon);
            $em->flush();
        }

        return $this->redirectToRoute('pokemons_index');
    }

    /**
     * Creates a form to delete a Pokemons entity.
     *
     * @param Pokemons $pokemon The Pokemons entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pokemons $pokemon)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pokemons_delete', array('id' => $pokemon->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
