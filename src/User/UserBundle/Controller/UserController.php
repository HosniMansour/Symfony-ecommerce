<?php

namespace User\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContext;
use User\UserBundle\Entity\User;
use User\UserBundle\Form\UserType;

/**
 * User controller.
 *
 * @Route("/administrator/utilisateur")
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     * @Route("/", name="user_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserUserBundle:User')->findAll();
        return $this->render('UserUserBundle:Default:user/index.html.twig', array(
            'users' => $users,
        ));
    }
    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/modifier/{id}", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request , User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('User\UserBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if(count($user->getRoles())>1){
            if(($user->getRoles()[0]=="ROLE_ADMIN")||($user->getRoles()[1]=="ROLE_ADMIN")){
                $role="user";
            }elseif(($user->getRoles()[0]=="ROLE_SUPER_ADMIN")||($user->getRoles()[1]=="ROLE_SUPER_ADMIN")){
                $role="admin";
            }else{
                $role="responsable";
            }
        }else{
            $role="user";
        }


        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $enabled = $request->request->get('optionenable');
            $newrole = $request->request->get('optionrole');
            if($enabled!=$user->isEnabled()){
                if($enabled==="0"){
                    $user->setEnabled(false);
                }
                if($enabled==="1"){
                    $user->setEnabled(true);
                }
            }
            if($role!==$newrole){
                if($newrole==="admin"){
                    $user->removeRole("ROLE_ADMIN");
                    $user->removeRole("ROLE_SUPER_Responsable");
                    $user->addRole("ROLE_SUPER_ADMIN");
                }
                if($newrole==="responsable"){
                    $user->removeRole("ROLE_ADMIN");
                    $user->removeRole("ROLE_SUPER_ADMIN");
                    $user->addRole("ROLE_SUPER_Responsable");
                }
                if($newrole==="user"){
                    $user->removeRole("ROLE_SUPER_ADMIN");
                    $user->removeRole("ROLE_SUPER_Responsable");
                    $user->addRole("ROLE_ADMIN");
                }
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }
        return $this->render('UserUserBundle:Default:user/edit.html.twig', array(
            'user' => $user,
            'role' => $role,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/{id}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
