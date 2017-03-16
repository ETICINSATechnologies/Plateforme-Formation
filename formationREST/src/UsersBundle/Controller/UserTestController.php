<?php

namespace UsersBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UsersBundle\Entity\UserTest;
use UsersBundle\Form\UserTestType;


/**
 * User controller.
 *
 */
class UserTestController extends FOSRestController
{

    /**Get all the users
     * @return array
     * @View()
     * @Get("/users")
     */
    public function getUsersAction()
    {

        $users = $this->getDoctrine()->getRepository("UsersBundle:UserTest")
            ->findAll();

        return array('users' => $users);
    }

    /**
     * Get current user
     * @return array
     * @View()
     * @Get("/user/current")
     */
    public function getCurrentUserAction()
    {

        $user = $this->getUser();

        return array('user' => $user);
    }



    /**
     * Get a user by name
     * @param string $name
     * @return array
     *
     * @View()
     * @Get("/user/{name}")
     */
    public function getUserByNameAction($name)
    {

        $user = $this->getDoctrine()->getRepository('UsersBundle:UserTest')->findOneBy(['name' => $name]);
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

        $user = new UserTest();
        $form = $this->createForm(new UserTestType(), $user);
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

}
