<?php

namespace Web\AdminBundle\Controller;

use Proxies\__CG__\Web\AdminBundle\Entity\Media;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Web\AdminBundle\Entity\Partenaires;
use Web\AdminBundle\Form\PartenairesType;

/**
 * Partenaires controller.
 *
 * @Route("/administrator/partenaires")
 */
class PartenairesController extends Controller
{
    /**
     * Lists all Partenaires entities.
     *
     * @Route("/", name="partenaires_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $partenaires = $em->getRepository('WebAdminBundle:Partenaires')->findAll();
        return $this->render('WebAdminBundle:Default:partenaires/index.html.twig', array(
            'partenaires' => $partenaires,
        ));
    }

    /**
     * Creates a new Partenaires entity.
     *
     * @Route("/ajouter", name="partenaires_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $partenaire = new Partenaires();
        $form = $this->createForm('Web\AdminBundle\Form\PartenairesType', $partenaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($partenaire);
            $em->flush();
            return $this->redirectToRoute('partenaires_index');
        }

        return $this->render('WebAdminBundle:Default:partenaires/new.html.twig', array(
            'partenaire' => $partenaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Partenaires entity.
     *
     * @Route("/{id}/modifier", name="partenaires_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Partenaires $partenaire)
    {
        $deleteForm = $this->createDeleteForm($partenaire);
        $editForm = $this->createForm('Web\AdminBundle\Form\PartenairesType', $partenaire);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($partenaire);
            $em->flush();
            return $this->redirectToRoute('partenaires_edit', array('id' => $partenaire->getId()));
        }

        return $this->render('WebAdminBundle:Default:partenaires/edit.html.twig', array(
            'partenaire' => $partenaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Partenaires entity.
     *
     * @Route("/{id}", name="partenaires_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Partenaires $partenaire)
    {
        $form = $this->createDeleteForm($partenaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partenaire);
            $em->flush();
        }

        return $this->redirectToRoute('partenaires_index');
    }

    /**
     * Creates a form to delete a Partenaires entity.
     *
     * @param Partenaires $partenaire The Partenaires entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Partenaires $partenaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partenaires_delete', array('id' => $partenaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
