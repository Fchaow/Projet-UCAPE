<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use AppBundle\Entity\Eleve;

use AppBundle\Entity\Etablisement;


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

        // On crée un objet Advert

        $eleve = new Eleve();


        // On crée le FormBuilder grâce au service form factory

        $form = $this->get('form.factory')->createBuilder(FormType::class, $eleve)


        // On ajoute les champs de l'entité que l'on veut à notre formulaire


            ->add('nomEleve')
            ->add('prenomEleve')
            ->add('sexeEleve')
            ->add('dateNaissEleve')
            ->add('promoEleve')
            ->add('emailEleve')
            ->add('emailParentEleve')
            ->add('motDePasseEleve')
            ->add('commentairesGeneralEleve')
            ->add('terreDesLanguesEleve')
            ->add('commentairesChoixEleve')
            ->add('visaParentEleve')
            ->add('ue2DateEleve')
            ->add('ue2ThemeDossierEleve')
            ->add('ue2NoteEleve')
            ->add('ue2AppreciationsEleve')
            ->add('typeEleve')
            ->add('ue1DateUcape')
            ->add('ue1NoteUcape')
            ->add('ue1AppreciationsUcape')
            ->add('obtentionDiplomeUcape')
            ->add('mentionUcape')
            ->add('commentairesUcape')
            ->add('Valider', SubmitType::class)
            ->getForm()

        ;
        
        // Si la requête est en POST

    if ($request->isMethod('POST')) {

      // On fait le lien Requête <-> Formulaire

      // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur

      $form->handleRequest($request);


      // On vérifie que les valeurs entrées sont correctes

      // (Nous verrons la validation des objets en détail dans le prochain chapitre)

      if ($form->isValid()) {

        // On enregistre notre objet $advert dans la base de données, par exemple

        $em = $this->getDoctrine()->getManager();

        $em->persist($eleve);

        $em->flush();


        $request->getSession()->getFlashBag()->add('notice', 'Eleve bien enregistrée.');


      }

    }

        // À partir du formBuilder, on génère le formulaire

        //$form = $formBuilder->getForm();

        // On passe la méthode createView() du formulaire à la vue

        // afin qu'elle puisse afficher le formulaire toute seule

        return $this->render('FormEleve.html.twig', array(

          'form' => $form->createView(),

        ));

    }
    
     /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/form2", name="form2")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function form2Action(Request $request)

    {

        // On crée un objet Advert

        $etablisement = new Etablisement();


        // On crée le FormBuilder grâce au service form factory

        $form2 = $this->get('form.factory')->createBuilder(FormType::class, $etablisement)


        // On ajoute les champs de l'entité que l'on veut à notre formulaire


            ->add('libelleEtablissement')
            ->add('nomEtablissement')
            ->add('telEtablissement')
            ->add('emailEtablissement')
            ->add('responsableEtablissement')
            ->add('numeroEtablissement')
            ->add('rueEtablissement')
            ->add('villeEtablissement')
            ->add('Valider', SubmitType::class)
            ->getForm()

        ;
        
        // Si la requête est en POST

    if ($request->isMethod('POST')) {

      // On fait le lien Requête <-> Formulaire

      // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur

      $form2->handleRequest($request);


      // On vérifie que les valeurs entrées sont correctes

      // (Nous verrons la validation des objets en détail dans le prochain chapitre)

      if ($form2->isValid()) {

        // On enregistre notre objet $advert dans la base de données, par exemple

        $em = $this->getDoctrine()->getManager();

        $em->persist($etablisement);

        $em->flush();


        $request->getSession()->getFlashBag()->add('notice', 'Etablissement bien enregistrée.');


      }

    }

        // À partir du formBuilder, on génère le formulaire

        //$form = $formBuilder->getForm();

        // On passe la méthode createView() du formulaire à la vue

        // afin qu'elle puisse afficher le formulaire toute seule

        return $this->render('FormEtablis.html.twig', array(

          'form2' => $form2->createView(),

        ));

    }
}
