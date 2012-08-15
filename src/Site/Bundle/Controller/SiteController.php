<?php

namespace Site\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use JMS\SecurityExtraBundle\Annotation\Secure;

use File\Bundle\Entity\Document;
use File\Bundle\Form\DocumentType;
use File\Bundle\Form\DocumentHandler;

class SiteController extends Controller
{
	public function indexAction()
	{
		// On récupère le repository
		$repository = $this->getDoctrine()
					->getEntityManager()
					->getRepository('FileBundle:Document');
		
		$sems = array(
				null,
				null,
				null,
				null,
				5 => $repository->getTotalBySemester(5),
				6 => $repository->getTotalBySemester(6),
				7 => $repository->getTotalBySemester(7),
				8 => $repository->getTotalBySemester(8),
				9 => $repository->getTotalBySemester(9),
				10 => $repository->getTotalBySemester(10)
				);
		
		
		return $this->render('SiteBundle:Site:index.html.twig', array(
			'sems' => $sems
		));
	}
	
	public function showsemAction($semestre)
	{
		// On récupère le repository
		$repository = $this->getDoctrine()
					->getEntityManager()
					->getRepository('FileBundle:Document');
		
		$types = array(
				1 => $repository->getTotalBySType($semestre, 'Cours'),
				2 => $repository->getTotalBySType($semestre, 'TD'),
				3 => $repository->getTotalBySType($semestre, 'TP'),
				4 => $repository->getTotalBySType($semestre, 'Sujet'),
				5 => $repository->getTotalBySType($semestre, 'Correction'),
				6 => $repository->getTotalBySType($semestre, 'Autre')
				);
		
		return $this->render('SiteBundle:Site:showsem.html.twig', array(
			'types' => $types,
			'semestre' => $semestre
		));
	}
	
	public function showdocAction($semestre, $type)
	{
		// On récupère le repository
		$files = $this->getDoctrine()
					->getEntityManager()
					->getRepository('FileBundle:Document')
					->findBy(
						array(
							'semester' => $semestre,
							'type' => $type
							),
						array('id' => 'ASC')
						);
		
		return $this->render('SiteBundle:Site:showdoc.html.twig', array(
			'files' => $files,
			'semestre' => $semestre,
			'type' => $type
		));
	}
	
	public function ajouterAction()
	{
		$document = new Document();
		$form = $this->createForm(new DocumentType, $document);
		
		$formHandler = new DocumentHandler($form, $this->get('request'), $this->getDoctrine()->getEntityManager());
		
		// On exécute le traitement du formulaire. S'il retourne true, alors le formulaire a bien été traité
		if( $formHandler->process() )
		{
			$this->get('session')->setFlash('info', 'Document enregistré avec succès !!!');
			return $this->redirect( $this->generateUrl('SiteBundle_index') );
		}

		// Et s'il retourne false alors la requête n'était pas en POST ou le formulaire non valide.
		// On réaffiche donc le formulaire.
		return $this->render('FileBundle:File:upload.html.twig', array(
			'form' => $form->createView(),
		));

		return array('form' => $form->createView());
	}
	
	public function liensAction()
	{
		// On récupère le repository
	//	$repository = $this->getDoctrine()
	//				->getEntityManager()
	//				->getRepository('FileBundle:Document');
		
		// Temporairement en "dur" 
		$liens = array(
				1 => array(
					"url" => "http://f5zv.pagesperso-orange.fr/RADIO/RM/RM23/RM23p/RM23p.html",
					"nom" => "Abaque de Smith",
					),
				);
		
		return $this->render('SiteBundle:Site:liens.html.twig', array(
			'liens' => $liens,
		));
	}
}