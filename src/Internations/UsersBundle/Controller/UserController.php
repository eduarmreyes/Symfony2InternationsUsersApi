<?php

namespace Internations\UsersBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

use Internations\UsersBundle\Entity\User;
use Internations\UsersBundle\Entity\Groups;

use Internations\UsersBundle\Form\Type\UsersType;
use Internations\UsersBundle\Form\Type\GroupsType;

class UserController extends FOSRestController
{

    /**
    * Get all the Users
     * @return array
     *
     * @View()
     * @Get("/users")
     */
    public function getUsersAction(){

    	$userRepository = $this->getDoctrine()->getRepository("InternationsUsersBundle:User");

      $users = $userRepository->createQueryBuilder("u")
      	->where("u.status = 1")
      	->getQuery();

      return array('user' => $users->getResult());
    }

    /**
     * Get a user by ID
     * @param User $user
     * @return array
     *
     * @View()
     * @ParamConverter("user", class="InternationsUsersBundle:User")
     * @Get("/user/{id}",)
     */
    public function getUserAction(User $user){

    	return array('user' => $user);
    }

    /**
     * Create a new User
     * @var Request $request
     * @return View|array
     *
     * @View()
     * @Post("/user")
     */
    public function postUserAction(Request $request)
    {
      $user = new User();

      $form = $this->createForm(new UsersType(), $user);
      $form->handleRequest($request);

      if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return array("user" => $user);
      }

      return array(
				'form' => $form,
      );
    }

    /**
     * Delete an existing User by ID
     * Delete action
     * @param User $user
     * @return array
     *
     * @View()
     * @ParamConverter("user", class="InternationsUsersBundle:User")
     * @Delete("/user/{id}",)
     */

    public function deleteUserAction(User $user)
    {
  		$em = $this->getDoctrine()->getManager();
  		$em->getConnection()->beginTransaction();
    	try {

    		$user->setStatus(0);

    		$em->persist($user);
    		$em->flush();

    		$em->getConnection()->commit();

    		return array("status" => "Deleted", "user" => $user);

    	} catch (Exception $e) {
				$em->getConnection()->rollback();
    		return array("status" => 0, "error_message" => $e->getMessage());
    	}
    }

  /**
  * Get all the Groups
   * @return array
   *
   * @View()
   * @Get("/groups")
   */
  public function getGroupsAction(){

    $groupRepository = $this->getDoctrine()->getRepository("InternationsUsersBundle:Groups");

    $groups = $groupRepository->createQueryBuilder("g")
      ->where("g.status = 1")
      ->getQuery();

    return array('groups' => $groups->getResult());
  }

  /**
   * Create a new Group
   * @var Request $request
   * @return View|array
   *
   * @View()
   * @Post("/group")
   */
  public function postGroupAction(Request $request)
  {
    $group = new Groups();

    $form = $this->createForm(new GroupsType(), $group);
    $form->handleRequest($request);

    if ($form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($group);
      $em->flush();

      return array("group" => $group);
    }

    return array(
			'form' => $form,
    );
  }

}
