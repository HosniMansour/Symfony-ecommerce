<?php

namespace Web\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Web\AdminBundle\Entity\Commande;
use Web\AdminBundle\Entity\Formu;
use Web\AdminBundle\Entity\LigneCommande;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $page = $this->getDoctrine()->getRepository('WebAdminBundle:Page')->findOneByLien('presentation');
        return $this->render('WebWebBundle:Default:index.html.twig', array(
            'page' => $page,
        ));
    }

    public function pageAction($nom)
    {
        $page = $this->getDoctrine()->getRepository('WebAdminBundle:Page')->findOneByLien($nom);
        return $this->render('WebWebBundle:Default:page.html.twig', array(
            'page' => $page,
        ));
    }
    public function formDemandeAction(Request $request)
    {
        $msj = false;
        if ('POST' === $request->getMethod()) {
            $form = new Formu();
            $type = $request->request->get('type');
            $objet = implode(" / ",$request->request->get('objet'));
            $nom = $request->request->get('nom');
            $email = $request->request->get('email');
            $tele = $request->request->get('tele');
            $budget = $request->request->get('budget');
            $adresse = $request->request->get('adresse');
            $message = $request->request->get('message');
            $form->setNom($nom);
            $form->setType($type);
            $form->setObjet($objet);
            $form->setEmail($email);
            $form->setTele($tele);
            $form->setBudget($budget);
            $form->setAdresse($adresse);
            $form->setMessage($message);
            $form->setEtat(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($form);
            $em->flush();
            $msj=true;
        }
        return $this->render('WebWebBundle:Default:demandedevis.html.twig', array(
            'msj' => $msj,
        ));
    }
    public function formContactAction(Request $request)
    {
        $contact = $this->getDoctrine()->getRepository('WebAdminBundle:Page')->findOneByLien("contact");
        $msj = false;
        if ('POST' === $request->getMethod()) {
            $form = new Formu();
            $type = $request->request->get('type');
            $objet = $request->request->get('objet');
            $nom = $request->request->get('nom');
            $email = $request->request->get('email');
            $tele = $request->request->get('tele');
            $budget = $request->request->get('budget');
            $adresse = $request->request->get('adresse');
            $message = $request->request->get('message');
            $form->setNom($nom);
            $form->setType($type);
            $form->setObjet($objet);
            $form->setEmail($email);
            $form->setTele($tele);
            $form->setBudget($budget);
            $form->setAdresse($adresse);
            $form->setEtat(0);
            $form->setMessage($message);
            $em = $this->getDoctrine()->getManager();
            $em->persist($form);
            $em->flush();
            $msj=true;
        }
        return $this->render('WebWebBundle:Default:contact.html.twig', array(
            'msj' => $msj,
            'contact' => $contact,
        ));
    }

}
