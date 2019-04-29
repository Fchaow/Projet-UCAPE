<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\EleveType;
use AppBundle\Entity\Eleve;

class EleveController extends Controller
{
    /**
     * @Route("/listeEleve", name="listeEleve")
     */
    public function listeEleveAction(Request $request)
    {
       
        $eleve = $this->getDoctrine()->getRepository('AppBundle:Eleve')->findBy(array(), array('nomEleve' => 'asc'));
            
        // replace this example code with whatever you need
        return $this->render('GestionEleve/ListeEleve.html.twig', [
            'ListeEleve' => $eleve,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/ficheEleve/{idEleve}", name="ficheEleve")
     */
    public function ficheEleveAction(Request $request, int $idEleve)
    {
       
        $eleve = $this->getDoctrine()->getRepository('AppBundle:Eleve')->find($idEleve);
        
        if (null === $eleve){
            throw new NotFoundHttpException("Désolé, l'élève n'a pas été trouvé.");
        }
        // replace this example code with whatever you need
        return $this->render('GestionEleve/FicheEleve.html.twig', [
            'ficheEleve' => $eleve
        ]);
    }
    /**
     * @Route ("/listeEleve/ajout", name="ajout_eleve")
     */
    public function ajoutEleveAction(Request $request)
    {
        $eleve = new Eleve();
        $formEleve = $this->createForm(EleveType::class, $eleve);

        $formEleve->handleRequest($request);

        if($formEleve->isSubmitted() && $formEleve->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($eleve);
            $manager->flush();

            return $this->redirectToRoute('listeEleve');
        }

        return $this->render('GestionEleve/FormEleve.html.twig', [
            'formEleve' => $formEleve->createView(),
        ]);
    }
    /**
     * @Route("/ficheEleve/modifier/{idEleve}", name="modifEleve")
     */
    public function modifEleveAction(int $idEleve, Request $request)
    {
        $eleve = $this->getDoctrine()->getRepository('AppBundle:Eleve')->find($idEleve);
        if (null === $eleve) {
            throw new NotFoundHttpException("Désolé, l'élève n'a pas été trouvé.");
        }
        $modifForm = $this->createForm(EleveType::class, $eleve, [
            'is_edit' => true
        ]);
        $modifForm->handleRequest($request);

        if($modifForm->isSubmitted() && $modifForm->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($eleve);
            $manager->flush();

            return $this->redirectToRoute('listeEleve', [
                'idEleve' => $eleve->getId()
            ]);
        }

        return $this->render('GestionEleve/modifEleve.html.twig', [
            'formModif' => $modifForm->createView(),
        ]);
    }
    /**
     * @Route("/ficheEleve/suppEleve/{idEleve}", name="suppEleve")
     */
    public function suppEleveAction(Request $request, int $idEleve)
    {
       
        $eleve = $this->getDoctrine()->getRepository('AppBundle:Eleve')->find($idEleve);
        
        if (null === $eleve){
            throw new NotFoundHttpException("Désolé, l'élève n'a pas été trouvé.");
        }
        else
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($eleve);
            $manager->flush($eleve);
        }
        return $this->redirectToRoute('listeEleve', [
            'idEleve' => $eleve->getId()
        ]);
    }
    
}