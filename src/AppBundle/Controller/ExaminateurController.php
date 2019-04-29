<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\ExaminateurType;
use AppBundle\Entity\Examinateur;

class ExaminateurController extends Controller
{
    /**
     * @Route("/listeExaminateur", name="listeExaminateur")
     */
    public function listeExaminateurAction(Request $request)
    {
       
        $examinateur = $this->getDoctrine()->getRepository('AppBundle:Examinateur')->findAll();
            
        // replace this example code with whatever you need
        return $this->render('GestionExaminateur/ListeExaminateur.html.twig', [
            'ListeExaminateur' => $examinateur,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/ficheExaminateur/{idExaminateur}", name="ficheExaminateur")
     */
    public function ficheExaminateurAction(Request $request, int $idExaminateur)
    {
       
        $examinateur = $this->getDoctrine()->getRepository('AppBundle:Examinateur')->find($idExaminateur);
        
        if (null === $examinateur){
            throw new NotFoundHttpException("Désolé, l'examinateur n'a pas été trouvé.");
        }
        // replace this example code with whatever you need
        return $this->render('GestionExaminateur/FicheExaminateur.html.twig', [
            'ficheExaminateur' => $examinateur
        ]);
    }
    /**
     * @Route ("/listeExaminateur/ajout", name="ajout_examinateur")
     */
    public function ajoutExaminateurAction(Request $request)
    {
        $examinateur = new Examinateur();
        $formExaminateur = $this->createForm(ExaminateurType::class, $examinateur);

        $formExaminateur->handleRequest($request);

        if($formExaminateur->isSubmitted() && $formExaminateur->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($examinateur);
            $manager->flush();

            return $this->redirectToRoute('listeExaminateur');
        }

        return $this->render('GestionExaminateur/FormExaminateur.html.twig', [
            'formExaminateur' => $formExaminateur->createView(),
        ]);
    }
    /**
     * @Route("/ficheExaminateur/modifier/{idExaminateur}", name="modifExaminateur")
     */
    public function modifExaminateurAction(int $idExaminateur, Request $request)
    {
        $examinateur = $this->getDoctrine()->getRepository('AppBundle:Examinateur')->find($idExaminateur);
        if (null === $examinateur) {
            throw new NotFoundHttpException("Désolé, l'examinateur n'a pas été trouvé.");
        }
        $modifForm = $this->createForm(ExaminateurType::class, $examinateur, [
            'is_edit' => true
        ]);
        $modifForm->handleRequest($request);

        if($modifForm->isSubmitted() && $modifForm->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($examinateur);
            $manager->flush();

            return $this->redirectToRoute('listeExaminateur', [
                'idExaminateur' => $examinateur->getId()
            ]);
        }

        return $this->render('GestionExaminateur/modifExaminateur.html.twig', [
            'formModif' => $modifForm->createView(),
        ]);
    }
    /**
     * @Route("/ficheExaminateur/suppExaminateur/{idExaminateur}", name="suppExaminateur")
     */
    public function suppExaminateurAction(Request $request, int $idExaminateur)
    {
       
        $examinateur = $this->getDoctrine()->getRepository('AppBundle:Examinateur')->find($idExaminateur);
        
        if (null === $examinateur){
            throw new NotFoundHttpException("Désolé, l'examinateur n'a pas été trouvé.");
        }
        else
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($examinateur);
            $manager->flush($examinateur);
        }
        return $this->redirectToRoute('listeExaminateur', [
            'idExaminateur' => $examinateur->getId()
        ]);
    }
    
}