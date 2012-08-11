<?php

namespace File\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DocumentType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('name')
			->add('semester', 'choice', array(
				'choices' => array(
					'5'	=>	'Semestre 5',
					'6'	=>	'Semestre 6',
					'7'	=>	'Semestre 7',
					'8'	=>	'Semestre 8',
					'9'	=>	'Semestre 9',
					'10'	=>	'Semestre 10')))
			->add('type', 'choice', array(
				'choices' => array(
					'cours'	=>	'Cours',
					'tp'		=>	'TP',
					'sujet'	=>	'Sujet',
					'correction'	=>	'Correction',
					'autre'	=>	'Autre',)))
			->add('file');
	}

	public function getName()
	{
		return 'document';
	}
	
	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'File\Bundle\Entity\Document',
		);
	}
}