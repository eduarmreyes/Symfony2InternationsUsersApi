<?php

namespace Internations\UsersBundle\Form\Type;

use Internations\UsersBundle\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/**
*
*/
class UsersType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("name")
			->add("status")
			->add("type")
			->add("created_by")
			->add("updated_by")
		;

		$builder->add('groups', CollectionType::class, array(
     	'entry_type' => GroupType::class
		));
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(
			[
				'csrf_protection' => false,
				'data_class' => User::class,
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

	/**
	 * @return integer
	 */
	public function getStatus()
	{
	    return 0;
	}

	/**
	 * @return integer
	 */
	public function getType()
	{
	    return 0;
	}

}