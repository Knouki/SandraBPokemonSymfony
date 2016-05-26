<?php

namespace SandraPokemonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SandraPokemonBundle\Entity\Zones;
use SandraPokemonBundle\Form\ZonesType;

/**
 * Zones controller.
 *
 * @Route("/zones")
 */
class ZonesController extends Controller
{
    /**
     * Lists all Zones entities.
     *
     * @Route("/", name="zones_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $zones = $em->getRepository('SandraPokemonBundle:Zones')->findAll();

        return $this->render('zones/index.html.twig', array(
            'zones' => $zones,
        ));
    }

    /**
     * Creates a new Zones entity.
     *
     * @Route("/new", name="zones_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $zone = new Zones();
        $form = $this->createForm('SandraPokemonBundle\Form\ZonesType', $zone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zone);
            $em->flush();

            return $this->redirectToRoute('zones_show', array('id' => $zone->getId()));
        }

        return $this->render('zones/new.html.twig', array(
            'zone' => $zone,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Zones entity.
     *
     * @Route("/{id}", name="zones_show")
     * @Method("GET")
     */
    public function showAction(Zones $zone)
    {
        $deleteForm = $this->createDeleteForm($zone);

        return $this->render('zones/show.html.twig', array(
            'zone' => $zone,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Zones entity.
     *
     * @Route("/{id}/edit", name="zones_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Zones $zone)
    {
        $deleteForm = $this->createDeleteForm($zone);
        $editForm = $this->createForm('SandraPokemonBundle\Form\ZonesType', $zone);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zone);
            $em->flush();

            return $this->redirectToRoute('zones_edit', array('id' => $zone->getId()));
        }

        return $this->render('zones/edit.html.twig', array(
            'zone' => $zone,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Zones entity.
     *
     * @Route("/{id}", name="zones_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Zones $zone)
    {
        $form = $this->createDeleteForm($zone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($zone);
            $em->flush();
        }

        return $this->redirectToRoute('zones_index');
    }

    /**
     * Creates a form to delete a Zones entity.
     *
     * @param Zones $zone The Zones entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Zones $zone)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zones_delete', array('id' => $zone->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
