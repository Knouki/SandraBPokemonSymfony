<?php

namespace SandraPokemonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SandraPokemonBundle\Entity\Arenes;
use SandraPokemonBundle\Form\ArenesType;

/**
 * Arenes controller.
 *
 * @Route("/arenes")
 */
class ArenesController extends Controller
{
    /**
     * Lists all Arenes entities.
     *
     * @Route("/", name="arenes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $arenes = $em->getRepository('SandraPokemonBundle:Arenes')->findAll();

        return $this->render('arenes/index.html.twig', array(
            'arenes' => $arenes,
        ));
    }

    /**
     * Creates a new Arenes entity.
     *
     * @Route("/new", name="arenes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $arene = new Arenes();
        $form = $this->createForm('SandraPokemonBundle\Form\ArenesType', $arene);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($arene);
            $em->flush();

            return $this->redirectToRoute('arenes_show', array('id' => $arene->getId()));
        }

        return $this->render('arenes/new.html.twig', array(
            'arene' => $arene,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Arenes entity.
     *
     * @Route("/{id}", name="arenes_show")
     * @Method("GET")
     */
    public function showAction(Arenes $arene)
    {
        $deleteForm = $this->createDeleteForm($arene);

        return $this->render('arenes/show.html.twig', array(
            'arene' => $arene,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Arenes entity.
     *
     * @Route("/{id}/edit", name="arenes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Arenes $arene)
    {
        $deleteForm = $this->createDeleteForm($arene);
        $editForm = $this->createForm('SandraPokemonBundle\Form\ArenesType', $arene);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($arene);
            $em->flush();

            return $this->redirectToRoute('arenes_edit', array('id' => $arene->getId()));
        }

        return $this->render('arenes/edit.html.twig', array(
            'arene' => $arene,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Arenes entity.
     *
     * @Route("/{id}", name="arenes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Arenes $arene)
    {
        $form = $this->createDeleteForm($arene);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($arene);
            $em->flush();
        }

        return $this->redirectToRoute('arenes_index');
    }

    /**
     * Creates a form to delete a Arenes entity.
     *
     * @param Arenes $arene The Arenes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Arenes $arene)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('arenes_delete', array('id' => $arene->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
