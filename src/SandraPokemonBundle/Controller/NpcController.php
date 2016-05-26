<?php

namespace SandraPokemonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SandraPokemonBundle\Entity\Npc;
use SandraPokemonBundle\Form\NpcType;

/**
 * Npc controller.
 *
 * @Route("/npc")
 */
class NpcController extends Controller
{
    /**
     * Lists all Npc entities.
     *
     * @Route("/", name="npc_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $npcs = $em->getRepository('SandraPokemonBundle:Npc')->findAll();

        return $this->render('npc/index.html.twig', array(
            'npcs' => $npcs,
        ));
    }

    /**
     * Creates a new Npc entity.
     *
     * @Route("/new", name="npc_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $npc = new Npc();
        $form = $this->createForm('SandraPokemonBundle\Form\NpcType', $npc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($npc);
            $em->flush();

            return $this->redirectToRoute('npc_show', array('id' => $npc->getId()));
        }

        return $this->render('npc/new.html.twig', array(
            'npc' => $npc,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Npc entity.
     *
     * @Route("/{id}", name="npc_show")
     * @Method("GET")
     */
    public function showAction(Npc $npc)
    {
        $deleteForm = $this->createDeleteForm($npc);

        return $this->render('npc/show.html.twig', array(
            'npc' => $npc,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Npc entity.
     *
     * @Route("/{id}/edit", name="npc_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Npc $npc)
    {
        $deleteForm = $this->createDeleteForm($npc);
        $editForm = $this->createForm('SandraPokemonBundle\Form\NpcType', $npc);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($npc);
            $em->flush();

            return $this->redirectToRoute('npc_edit', array('id' => $npc->getId()));
        }

        return $this->render('npc/edit.html.twig', array(
            'npc' => $npc,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Npc entity.
     *
     * @Route("/{id}", name="npc_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Npc $npc)
    {
        $form = $this->createDeleteForm($npc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($npc);
            $em->flush();
        }

        return $this->redirectToRoute('npc_index');
    }

    /**
     * Creates a form to delete a Npc entity.
     *
     * @param Npc $npc The Npc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Npc $npc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('npc_delete', array('id' => $npc->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
