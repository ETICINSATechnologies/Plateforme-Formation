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
use UsersBundle\Entity\Qcm;
use UsersBundle\Entity\Question;
use UsersBundle\Form\QcmType;
use UsersBundle\Form\QuestionType;



/**
 * Qcm controller.
 *
 */
class QcmController extends FOSRestController
{
    /**Get all the qcm
     * @return array
     * @View()
     * @Get("/qcm")
     */
    public function getQcmAction()
    {

        $qcm = $this->getDoctrine()->getRepository("UsersBundle:Qcm")
            ->findAll();

        return array('qcm' => $qcm);
    }

    /**
     * Create a new QCM
     * @var Request $request
     * @return View|array
     *
     * @View()
     * @Post("/qcm")
     */
        public function postQcmAction(Request $request)
    {

        $qcm = new Qcm();
        $form = $this->createForm(new QcmType(), $qcm);
        $form->handleRequest($request);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($qcm);
            $em->flush();

            return array("qcm" => $qcm);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Get a qcm by name
     * @param string $name
     * @return array
     *
     * @View()
     * @Get("/qcm/{name}")
     */
    public function getQcmByNameAction($name)
    {

        $qcm = $this->getDoctrine()->getRepository('UsersBundle:Qcm')->findOneBy(['name' => $name]);
        return array('qcm' => $qcm);
    }


}
