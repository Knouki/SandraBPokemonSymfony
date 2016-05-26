<?php

namespace SandraPokemonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SandraPokemonBundle\Entity\Attaques;
use SandraPokemonBundle\Form\AttaquesType;

/**
 * Attaques controller.
 *
 * @Route("/attaques")
 */
class AttaquesController extends Controller
{
    /**
     * Lists all Attaques entities.
     *
     * @Route("/", name="attaques_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $attaques = $em->getRepository('SandraPokemonBundle:Attaques')->findAll();

        return $this->render('attaques/index.html.twig', array(
            'attaques' => $attaques,
        ));
    }

    /**
     * Creates a new Attaques entity.
     *
     * @Route("/new", name="attaques_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $attaque = new Attaques();
        $form = $this->createForm('SandraPokemonBundle\Form\AttaquesType', $attaque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($attaque);
            $em->flush();

            return $this->redirectToRoute('attaques_show', array('id' => $attaque->getId()));
        }

        return $this->render('attaques/new.html.twig', array(
            'attaque' => $attaque,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Attaques entity.
     *
     * @Route("/{id}", name="attaques_show")
     * @Method("GET")
     */
    public function showAction(Attaques $attaque)
    {
        $deleteForm = $this->createDeleteForm($attaque);

        return $this->render('attaques/show.html.twig', array(
            'attaque' => $attaque,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Attaques entity.
     *
     * @Route("/{id}/edit", name="attaques_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Attaques $attaque)
    {
        $deleteForm = $this->createDeleteForm($attaque);
        $editForm = $this->createForm('SandraPokemonBundle\Form\AttaquesType', $attaque);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($attaque);
            $em->flush();

            return $this->redirectToRoute('attaques_edit', array('id' => $attaque->getId()));
        }

        return $this->render('attaques/edit.html.twig', array(
            'attaque' => $attaque,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Attaques entity.
     *
     * @Route("/{id}", name="attaques_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Attaques $attaque)
    {
        $form = $this->createDeleteForm($attaque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($attaque);
            $em->flush();
        }

        return $this->redirectToRoute('attaques_index');
    }

    /**
     * Creates a form to delete a Attaques entity.
     *
     * @param Attaques $attaque The Attaques entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Attaques $attaque)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('attaques_delete', array('id' => $attaque->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
