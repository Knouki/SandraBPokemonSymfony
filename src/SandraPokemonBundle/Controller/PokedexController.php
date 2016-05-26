<?php

namespace SandraPokemonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SandraPokemonBundle\Entity\Pokedex;
use SandraPokemonBundle\Form\PokedexType;

/**
 * Pokedex controller.
 *
 * @Route("/pokedex")
 */
class PokedexController extends Controller
{
    /**
     * Lists all Pokedex entities.
     *
     * @Route("/", name="pokedex_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pokedexes = $em->getRepository('SandraPokemonBundle:Pokedex')->findAll();

        return $this->render('pokedex/index.html.twig', array(
            'pokedexes' => $pokedexes,
        ));
    }

    /**
     * Creates a new Pokedex entity.
     *
     * @Route("/new", name="pokedex_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pokedex = new Pokedex();
        $form = $this->createForm('SandraPokemonBundle\Form\PokedexType', $pokedex);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pokedex);
            $em->flush();

            return $this->redirectToRoute('pokedex_show', array('id' => $pokedex->getId()));
        }

        return $this->render('pokedex/new.html.twig', array(
            'pokedex' => $pokedex,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pokedex entity.
     *
     * @Route("/{id}", name="pokedex_show")
     * @Method("GET")
     */
    public function showAction(Pokedex $pokedex)
    {
        $deleteForm = $this->createDeleteForm($pokedex);

        return $this->render('pokedex/show.html.twig', array(
            'pokedex' => $pokedex,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pokedex entity.
     *
     * @Route("/{id}/edit", name="pokedex_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pokedex $pokedex)
    {
        $deleteForm = $this->createDeleteForm($pokedex);
        $editForm = $this->createForm('SandraPokemonBundle\Form\PokedexType', $pokedex);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pokedex);
            $em->flush();

            return $this->redirectToRoute('pokedex_edit', array('id' => $pokedex->getId()));
        }

        return $this->render('pokedex/edit.html.twig', array(
            'pokedex' => $pokedex,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Pokedex entity.
     *
     * @Route("/{id}", name="pokedex_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pokedex $pokedex)
    {
        $form = $this->createDeleteForm($pokedex);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pokedex);
            $em->flush();
        }

        return $this->redirectToRoute('pokedex_index');
    }

    /**
     * Creates a form to delete a Pokedex entity.
     *
     * @param Pokedex $pokedex The Pokedex entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pokedex $pokedex)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pokedex_delete', array('id' => $pokedex->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
