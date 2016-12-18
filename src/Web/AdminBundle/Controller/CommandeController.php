<?php

namespace Web\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Web\AdminBundle\Entity\Commande;
use Web\AdminBundle\Form\CommandeType;

/**
 * Commande controller.
 *
 * @Route("/administrator/commande")
 */
class CommandeController extends Controller
{
    /**
     * Lists all Commande entities.
     *
     * @Route("/", name="commande_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $commandes = $em->getRepository('WebAdminBundle:Commande')->findAll();
        return $this->render('WebAdminBundle:Default:commande/index.html.twig', array(
            'commandes' => $commandes,
        ));
    }

    /**
     * Anuler.
     *
     * @Route("/annuler/{id}", name="commande_annuler")
     * @Method("GET")
     */
    public function annulerAction(Commande $commande)
    {
        $em = $this->getDoctrine()->getManager();
        $commande->setEtat("annuler");
        
        $ligne = $commande->getLignes();
        
        foreach($ligne as $c){
            $produit = $c->getProduit();
            $produit->setNbrstock($produit->getNbrstock() + $c->getQte());
            $em->merge($produit);
        }
        
        $em->merge($commande);
        $em->flush();
        return $this->redirectToRoute('commande_show', array(
           'id' => $commande->getId(),
        ));
    }
    
    /**
     * Valider.
     *
     * @Route("/valider/{id}", name="commande_valider")
     * @Method("GET")
     */
    public function validerAction(Commande $commande)
    {
        $em = $this->getDoctrine()->getManager();
        $commande->setEtat("valider");
        $em->merge($commande);
        $em->flush();
        return $this->redirectToRoute('commande_show', array(
            'id' => $commande->getId(),
        ));
    }
    
    /**
     * Finds and displays a Commande entity.
     *
     * @Route("/{id}", name="commande_show")
     * @Method("GET")
     */
    public function showAction(Commande $commande)
    {
        $deleteForm = $this->createDeleteForm($commande);

        return $this->render('WebAdminBundle:Default:commande/show.html.twig', array(
            'commande' => $commande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Commande entity.
     *
     * @Route("/{id}", name="commande_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Commande $commande)
    {
        $form = $this->createDeleteForm($commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commande);
            $em->flush();
        }

        return $this->redirectToRoute('commande_index');
    }

    /**
     * Creates a form to delete a Commande entity.
     *
     * @param Commande $commande The Commande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Commande $commande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commande_delete', array('id' => $commande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
