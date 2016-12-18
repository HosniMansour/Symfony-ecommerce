<?php

namespace Web\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Web\AdminBundle\Entity\Commande;
use Web\AdminBundle\Entity\LigneCommande;

class PanierController extends Controller
{
    public function panierAction(Request $request)
    {
        $session = $request->getSession();
        $user = $this->getUser();
        $commandes = $this->getDoctrine()->getRepository('WebAdminBundle:Commande')->findByUser($user);
        if(!$session->has('panier'))  $session->set('panier',array());
        $produits = $this->getDoctrine()->getRepository('WebAdminBundle:Produit')->findArray(array_keys($session->get('panier')));
        return $this->render('WebWebBundle:Default:panier.html.twig', array(
            'produits' => $produits,
            'panier' => $session->get('panier'),
            'commandes' => $commandes,
        ));
    }
    public function addPanierAction(Request $request,$id)
    {
        $session = $request->getSession();
        if(!$session->has('panier'))  $session->set('panier',array());
        $panier = $session->get('panier');

        if(array_key_exists($id,$panier)){
            if($request->query->get('qte') != null){
                $panier[$id] = $request->query->get('qte');
            }
        }else{
            if($request->query->get('qte')!=null){
                $panier[$id] = $request->query->get('qte');
            }else{
                $panier[$id] = 1;
            }
        }
        $session->set('panier',$panier);

        return $this->redirect($this->generateUrl('panier'));
    }
    public function removePanierAction(Request $request,$id)
    {
        $session = $request->getSession();
        $panier = $session->get('panier');
        if(array_key_exists($id,$panier)){
            unset($panier[$id]);
            $session->set('panier',$panier);
        }
        return $this->redirect($this->generateUrl('panier'));
    }

    public function confirmercommandeAction(Request $request)
    {
        $user = $this->getUser();
        $session = $request->getSession();
        $date = new \DateTime("now");
        if(!$session->has('panier'))  $session->set('panier',array());
        $panier = $session->get('panier');
        $produits = $this->getDoctrine()->getRepository('WebAdminBundle:Produit')->findArray(array_keys($session->get('panier')));
        return $this->render('WebWebBundle:Default:confirmercommande.html.twig', array(
            'user' => $user,
            'produits' => $produits,
            'panier' => $panier,
            'date' => $date,
        ));
    }
    public function commanderAction(Request $request)
    {
        $user = $this->getUser();
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        if(!$session->has('panier'))  $session->set('panier',array());
        $panier = $session->get('panier');

        $user->setNom($request->request->get('nom'));
        $user->setPrenom($request->request->get('prenom'));
        $user->setEmail($request->request->get('email'));
        $user->setTel($request->request->get('tel'));
        $user->setAdresse($request->request->get('adresse'));
        $em->merge($user);
        
        $commande = new Commande();
        $commande->setUser($user);
        $commande->setEtat("encour");
        $commande->setModep($request->request->get('group2'));
        $commande->setDate(new \DateTime("now"));
        $em->persist($commande);
        $total = 0;

        foreach($panier as $k => $p){
            $LigneCmd = new LigneCommande();
            $LigneCmd->setCommande($commande);
            $produit = $this->getDoctrine()->getRepository('WebAdminBundle:Produit')->findOneById($k);
            $total += $produit->getPrix() * $p;
            $LigneCmd->setProduit($produit);
            $LigneCmd->setQte($p);
            $em->persist($LigneCmd);
            $produit->setNbrstock($produit->getNbrstock()-$p);
            $em->persist($produit);
        }
        $commande->setTotal($total);
        $em->flush();
        $session->remove('panier');

        $email = $this->getDoctrine()->getManager()->getRepository('WebAdminBundle:Parameter')->getEmail();
        $message = "<html><body><br/><span style=\"font-size: 16px; font-family: arial, helvetica, sans-serif; line-height: 19px;\">Vous avez, une nouvelle commande sur Medor.tn</span><br/><br/><center><a style=\"width:40%;display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;background-color: #008B30;color: #ffffff\" href=\"http://www.medor.tn/administrator/commande/ ". $commande->getId() . "\" target=\"_blank\"><span style=\"font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:16px;line-height:32px;\">Voir Commande</span></a></center></body></html>";
        mail($email[0]['emailNoti'],"Nouvelle commande Medor.tn",$message);
        return $this->redirect($this->generateUrl('showcommande', array(
            'id' => $commande->getId(),
        )));
    }
    public function showCommandeAction($id)
    {
        $commande = $this->getDoctrine()->getRepository('WebAdminBundle:Commande')->findOneById($id);
        return $this->render('WebWebBundle:Default:commande.html.twig', array(
            'commande' => $commande,
        ));
    }

}