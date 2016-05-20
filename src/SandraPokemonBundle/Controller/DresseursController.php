<?php

namespace SandraPokemonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SandraPokemonBundle\Entity\Dresseurs;
use SandraPokemonBundle\Form\DresseursType;

/**
 * Dresseurs controller.
 *
 * @Route("/dresseurs")
 */
class DresseursController extends Controller
{
    /**
     * Lists all Dresseurs entities.
     *
     * @Route("/", name="dresseurs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dresseurs = $em->getRepository('SandraPokemonBundle:Dresseurs')->findAll();

        return $this->render('dresseurs/index.html.twig', array(
            'dresseurs' => $dresseurs,
        ));
    }

    /**
     * Creates a new Dresseurs entity.
     *
     * @Route("/new", name="dresseurs_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dresseur = new Dresseurs();
        $form = $this->createForm('SandraPokemonBundle\Form\DresseursType', $dresseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dresseur);
            $em->flush();

            return $this->redirectToRoute('dresseurs_show', array('id' => $dresseur->getId()));
        }

        return $this->render('dresseurs/new.html.twig', array(
            'dresseur' => $dresseur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Dresseurs entity.
     *
     * @Route("/{id}", name="dresseurs_show")
     * @Method("GET")
     */
    public function showAction(Dresseurs $dresseur)
    {
        $deleteForm = $this->createDeleteForm($dresseur);

        return $this->render('dresseurs/show.html.twig', array(
            'dresseur' => $dresseur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Dresseurs entity.
     *
     * @Route("/{id}/edit", name="dresseurs_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Dresseurs $dresseur)
    {
        $deleteForm = $this->createDeleteForm($dresseur);
        $editForm = $this->createForm('SandraPokemonBundle\Form\DresseursType', $dresseur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dresseur);
            $em->flush();

            return $this->redirectToRoute('dresseurs_edit', array('id' => $dresseur->getId()));
        }

        return $this->render('dresseurs/edit.html.twig', array(
            'dresseur' => $dresseur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Dresseurs entity.
     *
     * @Route("/{id}", name="dresseurs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Dresseurs $dresseur)
    {
        $form = $this->createDeleteForm($dresseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dresseur);
            $em->flush();
        }

        return $this->redirectToRoute('dresseurs_index');
    }

    /**
     * Creates a form to delete a Dresseurs entity.
     *
     * @param Dresseurs $dresseur The Dresseurs entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Dresseurs $dresseur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dresseurs_delete', array('id' => $dresseur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
