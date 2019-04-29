<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\LangueType;
use AppBundle\Entity\Langue;

class LangueController extends Controller
{
    /**
     * @Route("/listeLangue", name="listeLangue")
     */
    public function listeLangueAction(Request $request)
    {
       
        $langue = $this->getDoctrine()->getRepository('AppBundle:Langue')->findBy(array(), array('libelleLangue' => 'asc'));
            
        // replace this example code with whatever you need
        return $this->render('GestionLangue/ListeLangue.html.twig', [
            'ListeLangue' => $langue,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route ("/listeLangue/ajout", name="ajout_langue")
     */
    public function ajoutLangueAction(Request $request)
    {
        $langue = new Langue();
        $formLangue = $this->createForm(LangueType::class, $langue);

        $formLangue->handleRequest($request);

        if($formLangue->isSubmitted() && $formLangue->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($langue);
            $manager->flush();

            return $this->redirectToRoute('listeLangue');
        }

        return $this->render('GestionLangue/FormLangue.html.twig', [
            'formLangue' => $formLangue->createView(),
        ]);
    }
    
    /**
     * @Route("/listeLangue/modifier/{idLangue}", name="modifLangue")
     */
    public function modifLangueAction(int $idLangue, Request $request)
    {
        $langue = $this->getDoctrine()->getRepository('AppBundle:Langue')->find($idLangue);
        if (null === $langue) {
            throw new NotFoundHttpException("Désolé, la langue n'a pas été trouvé.");
        }
        $modifForm = $this->createForm(LangueType::class, $langue, [
            'is_edit' => true
        ]);
        $modifForm->handleRequest($request);

        if($modifForm->isSubmitted() && $modifForm->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($langue);
            $manager->flush();

            return $this->redirectToRoute('listeLangue', [
                'idLangue' => $langue->getId()
            ]);
        }

        return $this->render('GestionLangue/modifLangue.html.twig', [
            'formModif' => $modifForm->createView(),
        ]);
    }
    
    /**
     * @Route("/listeLangue/suppLangue/{idLangue}", name="suppLangue")
     */
    public function suppPaysAction(Request $request, int $idLangue)
    {
       
        $langue = $this->getDoctrine()->getRepository('AppBundle:Langue')->find($idLangue);
        
        if (null === $langue){
            throw new NotFoundHttpException("Désolé, la langue n'a pas été trouvé.");
        }
        else
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($langue);
            $manager->flush($langue);
        }
        return $this->redirectToRoute('listeLangue', [
            'idLangue' => $langue->getId()
        ]);
    }
    
}