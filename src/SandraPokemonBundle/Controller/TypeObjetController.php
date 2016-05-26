<?php

namespace SandraPokemonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SandraPokemonBundle\Entity\TypeObjet;
use SandraPokemonBundle\Form\TypeObjetType;

/**
 * TypeObjet controller.
 *
 * @Route("/typeobjet")
 */
class TypeObjetController extends Controller
{
    /**
     * Lists all TypeObjet entities.
     *
     * @Route("/", name="typeobjet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeObjets = $em->getRepository('SandraPokemonBundle:TypeObjet')->findAll();

        return $this->render('typeobjet/index.html.twig', array(
            'typeObjets' => $typeObjets,
        ));
    }

    /**
     * Creates a new TypeObjet entity.
     *
     * @Route("/new", name="typeobjet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeObjet = new TypeObjet();
        $form = $this->createForm('SandraPokemonBundle\Form\TypeObjetType', $typeObjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeObjet);
            $em->flush();

            return $this->redirectToRoute('typeobjet_show', array('id' => $typeObjet->getId()));
        }

        return $this->render('typeobjet/new.html.twig', array(
            'typeObjet' => $typeObjet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TypeObjet entity.
     *
     * @Route("/{id}", name="typeobjet_show")
     * @Method("GET")
     */
    public function showAction(TypeObjet $typeObjet)
    {
        $deleteForm = $this->createDeleteForm($typeObjet);

        return $this->render('typeobjet/show.html.twig', array(
            'typeObjet' => $typeObjet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TypeObjet entity.
     *
     * @Route("/{id}/edit", name="typeobjet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypeObjet $typeObjet)
    {
        $deleteForm = $this->createDeleteForm($typeObjet);
        $editForm = $this->createForm('SandraPokemonBundle\Form\TypeObjetType', $typeObjet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeObjet);
            $em->flush();

            return $this->redirectToRoute('typeobjet_edit', array('id' => $typeObjet->getId()));
        }

        return $this->render('typeobjet/edit.html.twig', array(
            'typeObjet' => $typeObjet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TypeObjet entity.
     *
     * @Route("/{id}", name="typeobjet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypeObjet $typeObjet)
    {
        $form = $this->createDeleteForm($typeObjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeObjet);
            $em->flush();
        }

        return $this->redirectToRoute('typeobjet_index');
    }

    /**
     * Creates a form to delete a TypeObjet entity.
     *
     * @param TypeObjet $typeObjet The TypeObjet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeObjet $typeObjet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeobjet_delete', array('id' => $typeObjet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
