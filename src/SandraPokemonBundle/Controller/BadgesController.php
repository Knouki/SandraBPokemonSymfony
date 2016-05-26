<?php

namespace SandraPokemonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SandraPokemonBundle\Entity\Badges;
use SandraPokemonBundle\Form\BadgesType;

/**
 * Badges controller.
 *
 * @Route("/badges")
 */
class BadgesController extends Controller
{
    /**
     * Lists all Badges entities.
     *
     * @Route("/", name="badges_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $badges = $em->getRepository('SandraPokemonBundle:Badges')->findAll();

        return $this->render('badges/index.html.twig', array(
            'badges' => $badges,
        ));
    }

    /**
     * Creates a new Badges entity.
     *
     * @Route("/new", name="badges_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $badge = new Badges();
        $form = $this->createForm('SandraPokemonBundle\Form\BadgesType', $badge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($badge);
            $em->flush();

            return $this->redirectToRoute('badges_show', array('id' => $badge->getId()));
        }

        return $this->render('badges/new.html.twig', array(
            'badge' => $badge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Badges entity.
     *
     * @Route("/{id}", name="badges_show")
     * @Method("GET")
     */
    public function showAction(Badges $badge)
    {
        $deleteForm = $this->createDeleteForm($badge);

        return $this->render('badges/show.html.twig', array(
            'badge' => $badge,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Badges entity.
     *
     * @Route("/{id}/edit", name="badges_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Badges $badge)
    {
        $deleteForm = $this->createDeleteForm($badge);
        $editForm = $this->createForm('SandraPokemonBundle\Form\BadgesType', $badge);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($badge);
            $em->flush();

            return $this->redirectToRoute('badges_edit', array('id' => $badge->getId()));
        }

        return $this->render('badges/edit.html.twig', array(
            'badge' => $badge,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Badges entity.
     *
     * @Route("/{id}", name="badges_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Badges $badge)
    {
        $form = $this->createDeleteForm($badge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($badge);
            $em->flush();
        }

        return $this->redirectToRoute('badges_index');
    }

    /**
     * Creates a form to delete a Badges entity.
     *
     * @param Badges $badge The Badges entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Badges $badge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('badges_delete', array('id' => $badge->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
