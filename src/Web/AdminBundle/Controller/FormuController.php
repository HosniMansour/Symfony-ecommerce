<?php

namespace Web\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Web\AdminBundle\Entity\Formu;
use Web\AdminBundle\Form\FormuType;

/**
 * Formu controller.
 *
 * @Route("/administrator/form")
 */
class FormuController extends Controller
{
    /**
     * Lists all Formu entities.
     *
     * @Route("/all_lu", name="all_lu")
     * @Method("GET")
     */
    public function allLuAction()
    {
        $this->getDoctrine()->getManager()->getRepository('WebAdminBundle:Formu')->setlu();
        return $this->redirectToRoute('form_index');
    }

    /**
     * Lists all Formu entities.
     *
     * @Route("/", name="form_index")
     * @Method("GET")
     */
    public function allAction()
    {
        $em = $this->getDoctrine()->getManager();
        $formus = $em->getRepository('WebAdminBundle:Formu')->findAll();
        return $this->render('WebAdminBundle:Default:form/indexall.html.twig', array(
            'forms' => $formus,
        ));
    }

    /**
     * Lists all Formu entities.
     *
     * @Route("/contact", name="formcontact_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $formus = $em->getRepository('WebAdminBundle:Formu')->GetForm('contact');

        return $this->render('WebAdminBundle:Default:form/indexcontact.html.twig', array(
            'forms' => $formus,
        ));
    }

    /**
     * Finds and displays a Formu entity.
     *
     * @Route("/contact/{id}", name="formcontact_show")
     * @Method("GET")
     */
    public function showAction(Formu $formu,$id)
    {
        if($formu->getEtat()==0){
            $this->getDoctrine()->getManager()->getRepository('WebAdminBundle:Formu')->setVu($id);
            $formu->setEtat(1);
        }
        $deleteForm = $this->createDeleteForm($formu);
        return $this->render('WebAdminBundle:Default:form/showcontact.html.twig', array(
            'form' => $formu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a Formu entity.
     *
     * @Route("/contact/rependre/{id}", name="formcontact_rependre")
     * @Method("GET")
     */
    public function rependreAction(Request $request,Formu $formu,$id)
    {
        $this->getDoctrine()->getManager()->getRepository('WebAdminBundle:Formu')->setrependu($id);
        $email = $this->getDoctrine()->getManager()->getRepository('WebAdminBundle:Parameter')->getEmail();
        $headers = 'From: '. $formu->getEmail() . "\r\n" .
            'Reply-To: ' . $email[0]['emailNoti'] . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($formu->getEmail(),"RE :".$formu->getObjet(),$request->query->get('message'),$headers);
        mail($email[0]['emailNoti'],"RE :".$formu->getObjet(),$request->query->get('message'),$headers);
        return $this->redirectToRoute('formcontact_show', array('id' => $id));
    }


    /**
     * Lists all Formu entities.
     *
     * @Route("/demande-devis", name="formdemandedevis_index")
     * @Method("GET")
     */
    public function ddindexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $formus = $em->getRepository('WebAdminBundle:Formu')->GetForm('demendedevis');
        return $this->render('WebAdminBundle:Default:form/indexdd.html.twig', array(
            'forms' => $formus,
        ));
    }

    /**
     * Finds and displays a Formu entity.
     *
     * @Route("/demande-devis/{id}", name="formdemandedevis_show")
     * @Method("GET")
     */
    public function ddshowAction(Formu $formu,$id)
    {
        if($formu->getEtat()==0){
            $this->getDoctrine()->getManager()->getRepository('WebAdminBundle:Formu')->setVu($id);
            $formu->setEtat(1);
        }
        $deleteForm = $this->createddDeleteForm($formu);
        return $this->render('WebAdminBundle:Default:form/showdd.html.twig', array(
            'form' => $formu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a Formu entity.
     *
     * @Route("/demande-devis/rependre/{id}", name="formdd_rependre")
     * @Method("GET")
     */
    public function rependreddAction(Request $request,Formu $formu,$id)
    {
        $this->getDoctrine()->getManager()->getRepository('WebAdminBundle:Formu')->setrependu($id);
        $email = $this->getDoctrine()->getManager()->getRepository('WebAdminBundle:Parameter')->getEmail();
        $headers = 'From: '. $formu->getEmail() . "\r\n" .
            'Reply-To: ' . $email[0]['emailNoti'] . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($formu->getEmail(),"RE :".$formu->getObjet(),$request->query->get('message'),$headers);
        mail($email[0]['emailNoti'],"RE :".$formu->getObjet(),$request->query->get('message'),$headers);
        return $this->redirectToRoute('formcontact_show', array('id' => $id));
    }

    /**
     * Lists all Formu entities.
     *
     * @Route("/demande-devis-produit", name="formdemandedevisp_index")
     * @Method("GET")
     */
    public function ddpindexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $formus = $em->getRepository('WebAdminBundle:Formu')->GetForm('demendedevisunproduit');
        return $this->render('WebAdminBundle:Default:form/indexddp.html.twig', array(
            'forms' => $formus,
        ));
    }

    /**
     * Finds and displays a Formu entity.
     *
     * @Route("/demande-devis-produit/{id}", name="formdemandedevisp_show")
     * @Method("GET")
     */
    public function ddpshowAction(Formu $formu,$id)
    {
        if($formu->getEtat()==0){
            $this->getDoctrine()->getManager()->getRepository('WebAdminBundle:Formu')->setVu($id);
            $formu->setEtat(1);
        }
        $deleteForm = $this->createddspDeleteForm($formu);
        return $this->render('WebAdminBundle:Default:form/showddp.html.twig', array(
            'form' => $formu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a Formu entity.
     *
     * @Route("/demande-devis-produit/rependre/{id}", name="formddp_rependre")
     * @Method("GET")
     */
    public function rependreddpAction(Request $request,Formu $formu,$id)
    {
        $this->getDoctrine()->getManager()->getRepository('WebAdminBundle:Formu')->setrependu($id);
        $email = $this->getDoctrine()->getManager()->getRepository('WebAdminBundle:Parameter')->getEmail();
        $headers = 'From: '. $formu->getEmail() . "\r\n" .
            'Reply-To: ' . $email[0]['emailNoti'] . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($formu->getEmail(),"RE :".$formu->getObjet(),$request->query->get('message'),$headers);
        mail($email[0]['emailNoti'],"RE :".$formu->getObjet(),$request->query->get('message'),$headers);
        return $this->redirectToRoute('formdemandedevisp_show', array('id' => $id));
    }

    /**
     * Deletes a Formu entity.
     *
     * @Route("/contact/{id}", name="formuc_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Formu $formu)
    {
        $form = $this->createDeleteForm($formu);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($formu);
            $em->flush();
        }
        return $this->redirectToRoute('formcontact_index');
    }

    /**
     * Deletes a Formu entity.
     *
     * @Route("/demande-devis-produit/{id}", name="formudd_delete")
     * @Method("DELETE")
     */
    public function ddpdeleteAction(Request $request, Formu $formu)
    {
        $form = $this->createDeleteForm($formu);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($formu);
            $em->flush();
        }

        return $this->redirectToRoute('formdemandedevis_index');
    }

    /**
     * Deletes a Formu entity.
     *
     * @Route("/demande-devis-produit/{id}", name="formuddp_delete")
     * @Method("DELETE")
     */
    public function dddeleteAction(Request $request, Formu $formu)
    {
        $form = $this->createDeleteForm($formu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($formu);
            $em->flush();
        }

        return $this->redirectToRoute('formdemandedevisp_index');
    }

    /**
     * Creates a form to delete a Formu entity.
     *
     * @param Formu $formu The Formu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Formu $formu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formuc_delete', array('id' => $formu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Creates a form to delete a Formu entity.
     *
     * @param Formu $formu The Formu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createddDeleteForm(Formu $formu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formudd_delete', array('id' => $formu->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * Creates a form to delete a Formu entity.
     *
     * @param Formu $formu The Formu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createddspDeleteForm(Formu $formu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formuddp_delete', array('id' => $formu->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
