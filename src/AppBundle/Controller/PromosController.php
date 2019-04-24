<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\PromosType;
use AppBundle\Entity\Promotion;

class PromosController extends Controller
{
    /**
     * @Route("/listePromos", name="listePromos")
     */
    public function listePromosAction(Request $request)
    {
       
        $promos = $this->getDoctrine()->getRepository('AppBundle:Promotion')->findBy(array(), array('anneePromo' => 'desc'));
            
        // replace this example code with whatever you need
        return $this->render('GestionPromos/ListePromos.html.twig', [
            'ListePromos' => $promos,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/fichePromos/{idPromos}", name="fichePromos")
     */
    public function fichePromosAction(Request $request, int $idPromos)
    {
       
        $promos = $this->getDoctrine()->getRepository('AppBundle:Promotion')->find($idPromos);
        
        if (null === $promos){
            throw new NotFoundHttpException("Désolé, la promotion n'a pas été trouvé.");
        }
        // replace this example code with whatever you need
        return $this->render('GestionPromos/FichePromos.html.twig', [
            'fichePromos' => $promos
        ]);
    }
    /**
     * @Route ("/listePromos/ajout", name="ajout_promos")
     */
    public function ajoutPromosAction(Request $request)
    {
        $promos = new Promotion();
        $formPromos = $this->createForm(PromosType::class, $promos);

        $formPromos->handleRequest($request);

        if($formPromos->isSubmitted() && $formPromos->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($promos);
            $manager->flush();

            return $this->redirectToRoute('listePromos');
        }

        return $this->render('GestionPromos/FormPromos.html.twig', [
            'formPromos' => $formPromos->createView(),
        ]);
    }
    /**
     * @Route("/fichePromos/modifier/{idPromos}", name="modifPromos")
     */
    public function modifPromosAction(int $idPromos, Request $request)
    {
        $promos = $this->getDoctrine()->getRepository('AppBundle:Promotion')->find($idPromos);
        if (null === $promos) {
            throw new NotFoundHttpException("Désolé, la promotion n'a pas été trouvé.");
        }
        $modifForm = $this->createForm(PromosType::class, $promos, [
            'is_edit' => true
        ]);
        $modifForm->handleRequest($request);

        if($modifForm->isSubmitted() && $modifForm->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($promos);
            $manager->flush();

            return $this->redirectToRoute('listePromos', [
                'idPromos' => $promos->getId()
            ]);
        }

        return $this->render('GestionPromos/modifPromos.html.twig', [
            'formModif' => $modifForm->createView(),
        ]);
    }
    /**
     * @Route("/fichePromos/suppPromos/{idPromos}", name="suppPromos")
     */
    public function suppPromosAction(Request $request, int $idPromos)
    {
       
        $promos = $this->getDoctrine()->getRepository('AppBundle:Promotion')->find($idPromos);
        
        if (null === $promos){
            throw new NotFoundHttpException("Désolé, la promotion n'a pas été trouvé.");
        }
        else
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($promos);
            $manager->flush($promos);
        }
        return $this->redirectToRoute('listePromos', [
            'idPromos' => $promos->getId()
        ]);
    }
    
}