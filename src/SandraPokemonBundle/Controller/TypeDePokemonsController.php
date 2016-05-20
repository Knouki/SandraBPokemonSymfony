<?php

namespace SandraPokemonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SandraPokemonBundle\Entity\TypeDePokemons;
use SandraPokemonBundle\Form\TypeDePokemonsType;

/**
 * TypeDePokemons controller.
 *
 * @Route("/typedepokemons")
 */
class TypeDePokemonsController extends Controller
{
    /**
     * Lists all TypeDePokemons entities.
     *
     * @Route("/", name="typedepokemons_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeDePokemons = $em->getRepository('SandraPokemonBundle:TypeDePokemons')->findAll();

        return $this->render('typedepokemons/index.html.twig', array(
            'typeDePokemons' => $typeDePokemons,
        ));
    }

    /**
     * Creates a new TypeDePokemons entity.
     *
     * @Route("/new", name="typedepokemons_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeDePokemon = new TypeDePokemons();
        $form = $this->createForm('SandraPokemonBundle\Form\TypeDePokemonsType', $typeDePokemon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeDePokemon);
            $em->flush();

            return $this->redirectToRoute('typedepokemons_show', array('id' => $typeDePokemon->getId()));
        }

        return $this->render('typedepokemons/new.html.twig', array(
            'typeDePokemon' => $typeDePokemon,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TypeDePokemons entity.
     *
     * @Route("/{id}", name="typedepokemons_show")
     * @Method("GET")
     */
    public function showAction(TypeDePokemons $typeDePokemon)
    {
        $deleteForm = $this->createDeleteForm($typeDePokemon);

        return $this->render('typedepokemons/show.html.twig', array(
            'typeDePokemon' => $typeDePokemon,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TypeDePokemons entity.
     *
     * @Route("/{id}/edit", name="typedepokemons_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypeDePokemons $typeDePokemon)
    {
        $deleteForm = $this->createDeleteForm($typeDePokemon);
        $editForm = $this->createForm('SandraPokemonBundle\Form\TypeDePokemonsType', $typeDePokemon);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeDePokemon);
            $em->flush();

            return $this->redirectToRoute('typedepokemons_edit', array('id' => $typeDePokemon->getId()));
        }

        return $this->render('typedepokemons/edit.html.twig', array(
            'typeDePokemon' => $typeDePokemon,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TypeDePokemons entity.
     *
     * @Route("/{id}", name="typedepokemons_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypeDePokemons $typeDePokemon)
    {
        $form = $this->createDeleteForm($typeDePokemon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeDePokemon);
            $em->flush();
        }

        return $this->redirectToRoute('typedepokemons_index');
    }

    /**
     * Creates a form to delete a TypeDePokemons entity.
     *
     * @param TypeDePokemons $typeDePokemon The TypeDePokemons entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeDePokemons $typeDePokemon)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typedepokemons_delete', array('id' => $typeDePokemon->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
