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

      $users = $this->getDoctrine()->getRepository("InternationsUsersBundle:User")
      	->findAll();

      return array('user' => $users);
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
     * Edit a Task
     * Put action
     * @var Request $request
     * @var Task $task
     * @return array
     *
     * @View()
     * @ParamConverter("task", class="InternationsUsersBundle:User")
     * @Put("/task/{id}")
     */
    /*public function putTaskAction(Request $request, Task $task)
    {
        $form = $this->createForm(new TaskType(), $task);
        $form->submit($request);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($task);
            $em->flush();

            return array("task" => $task);
        }

        return array(
            'form' => $form,
        );
    }*/

    /**
     * Delete a Task
     * Delete action
     * @var Task $task
     * @return array
     *
     * @View()
     * @ParamConverter("task", class="InternationsUsersBundle:User")
     * @Delete("/task/{id}")
     */
    /*public function deleteTaskAction(Task $task)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($task);
        $em->flush();

        return array("status" => "Deleted");
    }*/

}