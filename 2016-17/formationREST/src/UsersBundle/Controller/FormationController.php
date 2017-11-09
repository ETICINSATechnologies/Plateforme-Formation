<?php
/**
 * Created by PhpStorm.
 * User: Jindun
 * Date: 16/03/2017
 * Time: 16:06
 */

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
use UsersBundle\Entity\Formation;
use UsersBundle\Entity\Question;
use UsersBundle\Form\FormationType;
use UsersBundle\Form\QuestionType;



/**
 * Formation controller.
 *
 */
class FormationController extends FOSRestController
{
    /**Get all the formations
     * @return array
     * @View()
     * @Get("/formation")
     */
    public function getFormationAction()
    {

        $formation = $this->getDoctrine()->getRepository("UsersBundle:Formation")
            ->findAll();

        return array('formation' => $formation);
    }

    /**
     * Create a new Formation
     * @var Request $request
     * @return View|array
     *
     * @View()
     * @Post("/formation")
     */
    public function postFormationAction(Request $request)
    {

        $formation = new Formation();
        $form = $this->createForm(new FormationType(), $formation);
        $form->handleRequest($request);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return array("formation" => $formation);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Get a formation by name
     * @param string $name
     * @return array
     *
     * @View()
     * @Get("/formation/{name}")
     */
    public function getFormationByNameAction($name)
    {

        $formation = $this->getDoctrine()->getRepository('UsersBundle:Formation')->findOneBy(['nameFormation' => $name]);
        return array('formation' => $formation);
    }


}
