<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use AppBundle\Entity\Eleve;
use AppBundle\Entity\Etablisement;
use AppBundle\Entity\Pays;
use AppBundle\Form\PaysType;
use AppBundle\Form\EtablissementType;
use AppBundle\Form\EleveType;

use Appbundle\Service\FormulaireManager;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\Form\Extension\Core\Type\FormType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class DefaultController extends Controller
{
    /**
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="home")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function indexAction(Request $request)
    {
         if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
        {
            return $this->render('admin.html.twig');
        }
        
         if($this->get('security.authorization_checker')->isGranted('ROLE_USER'))
        {
            return $this->render('utilisateur.html.twig');
        }
        
    }
    
     /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin", name="admin")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function adminAction()
    {
        return $this->render('admin.html.twig');
    }
    
     /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/utilisateur/", name="utilisateur")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function utilisateurAction()
    {
        return $this->render('utilisateur.html.twig');
    }
    
     /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/form", name="form")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function addAction(Request $request)

    {

        $eleve = new Eleve();
        
        $formEleve = $this->createForm('AppBundle\Form\EleveType', $eleve);
        
        $formEleve->handleRequest($request);

        if ($formEleve->isSubmitted() && $formEleve->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($eleve);
            $manager->flush();
        }
        $request->getSession()->getFlashBag()->add('notice', 'eleve bien enregistré.');
        
        return $this->render('FormEleve.html.twig', [
            'formEleve' => $formEleve->createView()
            ]);

    }
    
     /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/form2", name="form2")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function form2Action(Request $request)

    {
        $etablissement = new Etablisement();
        
        $formEtablissement = $this->createForm('AppBundle\Form\EtablissementType', $etablissement);
        
        $formEtablissement->handleRequest($request);

        if ($formEtablissement->isSubmitted() && $formEtablissement->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($etablisement);
            $manager->flush();
        }
        $request->getSession()->getFlashBag()->add('notice', 'Etablissement bien enregistré.');
        
        return $this->render('FormEtablis.html.twig', [
            'formEtablissement' => $formEtablissement->createView()
            ]);
        

    }
    
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/formPays", name="formPays")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    
    public function formPaysAction(Request $request)
    {
        $pays = new Pays();
        
        $formPays = $this->createForm('AppBundle\Form\PaysType', $pays);
        
        $formPays->handleRequest($request);

        if ($formPays->isSubmitted() && $formPays->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($pays);
            $manager->flush();
        }
        $request->getSession()->getFlashBag()->add('notice', 'Pays bien enregistré.');
        
        return $this->render('FormPays.html.twig', [
            'formPays' => $formPays->createView()
            ]);
    }
    
    public function formChoixAction(Request $request)
    {
        
    }
}
