<?php

namespace Web\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Web\AdminBundle\Entity\Parameter;
use Web\AdminBundle\Form\ParameterType;

/**
 * Parameter controller.
 *
 * @Route("/administrator/parameter")
 */
class ParameterController extends Controller
{
    /**
     * Displays a form to edit an existing Parameter entity.
     *
     * @Route("/", name="parameter_edit", defaults={"id" = 1})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Parameter $parameter)
    {
        $editForm = $this->createForm('Web\AdminBundle\Form\ParameterType', $parameter);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parameter);
            $em->flush();
            return $this->redirectToRoute('parameter_edit');
        }
        return $this->render('WebAdminBundle:Default:parameter/edit.html.twig', array(
            'parameter' => $parameter,
            'edit_form' => $editForm->createView(),
        ));
    }
}
