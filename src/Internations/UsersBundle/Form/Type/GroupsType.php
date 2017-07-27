<?php

namespace Internations\UsersBundle\Form\Type;

use Internations\UsersBundle\Entity\Groups;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
*
*/
class GroupsType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("name")
			->add("status")
			->add("created_by")
			->add("updated_by")
		;
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(
			[
				'csrf_protection' => false,
				'data_class' => Groups::class,
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