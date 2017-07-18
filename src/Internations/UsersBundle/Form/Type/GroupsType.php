<?php

namespace Internations\UsersBundle\Form\Type;

use Internations\UsersBundle\Entity\Users;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
*
*/
class GroupType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("name")
			->add("usr_id")
		;
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(
			[
				'csrf_protection' => false,
				'data_class' => Users::class,
			]
		);
	}

	/**
	 * @return string
	 */
	public function getName()
	{
	    return "";
	}

}